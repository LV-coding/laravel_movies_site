<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Movie extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $table = 'movies';
    protected $guarded = [];
    // protected $fillable = [];

    public function type() {
        return $this->belongsTo(Type::class);
    }

    public function tags() {
        return $this->belongsToMany(Tag::class);
    }
}
