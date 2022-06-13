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
        Schema::create('bids', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->unsigned()->constrained('users');
            $table->foreignId('item_id')->unsigned()->constrained('items');
            $table->float('bid_amount')->unsigned();
            $table->DateTime('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bids');
    }
};
