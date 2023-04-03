<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int    $id
 * @property string $name
 */
class Category extends Model
{
    use HasFactory;

    public const TABLE_NAME = 'categories',
        COLUMN_ID = 'id',
        COLUMN_NAME = 'name';

    protected $table = self::TABLE_NAME;

    protected $fillable = [
        self::COLUMN_NAME,
    ];
}
