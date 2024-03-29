<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
            $table->id()->from(1)->nullable(false);
            $table->string('name')->nullable(false);
            $table->text('description')->nullable(true);
            $table->string('photo_folder_path')->nullable(true);
            $table->string('start_date')->nullable(true);
            $table->string('place_on_the_map')->nullable(true);
            $table->string('end_date')->nullable(true);
            $table->string('status')->nullable(true);
            $table->bigInteger('customer_id')->unsigned()->index();
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     *
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
