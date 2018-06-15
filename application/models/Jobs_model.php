
<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Jobs_model extends CI_Model
{
     var $table='jobs';
    
     public function getall_jobs()
     {
        $this->db->from('jobs as job');
        $this->db->join('companies as camp','job.company_id=camp.company_id','LEFT');
        $res=$this->db->get();
        return $res->result();
     }
     
     public function update_job($data,$id)
     {
         $where=array('job_id'=>$id);
         $res=$this->db->update($this->table,$data,$where);
         return $this->db->affected_rows();
     }
     
    
     
      public function get_job_by_recruiterid($id)
     {
         $this->db->where('jobs.recruiter_id',$id);
         $this->db->join('companies as comp','comp.company_id=jobs.company_id',"LEFT");
         $res=$this->db->get($this->table);
         return $res->result();
     }
     
     public function job_by_id($id)
     {
        
         $this->db->from($this->table);
         $this->db->where('job_id',$id);
         $res=$this->db->get();
         return $res->row();
     }
     function check_job_id($id)
     {
         $query=$this->db->from('job_skills')
                    ->where('job_id',$id)
                    ->get();
         if($query->result())
         {
            return true; 
         }else{
             return false;
         }
     }
     
     public function job_add($data)
     {
         $this->db->insert($this->table,$data);
         return $this->db->insert_id();
     }
     
     public function delete_job($id)
     {
         $this->db->from($this->table);
         $this->db->where('job_id',$id);
         $this->db->delete();
         return $this->db->affected_rows();
     }
     
     public function search_job($form)
     {
         
         if(!empty($form['title']) && !empty($form['location']) && !empty($form['exp']) && !empty($form['salary']))
         {
             
           $this->db->from('jobs as job');
           $this->db->like('job.job_title',$form['title']);
           $this->db->like('job.job_city',$form['location']);
           $this->db->like('job.job_experience',$form['exp']);
           $this->db->like('job.job_salary',$form['salary']);
        $this->join_query();
        $this->db->where('job.job_status','1');
         
         $result=$this->db->get();
         return $result->result();
         }elseif(!empty($form['title']) && !empty($form['location']) && !empty($form['exp']))
         {
            $this->db->from('jobs as job');
           $this->db->like('job.job_title',$form['title']);
           $this->db->like('job.job_city',$form['location']);
           $this->db->like('job.job_experience',$form['exp']);
         $this->join_query();
        $this->db->where('job.job_status','1');
         
         $result=$this->db->get();
         return $result->result(); 
         }elseif(!empty($form['title']) && !empty($form['salary']) && !empty($form['exp']))
         {
            $this->db->from('jobs as job');
           $this->db->like('job.job_title',$form['title']);
           $this->db->like('job.job_salary',$form['exp']);
           $this->db->like('job.job_experience',$form['exp']);
         $this->join_query();
        $this->db->where('job.job_status','1');
         
         $result=$this->db->get();
         return $result->result(); 
         }
         elseif(!empty($form['title']) && !empty($form['location']))
         {
            $this->db->from('jobs as job');
           $this->db->like('job.job_title',$form['title']);
           $this->db->like('job.job_city',$form['location']);
          $this->join_query();
        $this->db->where('job.job_status','1');
         
         $result=$this->db->get();
         return $result->result(); 
         }elseif(!empty($form['title']) && !empty($form['salary'])){
              $this->db->from('jobs as job');
           $this->db->like('job.job_title',$form['title']);
           $this->db->like('job.job_salary',$form['salary']);
           $this->join_query();
        $this->db->where('job.job_status','1');         
         $result=$this->db->get();
         return $result->result(); 
         }elseif(!empty($form['title']) && !empty($form['exp'])){
              $this->db->from('jobs as job');
           $this->db->like('job.job_title',$form['title']);
           $this->db->like('job.job_experience',$form['exp']);
           $this->join_query();
        $this->db->where('job.job_status','1');
         
         $result=$this->db->get();
         return $result->result(); 
         }
         elseif(!empty($form['title'])){
              $this->db->from('jobs as job');
           $this->db->like('job.job_title',$form['title']);
         $this->join_query();
        $this->db->where('job.job_status','1');
         
         $result=$this->db->get();
         return $result->result(); 
         }elseif(!empty($form['location'])){
              $this->db->from('jobs as job');
           $this->db->like('job.job_city',$form['location']);       
           $this->join_query();
        $this->db->where('job.job_status','1');
         
         $result=$this->db->get();
         return $result->result(); 
         }
          
     }
     
     function join_query()
     {
         $this->db->join('recruiters as rec','rec.recruiter_id=job.recruiter_id','LEFT');
        $this->db->join('companies as comp','comp.company_id=job.company_id','LEFT');
     }
     
     public function test()
     {
         $first=$this->db->where('recruiter_id',1)->get('recruiters')->result();
         print_r($first);
         echo "<br><br>";
         $second=$this->db->where('recruiter_id',1)->get('recruiters')->result();
         print_r($second);
         echo "<br><br>";
         
         print_r( array_merge((array) $first, (array) $second));

     }
     
    
     
     function job_info($id)
     {
         $this->db->from('jobs as job');
          $this->db->join('companies as comp','comp.company_id=job.company_id','LEFT');
         $this->db->where('job.job_id',$id);
         $query=$this->db->get();
         return $query->row();
         
         
     }
     
     
     function get_recent_job()
     {
         $this->db->from('jobs as job');
          $this->db->order_by('job_id','desc');
          $this->db->limit('5');
         $this->db->join('recruiters as rec','rec.recruiter_id=job.recruiter_id','LEFT');
        $this->db->join('companies as comp','comp.company_id=job.company_id','LEFT');
        $this->db->where('job.job_status','1');
        $res=$this->db->get();
       
         return $res->result();
     }

      public function delete_by_recruiter_id($id)
     {
         $this->db->from($this->table);
         $this->db->where('recruiter_id',$id);
         $this->db->delete();
         return $this->db->affected_rows();
     }
     
     public function delete_by_company_id($id)
     {
         $this->db->from($this->table);
         $this->db->where('company_id',$id);
         $this->db->delete();
         return $this->db->affected_rows();
     }

     
     

   
}

  