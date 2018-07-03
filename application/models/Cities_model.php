
<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Cities_model extends CI_Model
{
     var $table='cities';
    
     public function getall_state()
     {
        $this->db->from('states');
        $this->db->where('countryID','101');
        $query=$this->db->get();

        return $query->result();
     }

     public function getall_states($country)
     {
        $this->db->from('states');
        $this->db->where('countryID',$country);
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
     	$this->db->where('stateID',$state);
     	$query=$this->db->get();

     	return $query->result();
     }
     
     public function getall_country()
     {
        $this->db->from('countries');
        $query=$this->db->get();

        return $query->result();
     }
   
}

  