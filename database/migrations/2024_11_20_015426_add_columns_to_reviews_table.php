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
        Schema::table('reviews', function (Blueprint $table) {
            //
            $table->foreignId('product_id')->constrained()->onDelete('cascade')->after('id'); // Foreign key ke tabel products
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Foreign key ke tabel users
            $table->integer('rating'); // Rating untuk review
            $table->text('comment'); // Komentar untuk review
            $table->string('status')->default('pending'); // Status review (pending/approved/rejected)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reviews', function (Blueprint $table) {
            //
            $table->dropForeign(['product_id']);
            $table->dropForeign(['user_id']);
            $table->dropColumn(['product_id', 'user_id', 'rating', 'comment', 'status']);
        });
    }
};
