<div class="modal fade" id="password_modal" tabindex="-1" role="dialog" >
    <div class="modal-dialog">
        <div class="modal-content modal-content-bg">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            
             <div class="row">
                <div class="col-md-offset-4 col-md-4">
                    <div class="form-login">
                        <form id="frm_change_password" method="post" action="<?=base_url('user/change_password')?>">
                            <h4>Change Password</h4>
                            <input type="password" id="current_password" name="current_password" class="form-control input-sm chat-input" placeholder="Old Password" />
                            </br>
                            <input type="password" id="new_password" name="new_password" class="form-control input-sm chat-input" placeholder="New Password" />
                            </br>
                            <input type="password" id="confirm_password" name="confirm_password" class="form-control input-sm chat-input" placeholder="Confirm Password" />
                            </br>
                            <div class="wrapper">
                                <span class="group-btn">     
                                    <input type="submit" id="change_password" class="btn btn-primary btn-md" value="Change"/>
                                </span>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="cancel_account_modal" tabindex="-1" role="dialog" >
    <div class="modal-dialog">
        <div class="modal-content modal-content-bg">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            
             <div class="row">
                <div class="col-md-offset-4 col-md-4">
                    <div class="form-login">
                        <form id="frm_cancel_account" method="post" action="<?=base_url('user/delete_user')?>">
                            <h4>Are you sure you want to cancel??</h4>
                            <input type="password" id="cancel_password1" name="cancel_password1" class="form-control input-sm chat-input" placeholder="Password" />
                            </br>
                            <input type="password" id="cancel_password2" name="cancel_password2" class="form-control input-sm chat-input" placeholder="Confirm Password" />
                            </br>
                            <div class="wrapper">
                                <span class="group-btn">     
                                    <input type="submit" id="cancel_account" class="btn btn-danger btn-md" value="Go Ahead"/>
                                </span>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>