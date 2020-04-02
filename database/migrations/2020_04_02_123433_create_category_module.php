<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Uccello\Core\Database\Migrations\Migration;
use Uccello\Core\Models\Module;
use Uccello\Core\Models\Domain;
use Uccello\Core\Models\Tab;
use Uccello\Core\Models\Block;
use Uccello\Core\Models\Field;
use Uccello\Core\Models\Filter;
use Uccello\Core\Models\Relatedlist;
use Uccello\Core\Models\Link;

class CreateCategoryModule extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->createTable();
        $module = $this->createModule();
        $this->activateModuleOnDomains($module);
        $this->createTabsBlocksFields($module);
        $this->createFilters($module);
        $this->createRelatedLists($module);
        $this->createLinks($module);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Drop table
        Schema::dropIfExists($this->tablePrefix . 'categories');

        // Delete module
        Module::where('name', 'category')->forceDelete();
    }

    protected function initTablePrefix()
    {
        $this->tablePrefix = '';

        return $this->tablePrefix;
    }

    protected function createTable()
    {
        Schema::create($this->tablePrefix . 'categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->unsignedInteger('parent_id')->nullable();
            $table->string('pictogram')->nullable();
            $table->string('path')->nullable();
            $table->integer('level')->default(0);
            $table->unsignedInteger('domain_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('parent_id')->references('id')->on('categories');
            $table->foreign('domain_id')->references('id')->on('uccello_domains');
        });
    }

    protected function createModule()
    {
        $module = Module::create([
            'name' => 'category',
            'icon' => 'folder',
            'model_class' => 'App\Category',
            'data' => null
        ]);

        return $module;
    }

    protected function activateModuleOnDomains($module)
    {
        $domains = Domain::all();
        foreach ($domains as $domain) {
            $domain->modules()->attach($module);
        }
    }

    protected function createTabsBlocksFields($module)
    {
        // Tab tab.main
        $tab = Tab::create([
            'module_id' => $module->id,
            'label' => 'tab.main',
            'icon' => null,
            'sequence' => $module->tabs()->count(),
            'data' => null
        ]);

        // Block block.general
        $block = Block::create([
            'module_id' => $module->id,
            'tab_id' => $tab->id,
            'label' => 'block.general',
            'icon' => 'info',
            'sequence' => $tab->blocks()->count(),
            'data' => null
        ]);

        // Field name
        Field::create([
            'module_id' => $module->id,
            'block_id' => $block->id,
            'name' => 'name',
            'uitype_id' => uitype('text')->id,
            'displaytype_id' => displaytype('everywhere')->id,
            'sequence' => $block->fields()->count(),
            'data' => json_decode('{"rules":"required"}')
        ]);

        // Field parent
        Field::create([
            'module_id' => $module->id,
            'block_id' => $block->id,
            'name' => 'parent',
            'uitype_id' => uitype('entity')->id,
            'displaytype_id' => displaytype('everywhere')->id,
            'sequence' => $block->fields()->count(),
            'data' => json_decode('{"module":"category"}')
        ]);

        // Field pictogram
        Field::create([
            'module_id' => $module->id,
            'block_id' => $block->id,
            'name' => 'pictogram',
            'uitype_id' => uitype('image')->id,
            'displaytype_id' => displaytype('everywhere')->id,
            'sequence' => $block->fields()->count(),
            'data' => null
        ]);

    }

    protected function createFilters($module)
    {
        // Filter
        Filter::create([
            'module_id' => $module->id,
            'domain_id' => null,
            'user_id' => null,
            'name' => 'filter.all',
            'type' => 'list',
            'columns' => [ 'name', 'parent', 'pictogram' ],
            'conditions' => null,
            'order' => null,
            'is_default' => true,
            'is_public' => false,
            'data' => [ 'readonly' => true ]
        ]);

    }

    protected function createRelatedLists($module)
    {
        Relatedlist::create([
            'module_id' => $module->id,
            'related_module_id' => $module->id,
            'related_field_id' => $module->fields->where('name', 'parent')->first()->id,
            'tab_id' => null,
            'label' => 'relatedlist.children',
            'type' => 'n-1',
            'method' => 'getDependentList',
            'sequence' => $module->relatedlists()->count(),
            'data' => [ 'actions' => [ 'add', 'select' ], 'relationName' => 'children' ]
        ]);
    }

    protected function createLinks($module)
    {
    }
}