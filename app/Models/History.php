<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_id', 'state', 'details', 'date', 'image'
    ];

    public function item(){
        return $this->belongsTo(Item::class, 'id');
    }
}
