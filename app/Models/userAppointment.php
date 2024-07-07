<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class userAppointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','day','hour',
      ];
  
      public function user(){
          return $this->belongsTo(User::class);
      }
  
     // public $timestamps=false;
}
