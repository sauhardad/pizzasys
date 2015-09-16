<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
   <title>order</title>
   <link href="<?=base_url()?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
   <link href="<?=base_url()?>assets/css/order_view.css" rel="stylesheet" type="text/css">
       
       
   <script src="<?=base_url()?>assets/js/jquery.min.js"></script>    
   <script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>    
 </head>
 <body>
   
   <?php echo form_open('order/order_validation');?>
   <div id="order_content" >
        <div id="form_content" >
            <table class="table">
                <tr>
                  <th class="tg-0ord">Size:</th>
                  <th class="tg-031e">
                   <?php
                       $options = array(
                        1 => "Small (4 inches)",
                        2 => "Medium (6 inches)",
                        3 => "Large(8 inches)"
                        );
                   ?>
                    <select name="size" class="form-control">
                        <option value="none" <?php echo  set_select('size', 'none', TRUE); ?> >----Select size----</option>
                        <?php
                            $cur_size = $this->session->userdata('data_values')['size_val'];
                            foreach ($options as $k => $v){
                                echo "<option value=\"".$k."\" ";
                                if($k == $cur_size)echo  set_select('size', $k, TRUE);
                                else echo  set_select('size', $k);
                                echo ">".$v."</option>";
                            }
                        ?>                        
                    </select>
                    <?php echo form_error('size'); ?>
                  </th>
                </tr>
                <tr>
                  <td class="tg-0ord">Crust:</td>
                  <td class="tg-031e">
                    <select name="crust" class="form-control">
                        <option value="none" <?php echo  set_select('crust', 'none', TRUE); ?> >----Select crust----</option>
                        <?php
                            $cur_crust = $this->session->userdata('data_values')['crust_val'];
                            foreach ($crust->result() as $row){
                                echo "<option value=\"".$row->id."\" ";
                                if($row->id == $cur_crust)echo  set_select('crust', $row->id, TRUE);
                                else echo  set_select('crust', $row->id);
                                echo ">".$row->name."</option>";
                            }
                        ?>
                    </select>
                    <?php echo form_error('crust'); ?>
                  </td>
                </tr>
                <tr>
                  <td class="tg-0ord">Sauce:</td>
                  <td class="tg-031e">
                    <select name="sauce" class="form-control">
                        <option value="none" <?php echo  set_select('sauce', 'none', TRUE); ?> >----Select type of sauce----</option>
                        <?php
                            $cur_sauce = $this->session->userdata('data_values')['sauce_val'];
                            foreach ($sauce->result() as $row){
                                echo "<option value=\"".$row->id."\" ";
                                if($row->id == $cur_sauce)echo  set_select('sauce', $row->id, TRUE);
                                else echo  set_select('sauce', $row->id);
                                echo ">".$row->name."</option>";
                            }
                        ?>
                    </select>
                    <?php echo form_error('sauce'); ?>
                  </td>
                </tr>
                <tr>
                  <td class="tg-0ord">Cheese:</td>
                  <td class="tg-031e">
                    <select name="cheese" class="form-control">
                        <option value="none" <?php echo  set_select('cheese', 'none', TRUE); ?> >----Select type of cheese----</option>
                        <?php
                            $cur_cheese = $this->session->userdata('data_values')['cheese_val'];
                            foreach ($cheese->result() as $row){
                                echo "<option value=\"".$row->id."\" ";
                                if($row->id == $cur_cheese)echo  set_select('cheese', $row->id, TRUE);
                                else echo  set_select('cheese', $row->id);
                                echo ">".$row->name."</option>";
                            }
                        ?>
                    </select>
                    <?php echo form_error('cheese'); ?>
                  </td>
                </tr>
                <tr>
                  <td class="tg-0ord"></td>
                  <td class="tg-031e">Select toppings (You can select multiple): <br>
                    <select name="toppings[]" multiple="multiple" class="form-control">
                        <?php
                            $cur_toppings = $this->session->userdata('data_values')['toppings_arr_val'];
                            foreach ($toppings->result() as $row){
                                echo "<option value=\"".$row->id."\" ";
                                $flag = FALSE;
                                if(isset($cur_toppings))
                                {
                                    foreach($cur_toppings as $val){
                                        if($val == $row->id){
                                            $flag = TRUE;
                                            break;
                                        }
                                    }
                                }
                                if($flag)echo  set_select('toppings', $row->id, TRUE);
                                else echo  set_select('toppings', $row->id);
                                echo ">".$row->name."</option>";
                            }
                        ?>
                    </select>
                    <?php echo form_error('toppings'); ?>
                 </td>
                </tr>
                <tr>
                  <td class="tg-0ord"></td>
                  <td class="tg-031e"> <?php echo form_submit('submit','Proceed','class="btn btn-primary"')?></td>
                </tr>
            </table>
        </div>
   </div>
   <?php echo form_close(); ?>
   
 </body>
</html>