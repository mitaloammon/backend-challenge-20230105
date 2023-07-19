<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductParserAPI extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'imported_t',
        'name',
        'description'
    ];

    public function productParser()
    {
        return $this->belongsTo(ProductParser::class);
    }
}
