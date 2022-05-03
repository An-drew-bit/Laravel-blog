<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTablePostsAddThumbnail extends Migration
{

    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->string('thumbnail_400')
                ->after('thumbnail')
                ->nullable();
        });
    }


    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('thumbnail_400');
        });
    }
}
