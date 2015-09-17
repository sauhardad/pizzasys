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
   
   <?php echo form_open('payment/bank_payment');?>
   <div id="payment_content" >
        <div id="form_content" >
            <table class="table">
                <tr>
                  <th class="tg-0ord">Payment Amount:</th>
                  <th class="tg-031e">
                    <input class="form-control width-auto" type="text" name="payment_amount" value="$20.99" disabled="disabled" class="form-control">
                  </th>
                </tr>
                <tr>
                  <td class="tg-0ord">Select Account:</td>
                  <td class="tg-031e">
                    <input type="radio" name="account_type" value="Checking" <?=set_radio('account_type', 'Checking')?> >Checking <br> 
                    <input type="radio" name="account_type" value="Savings" <?=set_radio('account_type', 'Savings')?> >Savings<br>
                    <?php echo form_error('account_type'); ?>
                  </td>                  
                </tr>
                <tr>
                  <td class="tg-0ord">Routing Number:</td>
                  <td class="tg-031e">
                    <input class="form-control width-auto" type="text"  class="form-control" name="routing_number" value="<?php echo set_value('routing_number'); ?>">
                    <?php echo form_error('routing_number'); ?>
                  </td>                  
                </tr>
                <tr>
                  <td class="tg-0ord">Account Number:</td>
                  <td class="tg-031e">
                    <input class="form-control width-auto" type="text" name="account_number"  class="form-control" value="<?php echo set_value('account_number'); ?>">
                    <?php echo form_error('account_number'); ?>
                  </td>                  
                </tr>
                <tr>
                  <td class="tg-0ord"></td>
                  <td class="tg-031e"> <?php echo form_submit('submit','Confirm', "class='btn btn-primary'")?></td>
                </tr>
            </table>
        </div>
   </div>
   <?php echo form_close(); ?>
   
 </body>
</html>