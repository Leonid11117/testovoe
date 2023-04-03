<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int      $id
 * @property string   $name
 * @property string   $description
 * @property Category $category
 * @property int      $category_id
 */
class Lot extends Model
{
    use HasFactory;

    public const TABLE_NAME = 'lots',
        COLUMN_ID = 'id',
        COLUMN_NAME = 'name',
        COLUMN_DESCRIPTION = 'description',
        COLUMN_CATEGORY_ID = 'category_id',
        CREATED_AT = 'created_at';

    protected $table = self::TABLE_NAME;

    protected $fillable = [
        self::COLUMN_NAME,
        self::COLUMN_DESCRIPTION,
        self::COLUMN_CATEGORY_ID,
    ];

    public function category(): Relation
    {
        return $this->hasOne(Category::class, Category::COLUMN_ID, self::COLUMN_CATEGORY_ID);
    }
}
