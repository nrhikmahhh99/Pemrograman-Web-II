<?php
namespace App\Models;
use CodeIgniter\Model;

class ProfilModel extends Model
{
    public function getProfil()
    {
        return [
            'nama' => 'Nur Hikmah',
            'email' => '2310817120010@mhs.ulm.ac.id',
            'gambar' => 'profil.jpg',
            'nim' => '2310817120010',
            'prodi' => 'S1-Teknologi Informasi',
            'fakultas' => 'Teknik',
            'hobi' => 'Jalan-jalan nyari angin',
            'skill' => ['Memasak', 'Desain']
        ];
    }
}
