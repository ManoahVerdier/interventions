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

class CreateOrderModule extends Migration
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
        Schema::dropIfExists($this->tablePrefix . 'orders');

        // Delete module
        Module::where('name', 'order')->forceDelete();
    }

    protected function initTablePrefix()
    {
        $this->tablePrefix = '';

        return $this->tablePrefix;
    }

    protected function createTable()
    {
        Schema::create($this->tablePrefix . 'orders', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->nullable();
            $table->decimal('total_ht', 13, 2)->nullable();
            $table->decimal('total_ttc', 13, 2)->nullable();
            $table->string('status')->nullable();
            $table->unsignedInteger('domain_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('domain_id')->references('id')->on('uccello_domains');
            $table->foreign('user_id')->references('id')->on('users');

        });
    }

    protected function createModule()
    {
        $module = Module::create([
            'name' => 'order',
            'icon' => 'shopping_cart',
            'model_class' => 'App\Order',
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

        // Field createdat
        Field::create([
            'module_id' => $module->id,
            'block_id' => $block->id,
            'name' => 'created_at',
            'uitype_id' => uitype('datetime')->id,
            'displaytype_id' => displaytype('detail')->id,
            'sequence' => $block->fields()->count(),
            'data' => null
        ]);

        // Field user
        Field::create([
            'module_id' => $module->id,
            'block_id' => $block->id,
            'name' => 'user',
            'uitype_id' => uitype('entity')->id,
            'displaytype_id' => displaytype('everywhere')->id,
            'sequence' => $block->fields()->count(),
            'data' => json_decode('{"module":"user"}')
        ]);

        // Field total_ht
        Field::create([
            'module_id' => $module->id,
            'block_id' => $block->id,
            'name' => 'total_ht',
            'uitype_id' => uitype('number')->id,
            'displaytype_id' => displaytype('everywhere')->id,
            'sequence' => $block->fields()->count(),
            'data' => null
        ]);

        // Field total_ttc
        Field::create([
            'module_id' => $module->id,
            'block_id' => $block->id,
            'name' => 'total_ttc',
            'uitype_id' => uitype('number')->id,
            'displaytype_id' => displaytype('everywhere')->id,
            'sequence' => $block->fields()->count(),
            'data' => null
        ]);

        // Field status
        Field::create([
            'module_id' => $module->id,
            'block_id' => $block->id,
            'name' => 'status',
            'uitype_id' => uitype('select')->id,
            'displaytype_id' => displaytype('everywhere')->id,
            'sequence' => $block->fields()->count(),
            'data' => [
                'default' => 'status.pending',
                'choices' => [
                    'status.pending',
                    'status.confirmed',
                    'status.validated',
                    'status.canceled',
                ]
            ]
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
            'columns' => [ 'created_at', 'user', 'total_ht', 'total_ttc', 'status' ],
            'conditions' => null,
            'order' => null,
            'is_default' => true,
            'is_public' => false,
            'data' => [ 'readonly' => true ]
        ]);

    }

    protected function createRelatedLists($module)
    {
        $relatedModule = Module::where('name', 'user')->first();

        Relatedlist::create([
            'module_id' => $relatedModule->id,
            'related_module_id' => $module->id,
            'related_field_id' => $module->fields->where('name', 'user')->first()->id,
            'tab_id' => null,
            'label' => 'relatedlist.orders',
            'type' => 'n-1',
            'method' => 'getDependentList',
            'sequence' => $module->relatedlists()->count(),
            'data' => null
        ]);
    }

    protected function createLinks($module)
    {
    }
}