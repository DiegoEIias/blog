<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function Ranks()
    {
        return $this->belongsToMany(Rank::class, 'rank_users', 'id_user', 'id_rank');
    }
}
