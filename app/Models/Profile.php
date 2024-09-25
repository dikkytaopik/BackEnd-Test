<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model {
    protected $fillable = ['user_id', 'nama_lengkap', 'alamat', 'jenis_kelamin', 'status_pernikahan'];

    public function user() {
        return $this->belongsTo(User::class);
    }
}

