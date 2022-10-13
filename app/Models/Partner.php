<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'birth_date',
        'location',
        'description',
        'instagram_url',
        'image',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

   


}
