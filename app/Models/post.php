<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;
    protected $fillable = ['video', 'content','user_id'];

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
