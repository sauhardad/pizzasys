<!DOCTYPE html>
<html lang="en">
 <head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
  
   <title>Private Area</title>
   
   <link href="<?=base_url()?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
   <link href="<?=base_url()?>assets/css/bootstrap-select.min.css" rel="stylesheet" type="text/css">
   <link href="<?=base_url()?>assets/css/fileinput.min.css" rel="stylesheet" type="text/css">
   <link href="<?=base_url()?>assets/css/home_view.css" rel="stylesheet" type="text/css"> 
       
   <script src="<?=base_url()?>assets/js/jquery.min.js"></script>    
   <script src="<?=base_url()?>assets/js/jquery.validate.min.js"></script>    
   <script src="<?=base_url()?>assets/js/jquery.form.min.js"></script>    
   <script src="<?=base_url()?>assets/js/bootstrap.min.js"></script> 
   <script src="<?=base_url()?>assets/js/fileinput.min.js"></script> 
   <script src="<?=base_url()?>assets/js/bootstrap-select.min.js"></script> 
   <script src="<?=base_url()?>assets/js/home_view.js"></script>    
   
   <script>var base_url='<?php echo base_url(); ?>';</script>
   <script>var user_id='<?php echo $session_data['id']; ?>';</script>
   
   <!-- [if lt IE 9] -->
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <!-- [endif]-->

 </head>
 <body>
     <div>
       <nav class="navbar navbar-fixed-right navbar-minimal animate" role="navigation">
		<div class="navbar-toggler animate">
			<span class="menu-icon"></span>
		</div>
		<ul class="navbar-menu animate">
			<li>
				<a href="#password_modal" data-toggle="modal" class="animate">
					<span class="desc animate"> Change Password </span>
					<span class="glyphicon glyphicon-cog"></span>
				</a>
			</li>
			<li>
				<a href="<?php echo base_url('user/logout');?>" class="animate">
					<span class="desc animate"> Logout </span>
					<span class="glyphicon glyphicon-log-out"></span>
				</a>
			</li>
		</ul>
	</nav>
         
    </div>