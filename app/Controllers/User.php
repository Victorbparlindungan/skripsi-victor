<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\GroupuserModel;
use CodeIgniter\RESTful\ResourceController;

use App\Controllers\BaseController;

class User extends BaseController
{
    protected $session;
	public function __construct(){

		$this->userModel = new UserModel();
		$this->groupuserModel = new GroupuserModel();
        $this->session = \Config\Services::session();
        $this->validation = \Config\Services::validation();
        $this->uri = new \CodeIgniter\HTTP\URI(uri_string());
        $this->session->start();
        
	}
    public function index()
    {   
		$list_user = $this->userModel->get_all_data();
        $data =[
			'judul_page' => 'Pengguna',
			'list_user' => $list_user,
			'sub_judul_page' => 'Table Data',
			'add' => '/add_user',
			'update' => '/update_user',
			'url_delete' => 'hapus_user',
            'url' =>'user'
        ];
		return view('admin_user',$data);
    }
    public function create()
    {   
        $list_groupuser = $this->groupuserModel->get_all_data();
        
        $data =[
            'validation' => $this->validation,
            'list_groupuser' => $list_groupuser,
			'action' => '/add_action_user',
			'judul_page' => 'Pengguna',
			'sub_judul_page' => 'Tambah',
			'back' => '/user',
			'url_delete' => 'hapus_user',
            'name' => old('name'),
            'user_name' => old('user_name'),
            'password' => old('password'),
            'id_group_user' => old('id_group_user'),
			'id' => '',
            'url' =>'user',
        ];
		return view('admin_user_form',$data);
    }
    public function create_action()
    {   
        $is_uniqe = 'is_unique[users.user_name]';
        if(!$this->validate($this->rules($is_uniqe))) {
            return redirect()->back()->withInput()->with('validation', $this->validation);
        }

        $data =[
            'id_group_user'     => $this->request->getPost('id_group_user'),
            'user_name'          => $this->request->getPost('user_name'),
            'password' 		    => hash('sha512', $this->request->getPost('password')),
            'name' 		        => strtoupper($this->request->getPost('name'))
        ];
        $insert = $this->userModel->add_data($data);
        if($insert){	
            return redirect()->to(base_url().'/user');
        }
    }
    public function update($id)
    {   
        $row = $this->userModel->get_by_id($id);
        $list_groupuser = $this->groupuserModel->get_all_data();
        $data =[
            'validation' => $this->validation,
            'list_groupuser' => $list_groupuser,
			'action' => '/update_action_user',
			'judul_page' => 'Pengguna',
			'sub_judul_page' => 'Ubah',
			'back' => '/user',
			'url_delete' => 'hapus_user',
			'id' => $id,
            'name' => $row['name'],
            'user_name' => $row['user_name'],
            'password' => $row['password'],
            'id_group_user' => $row['id_group_user'],
            'url' =>'user',
        ];
		return view('admin_user_form',$data);
    }
    public function update_action()
    {           
        $id = $this->request->getPost('id');
        $row = $this->userModel->get_by_id($id);
        if($this->request->getPost('user_name') == $row['user_name']){
            $is_uniqe = '';
        }else{
            $validasi = $this->userModel->validasi($this->request->getPost('user_name'));
            if(!empty($validasi)){
                $is_uniqe = 'is_unique[users.user_name]';
            }else{
                $is_uniqe = '';
            }
        }
        if(!$this->validate($this->rules($is_uniqe))) {
            return redirect()->back()->withInput()->with('validation', $this->validation);
        }

        if($row['password'] == $this->request->getPost('password')){    
            $data =[
                'id_group_user'     => $this->request->getPost('id_group_user'),
                'user_name'          => $this->request->getPost('user_name'),
                'name' 		        => strtoupper($this->request->getPost('name'))
            ];
        }else{
            $data =[
                'id_group_user'     => $this->request->getPost('id_group_user'),
                'user_name'          => $this->request->getPost('user_name'),
                'password' 		    => hash('sha512', $this->request->getPost('password')),
                'name' 		        => strtoupper($this->request->getPost('name'))
            ];
        }
        
        $update = $this->userModel->ubah_data($data,$id);
        if($update){	
            return redirect()->to(base_url().'/user');
        }
    }
    
	public function delete($id)
	{
		$hapus = $this->userModel->hapus_data($id);
		if($hapus){	
			return redirect()->to(base_url().'/user');
		}

    }
    public function profile()
    {   
        $id= $this->session->get("id_user");
        $row = $this->userModel->get_by_id($id);
        $list_groupuser = $this->groupuserModel->get_all_data();
        $data =[
			'name' => $this->session->get("displayname"),
			'groupuser_name' => $this->session->get("groupuser_name"),
            'photoProfile' =>$this->session->get("photoProfile"),
            'validation' => $this->validation,
            'list_groupuser' => $list_groupuser,
			'action' => '/change_profile',
			'action2' => '/change_password',
			'judul_page' => 'User',
			'sub_judul_page' => 'Update',
			'back' => '/profileuser',
			'url_delete' => 'hapus_user',
			'id' => $id,
            'photoProfile' =>$row['photoProfile'],
            'displayname' => $row['displayname'],
            'username' => $row['username'],
            'password' => $row['password'],
            'id_groupuser' => $row['id_groupuser'],
            'url' =>'profileuser',
        ];
		return view('admin_profile_user',$data);
    }
    public function change_profile()
    {           
        $id= $this->session->get("id_user");
        
        $validation = $this->validate([
			'file_upload' => 'uploaded[file_upload]|mime_in[file_upload,image/jpg,image/jpeg,image/gif,image/png]|max_size[file_upload,4096]'
		]);
        
        
        $data =[
            'username'          => $this->request->getPost('username'),
            'displayname' 		=> strtoupper($this->request->getPost('displayname'))
        ];
		if ($this->request->getFile('file_upload')->getSize() >0) {
            if ($validation) {
                $upload = $this->request->getFile('file_upload');
                $photoProfile = "profile".str_replace(" ","",$this->request->getPost('displayname'));
                $file_delete =  WRITEPATH. '../public/assets-admin/img/profile/'. $photoProfile;
                if (file_exists($file_delete)) {unlink($file_delete);} 
                $upload->move(WRITEPATH .'../public/assets-admin/img/profile/',$photoProfile );
                
                $photoProfileArray =[
                    'photoProfile'       => $photoProfile
                ];
                $data = array_merge($data, $photoProfileArray);
                $this->session->set('photoProfile', $photoProfile);
            }
        }
        
        $update = $this->userModel->ubah_data($data,$id);
        $this->session->set('displayname', strtoupper($this->request->getPost('displayname')));
        if($update){	
            return redirect()->to(base_url().'/profileuser');
        }
		
    }
    public function change_password()
    {           
        $id= $this->session->get("id_user");
        $row = $this->userModel->get_by_id($id);
        if($row['password'] == hash('sha512', $this->request->getPost('currentPassword'))){
            
            $data =[
                'password' 		    => hash('sha512', $this->request->getPost('newPassword')),
            ];
            $update = $this->userModel->ubah_data($data,$id);
            
            header('Content-Type: application/json');
            echo json_encode( 1 );
        }else{

            header('Content-Type: application/json');
            echo json_encode('failed' );
        }
    }
    public function rules($is_uniqe)
    {
        $rules= [
            'user_name' => [
               'rules' => 'required|'.$is_uniqe,
               'errors' => [
                'required' => 'User Name is reqiured !!',
                'is_unique' => 'User Name sudah terdaftar !!',
               ]
            ],
            'name' => [
               'rules' => 'required',
               'errors' => [
                'required' => 'Nama Pengguna is reqiured !!',
               ]
            ],
            'password' => [
               'rules' => 'required',
               'errors' => [
                'required' => 'Password is reqiured !!',
               ]
            ],
            'repassword' => [
               'rules' => 'required|matches[password]',
               'errors' => [
                'required' => 'Input ulang Password is reqiured !!',
                'matches' => 'Pasword tidak sama !!',
               ]
            ]
        ];
        
        return $rules;
    }
}
