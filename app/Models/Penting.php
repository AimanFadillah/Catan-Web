<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Penting extends Model
{
    use HasFactory;

    public function scopeCari ($query,$data){
        return $query->when($data ?? false,function($query,$cari){
            return $query->where("judul","like","%" . $cari . "%");
        });
    }


    protected $guarded = ["id"];

    public function User(){
        return $this->belongsto(User::class);
    }
}
