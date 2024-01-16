<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Item extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $fillable=[
        'user_id', 'name', 'details','date', 'cost', 'category',
        'condition', 'state', 'branch_id', 'images'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function branch(){
        return $this->belongsTo(Branch::class, 'branch_id');
    }
}
