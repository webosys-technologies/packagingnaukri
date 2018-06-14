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
}


 ?>