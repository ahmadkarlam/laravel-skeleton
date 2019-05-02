<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('parent')->unsigned()->nullable();
            $table->string('name');
            $table->string('display_name');
            $table->string('icon');
            $table->string('pattern');
            $table->string('href');
            $table->boolean('is_parent')->default(false);
            $table->enum('type', ['backend', 'frontend']);
            $table->integer('position')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();

            $table->index(['parent', 'pattern']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menus');
    }
}
