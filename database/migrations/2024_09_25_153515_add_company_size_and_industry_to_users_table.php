<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('users', function (Blueprint $table) {
        $table->string('companyName')->nullable(); // إضافة عمود لاسم الشركة
        $table->enum('companySize', ['small', 'medium', 'large'])->nullable(); // إضافة عمود حجم الشركة
        $table->enum('industry', ['technology', 'finance', 'healthcare', 'education'])->nullable(); // إضافة عمود المجال
    });
}

public function down()
{
    Schema::table('users', function (Blueprint $table) {
        $table->dropColumn('companyName');
        $table->dropColumn('companySize');
        $table->dropColumn('industry');
    });
}

};
