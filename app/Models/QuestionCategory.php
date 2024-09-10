<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class QuestionCategory extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['name', 'unique_id'];

    protected $searchableFields = ['*'];

    protected $table = 'question_categories';

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
