<?php

use App\Models\User;
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
        Schema::create('tamang_project_components', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained();
            $table->string('title');
            $table->string('slug');
            $table->string('short_description');
            $table->mediumText('content');
            $table->string('icon', 100)->nullable();
            $table->text('project_framework_description');
            $table->json('project_outcomes');
            $table->json('project_outputs');
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_components');
    }
};
