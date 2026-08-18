<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // role column (new)
            if (!Schema::hasColumn('users', 'role')) {
                $table->string('role')->default('patient')->after('email');
            }

            // city_id column (new) - adding after email instead of specialization
            if (!Schema::hasColumn('users', 'city_id')) {
                $table->unsignedBigInteger('city_id')->nullable()->after('email');
                // foreign key
                $table->foreign('city_id')->references('id')->on('cities')->onDelete('set null');
            }
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['city_id']);
            $table->dropColumn(['role', 'city_id']);
        });
    }
};
