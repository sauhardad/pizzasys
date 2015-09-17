    
<!--load the view that contains header common to the home page -->
<?php echo $this->load->view('common_header_view'); ?>    
    
    <div>
        <nav class="navbar navbar-default">
          <div class="container-fluid">
            <div class="navbar-header">
            </div>  
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav navbar-right">
                <li><a href="<?php echo base_url('order'); ?>">Order</a></li>  
                <li><a href="<?php echo base_url('user/login'); ?>">Login</a></li>
                <li><a href="<?php echo base_url('user/signup'); ?>">Signup</a></li>
              </ul>
            </div>
          </div>
        </nav>
    </div>       
    <div class="row">
        <div class="col-md-4">
            <a class="navbar-brand" href="#">
                <img src="<?php echo base_url(); ?>assets/img/logo.png"/>
            </a>
        </div>
        <div id="myCarousel" class="carousel slide col-md-8 offset4" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
              <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
              <li data-target="#myCarousel" data-slide-to="1"></li>
              <li data-target="#myCarousel" data-slide-to="2"></li>
              <li data-target="#myCarousel" data-slide-to="3"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
              <div class="item active">
                <img src="<?php echo base_url('assets/img/slider_01.jpg'); ?>">
              </div>

              <div class="item">
                <img src="<?php echo base_url('assets/img/slider_02.jpg'); ?>">
              </div>

              <div class="item">
                <img src="<?php echo base_url('assets/img/slider_03.jpg'); ?>">
              </div>

              <div class="item">
                <img src="<?php echo base_url('assets/img/slider_04.jpg'); ?>">
              </div>
            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
        </div>
    </div>