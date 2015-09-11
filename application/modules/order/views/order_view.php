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
            <table class="tg">
                <tr>
                  <th class="tg-0ord">Size:</th>
                  <th class="tg-031e">
                    <select name="size">
                        <option value="none" <?php echo  set_select('size', 'none', TRUE); ?> >----Select size----</option>
                        <option value="1" <?php echo  set_select('size', '1'); ?> >Small (4 inches)</option>
                        <option value="2" <?php echo  set_select('size', '2'); ?> >Medium (6 inches)</option>
                        <option value="3" <?php echo  set_select('size', '3'); ?> >Large(8 inches)</option>
                        
                    </select>
                    <?php echo form_error('size'); ?>
                  </th>
                </tr>
                <tr>
                  <td class="tg-0ord">Crust:</td>
                  <td class="tg-031e">
                    <select name="crust">
                        <option value="none" <?php echo  set_select('crust', 'none', TRUE); ?> >----Select crust----</option>
                        <?php
                            foreach ($crust->result() as $row){
                                echo "<option value=\"".$row->id."\" ";
                                echo  set_select('crust', $row->id);
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
                    <select name="sauce">
                        <option value="none" <?php echo  set_select('sauce', 'none', TRUE); ?> >----Select type of sauce----</option>
                        <?php
                            foreach ($sauce->result() as $row){
                                echo "<option value=\"".$row->id."\" ";
                                echo  set_select('sauce', $row->id);
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
                    <select name="cheese">
                        <option value="none" <?php echo  set_select('cheese', 'none', TRUE); ?> >----Select type of cheese----</option>
                        <?php
                            foreach ($cheese->result() as $row){
                                echo "<option value=\"".$row->id."\" ";
                                echo  set_select('cheese', $row->id);
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
                    <select name="toppings[]" multiple="multiple">
                        <?php
                            foreach ($toppings->result() as $row){
                                echo "<option value=\"".$row->id."\" ";
                                echo  set_select('toppings', $row->id);
                                echo ">".$row->name."</option>";
                            }
                        ?>
                    </select>
                    <?php echo form_error('toppings'); ?>
                 </td>
                </tr>
                <tr>
                  <td class="tg-0ord"></td>
                  <td class="tg-031e"> <?php echo form_submit('submit','Proceed')?></td>
                </tr>
            </table>
        </div>
   </div>
   <?php echo form_close(); ?>
   
 </body>
</html>