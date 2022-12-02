<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Events\TableAAddedEvent;

class TableA extends Model
{
    use HasFactory;
    protected $fillable = ['name','user_star'];
    protected $dispatchesEvents = [
        'created' => TableAAddedEvent::class,
    ];
}
