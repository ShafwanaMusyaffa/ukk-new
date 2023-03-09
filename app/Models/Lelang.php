<?php

namespace App\Models;

use App\Models\User;
use App\Models\Asset;
use App\Models\Lelang_log;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lelang extends Model
{
    use HasFactory;

    protected $table = 'lelang';

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'waktu_berakhir',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pemenang()
    {
        return $this->belongsTo(User::class, 'pemenang_id');
    }
    
    public function asset()
    {
        return $this->belongsTo(Asset::class);
    }

    public function logs()
    {
        return $this->hasMany(Lelang_log::class);
    }


}
