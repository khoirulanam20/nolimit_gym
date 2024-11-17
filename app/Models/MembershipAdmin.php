<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MembershipAdmin extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika berbeda dengan default
    protected $table = 'membership_admins';

    // Tentukan field yang bisa diisi
    protected $fillable = [
        'user_id',
        'kategori_id',
        'start_date',
        'end_date',
        'price',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
}
