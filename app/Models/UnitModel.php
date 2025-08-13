<?php

namespace App\Models;

use CodeIgniter\Model;

class UnitModel extends Model
{
    protected $table            = 'unit';
    protected $primaryKey       = 'id';
    
    protected $useSoftDeletes = true;
    protected $useTimestamps = true;
    
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $allowedFields = [
        'plat_number','id_transport'
    ];
    
    public function get_all_data($id_transport)
    {  
      $this->select('unit.*, transport.transport_name');
      $this->join('transport', 'transport.id = unit.id_transport','LEFT');		  
      $array = array('unit.id_transport' => $id_transport);
		  $data = $this->where($array)->findAll();
		  return $data;
    }
    public function get_by_id($id)
    {
		  $data = $this->find($id);
		  return $data;
    }
    public function validasi($plat_number)
    {
      $array = array('plat_number' => $plat_number);
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
