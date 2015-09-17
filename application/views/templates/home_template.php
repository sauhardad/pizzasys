<!--load the view that contains header common to the home page -->
    <?php echo $this->load->view('common_header_view'); ?>    
    <?php echo $this->load->view('common_navbar_view'); ?>    
    
    <!-- START OF HTML FOR DEMO -->
    <div class="container">
        <?php echo $body; ?>
    </div>
    
    <!--load the views that contains footer common to the home page -->
    <span id="logged-in-as">Howdy <?php echo $session_data['email']; ?></span>
    <!--load the view that contains modals common to the home page -->
    <?php echo $this->load->view('common_modals_view'); ?>    
    <?php echo $this->load->view('common_footer_view'); ?>   