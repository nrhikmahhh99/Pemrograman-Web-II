<?php
namespace App\Controllers;
use App\Models\BukuModel;
use CodeIgniter\Controller;

class Buku extends Controller{
    protected $bukuModel;
    public function __construct(){
        helper(['form', 'url']);
        $this->bukuModel = new BukuModel();
    }

    public function index(){
        $session = session();
        $bukuModel = new BukuModel();
        $search = $this->request->getGet('search');
        $sort = $this->request->getGet('sort');
        $sort_order = $this->request->getVar('sort_order');
        $query = $bukuModel;
        if ($search) {
            $query = $query->like('judul', $search)
                ->orLike('penulis', $search)
                ->orLike('penerbit', $search)
                ->orLike('tahun_terbit', $search);
        }
        if ($sort && in_array($sort, ['judul', 'penulis', 'penerbit', 'tahun_terbit'])) {
            $bukuModel->orderBy($sort, $sort_order ? $sort_order : 'ASC');
        }
        $data['buku'] = $query->findAll();
        $data['search'] = $search;
        $data['sort'] = $sort;
        $data['sort_order'] = $sort_order;
        return view('IndexView', $data);
    }

    public function create(){
        return view('CreateView');
    }

    public function store(){
        $validation = \Config\Services::validation();

        $validation->setRules([
            'judul' => [
                'label' => 'Judul',
                'rules' => 'required|string|is_unique[buku.judul]'
            ],
            'penulis' => [
                'label' => 'Penulis',
                'rules' => 'required|regex_match[/^[a-zA-Z\s]+$/]',
                'errors' => [
                    'required' => 'Penulis harus diisi.',
                    'regex_match' => 'Penulis harus berupa string.'
                ]
            ],
            'penerbit' => [
                'label' => 'Penerbit',
                'rules' => 'required|regex_match[/^[a-zA-Z\s]+$/]',
                'errors' => [
                    'required' => 'Penerbit harus diisi.',
                    'regex_match' => 'Penerbit harus berupa string.'
                ]
            ],
            'tahun_terbit' => [
                'label' => 'Tahun Terbit',
                'rules' => 'required|numeric|greater_than[1800]|less_than[2024]',
                'errors' => [
                    'required' => 'Tahun Terbit harus diisi.',
                    'numeric' => 'Tahun Terbit harus berupa angka.',
                    'greater_than' => 'Tahun Terbit harus lebih besar dari 1800.',
                    'less_than' => 'Tahun Terbit harus kurang dari 2024.'
                ]
            ]
        ]);

        if($validation->withRequest($this->request)->run() == FALSE){
            return view('CreateView', ['validation' => $validation]);
        }else{
            $bukuModel = new BukuModel();
            $data = [
                'judul' => $this->request->getPost('judul'),
                'penulis' => $this->request->getPost('penulis'),
                'penerbit' => $this->request->getPost('penerbit'),
                'tahun_terbit' => $this->request->getPost('tahun_terbit'),
            ];
            $bukuModel->save($data);
            return redirect()->to('/buku');
        }
    }

    public function edit($id){
        $bukuModel = new BukuModel();
        $data['book'] = $bukuModel->find($id);
        return view('EditView', $data);
    }

    public function update($id){
        $validation = \Config\Services::validation();
        $validation->setRules([
            'judul' => [
                'label' => 'Judul',
                'rules' => 'required|string|is_unique[buku.judul,id,' . $id . ']',
                'errors' => [
                    'required' => 'Judul harus diisi.',
                    'string' => 'Judul harus berupa string.'
                ]
            ],
            'penulis' => [
                'label' => 'Penulis',
                'rules' => 'required|regex_match[/^[a-zA-Z\s]+$/]',
                'errors' => [
                    'required' => 'Penulis harus diisi.',
                    'regex_match' => 'Penulis harus berupa string.'
                ]
            ],
            'penerbit' => [
                'label' => 'Penerbit',
                'rules' => 'required|regex_match[/^[a-zA-Z\s]+$/]',
                'errors' => [
                    'required' => 'Penerbit harus diisi.',
                    'regex_match' => 'Penerbit harus berupa string.'
                ]
            ],
            'tahun_terbit' => [
                'label' => 'Tahun Terbit',
                'rules' => 'required|numeric|greater_than[1800]|less_than[2024]',
                'errors' => [
                    'required' => 'Tahun Terbit harus diisi.',
                    'numeric' => 'Tahun Terbit harus berupa angka.',
                    'greater_than' => 'Tahun Terbit harus lebih besar dari 1800.',
                    'less_than' => 'Tahun Terbit harus kurang dari 2024.'
                ]
            ]
        ]);

        if($validation->withRequest($this->request)->run() == FALSE){
            $bukuModel = new BukuModel();
            return view('EditView', [
                'validation' => $validation,
                'book' => $bukuModel->find($id)
            ]);
        }else{
            $bukuModel = new BukuModel();
            $data = [
                'judul' => $this->request->getPost('judul'),
                'penulis' => $this->request->getPost('penulis'),
                'penerbit' => $this->request->getPost('penerbit'),
                'tahun_terbit' => $this->request->getPost('tahun_terbit'),
            ];
            $bukuModel->update($id, $data);
            return redirect()->to('/buku');
        }
    }

    public function delete($id)
    {
        $bukuModel = new BukuModel();
        $bukuModel->delete($id);
        return redirect()->to('/buku')->with('success', 'Data buku berhasil dihapus.');
    }

    public function resetId()
    {
        $db = \Config\Database::connect();
        $db->query("SET @num := 0");
        $db->query("UPDATE buku SET id = @num := @num + 1 ORDER BY id");
        $db->query("ALTER TABLE buku AUTO_INCREMENT = 1");
        return redirect()->to('/buku')->with('message', 'ID berhasil direset!');
    }
}