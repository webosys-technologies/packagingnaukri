
<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Employments_model extends CI_Model
{
     var $table='employments';
    
     public function getall_employments()
     {
       
     }
     
     public function insert_employment($data)
     {
         $this->db->insert($this->table,$data);
         return $this->db->affected_rows();
     }
     
     public function get_employ_by_id($where)
     {
         $this->db->where($where);
         $query=$this->db->get($this->table);
         return $query->row();
     }
     
     public function update_employment($where,$data)
     {
        
         $this->db->update($this->table,$data,$where);
         return $this->db->affected_rows();
     }
      function delete_by_id($id)
     {        
         $this->db->delete($this->table,array('member_id'=>$id));
         return $this->db->affected_rows();
     }
     
     function get_employ_by_member($id)
     {
         $this->db->where('member_id',$id);
         $query=$this->db->get($this->table);
         return $query->row();
     }
     
     function get_employment_member($id)
     {
         $this->db->where('member_id',$id);
         $query=$this->db->get($this->table);
         return $query->result();
     }
     
     function member_experience($where)
     {         
             $query1=$this->db->from($this->table)
                          ->where($where)
                          ->get();
         $query=$query1->result();
         $exp="0.0";
         $year=0;
         $month=0;
         $to="";
         foreach ($query as $q)
         {
//             if($q->employment_to=="3000-01-01")
//             {
//                $to=date("Y-m-d"); 
//             }else{
                 $to=$q->employment_to;
//             }
            $exp=explode(".",(new DateTime($q->employment_from))->diff(new DateTime($to))->format('%y.%m'));
             $year=$year+$exp[0];
             $month=$month+$exp[1];
             

             
         }
                
         return $year+(int)($month/12).".".($month%12);
     }
     
     function check_employment($where)
     {
         $this->db->from($this->table);
         $this->db->where($where);
         $query=$this->db->get();
         return $query->num_rows();
     }
     
      function get_employment($where)
     {
          $this->db->from($this->table);
          $this->db->order_by('employment_id','desc');
          $this->db->limit('1');
          $this->db->where($where);
          $res=$this->db->get();       
          return $res->row();
     }
     
     function employment_delete($where)
     {
         $this->db->from($this->table);
         $this->db->where($where);
         $query=$this->db->delete();        
         
         return $this->db->affected_rows();
     }
     
     function get_employment_exp($id)
     {
//         $this->db-select('employment_')
     }
    
}

  