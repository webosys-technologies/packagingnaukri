<?php 

/**
 * 
 */
class Master_edu_model extends CI_Model
{
	var $table='master_educations';
	
	function __construct()
	{
		parent::__construct();

	}

	public function getall()
	{
		$this->db->from($this->table);
		
		$query=$this->db->get();

		return $query->result();
	}

	public function add($dataSet)
	{
		$this->db->insert_batch($this->table, $dataSet);
                return $this->db->insert_id();
	}
     
	public function update($where, $data)
	{
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}

	public function get_by_id($id)
	{
		$this->db->from($this->table);
		$this->db->where('medu_id',$id);
		$query = $this->db->get();

		return $query->row();
	}


	public function delete_by_id($id)
	{
		$this->db->where('medu_id', $id);
		$this->db->delete($this->table);
	}


}

 ?>