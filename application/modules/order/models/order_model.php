<?php

class Order_Model extends CI_Model{
    
    function get_crust_data(){
        return $this->db->query('select * from tbl_crust');
    }
    function get_crust_name($id){
        $this->db->select('name');
        $this->db->from('tbl_crust');
        $this->db->where('id', $id);
        $this->db->limit(1);
        
        $query = $this->db->get();
        $crust = $query->row();

        if($query->num_rows() == 1){
            return $crust->name;
        }else{
            return "unknown";
        }
    }
    
    function get_sauce_data(){
        return $this->db->query('select * from tbl_sauce');
    }
    function get_sauce_name($id){
        $this->db->select('name');
        $this->db->from('tbl_sauce');
        $this->db->where('id', $id);
        $this->db->limit(1);
        
        $query = $this->db->get();
        $crust = $query->row();

        if($query->num_rows() == 1){
            return $crust->name;
        }else{
            return "unknown";
        }
    }
    
    function get_cheese_data(){
        return $this->db->query('select * from tbl_cheese');
    }
    function get_cheese_name($id){
        $this->db->select('name');
        $this->db->from('tbl_cheese');
        $this->db->where('id', $id);
        $this->db->limit(1);
        
        $query = $this->db->get();
        $crust = $query->row();

        if($query->num_rows() == 1){
            return $crust->name;
        }else{
            return "unknown";
        }
    }
    
    function get_toppings_data(){
        return $this->db->query('select * from tbl_toppings');
    }
    function get_toppings_name($id){
        $this->db->select('name');
        $this->db->from('tbl_toppings');
        $this->db->where('id', $id);
        $this->db->limit(1);
        
        $query = $this->db->get();
        $crust = $query->row();

        if($query->num_rows() == 1){
            return $crust->name;
        }else{
            return "unknown";
        }
    }
}


?>
