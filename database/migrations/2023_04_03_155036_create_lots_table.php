<?php

use App\Models\Lot;
use App\Models\Category;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(Lot::TABLE_NAME, function (Blueprint $table) {
            $table->id();
            $table->string(Lot::COLUMN_NAME);
            $table->text(Lot::COLUMN_DESCRIPTION);
            $table->foreignId(Lot::COLUMN_CATEGORY_ID)
                ->references(Category::COLUMN_ID)
                ->on(Category::TABLE_NAME)
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->timestamps();

            // такой индекс нужен для оптимальной выборки с учетом фильтрации по категориям
            $table->index([Lot::COLUMN_CATEGORY_ID, Lot::CREATED_AT]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(Lot::TABLE_NAME);
    }
};
