<?php

namespace App\Controllers;
use App\Models\TransportModel;
use App\Models\BookingModel;
use CodeIgniter\RESTful\ResourceController;

use App\Controllers\BaseController;

class Frontend extends BaseController
{
    protected $session;
	public function __construct(){

      $this->transportModel = new TransportModel();
      $this->bookingModel = new BookingModel();
      $this->session = \Config\Services::session();
      $this->validation = \Config\Services::validation();
      $this->uri = new \CodeIgniter\HTTP\URI(uri_string());
        
	}
    public function index()
    {   
		
		$list_transport = $this->transportModel->get_all_data();
        $data =[
			'menu' => 'home',
			'list_transport' => $list_transport,
        ];
		return view('fe_home',$data);
    }
	
    public function about()
    {   
		
        $data =[
			'menu' => 'about'
        ];
		return view('fe_about',$data);
    }
	
    public function rent()
    {   
		
		$list_transport = $this->transportModel->get_all_data();
        $data =[
			'menu' => 'rent',
			'list_transport' => $list_transport,
        ];
		return view('fe_rent',$data);
    }
    
    public function contact()
    {   
		
        $data =[
          'menu' => 'contact'
            ];
        return view('fe_contact',$data);
    }
    public function booking($id_transport)
    {   
		
		  $transport = $this->transportModel->get_by_id($id_transport);
        $midtransClientKey = getenv('MIDTRANS_CLIENT_KEY');
        $data =[
        'menu' => 'rent',
        'transport' => $transport,
        'midtransClientKey' => $midtransClientKey,
          ];
      return view('fe_book',$data);
    }
    public function save_booking()
    {   
      
		  $transport = $this->transportModel->get_by_id($this->request->getPost('id_transport'));
      $tanggalAwal = new \DateTime($this->request->getPost('date_start'));
      $tanggalAkhir = new \DateTime($this->request->getPost('date_end'));

      // Hitung selisih
      $selisih = $tanggalAwal->diff($tanggalAkhir)->days + 1;
      $data =[
          'date_start'          => $this->request->getPost('date_start'),
          'date_end'          => $this->request->getPost('date_end'),
          'id_transport'         => $this->request->getPost('id_transport'),
          'booking_name'         => $this->request->getPost('booking_name'),
          'booking_phone'         => $this->request->getPost('booking_phone'),
          'booking_address'         => $this->request->getPost('booking_address'),
          'price'         => $transport['price'],
          'total_price'         => $transport['price']*$selisih,
      ];
      $insert = $this->bookingModel->add_data($data);
      if($this->request->getPost('date_start') == $this->request->getPost('date_end')){
        $tanggal = date('d F Y', strtotime($this->request->getPost('date_start')));
      }else{
        $tanggal = date('d F Y', strtotime($this->request->getPost('date_start'))) ." sampai ".date('d F Y', strtotime($this->request->getPost('date_end')));
      }
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
        'target' => $this->request->getPost('booking_phone'),
        'message' => "Terima kasih sudah melakukan pembayaran atas sewa kendaraan ".$transport['transport_name']. " untuk tanggal ".$tanggal,
        'countryCode' => '62', //optional
        ),
        CURLOPT_HTTPHEADER => array(
            'Authorization: cWJXrCJHW9Q3AmG1kw7t' //change TOKEN to your actual token
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo json_encode('oke');
      if($insert){	
        return redirect()->to(base_url());
      }
    }
        
    public function payment($total){
      
        $midtransServerKey = getenv('MIDTRANS_SERVER_KEY');
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = $midtransServerKey;
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;
        
        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => $total,
            )
        );
        

        $data =[
            'snapToken' 		=> \Midtrans\Snap::getSnapToken($params)
        ];
        
        header('Content-Type: application/json');
        echo json_encode( $data );
    }
}
