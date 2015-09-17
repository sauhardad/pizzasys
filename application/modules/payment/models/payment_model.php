<?php

class Payment_Model extends CI_Model{
    
    function insert_order($data_values){
        $query_string = "INSERT INTO tbl_order(size, crush, sauce, cheese, topping, order_time) VALUES(";
        $query_string .= $data_values['size_val'].",";
        $query_string .= $data_values['crust_val'].",";
        $query_string .= $data_values['sauce_val'].",";
        $query_string .= $data_values['cheese_val'].",";
        
        $query_string .= "'";
        foreach($data_values['toppings_arr_val'] as $val)
            $query_string .= $val;
        $query_string .= "',";
        $query_string .= "CURRENT_TIMESTAMP());";
        
        return $this->db->query($query_string);
    }
}


?>
