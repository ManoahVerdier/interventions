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

class CreateProductModule extends Migration
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
        Schema::dropIfExists($this->tablePrefix . 'products');

        // Delete module
        Module::where('name', 'product')->forceDelete();
    }

    protected function initTablePrefix()
    {
        $this->tablePrefix = '';

        return $this->tablePrefix;
    }

    protected function createTable()
    {
        Schema::create($this->tablePrefix . 'products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('reference')->nullable();
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('brand_id')->nullable();
            $table->string('short_description')->nullable();
            $table->text('description')->nullable();
            $table->decimal('amount_ht', 13, 2);
            $table->decimal('amount_ttc', 13, 2);
            $table->unsignedInteger('discount')->nullable();
            $table->string('quantity')->nullable();
            $table->string('image')->nullable();
            $table->unsignedInteger('domain_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('domain_id')->references('id')->on('uccello_domains');
// %table_foreign_keys%
        });
    }

    protected function createModule()
    {
        $module = Module::create([
            'name' => 'product',
            'icon' => 'category',
            'model_class' => 'App\Product',
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

        // Field reference
        Field::create([
            'module_id' => $module->id,
            'block_id' => $block->id,
            'name' => 'reference',
            'uitype_id' => uitype('text')->id,
            'displaytype_id' => displaytype('everywhere')->id,
            'sequence' => $block->fields()->count(),
            'data' => null
        ]);

        // Field category
        Field::create([
            'module_id' => $module->id,
            'block_id' => $block->id,
            'name' => 'category',
            'uitype_id' => uitype('entity')->id,
            'displaytype_id' => displaytype('everywhere')->id,
            'sequence' => $block->fields()->count(),
            'data' => json_decode('{"rules":"required","module":"category"}')
        ]);

        // Field brand
        Field::create([
            'module_id' => $module->id,
            'block_id' => $block->id,
            'name' => 'brand',
            'uitype_id' => uitype('entity')->id,
            'displaytype_id' => displaytype('everywhere')->id,
            'sequence' => $block->fields()->count(),
            'data' => json_decode('{"module":"brand"}')
        ]);

        // Field short_description
        Field::create([
            'module_id' => $module->id,
            'block_id' => $block->id,
            'name' => 'short_description',
            'uitype_id' => uitype('text')->id,
            'displaytype_id' => displaytype('everywhere')->id,
            'sequence' => $block->fields()->count(),
            'data' => null
        ]);

        // Field description
        Field::create([
            'module_id' => $module->id,
            'block_id' => $block->id,
            'name' => 'description',
            'uitype_id' => uitype('textarea')->id,
            'displaytype_id' => displaytype('everywhere')->id,
            'sequence' => $block->fields()->count(),
            'data' => null
        ]);

        // Field amount_ht
        Field::create([
            'module_id' => $module->id,
            'block_id' => $block->id,
            'name' => 'amount_ht',
            'uitype_id' => uitype('number')->id,
            'displaytype_id' => displaytype('everywhere')->id,
            'sequence' => $block->fields()->count(),
            'data' => json_decode('{"rules":"required"}')
        ]);

        // Field amount_ttc
        Field::create([
            'module_id' => $module->id,
            'block_id' => $block->id,
            'name' => 'amount_ttc',
            'uitype_id' => uitype('number')->id,
            'displaytype_id' => displaytype('everywhere')->id,
            'sequence' => $block->fields()->count(),
            'data' => json_decode('{"rules":"required"}')
        ]);

        // Field discount
        Field::create([
            'module_id' => $module->id,
            'block_id' => $block->id,
            'name' => 'discount',
            'uitype_id' => uitype('integer')->id,
            'displaytype_id' => displaytype('everywhere')->id,
            'sequence' => $block->fields()->count(),
            'data' => null
        ]);

        // Field quantity
        Field::create([
            'module_id' => $module->id,
            'block_id' => $block->id,
            'name' => 'quantity',
            'uitype_id' => uitype('text')->id,
            'displaytype_id' => displaytype('everywhere')->id,
            'sequence' => $block->fields()->count(),
            'data' => json_decode('{"info":"field_info.quantity"}')
        ]);

        // Field image
        Field::create([
            'module_id' => $module->id,
            'block_id' => $block->id,
            'name' => 'image',
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
            'columns' => [ 'image', 'name', 'reference', 'category', 'brand', 'amount_ht', 'amount_ttc', 'discount', 'quantity' ],
            'conditions' => null,
            'order' => null,
            'is_default' => true,
            'is_public' => false,
            'data' => [ 'readonly' => true ]
        ]);
    }

    protected function createRelatedLists($module)
    {
        $relatedModule = Module::where('name', 'category')->first();

        Relatedlist::create([
            'module_id' => $relatedModule->id,
            'related_module_id' => $module->id,
            'related_field_id' => $module->fields->where('name', 'category')->first()->id,
            'tab_id' => null,
            'label' => 'relatedlist.products',
            'type' => 'n-1',
            'method' => 'getDependentList',
            'sequence' => $module->relatedlists()->count(),
            'data' => [ 'actions' => [ 'add', 'select' ] ]
        ]);
    }

    protected function createLinks($module)
    {
    }
}