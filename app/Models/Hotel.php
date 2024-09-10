<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Hotel extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['hotel_name', 'hotel_place', 'unique_id'];

    protected $searchableFields = ['*'];

    public function customers()
    {
        return $this->belongsToMany(Customer::class);
    }
}
