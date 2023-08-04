<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PetugasModel;
class Petugas extends BaseController
{
    protected $pm;
    private $menu;
    private $rules;
    public function __construct()
    {
        $this->pm = new PetugasModel();
        $this->menu = [
            'beranda' => [
                'title' => 'Beranda',
                'link' => base_url(),
                'icon' => 'fa fa-house',
                'aktif' => '',
            ],
            'petugas' => [
                'title' => 'Petugas',
                'link' => base_url().'/petugas',
                'icon' => 'fa-solid fa-users-line',
                'aktif' => 'active',
            ], 
            'peminjaman' => [
                'title' => 'Peminjaman',
                'link' => base_url().'/peminjaman',
                'icon' => 'fa-solid fa-hand-holding-dollar',
                'aktif' => '',
            ], 
            'buku' => [
                'title' => 'Buku',
                'link' => base_url().'/buku',
                'icon' => 'fa-regular fa-address-card',
                'aktif' => '',
            ], 
        ];

        $this->rules = [
            'id_nama' => [
                'rules'=>'required',
                'errors' =>[
                    'required' => 'Nama tidak boleh kosong',
                ]
            ],
            'nama' => [
                'rules'=>'required',
                'errors' =>[
                    'required' => 'Asrama tidak boleh kosong',
                ]
            ],
            'asrama' => [
                'rules'=>'required',
                'errors' =>[
                    'required' => 'Kelas tidak boleh kosong',
                ]
            ],
            'kelas' => [
                'rules'=>'required',
                'errors' =>[
                    'required' => 'Kelas tidak boleh kosong',
                ]
            ],
        ];
    }
    public function index()
    {
        
        $breadcrumb = '<div class="col-sm-6">
                            <h1 class="m-0">petugas</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="'. base_url() .'">Beranda</a></li>
                                <li class="breadcrumb-item active">petugas</li>
                            </ol>
                        </div>';
        $data['menu'] = $this->menu;
        $data['breadcrumb'] = $breadcrumb;
        $data['title_card'] = "Data petugas";

        $query = $this->pm->find();
        $data['data_petugas'] = $query;
        return view('petugas/content', $data);
    }

    public function tambah()
    {
        $breadcrumb = '<div class="col-sm-6">
                            <h1 class="m-0">petugas</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="'. base_url() .'">Beranda</a></li>
                                <li class="breadcrumb-item"><a href="'. base_url() .'/petugas">petugas</a></li>
                                <li class="breadcrumb-item active">Tambah petugas</li>
                            </ol>
                        </div>';
        $data['menu'] = $this->menu;
        $data['breadcrumb'] = $breadcrumb;
        $data['title_card'] = 'Tambah petugas';
        $data['action'] = base_url().'petugas/simpan';
        return view ('petugas/input',$data);
    }

    public function simpan()
    {

        if (strtolower($this->request->getMethod()) !== 'post') {
               
            return redirect()->back()->withInput();
        }

        if (!$this->validate($this->rules)) {
            return redirect()->back()->withInput();
        }


        $dt = $this->request->getPost();
        try {
            $simpan = $this->pm->insert($dt);
            return redirect()->to('petugas')->with('success','Data Berhasil disimpan');
        } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {

            session()->setFlashdata('error', $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function hapus($id){
        if (empty($id)){
            return redirect()->back()->with('error', 'Hapus data gagal dilakukan');
        }
        try {
            $this->pm->delete($id);  
            return redirect()->to('petugas')->with('success', 'Data petugas dengan kode '.$id.' berhasil dihapus');
        } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {
            return redirect()->to('petugas')->with('error',$e->getMessage());
        }
              
    }

    
    public function edit($id)
    {
        $breadcrumb = '<div class="col-sm-6">
            <h1 class="m-0">petugas</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="'. base_url() .'">Beranda</a></li>
                <li class="breadcrumb-item"><a href="'. base_url() .'petugas">petugas</a></li>
                <li class="breadcrumb-item active">Edit petugas</li>
            </ol>
        </div>';
    $data['menu'] = $this->menu;
    $data['breadcrumb'] = $breadcrumb;
    $data['title_card'] = 'edit petugas';
    $data['action'] = base_url().'petugas/update';

    $data['edit_data'] = $this->pm->find($id);
    return view ('petugas/input',$data);    
    }

    public function update(){
        $dtEdit = $this->request->getPost();
        $param = $dtEdit['param'];
        unset($dtEdit['param']);

        if (!$this->validate($this->rules)) {

            return redirect()->back()->withInput();
        }

        try {
            $this->pm->update($param, $dtEdit);
            return redirect()->to('petugas')->with('success', 'Data berhasil diupdate');
        } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {
            session()->setFlashdata('error',$e->getMessage());
            return redirect()->back()->withInput();
        }
    }
        
      
}
