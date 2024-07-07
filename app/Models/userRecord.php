<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class userRecord extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id','mediciens','medical_condition','registration_date',
        'medical_history','appointment_id',
      ];
      public function user(){
        return $this->belongsTo(User::class);
    }
}
