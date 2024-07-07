<?php

namespace App\Models;

use App\Models\Doctor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DoctorAppointment extends Model
{
    use HasFactory;
    protected $fillable = [
      'doctor_id','appointment_time','start_time','end_time',
    ];

    public function doctor(){
        return $this->belongsTo(Doctor::class);
    }

    public $timestamps=false;
}
