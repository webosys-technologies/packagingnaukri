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
                 if($url[2]=="webosys.com" || $url[2]=="www.webosys.com" || $url[2]=="www.acumenpackaging.com" || $url[2]=="acumenpackaging.com" || $url[2]=="localhost" )
                 {
            if ($url[3] == 'packagingnaukri') {
            
              $page='packaging';
              return $page;
            }
            elseif ($url[3] == 'printingnaukri') {

                  $page='printing';  
             		 return $page;

            }elseif($url[3] == 'plasticnaukri'){

                  $page='plastic'; 
              	  return $page;

            }
                 }else{
                     
                      if ($url[2] == 'packagingnaukri.com' || $url[2] == 'www.packagingnaukri.com') {
            
              $page='packaging';
              return $page;
            }
            elseif ($url[2] == 'printingnaukri.com' || $url[2] == 'www.printingnaukri.com') {

                  $page='printing';  
             		 return $page;

            }elseif($url[2] == 'plasticnaukri.com' || $url[2] == 'www.plasticnaukri.com'){

                  $page='plastic'; 
              	  return $page;

            }
               
                     
                 }
                 
                 
                
	}
}


 ?>