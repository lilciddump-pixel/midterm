<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('tweets', function (Blueprint $table) {
            $table->text('content')->nullable()->after('user_id');
            $table->boolean('is_edited')->default(false)->after('content');
        });
    }

    public function down(): void
    {
        Schema::table('tweets', function (Blueprint $table) {
            $table->dropColumn(['content', 'is_edited']);
        });
    }
};
