<?php

namespace App\Models;

use App\Models\User;
use App\Models\Lelang;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lelang_log extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'harga',
    ];

    public $timestamps = false;

    protected $dates = ['created_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function lelang()
    {
        return $this->belongsTo(Lelang::class);
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->created_at = $model->freshTimestamp();
        });
    }

}
