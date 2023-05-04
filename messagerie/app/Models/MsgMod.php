<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MsgMod extends Model
{
    use HasFactory;
    protected $fillable=['Lib_Doc','Pages','Copies','NomEtab','dateEnv','NumEnv','Lib_Serv','estRecu','dateRecu'];
}
