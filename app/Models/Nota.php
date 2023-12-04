<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Nota extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'corpo',
        'id_pasta',
        'id_user'
    ];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function pasta():BelongsTo
    {
        return $this->belongsTo(Pasta::class);
    }

}
