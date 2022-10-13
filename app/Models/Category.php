<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable=['name','emojiCode'];

    public function tagPartner(){
        return $this->hasMany(TagPartner::class,'category_id');
    }

}
