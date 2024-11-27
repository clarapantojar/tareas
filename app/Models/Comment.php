<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;

    // Elimina la protección contra SQL inyection - NO PONER NUNCA EN PRODUCCIÓN - PERMITE HACER ACTUALIZACIONES MASIVAS
    protected $guarded = ['*'];

    // PARA PROTEGER DE SQL INYECTION
    // HAY QUE HACERLO EN TODOS LOS MODELOS QUE CREEMOS
    /*protected $fillable = [
        'user_id',
        'text',
    ];

    protected $hidden = [
        'user_id',
    ];*/

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
