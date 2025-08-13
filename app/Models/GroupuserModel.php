<?php

namespace App\Models;

use CodeIgniter\Model;

class GroupuserModel extends Model
{
    protected $table            = 'group_user';
    protected $primaryKey       = 'id';
    
    protected $useSoftDeletes = true;
    protected $useTimestamps = true;
    
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $allowedFields = [
        'group_name'
    ];
    
    public function get_all_data()
    {  		  
      $data = $this->findAll();
		  return $data;
    }
    public function get_by_id($id)
    {
		  $data = $this->find($id);
		  return $data;
    }
    public function validasi($group_name)
    {
      $array = array('group_name' => $group_name);
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
