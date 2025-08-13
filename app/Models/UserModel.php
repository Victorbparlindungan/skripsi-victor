<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    
    protected $useSoftDeletes = true;
    protected $useTimestamps = true;
    
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $allowedFields = [
        'name', 'user_name', 'password','id_group_user','status_login',
    ];
    
    public function check_login($var1,$var2)
    {
      $this->select('users.*, group_user.group_name');
      $this->join('group_user', 'group_user.id = users.id_group_user','LEFT');
      $array = array('users.user_name' => $var1,'users.password' => $var2);
		  $data = $this->where($array)->find();
		  return $data;
    }
    
    public function set_login($data,$id)
    {
      return $this->update(['id' => $id],$data);
    
    } 
    public function get_all_data()
    {  
      $this->select('users.*, group_user.group_name');
      $this->join('group_user', 'group_user.id = users.id_group_user','LEFT');
		  $data = $this->findAll();
		  return $data;
    }
    public function validasi($user_name)
    {
      $array = array('user_name' => $user_name);
		  $data = $this->where($array)->findAll();
		  return $data;
    }
    public function get_by_id($id)
    {
		  $data = $this->find($id);
		  return $data;
    }
    public function add_data($data)
    {
      return $this->insert($data);
    } 
    
    public function add_data2($data)
    {
       $this->insert($data);
       return $this->insertID();
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
