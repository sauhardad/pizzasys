<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
   <title>Payment</title>
   <link href="<?=base_url()?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
   <link href="<?=base_url()?>assets/css/payment_view.css" rel="stylesheet" type="text/css">
   <link href="<?=base_url()?>assets/css/home_view.css" rel="stylesheet" type="text/css">    
       
       
   <script src="<?=base_url()?>assets/js/jquery.min.js"></script>    
   <script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>    
 </head>
 <body>
   
   <?php echo form_open('payment/card_payment');?>
   <div id="payment_content">
        <div id="form_content">
            <table class="table">
                <tr>
                  <th class="tg-0ord">Payment Amount:</th>
                  <th class="tg-031e">
                    <input class="form-control width-auto" type="text" name="payment_amount" value="$20.99" disabled="disabled">
                  </th>
                </tr>
                <tr>
                  <td class="tg-0ord">Card Type:</td>
                  <td class="tg-031e">
                    <select class="form-control width-auto" name="card_type">
                        <option value="none" <?php echo  set_select('card_type', 'none', TRUE); ?> >Select Card Type</option>
                        <option value="visa" <?php echo  set_select('card_type', 'visa'); ?> >Visa Card</option>
                        <option value="master" <?php echo  set_select('card_type', 'master'); ?> >Master Card</option>
                    </select>
                    <?php echo form_error('card_type'); ?>
                  </td>                  
                </tr>
                <tr>
                  <td class="tg-0ord">Card Number:</td>
                  <td class="tg-031e">
                    <input type="text" name="card_number" class="form-control width-auto" value="<?php echo  set_value('card_number'); ?>" >
                    <?php echo form_error('card_number'); ?>
                  </td>                  
                </tr>
                <tr>
                  <td class="tg-0ord">Card PIN:</td>
                  <td class="tg-031e">
                    <input type="password" name="card_pin" class="form-control width-auto" value="<?php echo  set_value('card_pin'); ?>">
                    <?php echo form_error('card_pin'); ?>
                  </td>                  
                </tr>
                <tr>
                  <td class="tg-0ord">Expires On:</td>
                  <td class="tg-031e">
                    <select name="expire_month" class="form-control width-auto" style="float:left;">
                        <?php
                            $month_list = array("01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12");
                        ?>
                        <?php
                            foreach ($month_list as $row){
                                echo "<option value=\"".$row."\" ";
                                echo  set_select('expire_month', $row);
                                echo ">".$row."</option>";
                            }
                        ?>
                    </select> 
                    <select name="expire_year" class="form-control width-auto" style="float:left;">
                        <?php
                            $year_list = array("2015", "2016", "2017", "2018", "2019", "2020", "2021", "2022", "2023", "2024", "2025", "2026");
                        ?>
                        <?php
                            foreach ($year_list as $row){
                                echo "<option value=\"".$row."\" ";
                                echo  set_select('expire_year', $row);
                                echo ">".$row."</option>";
                            }
                        ?>
                    </select>
                    <?php echo form_error('expire_year'); ?>
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