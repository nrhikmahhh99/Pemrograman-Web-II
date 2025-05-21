<?php
namespace App\Controllers;
use App\Models\UserModel;
use CodeIgniter\Controller;

class Auth extends Controller
{
    public function store()
    {
        $userModel = new UserModel();
        $data = [
            'username' => $this->request->getVar('username'),
            'email'    => $this->request->getVar('email'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
        ];
        $userModel->save($data);
        return redirect()->to('/login');
    }

    public function login()
    {
        helper(['form']);
        return view('LoginView');
    }

    public function loginAuth()
    {
        $session = session();
        $userModel = new UserModel();

        $identifier = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $user = $userModel
            ->where('username', $identifier)
            ->orWhere('email', $identifier)
            ->first();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $session->set([
                    'id'         => $user['id'],
                    'username'   => $user['username'],
                    'isLoggedIn' => true,
                ]);
                return redirect()->to('/buku');
            } else {
                $session->setFlashdata('error', 'Password salah');
            }
        } else {
            $session->setFlashdata('error', 'Username atau Email tidak ditemukan');
        }
        return redirect()->to('/login');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}