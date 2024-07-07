<?php

namespace App\Models;

use App\Models\DoctorAppointment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','phone','doc_image','small_desc','doc_department','gender',
        'email',
        'password',
    ];

    public function appointments(){
        return $this->hasMany(DoctorAppointment::class);
    }
}
