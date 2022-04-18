<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('Post',function(Blueprint $table){
            $table->id();
            $table->foreignId("user_id")->constrained("users")->cascadeOnDelete();
            $table->string('Title');
            $table->string('image');
            $table->integer('Prix');
            $table->string('Type');
            $table->text('description');
            $table->timestamp("create_at");
        });
    }


    public function down()
    {
        Schema::dropIfExists('Post');
    }
};
