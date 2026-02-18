<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{
    use HasFactory;

    // Tambahkan baris ini! Nama kolom harus sama dengan di database
    protected $fillable = ['suhu', 'kelembapan', 'gas', 'pm25', 'status'];
}