<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class HoldingUser extends Authenticatable
{
    use Notifiable;

    // Define a tabela usada pelo modelo
    protected $table = 'holding_users';

    // Define os campos que podem ser preenchidos em massa
    protected $fillable = [
        'name',
        'email',
        'password',
        'holding_id',
    ];

    // Relacionamento com a tabela holdings
    public function holding()
    {
        return $this->belongsTo(Holding::class);
    }


    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'last_login_at' => 'datetime',
        ];
    }
}

