<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use Uccello\Core\Models\Domain;
use Uccello\Core\Models\Module;
use Uccello\Core\Models\Tab;
use Uccello\Core\Models\Block;
use Uccello\Core\Models\Field;
use Uccello\Core\Models\Filter;

class CreateCodePromoModule extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('code_promos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->string('type');
            $table->unsignedInteger('value');
            $table->unsignedInteger('min_amount');
            $table->date('expiration_date');
            $table->unsignedInteger('domain_id');
            $table->timestamps();
            $table->datetime('deleted_at')->nullable();

            $table->foreign('domain_id')->references('id')->on('uccello_domains');
        });

        $this->createModuleStructure();
    }

    /**
     * Create the module's structure.
     */
    protected function createModuleStructure()
    {
        $module = $this->createModule();
        $this->createTabsBlocksFields($module);
        $this->createFilters($module);
        $this->activateModuleOnDomains($module);
    }

    /**
     * Create the module.
     */
    protected function createModule()
    {
        return Module::create([
            'name' => 'code_promo',
            'icon' => 'local_offer',
            'model_class' => 'App\CodePromo',
            'data' => null
        ]);
    }
    
    /**
     * Activate module in all domains
     */
    protected function activateModuleOnDomains($module)
    {
        $domains = Domain::all();
        foreach ($domains as $domain) {
            $domain->modules()->attach($module);
        }
    }

    /**
     * Create all tabs, blocks and fields.
     */
    protected function createTabsBlocksFields($module)
    {
        // Main tab
        $tab = Tab::create([
            'label' => 'tab.main',
            'icon' => null,
            'sequence' => $module->tabs()->count(),
            'module_id' => $module->id
        ]);
        
        // General block
        $block = Block::create([
            'label' => 'block.general',
            'icon' => 'info',
            'sequence' => $tab->blocks()->count(),
            'tab_id' => $tab->id,
            'module_id' => $module->id
        ]);
        
        // Code
        Field::create([
            'name' => 'code',
            'uitype_id' => uitype('text')->id,
            'displaytype_id' => displaytype('everywhere')->id,
            'data' => [ 'rules' => 'required' ],
            'sequence' => $block->fields()->count(),
            'block_id' => $block->id,
            'module_id' => $module->id
        ]);
        
        // Type
        Field::create([
            'name' => 'type',
            'uitype_id' => uitype('select')->id,
            'displaytype_id' => displaytype('everywhere')->id,
            'data' => [ 
                'rules' => 'required',
                'choices' => [
                    'type.percent',
                    'type.amount'
                ] 
            ],
            'sequence' => $block->fields()->count(),
            'block_id' => $block->id,
            'module_id' => $module->id
        ]);

        // value
        Field::create([
            'name' => 'value',
            'uitype_id' => uitype('number')->id,
            'displaytype_id' => displaytype('everywhere')->id,
            'data' => ['rules' => 'required'],
            'sequence' => $block->fields()->count(),
            'block_id' => $block->id,
            'module_id' => $module->id
        ]);

        // Min_amout
        Field::create([
            'name' => 'min_amount',
            'uitype_id' => uitype('number')->id,
            'displaytype_id' => displaytype('everywhere')->id,
            'data' => ['rules' => 'required'],
            'sequence' => $block->fields()->count(),
            'block_id' => $block->id,
            'module_id' => $module->id
        ]);

        // expiration date
        Field::create([
            'name' => 'expiration_date',
            'uitype_id' => uitype('date')->id,
            'displaytype_id' => displaytype('everywhere')->id,
            'data' => ['rules' => 'required'],
            'sequence' => $block->fields()->count(),
            'block_id' => $block->id,
            'module_id' => $module->id
        ]);
    }

    /**
     * Create the default filter.
     */
    protected function createFilters($module)
    {
        Filter::create([
            'module_id' => $module->id,
            'domain_id' => null,
            'user_id' => null,
            'name' => 'filter.all',
            'type' => 'list',
            'columns' => [ 'code', 'type', 'value', 'expiration_date', 'min_amount' ],
            'conditions' => null,
            'order' => null,
            'is_default' => true,
            'is_public' => false,
            'data' => [ 'readonly' => true ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('code_promos');
        Module::where('name', 'code_promo')->delete();
    }
}

