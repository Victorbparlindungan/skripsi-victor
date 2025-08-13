<?php

namespace App\Controllers;
use App\Models\BookingModel;
use App\Models\UnitModel;
use CodeIgniter\RESTful\ResourceController;

use App\Controllers\BaseController;

class Booking extends BaseController
{
    protected $session;
	public function __construct(){

		$this->bookingModel = new BookingModel();
		$this->unitModel = new UnitModel();
        $this->session = \Config\Services::session();
        $this->validation = \Config\Services::validation();
        $this->uri = new \CodeIgniter\HTTP\URI(uri_string());
        $this->session->start();
        
	}
    public function index()
    {   
		$list_booking = $this->bookingModel->get_all_data();
        $data =[
			'judul_page' => 'Booking Kendaraan',
			'list_booking' => $list_booking,
			'sub_judul_page' => 'Table Data',
			'add' => '/add_booking',
			'update' => '/update_booking',
			'url_delete' => 'hapus_booking',
            'url' =>'booking'
        ];
		return view('admin_booking',$data);
    }
    public function update($id)
    {   
        $row = $this->bookingModel->get_by_id($id);
		$list_unit = $this->unitModel->get_all_data($row['id_transport']);
        $data =[
            'validation' => $this->validation,
			'list_unit' => $list_unit,
			'action' => '/update_action_booking',
			'judul_page' => 'Booking Kendaraan',
			'sub_judul_page' => 'Ubah',
			'back' => '/booking',
			'url_delete' => 'hapus_booking',
			'id' => $id,
            'transport_name' => $row['transport_name'],
            'booking_name' => $row['booking_name'],
            'booking_address' => $row['booking_address'],
            'booking_phone' => $row['booking_phone'],
            'date_start' => $row['date_start'],
            'date_end' => $row['date_end'],
            'total_price' => $row['total_price'],
            'id_unit' => $row['id_unit'],
            'url' =>'booking',
        ];
		return view('admin_booking_form',$data);
    }
    public function update_action()
    {           
        $id = $this->request->getPost('id');       
        $data =[
            'id_unit'          => $this->request->getPost('id_unit'),
            'status'          => "BOOKED",
        ];
        
        $update = $this->bookingModel->ubah_data($data,$id);
        
        if($update){	
            return redirect()->to(base_url().'/booking');
        }
    }
    
    public function done($id)
    {                
        $data =[
            'status'          => "DONE",
        ];
        
        $update = $this->bookingModel->ubah_data($data,$id);
        
        $row = $this->bookingModel->get_by_id($id);
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.fonnte.com/send',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array(
        'target' => $row['booking_phone'],
        'message' => "Terima kasih sudah memakai jasa kami",
        'countryCode' => '62', //optional
        ),
        CURLOPT_HTTPHEADER => array(
            'Authorization: cWJXrCJHW9Q3AmG1kw7t' //change TOKEN to your actual token
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo json_encode('oke');
        if($update){	
            return redirect()->to(base_url().'/booking');
        }
    }
    
}
