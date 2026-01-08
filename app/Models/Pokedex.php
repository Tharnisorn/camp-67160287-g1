<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pokedex extends Model
{
    use HasFactory;

    // กำหนดชื่อตารางให้ตรงกับ Migration
    protected $table = 'pokedexs';

    // กำหนด field ที่อนุญาตให้บันทึกข้อมูลได้ (Mass Assignment)
    protected $fillable = [
        'name', 'type', 'species', 'height', 'weight',
        'hp', 'attack', 'defense', 'image_url'
    ];
}
