<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::table('book')->insert([
            [
                'number' => -2,
                'view_number' => 'ปกหน้า 1',
                'content' => ''
            ],
            [
                'number' => -1,
                'view_number' => 'ปกหน้า 2',
                'content' => ''
            ],
            [
                'number' => 999,
                'view_number' => 'ปกหลัง 1',
                'content' => ''
            ],
            [
                'number' => 1000,
                'view_number' => 'ปกหลัง 1',
                'content' => ''
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('default_book_page');
    }
};
