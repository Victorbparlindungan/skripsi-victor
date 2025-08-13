<?php

namespace App\Models;

use CodeIgniter\Model;

class BookingModel extends Model
{
    protected $table            = 'booking';
    protected $primaryKey       = 'id';
    
    protected $useSoftDeletes = true;
    protected $useTimestamps = true;
    
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $allowedFields = [
        'date_start','date_end','id_transport','price','total_price',
        'booking_name','booking_phone','booking_address','status','id_unit'
    ];
    
    public function get_all_data()
    {  
      $this->select('booking.*, transport.transport_name,unit.plat_number');
      $this->join('unit', 'unit.id = booking.id_unit','LEFT');	
      $this->join('transport', 'transport.id = booking.id_transport','LEFT');		  
		  $data = $this->findAll();
		  return $data;
    }
    public function get_by_id($id)
    {
      $this->select('booking.*, transport.transport_name,unit.plat_number');
      $this->join('unit', 'unit.id = booking.id_unit','LEFT');	
      $this->join('transport', 'transport.id = booking.id_transport','LEFT');	
		  $data = $this->find($id);
		  return $data;
    }
    public function add_data($data)
    {
      return $this->insert($data);
    } 
    public function ubah_data($data,$id)
    {
      return $this->update(['id' => $id],$data);
    
    } 
    public function hapus_data($id)
    {
      return $this->delete(['id' => $id]);
    } 
}
