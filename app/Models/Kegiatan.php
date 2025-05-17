<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Penyelenggara;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kegiatan extends Model
{

    use HasFactory;
    //    protected $table = "employees";
    protected $guarded = [];
    protected $dates = ['created_at'];



    public function penyelenggaras()
    {
        return $this->belongsTo(Penyelenggara::class, 'id_penyelenggaras', 'id');
    }
}
