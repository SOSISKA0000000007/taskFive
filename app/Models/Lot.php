<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lot extends Model
{
    protected $fillable = ['title', 'description', 'current_bid', 'user_id', 'is_open'];
}
