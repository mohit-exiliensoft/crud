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
        Schema::table('users', function (Blueprint $table) {
            $table->string('profile_pic')->nullable()->after('password');
            $table->string('phone')->nullable()->after('profile_pic');
            $table->string('address')->nullable()->after('phone');
            $table->enum('status', ['0', '1'])->default(1)->comment('0 - inactive, 1 - active')->index()->after('address');
        });   
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
        $table->dropColumn('phone');
        $table->dropColumn('address');
        $table->dropColumn('status');
        $table->dropColumn('profile_pic');
    });
    }
};
