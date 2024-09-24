<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FeedBackForm extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'question_id',
        'customer_id',
        'response_type_id',
        'hotel_id',
        'guide_id',
        'tour_id',
        'customer_name',
        'customer_tel_phone_number',
        'date',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'feed_back_forms';

    protected $casts = [
        'date' => 'date',
    ];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function question2()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function responseType()
    {
        return $this->belongsTo(ResponseType::class);
    }

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }

    public function guide()
    {
        return $this->belongsTo(Guide::class);
    }
}
