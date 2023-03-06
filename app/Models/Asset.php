<?php

namespace App\Models;

use App\Models\User;
use App\Models\Genre;
use App\Models\Lelang;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Asset extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function lelang()
    {
        return $this->hasOne(Lelang::class);
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class);
    }

}
