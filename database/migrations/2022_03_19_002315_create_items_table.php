<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('items', function (Blueprint $table) {
            $table->id()->unique();
            $table->string('title');
            $table->text('description')->nullable();
            $table->foreignId('condition_id')->unsigned()->constrained('conditions');
            $table->foreignId('user_id')->unsigned()->constrained('users');
            $table->float('min_bid')->unsigned()->default('1.0')->create();
            $table->integer('bidder_count')->unsigned()->default(0);
            $table->float('starting_price')->unsigned();
            $table->float('price')->unsigned()->nullable();
            $table->string('cover')->nullable();
            $table->boolean('is_active')->default(false);
            $table->dateTime('end_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
};
