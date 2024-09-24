<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tour extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'unique_id',
        'tour_operator',
        'tour_name',
        'tour_start_date',
        'tour_no',
    ];

    protected $searchableFields = ['*'];

    protected $casts = [
        'tour_start_date' => 'date',
    ];

    public function customerFormUrls()
    {
        return $this->hasMany(CustomerFormUrl::class);
    }

    public function guides()
    {
        return $this->belongsToMany(Guide::class);
    }
}
