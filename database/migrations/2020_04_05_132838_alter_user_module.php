<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Uccello\Core\Models\Field;
use Uccello\Core\Models\Module;

class AlterUserModule extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $module = Module::where('name', 'user')->first();
        $block = $module->blocks->where('label', 'block.general')->first();

        // Field is_active
        Field::create([
            'module_id' => $module->id,
            'block_id' => $block->id,
            'name' => 'is_active',
            'uitype_id' => uitype('boolean')->id,
            'displaytype_id' => displaytype('everywhere')->id,
            'sequence' => $block->fields()->count(),
            'data' => null
        ]);

        // Change filter
        $filter = $module->filters->where('name', 'filter.all')->first();
        $filter->columns = [ 'username', 'name', 'email', 'is_admin', 'is_active' ];
        $filter->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $module = Module::where('name', 'user')->first();
        $block = $module->blocks->where('label', 'block.general')->first();
        $block->fields()->where('name', 'is_active')->delete();

        // Change filter
        $filter = $module->filters->where('name', 'filter.all')->first();
        $filter->columns = [ 'username', 'name', 'email', 'is_admin' ];
        $filter->save();
    }
}
