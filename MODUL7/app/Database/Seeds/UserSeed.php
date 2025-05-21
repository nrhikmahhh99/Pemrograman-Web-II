<?php
namespace App\Database\Seeds;
use CodeIgniter\Database\Seeder;
class UserSeed extends Seeder
{
    public function run()
    {
        $data = [
            'username' => 'nrhikmahhh',
            'email'    => '2310817120010@mhs.ulm.ac.id',
            'password' => password_hash('password', PASSWORD_DEFAULT),
        ];
        $this->db->table('users')->insert($data);
    }
}