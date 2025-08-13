<?php

namespace App\Controllers;
use App\Models\TypeModel;
use CodeIgniter\RESTful\ResourceController;

use App\Controllers\BaseController;

class Type extends BaseController
{
    protected $session;
	public function __construct(){

		$this->typeModel = new TypeModel();
        $this->session = \Config\Services::session();
        $this->validation = \Config\Services::validation();
        $this->uri = new \CodeIgniter\HTTP\URI(uri_string());
        $this->session->start();
        
	}
    public function index()
    {   
		$list_type = $this->typeModel->get_all_data();
        $data =[
			'judul_page' => 'Jenis Kendaraan',
			'list_type' => $list_type,
			'sub_judul_page' => 'Table Data',
			'add' => '/add_type',
			'update' => '/update_type',
			'url_delete' => 'hapus_type',
            'url' =>'type'
        ];
		return view('admin_type',$data);
    }
    public function create()
    {       
        $data =[
            'validation' => $this->validation,
			'action' => '/add_action_type',
			'judul_page' => 'Jenis Kendaraan',
			'sub_judul_page' => 'Tambah',
			'back' => '/type',
			'url_delete' => 'hapus_type',
            'transport_type' => old('transport_type'),
			'id' => '',
            'url' =>'type',
        ];
		return view('admin_type_form',$data);
    }
    public function create_action()
    {   
        $is_uniqe = 'is_unique[transport_type.transport_type]';
        if(!$this->validate($this->rules($is_uniqe))) {
            return redirect()->back()->withInput()->with('validation', $this->validation);
        }

        $data =[
            'transport_type'          => $this->request->getPost('transport_type'),
        ];
        $insert = $this->typeModel->add_data($data);
        if($insert){	
            return redirect()->to(base_url().'/type');
        }
    }
    public function update($id)
    {   
        $row = $this->typeModel->get_by_id($id);
        $data =[
            'validation' => $this->validation,
			'action' => '/update_action_type',
			'judul_page' => 'Jenis Kendaraan',
			'sub_judul_page' => 'Ubah',
			'back' => '/type',
			'url_delete' => 'hapus_type',
			'id' => $id,
            'transport_type' => $row['transport_type'],
            'url' =>'type',
        ];
		return view('admin_type_form',$data);
    }
    public function update_action()
    {           
        $id = $this->request->getPost('id');
        $row = $this->typeModel->get_by_id($id);
        if($this->request->getPost('transport_type') == $row['transport_type']){
            $is_uniqe = '';
        }else{
            $validasi = $this->typeModel->validasi($this->request->getPost('transport_type'));
            if(!empty($validasi)){
                $is_uniqe = 'is_unique[transport_type.transport_type]';
            }else{
                $is_uniqe = '';
    
            }

        }
        if(!$this->validate($this->rules($is_uniqe))) {
            return redirect()->back()->withInput()->with('validation', $this->validation);
           
        }

       
        $data =[
            'transport_type'          => $this->request->getPost('transport_type'),
        ];
        
        $update = $this->typeModel->ubah_data($data,$id);
        
        if($update){	
            return redirect()->to(base_url().'/type');
        }
    }
    
	public function delete($id)
	{
		$hapus = $this->typeModel->hapus_data($id);
		if($hapus){	
			return redirect()->to(base_url().'/type');
		}

    }
    public function rules($is_uniqe)
    {
        $rules= [
            'transport_type' => [
               'rules' => 'required|'.$is_uniqe,
               'errors' => [
                'required' => 'Jenis Kendaraan is reqiured !!',
                'is_unique' => 'Jenis Kendaraan  sudah terdaftar !!',
               ]
            ],
        ];
        
        return $rules;
    }
}
