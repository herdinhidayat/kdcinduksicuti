<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Detail;

class Employee extends Model
{
    use HasFactory;
    //    protected $table = "employees";
    protected $guarded = [];
    protected $dates = ['created_at'];



    public function details()
    {
        return $this->belongsTo(Detail::class, 'id_details', 'id');
    }
}
