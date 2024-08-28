<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $fillable = ["name", "category_id", "price", 'description', 'image'];

    protected $guarded = ["id"];

    public function Category()
    {
        return $this->belongsTo(Category::class);
    }
}
