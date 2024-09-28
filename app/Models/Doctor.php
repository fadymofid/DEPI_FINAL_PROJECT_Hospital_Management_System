<?php

namespace App\Models;
use App\Models\Appointment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $table = 'doctors';

    protected $fillable = [
        'name', 'phone', 'consultation_fee', 'speciality', 'image',
    ];
    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}
