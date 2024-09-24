<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ResponseType extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['name', 'unique_id'];

    protected $searchableFields = ['*'];

    protected $table = 'response_types';

    public function feedBackForms()
    {
        return $this->hasMany(FeedBackForm::class);
    }
}
