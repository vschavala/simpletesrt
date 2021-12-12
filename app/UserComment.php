<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class UserComment extends Model
{
    protected $fillable=['sender_id','user_id','comment'];


    public function thsnksrecievers(){
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function thankssenders(){
        return $this->belongsTo(User::class,'sender_id','id');
    }

    public function getCreatedAtAttribute($value){
    return Carbon::parse($value)->diffForHumans();
    }

  
}
