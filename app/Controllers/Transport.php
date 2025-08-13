<?php

namespace App\Controllers;
use App\Models\TransportModel;
use App\Models\TypeModel;
use App\Models\UnitModel;
use CodeIgniter\RESTful\ResourceController;

use App\Controllers\BaseController;

class Transport extends BaseController
{
    protected $session;
	public function __construct(){

		$this->transportModel = new TransportModel();
		$this->typeModel = new TypeModel();
		$this->unitModel = new UnitModel();
        $this->session = \Config\Services::session();
        $this->validation = \Config\Services::validation();
        $this->uri = new \CodeIgniter\HTTP\URI(uri_string());
        $this->session->start();
        
	}
    public function index()
    {   
		$list_transport = $this->transportModel->get_all_data();
        $list = [];
        foreach ($list_transport as $key => $value) {
		    $quantity = count($this->unitModel->get_all_data($value['id']));
            $data = [
                'id'             => $value['id'],
                'transport_name' => $value['transport_name'],
                'transport_type' => $value['transport_type'],
                'quantity'       => $quantity,
                'price'          => $value['price'],
            ];
            array_push($list , $data);
        }
        
        $data =[
			'judul_page' => 'Kendaraan',
			'list_transport' => $list,
			'sub_judul_page' => 'Table Data',
			'add' => '/add_transport',
			'update' => '/update_transport',
			'url_delete' => 'hapus_transport',
            'url' =>'transport'
        ];
		return view('admin_transport',$data);
    }
    public function create()
    {       
		$list_type = $this->typeModel->get_all_data();
        $data =[
            'validation' => $this->validation,
			'list_type' => $list_type,
			'action' => '/add_action_transport',
			'judul_page' => 'Kendaraan',
			'sub_judul_page' => 'Tambah',
			'back' => '/transport',
			'url_delete' => 'hapus_transport',
            'transport_name' => old('transport_name'),
            'id_transport_type' => old('id_transport_type'),
            'transport_image' => old('transport_image'),
            'price' => old('price'),
			'id' => '',
            'url' =>'transport',
        ];
		return view('admin_transport_form',$data);
    }
    public function create_action()
    {   
        $is_uniqe = 'is_unique[transport.transport_name]';
        if(!$this->validate($this->rules($is_uniqe))) {
            return redirect()->back()->withInput()->with('validation', $this->validation);
        }
        $validation = $this->validate([
			'file_upload' => 'uploaded[file_upload]|mime_in[file_upload,image/jpg,image/jpeg,image/gif,image/png]|max_size[file_upload,4096]'
		]);
        
        $data =[
            'transport_name'          => $this->request->getPost('transport_name'),
            'id_transport_type'       => $this->request->getPost('id_transport_type'),
            'price'                   => str_replace(".","",str_replace(",","",$this->request->getPost('price'))),
        ];
        
		if ($this->request->getFile('file_upload')->getSize() >0) {
            if ($validation) {
                $upload = $this->request->getFile('file_upload');
                $transport_image =str_replace(" ","",$this->request->getPost('transport_name'));
                $file_delete =  WRITEPATH. '../public/assets/img/kendaraan/'. $transport_image;
                if (file_exists($file_delete)) {unlink($file_delete);} 
                $upload->move(WRITEPATH .'../public/assets/img/kendaraan/',$transport_image );
                
                $transport_imageArray =[
                    'transport_image'       => $transport_image
                ];
                $data = array_merge($data, $transport_imageArray);
            }
        }
        $insert = $this->transportModel->add_data($data);
        if($insert){	
            return redirect()->to(base_url().'/transport');
        }
    }
    public function update($id)
    {   
        $row = $this->transportModel->get_by_id($id);
		$list_type = $this->typeModel->get_all_data();
        $data =[
            'validation' => $this->validation,
			'list_type' => $list_type,
			'action' => '/update_action_transport',
			'judul_page' => 'Kendaraan',
			'sub_judul_page' => 'Ubah',
			'back' => '/transport',
			'url_delete' => 'hapus_transport',
			'id' => $id,
            'transport_name' => $row['transport_name'],
            'id_transport_type' => $row['id_transport_type'],
            'transport_image' => $row['transport_image'],
            'price' => $row['price'],
            'url' =>'transport',
        ];
		return view('admin_transport_form',$data);
    }
    public function update_action()
    {           
        $id = $this->request->getPost('id');
        $row = $this->transportModel->get_by_id($id);
        if($this->request->getPost('transport_name') == $row['transport_name']){
            $is_uniqe = '';
        }else{
            $validasi = $this->transportModel->validasi($this->request->getPost('transport_name'));
            if(!empty($validasi)){
                $is_uniqe = 'is_unique[transport.transport_name]';
            }else{
                $is_uniqe = '';
            }
        }
        if(!$this->validate($this->rules($is_uniqe))) {
            return redirect()->back()->withInput()->with('validation', $this->validation); 
        }
        $validation = $this->validate([
			'file_upload' => 'uploaded[file_upload]|mime_in[file_upload,image/jpg,image/jpeg,image/gif,image/png]|max_size[file_upload,4096]'
		]);
        $data =[
            'transport_name'          => $this->request->getPost('transport_name'),
            'id_transport_type'       => $this->request->getPost('id_transport_type'),
            'price'                   => str_replace(".","",str_replace(",","",$this->request->getPost('price'))),
        ];
        if ($this->request->getFile('file_upload')->getSize() >0) {
            if ($validation) {
                $upload = $this->request->getFile('file_upload');
                $transport_image =str_replace(" ","",$this->request->getPost('transport_name'));
                $file_delete =  WRITEPATH. '../public/assets/img/kendaraan/'. $transport_image;
                if (file_exists($file_delete)) {unlink($file_delete);} 
                $upload->move(WRITEPATH .'../public/assets/img/kendaraan/',$transport_image );
                
                $transport_imageArray =[
                    'transport_image'       => $transport_image
                ];
                $data = array_merge($data, $transport_imageArray);
            }
        }
        $update = $this->transportModel->ubah_data($data,$id);
        
        if($update){	
            return redirect()->to(base_url().'/transport');
        }
    }
    
	public function delete($id)
	{
		$hapus = $this->transportModel->hapus_data($id);
		if($hapus){	
			return redirect()->to(base_url().'/transport');
		}

    }
    public function rules($is_uniqe)
    {
        $rules= [
            'transport_name' => [
               'rules' => 'required|'.$is_uniqe,
               'errors' => [
                'required' => 'Nama Kendaraan is reqiured !!',
                'is_unique' => 'Nama Kendaraan  sudah terdaftar !!',
               ]
            ],
        ];
        
        return $rules;
    }
}
