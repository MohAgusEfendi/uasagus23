<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PeminjamanModel;
class Peminjaman extends BaseController
{
    protected $pm;
    private $menu;
    private $rules;
    public function __construct()
    {
        $this->pm = new PeminjamanModel();
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
                'aktif' => '',
            ], 
            'peminjaman' => [
                'title' => 'Peminjaman',
                'link' => base_url().'/peminjaman',
                'icon' => 'fa-solid fa-hand-holding-dollar',
                'aktif' => 'active',
            ], 
            'buku' => [
                'title' => 'Buku',
                'link' => base_url().'/buku',
                'icon' => 'fa-regular fa-address-card',
                'aktif' => '',
            ], 
        ];

        $this->rules = [
            'id_peminjaman' => [
                'rules'=>'required',
                'errors' =>[
                    'required' => 'ID tidak boleh kosong',
                ]
            ],
            'nama_peminjam' => [
                'rules'=>'required',
                'errors' =>[
                    'required' => 'Nama Peminjam tidak boleh kosong',
                ]
            ],
            'tgl_peminjaman' => [
                'rules'=>'required',
                'errors' =>[
                    'required' => 'Tanggal Peminjam tidak boleh kosong',
                ]
            ],
            'tgl_kem' => [
                'rules'=>'required',
                'errors' =>[
                    'required' => 'Tangal Kembali tidak boleh kosong',
                ]
            ],
        ];
    }
    public function index()
    {
        
        $breadcrumb = '<div class="col-sm-6">
                            <h1 class="m-0">peminjaman</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="'. base_url() .'">Beranda</a></li>
                                <li class="breadcrumb-item active">peminjaman</li>
                            </ol>
                        </div>';
        $data['menu'] = $this->menu;
        $data['breadcrumb'] = $breadcrumb;
        $data['title_card'] = "Data peminjaman";

        $query = $this->pm->find();
        $data['data_datapeminjaman'] = $query;
        return view('peminjaman/content', $data);
    }

    public function tambah()
    {
        $breadcrumb = '<div class="col-sm-6">
                            <h1 class="m-0">peminjaman</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="'. base_url() .'">Beranda</a></li>
                                <li class="breadcrumb-item"><a href="'. base_url() .'/peminjaman">peminjaman</a></li>
                                <li class="breadcrumb-item active">Tambah peminjaman</li>
                            </ol>
                        </div>';
        $data['menu'] = $this->menu;
        $data['breadcrumb'] = $breadcrumb;
        $data['title_card'] = 'Tambah peminjaman';
        $data['action'] = base_url().'peminjaman/simpan';
        return view ('peminjaman/input',$data);
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
            return redirect()->to('peminjaman')->with('success','Data Berhasil disimpan');
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
            return redirect()->to('peminjaman')->with('success', 'Data peminjaman dengan kode '.$id.' berhasil dihapus');
        } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {
            return redirect()->to('peminjaman')->with('error',$e->getMessage());
        }
              
    }

    
    public function edit($id)
    {
        $breadcrumb = '<div class="col-sm-6">
            <h1 class="m-0">peminjaman</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="'. base_url() .'">Beranda</a></li>
                <li class="breadcrumb-item"><a href="'. base_url() .'peminjaman">peminjaman</a></li>
                <li class="breadcrumb-item active">Edit peminjaman</li>
            </ol>
        </div>';
    $data['menu'] = $this->menu;
    $data['breadcrumb'] = $breadcrumb;
    $data['title_card'] = 'edit peminjaman';
    $data['action'] = base_url().'peminjaman/update';

    $data['edit_data'] = $this->pm->find($id);
    return view ('peminjaman/input',$data);    
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
            return redirect()->to('peminjaman')->with('success', 'Data berhasil diupdate');
        } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {
            session()->setFlashdata('error',$e->getMessage());
            return redirect()->back()->withInput();
        }
    }
        
      
}
