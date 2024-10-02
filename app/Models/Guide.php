<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Guide extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['guid_first_name', 'guid_last_name','unique_id'];

    protected $searchableFields = ['*'];

    public function tours()
    {
        return $this->belongsToMany(Tour::class);
    }
}
