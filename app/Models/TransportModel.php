<?php

namespace App\Models;

use CodeIgniter\Model;

class TransportModel extends Model
{
    protected $table            = 'transport';
    protected $primaryKey       = 'id';
    
    protected $useSoftDeletes = true;
    protected $useTimestamps = true;
    
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $allowedFields = [
        'transport_name','id_transport_type','price','transport_image'
    ];
    
    public function get_all_data()
    {  		  
      $this->select('transport.*, transport_type.transport_type');
      $this->join('transport_type', 'transport_type.id = transport.id_transport_type','LEFT');
      $data = $this->findAll();
		  return $data;
    }
    public function get_by_id($id)
    {
      $this->select('transport.*, transport_type.transport_type');
      $this->join('transport_type', 'transport_type.id = transport.id_transport_type','LEFT');
		  $data = $this->find($id);
		  return $data;
    }
    public function validasi($transport_name)
    {
      $array = array('transport_name' => $transport_name);
		  $data = $this->where($array)->findAll();
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
