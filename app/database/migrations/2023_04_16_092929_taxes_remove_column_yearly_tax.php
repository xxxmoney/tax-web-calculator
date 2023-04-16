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
        // Drop column yearly_tax.
        Schema::table('taxes', function (Blueprint $table) {
            $table->dropColumn('yearly_tax');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Add column yearly_tax.
        Schema::table('taxes', function (Blueprint $table) {
            $table->double('yearly_tax');
        });
    }
};
