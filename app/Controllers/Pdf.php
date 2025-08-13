<?php

namespace App\Controllers;
use App\Models\BookingModel;
use App\Controllers\BaseController;
use Dompdf\Dompdf;

class Pdf extends BaseController
{
    protected $session;
	public function __construct(){
		$this->bookingModel = new BookingModel();
        $this->session = \Config\Services::session();
        $this->validation = \Config\Services::validation();
        $this->session->start();   
	}
    public function index()
    {   

    }
    
    public function pdf_laporan(){
		$laporan = $this->bookingModel->get_all_data();
		$data =[
            'laporan' => $laporan,
        ];
        $filename = 'Laporan Booking Kendaraan';

        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('pdf_laporan',$data));
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream($filename, array("Attachment" => false));  
        exit();
    
    
    }
    
    
}
