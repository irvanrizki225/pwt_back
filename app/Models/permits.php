<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\products;
use App\Models\User;
use App\Models\Signature;

class permits extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'signatur_id',
        'name',
        'contractor',
        'date_application',
        'expiry_date',
        'status',
    ];

   /**
    * Get the user that owns the permits
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

   /**
    * Get the user that owns the permits
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
   public function products()
   {
       return $this->belongsTo(products::class, 'product_id', 'id');
   }

   /**
    * Get the user that owns the permits
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
   public function signature()
   {
       return $this->belongsTo(Signature::class, 'signatur_id', 'id');
   }

}
