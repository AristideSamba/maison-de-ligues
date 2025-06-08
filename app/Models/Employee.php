<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    // Définir la table associée si elle ne suit pas la convention Laravel
    protected $table = 'users';

    // Définir les colonnes modifiables
    protected $fillable = [
        'name',
        'prenom',
        'ville',
        'pays',
        'email',
        'phone',
        'service',
        'photo',
        'date_de_naissance',
    ];

    // Définir les colonnes qui doivent être des instances de Carbon
    protected $dates = ['birthday'];
}
