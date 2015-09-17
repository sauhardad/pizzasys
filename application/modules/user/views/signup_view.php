<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
   <title></title>
   <link href="<?=base_url()?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
   <link href="<?=base_url()?>assets/css/login_view.css" rel="stylesheet" type="text/css">
       
       
   <script src="<?=base_url()?>assets/js/jquery.min.js"></script>    
   <script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>    
 </head>
 <body>
   <section id="login">
    <div class="container">
    	<div class="row">
    	    <div class="col-xs-12">
        	    <div class="form-wrap">
                    <div>
                        <img src="<?php echo base_url(); ?>assets/img/logo.png"/>
                    </div>
                    <br/>
                    <?php echo form_open('user/add_user'); ?>
                        <div class="form-group">
                            <label for="name" class="sr-only">Name:</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Name" value="<?php echo set_value('name'); ?>">
                        </div>
                        <div class="form-group">
                            <label for="address" class="sr-only">Address:</label>
                            <input type="text" name="address" id="address" class="form-control" placeholder="Address" value="<?php echo set_value('address'); ?>">
                        </div>
                        <div class="form-group">
                            <label for="contact_no" class="sr-only">Phone Number:</label>
                            <input type="text" name="contact_no" id="contact_no" class="form-control" placeholder="Phone Number" value="<?php echo set_value('contact_no'); ?>">
                        </div>
                        <div class="form-group">
                            <label for="security_question" class="sr-only">Security Question:</label>
                            <input type="text" name="security_question" id="security_question" class="form-control" placeholder="Security Question" value="<?php echo set_value('security_question'); ?>">
                        </div>
                        <div class="form-group">
                            <label for="security_answer" class="sr-only">Security Answer:</label>
                            <input type="password" name="security_answer" id="security_answer" class="form-control" placeholder="Security Answer" value="<?php echo set_value('security_answer'); ?>">
                        </div>
                        <div class="form-group">
                            <label for="email" class="sr-only">Email:</label>
                            <input type="text" name="email" id="email" class="form-control" placeholder="Email" value="<?php echo set_value('email'); ?>">
                        </div>
                        <div class="form-group">
                            <label for="password" class="sr-only">Password:</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Password" value="<?php echo set_value('password'); ?>">
                        </div>
                        <div class="form-group">
                            <label for="confirm_password" class="sr-only">Confirm Password:</label>
                            <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirm Password" value="<?php echo set_value('confirm_password'); ?>">
                        </div>
                        <?php if(validation_errors() != false) { ?> 
                            <div class="alert alert-danger"> 
                                <?php echo validation_errors(); ?>
                            </div>
                        <?php } ?>    
                      <input type="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Sign up">
                    </form>
                    
                    <hr>
        	    </div>
    		</div> <!-- /.col-xs-12 -->
    	</div> <!-- /.row -->
    </div> <!-- /.container -->
    </section>
    
    <footer id="footer">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <p>&copy;  <?php echo date("Y") ?></p>
                
            </div>
        </div>
    </div> 
 </body>
</html>