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
        Schema::table('projects', function (Blueprint $table) {
            $table->string('project_file_path')->nullable()->after('image_path');
            $table->string('project_link', 2048)->nullable()->after('project_file_path');
            $table->string('creator_name')->nullable()->after('project_link');
            $table->string('company_name')->nullable()->after('creator_name');
            $table->string('creator_profile_pic')->nullable()->after('company_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn([
                'project_file_path',
                'project_link',
                'creator_name',
                'company_name',
                'creator_profile_pic',
            ]);
        });
    }
};
