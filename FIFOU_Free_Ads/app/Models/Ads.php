<?php

namespace App\Models;

use App\Models\Locations;
use App\Models\Categories;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ads extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'picture_extension',
        'price',
        'category_id',
        'location_id',
        'user_id',
        'usure',
    ];
    public function location()
    {
        return $this->belongsTo(Locations::class);
    }
    public function category()
    {
        return $this->belongsTo(Categories::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
