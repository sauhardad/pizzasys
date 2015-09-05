<?php

Class User_model extends CI_Model
{
 function verify($email, $password)
 {
   $this -> db -> select('id, email, password');
   $this -> db -> from('tbl_users');
   $this -> db -> where('email', $email);
   $this -> db -> limit(1);
 
   $query = $this -> db -> get();
 
   $user=$query->row();
   if($query -> num_rows() == 1 && $this->bcrypt->check_password($password, $user->password))
   {
     //update the last login flag to display the time of login  
     $this->db->where('id',$user->id);
     $this->db->set('last_login', 'NOW()', FALSE);  
     $this->db->update('tbl_users');   
     
     return $user;
   }
   else
   {
     return false;
   }
 }
 
 function change_password($email,$new_password)
 {
     $this->db->where('email', $email);
     return $this->db->update("tbl_users",array('password'=>$this->bcrypt->hash_password($new_password)));
 }
 
 function check_if_username_exists($email)
 {
     $this->db->where('email',$email);
     $this->db->from('tbl_users');
     return $this->db->count_all_results()? TRUE:FALSE;
 }
 
 function get_users_except($user_id)
 {
     $this->db->where('id !=',$user_id);
     $this->db->where('role >',1);
     $query = $this -> db -> get('users');
     $result=$query->result();
     return $result;
 }
}
?>