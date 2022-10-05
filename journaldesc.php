<!DOCTYPE html>
<html lang="zxx">

<head>
    <?php include("common/gatagcode.php");?>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Asteroid Publishers | Template</title>

   <?php include("common/cssfiles.php");?>
<style>
 .list-group {
     margin:auto;
	 content: '';
    background-color: #fff;
    border-radius: 20px;
    box-shadow: 0 0 10px rgb(0 0 0 / 10%);
    left: 0;
    right: 0;
    top: 20px;
    bottom: 0;
    }
    .lead {
     margin:auto;
     left:0;
     right:0;
     padding-top:10%;
    }
    </style>


</head>

<body>
  <?php include("common/top-header.php");?>	

    <!-- Header Section End -->

    <!-- Hero Section Begin -->
    <section class="hero hero-normal">
        <div class="container">
            <div class="row">
                
                
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" >
        <img src="img/banner.jpg" class="img-responsive innerbanner" alt="About Us - Asteroid Publishers" title="About Us - Asteroid Publishers">
    </section>
    <!-- Breadcrumb Section End -->

    <section class="blog spad1">
        <div class="container">
						<h2 class="headtitle" title="About Us"> About Us  </h2>
<div class="col-lg-12 col-md-12 col-sm-12">
<div class="col-lg-3 col-md-3 col-sm-3">
 <div class="list-group">
    <a href="#" class="list-group-item active"><i class="fa fa-key"></i> <span>App Settings</span></a>
    <a href="#" class="list-group-item"><i class="fa fa-credit-card"></i> <span>Billing</span></a>
    <a href="#" class="list-group-item"><i class="fa fa-question-circle"></i> <span>Support</span></a>
    <a href="#" class="list-group-item"><i class="fa fa-arrow-circle-o-left"></i> <span>Sandbox Account</span></a>
    <a href="#" class="list-group-item"><i class="fa fa-book"></i> <span>QuickStart Overview</span></a>
    <a href="#" class="list-group-item"><i class="fa fa-compass"></i> <span>Documentation</span></a>
  </div>
  </div>
  <div class="col-lg-9 col-md-9 col-md-9">
  
  
  </div>
  </div>
                </div>
            </div>
        </div>
    </section>
<script type="text/javascript">
$(document).ready(function() {
  

  $('.list-group-item').click(function(e) {
    e.preventDefault();
    $('.list-group-item').removeClass('active');
    $(this).addClass('active');
  });
});
</script>
     <!-- Latest Product Section End -->
<?php include("common/footer.php");?>
    <!-- Footer Section End -->
 <?php include("common/jsfiles.php");?>  
</body>
</html>