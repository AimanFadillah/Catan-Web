<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class CronJob extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    public function setCreatedAtAttribute($value)
    {
        $this->attributes['created_at'] = Carbon::now();
    }

}
