<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $table= 'cars';
    protected $fillable = ['model','image','description','produced_on'];
    public function manufacturer(){
        return $this->belongsTo('App\Models\Manufacturer', 'mf_id', 'id');
    }
}