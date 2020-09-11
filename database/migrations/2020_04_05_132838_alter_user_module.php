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

        // Change filter
        $filter = $module->filters->where('name', 'filter.all')->first();
        $filter->columns = [ 'username', 'name', 'email', 'is_admin' ];
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

        // Change filter
        $filter = $module->filters->where('name', 'filter.all')->first();
        $filter->columns = [ 'username', 'name', 'email', 'is_admin' ];
        $filter->save();
    }
}
