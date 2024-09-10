<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'customer_name',
        'customer_phone_number',
        'tour_no',
        'unique_id',
    ];

    protected $searchableFields = ['*'];

    public function hotels()
    {
        return $this->belongsToMany(Hotel::class);
    }
}
