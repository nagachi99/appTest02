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
        Schema::table('books', function (Blueprint $table) {
            $table->integer('item_purchase')->after('item_name');
            $table->integer('item_amount')->after('item_purchase');
            $table->datetime('published')->after('item_amount');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('books', function (Blueprint $table) {
            $table->dropColumn('item_purchase');
            $table->dropColumn('item_amount');
            $table->dropColumn('published');
        });
    }
};
