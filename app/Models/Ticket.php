<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    //kegunaan dari protected fillable adalah Kolom-kolom apa saja dari tabel ini yang aman untuk diisi langsung ketika kita membuat atau mengupdate data lewat create() atau update()."

    // tapi ketika kolom dari tabel tickets / (tabel yang kita buat) tidak ada Laravel tidak akan mengizinkan (untuk mencegah user mengisi kolom berbahaya, misalnya role jadi admin).
    protected $fillable = ['user_id', 'nama_lengkap',  'email',
    'status',
    'title',
    'keterangan',
    'pengajuan',
    'name_file',
    'path',
    'tempatan'
];


    // satu user hanya memiliki satu ticket
    public function user(){
        return $this->belongsTo(user::class);
    }
    // sedangkan setiap data (model) bisa memiliki banyak response
    public function responses(){
        return $this->hasMany(Response::class);
    }
}
