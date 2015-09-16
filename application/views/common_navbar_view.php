<div>
    <div class="row">
        <div class="col-md-1">
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
                                     <a href="#cancel_account_modal" data-toggle="modal" class="animate">
                                             <span class="desc animate"> Cancel Account </span>
                                             <span class="glyphicon glyphicon-remove"></span>
                                     </a>
                             </li>
                             <li>
                                     <a href="<?php echo base_url('user/logout');?>" class="animate">
                                             <span class="desc animate"> Logout </span>
                                             <span class="glyphicon glyphicon-off"></span>
                                     </a>
                             </li>
                     </ul>
             </nav>
        </div>
        <div class="col-md-1" style="margin:1%">
            <button class="btn btn-primary" onclick="window.location='<?php echo base_url('order'); ?>';">Order Pizza</button>
        </div>
        
    </div>     
</div>