<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
   <title>Confirm order</title>
   <link href="<?=base_url()?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
   <link href="<?=base_url()?>assets/css/order_confirm_view.css" rel="stylesheet" type="text/css">
       
       
   <script src="<?=base_url()?>assets/js/jquery.min.js"></script>    
   <script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>    
 </head>
 <body>
   
   <?php echo form_open('order/confirm_order');?>
   <div id="order_confirm_content" >
        <div id="form_content" >
            <table class="tg">
                <tr>
                  <th class="tg-0ord">Size:</th>
                  <th class="tg-031e"> <?php echo $size; ?> <label class="label_hide" id='size_val'><?php echo $data_values['size_val']?></label> </th>
                </tr>
                <tr>
                  <td class="tg-0ord">Crust:</td>
                  <td class="tg-031e"> <?php echo $crust; ?> <label class="label_hide"  id='size_val'><?php echo $data_values['crust_val']?></label> </td>
                </tr>
                <tr>
                  <td class="tg-0ord">Sauce:</td>
                  <td class="tg-031e"> <?php echo $sauce; ?> <label class="label_hide"  id='size_val'><?php echo $data_values['sauce_val']?></label> </td>
                </tr>
                <tr>
                  <td class="tg-0ord">Cheese:</td>
                  <td class="tg-031e"> <?php echo $cheese; ?> <label class="label_hide"  id='size_val'><?php echo $data_values['cheese_val']?></label> </td>
                </tr>
                <tr>
                  <td class="tg-0ord"></td>
                  <td class="tg-031e">Your selected toppings: <br>
                    <?php
                        foreach($toppings as $value){
                            echo $value."<br>";
                        }
                        $val = "";
                        for($i = 0; $i < count($data_values['toppings_arr_val']); $i++){
                           if($i > 0)$val .= ",";
                           $val .= $data_values['toppings_arr_val'][$i];
                        }
                    ?>
                    <label class="label_hide" id='size_val'><?php echo $val; ?></label>
                 </td>
                </tr>
                <tr>
                  <td class="tg-0ord"></td>
                  <td class="tg-031e"> <?php echo form_submit('submit','Confirm')?> <?php echo form_submit('submit','Edit Order2')?> <button onclick="edit_order()">Edit Order</button> <?php echo form_submit('submit','Cancel Order')?></td>
                       <script>
                          function edit_order() {
                              window.history.back();
                          }
                       </script>
                </tr>
            </table>
        </div>
   </div>
   <?php echo form_close(); ?>
   
 </body>
</html>