<?php

namespace App\Models;

use App\Models\Nota;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pasta extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'descricao',
        'id_user'
    ];


    public function nota(): HasMany
    {
        return $this->hasMany(Nota::class);
    }
    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
