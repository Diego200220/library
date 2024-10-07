<?php

use App\Models\Book;
use App\Models\Client;
use Illuminate\Database\Eloquent\Model;
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
        Schema::create('rent_books', function (Blueprint $table) {
            $table->id();
            $table->string('ticket')->unique();// unique
            $table->foreignIdFor(Book::class)->constrained();
            $table->foreignIdFor(Client::class)->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rent_book');
    }
};
