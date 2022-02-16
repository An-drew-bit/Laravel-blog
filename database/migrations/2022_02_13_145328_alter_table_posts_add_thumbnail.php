<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTablePostsAddThumbnail extends Migration
{

    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->string('thumbnail_small')->after('thumbnail_400');
        });
    }


    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('thumbnail_small');
        });
    }
}
