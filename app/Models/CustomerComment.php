<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerComment extends Model
{
    protected $fillable = ['customer_form_urls_id', 'comment', 'unique_id'];
}
