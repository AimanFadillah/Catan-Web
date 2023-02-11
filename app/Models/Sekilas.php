<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sekilas extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    public function User(){
        return $this->belongsto(User::class);
    }

}
