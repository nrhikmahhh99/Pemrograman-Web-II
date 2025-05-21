<?php
namespace App\Controllers;
use App\Models\BukuModel;
use CodeIgniter\Controller;

class Home extends Controller{
    public function index(){
        return redirect()->to('/dashboard');
    }
    public function dashboard(){
        $bukuModel = new BukuModel();
        $data['buku'] = $bukuModel->findAll();

        return view('IndexView', $data);
    }
}