<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Cities_model extends CI_Model
{
     var $table='cities';
    
     public function getall_state()
     {
        $this->db->from($this->table);
        $query=$this->db->get();

        return $query->result();
     }

   
}

  