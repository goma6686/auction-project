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
            $table->float('min_bid')->unsigned()->default('1.0')->create();
            $table->integer('bidder_count')->unsigned()->default(0);
            $table->integer('bid_sum')->unsigned()->default(0);
            $table->string('cover')->nullable();
            $table->boolean('is_active')->default(false);
            $table->dateTime('end_date');
            $table->softDeletes($column = 'deleted_at', $precision = 0);
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
        Schema::table('items', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::dropIfExists('items');
    }
};
