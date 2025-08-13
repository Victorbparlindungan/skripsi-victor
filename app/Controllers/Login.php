<?php

namespace App\Controllers;
use App\Models\UserModel;
use CodeIgniter\RESTful\ResourceController;
use App\Controllers\BaseController;

class Login extends BaseController
{
    
    protected $session;
	public function __construct(){

		$this->userModel = new UserModel();
        $this->session = \Config\Services::session();
        $this->validation = \Config\Services::validation();
        $this->session->start();
        
	}

    public function index()
    {
        
        $data =[
            'validation' => $this->validation,
			'action_login' => '/login_action',
        ];
		return view('admin_login',$data);
    }
    
    public function login()
    {   
        if(!$this->validate($this->rules_login())) {
            return redirect()->back()->withInput()->with('validation', $this->validation);
        }
        $cek_login = $this->userModel->check_login($this->request->getPost('user_name'),hash('sha512', $this->request->getPost('password')));

        if(!empty($cek_login)){ 
            
            $data =[
				'status_login' 		=> 1,
			];
            $update = $this->userModel->set_login($data,$cek_login[0]['id']);
			if($update){	
				$cek_login  = $this->userModel->check_login($this->request->getPost('user_name'),hash('sha512', $this->request->getPost('password')));
                $data =  [
                    'name' => $cek_login[0]['name'],
                    'user_name' => $cek_login[0]['user_name'],
                    'status_login' => $cek_login[0]['status_login'],
                    'group_name' => $cek_login[0]['group_name'],
                    'id_group_user' => $cek_login[0]['id_group_user'],
                    'id_user' => $cek_login[0]['id'],

                ];
                $this->session->set($data);
                return redirect()->to(base_url().'/user');
            }else{
                return redirect()->back()->withInput()->with('validation', $this->validation);
            }
        }else{
            return redirect()->back()->withInput()->with('validation', $this->validation);

        }
    }
    
    public function logout()
	{
        $this->session->destroy();
        return redirect()->to(base_url());
    }
    public function rules_login()
    {
        $rules= [
            'user_name' => [
               'rules' => 'required|',
               'errors' => [
                'required' => 'User Name is reqiured !!',
               ]
            ],
            'password' => [
               'rules' => 'required',
               'errors' => [
                'required' => 'Password is reqiured !!',
               ]
            ]
        ];
        
        return $rules;
    }
}

