<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
   <title>Payment</title>
   <link href="<?=base_url()?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
   <link href="<?=base_url()?>assets/css/payment_view.css" rel="stylesheet" type="text/css">
   <link href="<?=base_url()?>assets/css/home_view.css" rel="stylesheet" type="text/css">    
       
       
   <script src="<?=base_url()?>assets/js/jquery.min.js"></script>    
   <script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
   <script src="<?=base_url()?>assets/js/plus_minus.js"></script>
 </head>
 <body>
   
   
   <div id="payment_content" >
        <?php echo form_open('payment/payment_type');?>
        <div id="form_content" >
            <table class="table">
                  <?php
                       $value = 6.99 + (2 * ($this->session->userdata('data_values')['size_val']) - 1);
                    ?>
                <tr>
                  <th class="tg-0ord">Quantity:</th>
                  <th class="tg-031e">
                    <input class="form-control width-auto" style="float:left;" type="text" id="quantity" value="1" size=3 style="text-align: center;" >
                    <div style="float:left;margin-left:2%;">
                        <img src="<?php echo base_url('assets/img/plus.png'); ?>" id="plus" class="plus_minus" onclick="plus_clicked('<?php echo $value; ?>')">
                        <img src="<?php echo base_url('assets/img/minus.png'); ?>" id="minus" class="plus_minus" onclick="minus_clicked('<?php echo $value; ?>')">
                    </div>            
                 </th>
                </tr>
                <tr>
                  <th class="tg-0ord">Payment Amount:</th>
                  <th class="tg-031e">
                    <input type="text" id="payment_amount" name="payment_amount" class="form-control width-auto" value="<?php echo "$".$value; ?>" readonly>
                  </th>
                </tr>
                <tr>
                  <td class="tg-0ord">Payment Method:</td>
                  <td class="tg-031e">
                    <div class="radio">
                        <input type="radio" name="payment_method" value="debit_card" <?=set_radio('payment_method', 'debit_card')?> >Debit Card <br> 
                    </div>     
                    <div class="radio">  
                        <input type="radio" name="payment_method" value="credit_card" <?=set_radio('payment_method', 'credit_card')?> >Credit Card <br>
                    </div>
                    <div class="radio">            
                        <input type="radio" name="payment_method" value="bank_account" <?=set_radio('payment_method', 'bank_account')?> >Checking/Savings Account
                    </div>        
                    <?php echo form_error('payment_method'); ?>
                  </td>                  
                </tr>
                <tr>
                  <td class="tg-0ord"></td>
                  <td class="tg-031e"> <?php echo form_submit('submit','Make Payment','class="btn btn-primary"')?></td>
                </tr>
            </table>
        </div>
        <?php echo form_close(); ?>
   </div>
   
   
 </body>
</html>