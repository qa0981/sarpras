<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sarpras extends Model
{
    use HasFactory;

    protected $table = "sarpras";
<<<<<<< Updated upstream

    protected $fillable = [
        'kode',
        'barang',
        'lokasi'
    ];

=======
    protected $fillable = ['kode', 'barang', 'lokasi'];
>>>>>>> Stashed changes
    public $timestamps = true;
}
