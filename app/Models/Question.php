<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Question extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['question', 'question_category_id', 'unique_id'];

    protected $searchableFields = ['*'];

    public function questionCategory()
    {
        return $this->belongsTo(QuestionCategory::class);
    }

    public function feedBackForms()
    {
        return $this->hasMany(FeedBackForm::class);
    }
}
