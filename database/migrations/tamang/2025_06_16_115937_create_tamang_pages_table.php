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
        Schema::create('tamang_pages', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained();
            $table->string('title');
            $table->string('slug');
            $table->string('description')->nullable();
            $table->mediumText('content')->nullable();
            $table->boolean('status')->default(0);
            $table->boolean('showOnMenu')->default(0);
            $table->boolean('parent')->default(0);
            $table->integer('ord')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
