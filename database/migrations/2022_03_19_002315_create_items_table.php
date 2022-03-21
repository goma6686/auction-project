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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('condition');
            $table->integer('min_bid')->default(1);
            $table->integer('bidder_count')->default(0);
            $table->integer('bid_sum')->default(0);
            $table->string('cover')->nullable();
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
