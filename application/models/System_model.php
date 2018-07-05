<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */
class System_model extends CI_Model
{
	
	var $table="system";

	function get_info()
	{
		$this->db->from($this->table);
		$query=$this->db->get();
		return $query->row();
	}

	function get_system_info($system)
	{
		$this->db->from($this->table);
		$this->db->where('source',$system);
		$query=$this->db->get();
		return $query->row();
	}

	function getinfo_by_id($id)
	{
		$this->db->from($this->table);
		$this->db->where('system_id',$id);
		$query=$this->db->get();
		return $query->row();
	}

	function system_update($where,$data)
	{
		$this->db->update($this->table,$data,$where);
		return $this->db->affected_rows();
	}

	function source_name()
	{
		 $url=explode('/', base_url());
                 if($url[2]=="webosys.com" || $url[2]=="acumenpackaging.com" || $url[2]=="localhost" )
                 {
            if ($url[3] == 'packagingnaukri') {
            
              $page='packaging';
              return $page;
            }
            elseif ($url[3] == 'printingnaukari') {

                  $page='printing';  
             		 return $page;

            }elseif($url[3] == 'plasticnaukari'){

                  $page='plastic'; 
              	  return $page;

            }
                 }else{
                     
                      if ($url[2] == 'packagingnaukri.com') {
            
              $page='packaging';
              return $page;
            }
            elseif ($url[2] == 'printingnaukari.com') {

                  $page='printing';  
             		 return $page;

            }elseif($url[2] == 'plasticnaukari.com'){

                  $page='plastic'; 
              	  return $page;

            }
               
                     
                 }
                 
                 
                
	}
}


 ?>