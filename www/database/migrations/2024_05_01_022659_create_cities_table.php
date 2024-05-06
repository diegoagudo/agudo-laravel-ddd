<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private const TABLE = 'cities';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(table: static::TABLE, callback: function (Blueprint $table): void {
            $table->id();
            $table->string('name', 150);
            $table->char('state', 2);
            $table->integer('population')->unsigned();
            $table->dateTime('birthdate');
            $table->decimal('salary_avg', 10, 2);
            $table->text('description');
            $table->char('timezone', 3);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(static::TABLE);
    }
};
