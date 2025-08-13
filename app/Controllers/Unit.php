<?php

namespace App\Controllers;
use App\Models\UnitModel;
use App\Models\TransportModel;
use CodeIgniter\RESTful\ResourceController;

use App\Controllers\BaseController;

class Unit extends BaseController
{
    protected $session;
	public function __construct(){

		$this->unitModel = new UnitModel();
		$this->transportModel = new TransportModel();
        $this->session = \Config\Services::session();
        $this->validation = \Config\Services::validation();
        $this->uri = new \CodeIgniter\HTTP\URI(uri_string());
        $this->session->start();
        
	}
    public function index($id_transport)
    {   
        $transport = $this->transportModel->get_by_id($id_transport);
		$list_unit = $this->unitModel->get_all_data($id_transport);        
        $data =[
			'judul_page' => 'Unit Kendaraan '.$transport['transport_name'],
			'list_unit' => $list_unit,
            'id_transport' => $id_transport,
			'sub_judul_page' => 'Table Data',
			'add' => '/add_unit',
			'update' => '/update_unit',
			'url_delete' => 'hapus_unit',
            'url' =>'transport'
        ];
		return view('admin_unit',$data);
    }
    public function create($id_transport)
    {       
        $transport = $this->transportModel->get_by_id($id_transport);
        $data =[
            'validation' => $this->validation,
			'action' => '/add_action_unit',
			'judul_page' => 'Unit Kendaraan '.$transport['transport_name'],
			'sub_judul_page' => 'Tambah',
			'back' => '/unit/'.$id_transport,
			'url_delete' => 'hapus_unit',
            'transport_name' => $transport['transport_name'],
            'plat_number' => old('plat_number'),
            'id_transport' => $id_transport,
            'price' => old('price'),
			'id' => '',
            'url' =>'transport',
        ];
		return view('admin_unit_form',$data);
    }
    public function create_action()
    {   
        $is_uniqe = 'is_unique[unit.plat_number]';
        if(!$this->validate($this->rules($is_uniqe))) {
            return redirect()->back()->withInput()->with('validation', $this->validation);
        }

        $data =[
            'plat_number'          => $this->request->getPost('plat_number'),
            'id_transport'         => $this->request->getPost('id_transport'),
        ];
        $insert = $this->unitModel->add_data($data);
        if($insert){	
			return redirect()->to(base_url().'/unit/'.$this->request->getPost('id_transport'));
        }
    }
    public function update($id_transport,$id)
    {   
        $row = $this->unitModel->get_by_id($id);
        $transport = $this->transportModel->get_by_id($id_transport);
        $data =[
            'validation' => $this->validation,
			'action' => '/update_action_unit',
			'judul_page' => 'Unit Kendaraan '.$transport['transport_name'],
			'sub_judul_page' => 'Ubah',
			'back' => '/unit/'.$id_transport,
			'url_delete' => 'hapus_unit',
			'id' => $id,
            'transport_name' => $transport['transport_name'],
            'plat_number' => $row['plat_number'],
            'id_transport' => $id_transport,
            'url' =>'transport',
        ];
		return view('admin_unit_form',$data);
    }
    public function update_action()
    {           
        $id = $this->request->getPost('id');
        $row = $this->unitModel->get_by_id($id);
        if($this->request->getPost('plat_number') == $row['plat_number']){
            $is_uniqe = '';
        }else{
            $validasi = $this->unitModel->validasi($this->request->getPost('plat_number'));
            if(!empty($validasi)){
                $is_uniqe = 'is_unique[unit.plat_number]';
            }else{
                $is_uniqe = '';
            }
        }
        if(!$this->validate($this->rules($is_uniqe))) {
            return redirect()->back()->withInput()->with('validation', $this->validation);
           
        }
        $data =[
            'plat_number'          => $this->request->getPost('plat_number'),
            'id_transport'         => $this->request->getPost('id_transport'),
        ];
        $update = $this->unitModel->ubah_data($data,$id);
        
        if($update){	
			return redirect()->to(base_url().'/unit/'.$this->request->getPost('id_transport'));
        }
    }
    
	public function delete($id_transport,$id)
	{
		$hapus = $this->unitModel->hapus_data($id);
		if($hapus){	
			return redirect()->to(base_url().'/unit/'.$id_transport);
		}

    }
    public function rules($is_uniqe)
    {
        $rules= [
            'plat_number' => [
               'rules' => 'required|'.$is_uniqe,
               'errors' => [
                'required' => 'Plat Nomor Kendaraan is reqiured !!',
                'is_unique' => 'Plat Nomor Kendaraan  sudah terdaftar !!',
               ]
            ],
        ];
        
        return $rules;
    }
}
