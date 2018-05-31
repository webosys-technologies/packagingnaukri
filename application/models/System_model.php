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

	function system_update($where,$data)
	{
		$this->db->update($this->table,$data,$where);
		return $this->db->affected_rows();
	}
}


 ?>