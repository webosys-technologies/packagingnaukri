
<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Cities_model extends CI_Model
{
     var $table='cities';
    
     public function getall_state()
     {
       $res=$this->db->Query('SELECT DISTINCT city_state FROM cities');
        return $res->result();
     }
     
     public function get_all_cities()
     {
       $res=$this->db->Query('SELECT DISTINCT city_name FROM cities');
        return $res->result();
     }

     public function getall_cities($state)
     {
     	$this->db->from($this->table);
     	$this->db->or_like('city_state',$state);
     	$query=$this->db->get();

     	return $query->result();
     }
     
     public function test()
     {
        
         
                 }

   
}

  