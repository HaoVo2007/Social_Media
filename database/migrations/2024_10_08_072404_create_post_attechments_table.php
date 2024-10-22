<?php

use App\Models\Post;
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
        Schema::create('post_attechments', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Post::class)->constrained()->onDelete('cascade');
            $table->string('name', 255);
            $table->string('path', 255);
            $table->string('mime', 255);
            $table->foreignId('created_by')->nullable()->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_attechments');
    }
};
