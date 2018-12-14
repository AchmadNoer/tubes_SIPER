<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    protected $fillable = ['tgl_training', 'lokasi', 'keterangan'];
    public function provinsi(){
    	return $this->belongsTo(provinsi::class);
    }
    protected $primaryKey = 'id_training';
    protected $table = 'training';
    public $timestamps = false;
}
