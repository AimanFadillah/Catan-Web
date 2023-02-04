<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Penting extends Model
{
    use HasFactory;

    // protected $fillable = ["judul","body"."user_id"];
    protected $guarded = ["id"];

    public function User(){
        return $this->belongsto(User::class);
    }
}
