<?php

namespace App\Models;

use App\Events\BlogprojCreated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class blogproj extends Model
{
    
    use HasFactory;

    protected $fillable = [
        'message',
    ];

    protected $dispatchesEvents = [
        'created' => BlogprojCreated::class,
    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
