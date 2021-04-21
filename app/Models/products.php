<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\permits;

class products extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = [
        'name',
        'slug',
        'type',
        'description',
        'prince',
        'quantity',
    ];

    public function permits()
    {
        return $this->hasMany(permits::class,'product_id');
    }
    
}
