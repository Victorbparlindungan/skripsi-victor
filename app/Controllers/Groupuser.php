<?php

namespace App\Controllers;
use App\Models\GroupuserModel;
use CodeIgniter\RESTful\ResourceController;

use App\Controllers\BaseController;

class Groupuser extends BaseController
{
    protected $session;
	public function __construct(){

		$this->groupuserModel = new GroupuserModel();
        $this->session = \Config\Services::session();
        $this->validation = \Config\Services::validation();
        $this->uri = new \CodeIgniter\HTTP\URI(uri_string());
        $this->session->start();
        
	}
    public function index()
    {   
		$list_groupuser = $this->groupuserModel->get_all_data();
        $data =[
			'judul_page' => 'Grup Pengguna',
			'list_groupuser' => $list_groupuser,
			'sub_judul_page' => 'Table Data',
			'add' => '/add_groupuser',
			'update' => '/update_groupuser',
			'url_delete' => 'hapus_groupuser',
            'url' =>'groupuser'
        ];
		return view('admin_groupuser',$data);
    }
    public function create()
    {       
        $data =[
            'validation' => $this->validation,
			'action' => '/add_action_groupuser',
			'judul_page' => 'Grup Pengguna',
			'sub_judul_page' => 'Tambah',
			'back' => '/groupuser',
			'url_delete' => 'hapus_groupuser',
            'group_name' => old('group_name'),
			'id' => '',
            'url' =>'groupuser',
        ];
		return view('admin_groupuser_form',$data);
    }
    public function create_action()
    {   
        $is_uniqe = 'is_unique[group_user.group_name]';
        if(!$this->validate($this->rules($is_uniqe))) {
            return redirect()->back()->withInput()->with('validation', $this->validation);
        }

        $data =[
            'group_name'          => $this->request->getPost('group_name'),
        ];
        $insert = $this->groupuserModel->add_data($data);
        if($insert){	
            return redirect()->to(base_url().'/groupuser');
        }
    }
    public function update($id)
    {   
        $row = $this->groupuserModel->get_by_id($id);
        $data =[
            'validation' => $this->validation,
			'action' => '/update_action_groupuser',
			'judul_page' => 'Grup Pengguna',
			'sub_judul_page' => 'Ubah',
			'back' => '/groupuser',
			'url_delete' => 'hapus_groupuser',
			'id' => $id,
            'group_name' => $row['group_name'],
            'url' =>'groupuser',
        ];
		return view('admin_groupuser_form',$data);
    }
    public function update_action()
    {           
        $id = $this->request->getPost('id');
        $row = $this->groupuserModel->get_by_id($id);
        if($this->request->getPost('group_name') == $row['group_name']){
            $is_uniqe = '';
        }else{
            $validasi = $this->groupuserModel->validasi($this->request->getPost('group_name'));
            if(!empty($validasi)){
                $is_uniqe = 'is_unique[group_user.group_name]';
            }else{
                $is_uniqe = '';
    
            }

        }
        if(!$this->validate($this->rules($is_uniqe))) {
            return redirect()->back()->withInput()->with('validation', $this->validation);
           
        }

       
        $data =[
            'group_name'          => $this->request->getPost('group_name'),
        ];
        
        $update = $this->groupuserModel->ubah_data($data,$id);
        
        if($update){	
            return redirect()->to(base_url().'/groupuser');
        }
    }
    
	public function delete($id)
	{
		$hapus = $this->groupuserModel->hapus_data($id);
		if($hapus){	
			return redirect()->to(base_url().'/groupuser');
		}

    }
    public function rules($is_uniqe)
    {
        $rules= [
            'group_name' => [
               'rules' => 'required|'.$is_uniqe,
               'errors' => [
                'required' => 'Grup Pengguna is reqiured !!',
                'is_unique' => 'Grup Pengguna sudah terdaftar !!',
               ]
            ],
        ];
        return $rules;
    }
}
