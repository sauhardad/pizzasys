<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
   <title>Payment</title>
   <link href="<?=base_url()?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
   <link href="<?=base_url()?>assets/css/payment_view.css" rel="stylesheet" type="text/css">
       
       
   <script src="<?=base_url()?>assets/js/jquery.min.js"></script>    
   <script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>    
 </head>
 <body>
   
   <?php echo form_open('payment/payment_type');?>
   <div id="payment_content" >
        <div id="form_content" >
            <table class="tg">
                <tr>
                  <th class="tg-0ord">Payment Amount:</th>
                  <th class="tg-031e">
                    <input type="text" name="payment_amount" value="$20.99" disabled="disabled">
                  </th>
                </tr>
                <tr>
                  <td class="tg-0ord">Payment Method:</td>
                  <td class="tg-031e">
                    <input type="radio" name="payment_method" value="debit_card" <?=set_radio('payment_method', 'debit_card')?> >Debit Card <br> 
                    <input type="radio" name="payment_method" value="credit_card" <?=set_radio('payment_method', 'credit_card')?> >Credit Card <br>
                    <input type="radio" name="payment_method" value="bank_account" <?=set_radio('payment_method', 'bank_account')?> >Checking/Savings Account
                    <?php echo form_error('payment_method'); ?>
                  </td>                  
                </tr>
                <tr>
                  <td class="tg-0ord"></td>
                  <td class="tg-031e"> <?php echo form_submit('submit','Make Payment')?></td>
                </tr>
            </table>
        </div>
   </div>
   <?php echo form_close(); ?>
   
 </body>
</html>