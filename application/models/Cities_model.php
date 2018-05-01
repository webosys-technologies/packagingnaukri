
<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Cities_model extends CI_Model
{
     var $table='cities';
    
     public function getall_state()
     {
       $res=$this->db->Query('SELECT DISTINCT city_state FROM cities');
        return $res->result();
     }
     
     public function test()
     {
        
         
                 }

   
}

  