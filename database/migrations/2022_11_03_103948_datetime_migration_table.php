<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->dateTime('new_date')->nullable();
        });

        $datetime = DB::table('tasks')->get();
        foreach ($datetime as $key => $value) {

            DB::table('tasks')->update([
                'new_date' => $value->date. ' ' .$value->time
            ]);
        }
        
        Schema::table('tasks', function (Blueprint $table) {
            // $table->dropUnique('date');
            // $table->dropUnique('time');

            $table->dropUnique(['date', 'time']);
            $table->dropColumn(['date', 'time']);
            
           
        });

         Schema::table('tasks', function (Blueprint $table) {
            $table->renameColumn('new_date', 'date');
            $table->unique('date');
            
          });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->string('new_date', 50);
            $table->string('time', 50);
        });

        $date = DB::table('tasks')->get();
        foreach ($date as $key => $value) {
            $datetime = explode(' ', $value->date);
            DB::table('tasks')->update([
                'new_date' => $datetime[0],
                'time' => $datetime[1],
            ]);
        }

        Schema::table('tasks', function (Blueprint $table) {
            $table->dropUnique('date');
            $table->dropColumn('date');
            
        });

        Schema::table('tasks', function (Blueprint $table) {
            $table->renameColumn('new_date', 'date');
            $table->unique(['date', 'time']);
          });
        
    }
};
