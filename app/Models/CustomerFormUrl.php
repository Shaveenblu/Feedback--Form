<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CustomerFormUrl extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'url_link',
        'unique_id',
        'customer_id',
        'tour_id',
        'status',
        'date',
        'other_details',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'customer_form_urls';

    protected $casts = [
        'date' => 'date',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }
}
