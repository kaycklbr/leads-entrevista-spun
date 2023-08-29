<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'user_id', 'quiz_id'];

    public function quiz () {
        return $this->belongsTo(Quiz::class);
    }

    public function user () {
        return $this->belongsTo(User::class);
    }
}
