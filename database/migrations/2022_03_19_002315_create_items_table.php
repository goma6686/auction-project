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
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->foreignId('condition_id')->unsigned()->constrained('conditions');
            $table->foreignId('user_id')->unsigned()->constrained('users');
            $table->integer('min_bid')->unsigned()->default(1);
            $table->integer('bidder_count')->unsigned()->default(0);
            $table->integer('bid_sum')->unsigned()->default(0);
            $table->string('cover')->default("https://cdn.pixabay.com/photo/2021/08/21/08/09/ban-6562104_960_720.png");
            $table->boolean('is_active')->default(false);
            //$table->timestamp('added_at');
            //$table->dateTime('end_date');
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
