<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'user_id'
    ];

    public function user(): BelongsTo
    {
        /* return this->belongsTo(Modelo::class, foreingkey, localkey) 
            - si no hemos seguido la nomenclatura en la creación de las columnas. Como están los nombres 'por defecto' no hay que añadir las claves
        */
        return $this->belongsTo(User::class);
    }
}
