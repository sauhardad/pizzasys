<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
   <title></title>
   <link href="<?=base_url()?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
   <link href="<?=base_url()?>assets/css/login_view.css" rel="stylesheet" type="text/css">
       
   <script>var base_url='<?php echo base_url(); ?>';</script>    
   <script src="<?=base_url()?>assets/js/jquery.min.js"></script>    
   <script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>    
   <script src="<?=base_url()?>assets/js/home_view.js"></script>    
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
                    <?php echo form_open('user/verifylogin'); ?>
                      <div class="form-group">
                            <label for="email" class="sr-only">Email:</label>
                            <input type="text" name="email" id="email" class="form-control" placeholder="Email" value="<?php echo set_value('email'); ?>">
                        </div>
                        <div class="form-group">
                            <label for="password" class="sr-only">Password:</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Password" value="<?php echo set_value('password'); ?>">
                        </div>
                        <?php if(validation_errors() != false) { ?> 
                            <div class="alert alert-danger"> 
                                <?php echo validation_errors(); ?>
                            </div>
                        <?php } ?>    
                      <input type="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Log in">
                          <a href="#forgot_password_modal" data-toggle="modal" class="animate" class="btn forget">Forgot Password</a>
                    </form>
                    
                    <hr>
        	    </div>
    		</div> <!-- /.col-xs-12 -->
    	</div> <!-- /.row -->
    </div> <!-- /.container -->
    
    <div class="modal fade" id="forgot_password_modal" tabindex="-1" role="dialog" >
    <div class="modal-dialog">
        <div class="modal-content modal-content-bg">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <div class="modal-title">Please enter your email address for password recovery</div>
            </div>
             <div class="row" style="padding: 7%;">
                <div>
                    <div class="form-login">
                            <h4</h4>
                            <input type="text" id="recovery_email" name="recovery_email" class="form-control input-lg chat-input" placeholder="Email" />
                            </br>
                            <div class="wrapper">
                                <span class="group-btn">     
                                    <input type="button" class="btn btn-custom btn-md" value="Recover" onclick="getsecurityParams();"/>
                                </span>
                            </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
    
    <div class="modal fade" id="forgot_password_modal" tabindex="-1" role="dialog" >
    <div class="modal-dialog">
        <div class="modal-content modal-content-bg">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <div class="modal-title">Please enter your email address for password recovery</div>
            </div>
             <div class="row" style="padding: 7%;">
                <div>
                    <div class="form-login">
                        <form id="frm_forgot_password" method="post" action="<?=base_url('user/forgot_password')?>">
                            <h4</h4>
                            <input type="text" id="recovery_email" name="recovery_email" class="form-control input-lg chat-input" placeholder="Email" />
                            </br>
                            <div class="wrapper">
                                <span class="group-btn">     
                                    <input type="submit" id="recover_password" class="btn btn-custom btn-md" value="Recover"/>
                                </span>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>

    <div class="modal fade" id="security_question_modal" tabindex="-1" role="dialog" >
    <div class="modal-dialog">
        <div class="modal-content modal-content-bg">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <div class="modal-title">Please enter your answer</div>
            </div>
             <div class="row" style="padding: 7%;">
                <div>
                    <div class="form-login" style="padding:2%;">
                            <input type="text" id="security_question" name="security_question" style="margin:1%;" class="form-control input-lg chat-input" disabled/>
                            <input type="password" id="security_answer" name="security_answer" style="margin:1%;" class="form-control input-lg chat-input" placeholder="Answer" />
                            </br>
                            <div class="wrapper">
                                <span class="group-btn">     
                                    <input type="submit" id="recover_password" class="btn btn-custom btn-md" value="Recover" onclick="verifyAnswer();"/>
                                </span>
                            </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
    
    <div class="modal fade" id="temporary_password_modal" tabindex="-1" role="dialog" >
    <div class="modal-dialog">
        <div class="modal-content modal-content-bg">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <div class="modal-title">Temporary Password</div>
            </div>
             <div class="row" style="padding: 7%;">
                <div>
                    <div class="form-login" style="padding:2%;">
                            <label>Please use the temporary password to login and change your password within 24 hours</label>
                            <input type="text" id="temporary_password" style="margin:1%;" class="form-control input-lg chat-input" readonly/>
                            </br>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
    
    
    
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