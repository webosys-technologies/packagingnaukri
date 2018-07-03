
<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Cities_model extends CI_Model
{
     var $table='cities';
    
     public function getall_state()
     {
        $this->db->from('states');
        $this->db->or_like('countryID','IND');
        $query=$this->db->get();

        return $query->result();
     }
     
     public function get_all_cities()
     {
       $res=$this->db->Query('SELECT DISTINCT cityName FROM cities');
        return $res->result();
     }

     public function getall_cities($state)
     {
     	$this->db->from($this->table);
     	$this->db->or_like('stateID',$state);
     	$query=$this->db->get();

     	return $query->result();
     }
     

   
}

  