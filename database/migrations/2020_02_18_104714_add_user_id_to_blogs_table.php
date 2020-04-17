<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('blogs')){
            Schema::table('blogs', function (Blueprint $table) {
                if (!Schema::hasColumn('blogs', 'user_id')) {
                    $table->integer('user_id')->unsigned()->index()->nullable();
                    $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
                }  
            });
        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if(Schema::hasTable('blogs')){
            Schema::table('blogs', function (Blueprint $table) {
                if (Schema::hasColumn('blogs', 'user_id')) {
                    $table->dropForeign('user_id');
                    $table->dropColumn('user_id');
                }
            });
        }    
    }
}
