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
        Schema::create('groups', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->string('cover_path', 1024)->nullable();
            $table->string('thumnail_path', 1024)->nullable();
            $table->boolean('auto_approval')->default(true);
            $table->text('about')->nullable();
            $table->foreignIdFor(User::class)->constrained();
            $table->timestamp('delete_at')->nullable();
            $table->foreignId('delete_by')->nullable()->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('groups');
    }
};
