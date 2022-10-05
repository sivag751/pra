<?php 
include('asteroid-admin/includes/connection.php');
 
if(isset($_REQUEST['status'])){
	 $status=$_REQUEST['status'];
	 }
	 else
	 {
	 $status="";
	 }
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<title> Contact us for Asteroid Publishing Articles </title>
<meta name="desciption" content="Please contact us to know more about our journals and Conferences." />
<meta name="keywords" content="contact Asteroid Publishers, Journals, Conferences." />

<?php include("common/cssfiles.php");?>
<style>
.table td, .table th {
    padding: 0.75rem;
    vertical-align: top;
    border-top: 1px solid #dee2e6;
	text-align:center;
}
</style>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-YK1C15HXLV"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-YK1C15HXLV');
</script>

</head>
<body>
  <?php include("common/top-header.php");?>	
    <!-- Hero Section Begin -->
    <section class="hero hero-normal">
        <div class="container">
            <div class="row">
                
                
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Breadcrumb Section Begin -->
 <!--   <section class="breadcrumb-section set-bg" >
        <img src="img/banner.jpg" class="img-responsive innerbanner" alt="Contact Us" title="Contact Us"> 
    </section> -->
    <!-- Breadcrumb Section End -->

    <section class="blog spad1">
	        <div class="container">
        <div class="innercontent">
					   <h3 title="Contact Us"> Contact Us </h3>
<section class="contact py-5 bg-light" id="contact">
<div class="container">
	<div class="row">
	    <div class="col-md-12">
	        <h4 style="font-size:26px;">Get in touch</h4>
		    <hr>
	    </div>
		<div class="col-md-7">
		<div class="col-lg-12 row">
				<div class="col-md-7">
		    <div class="address">
		   <h5 style="font-weight:600;">Australia Address:</h5>
		    <ul class="list-unstyled">
		       <p>Asteroid Publishers PTY LTD (Head Office)<br/>
ACN 640652535 Saratoga Crescent<br/>
Kellor Downs VIC 3038, Australia. </p>
		    </ul>
		    </div>
			 <div class="email">
		    <h5 style="font-weight:600;">Email:</h5>
		    <ul class="list-unstyled">
		        <li> contact@asteroidpublishers.org</li>
		    </ul>
		    </div>
		    <div class="phone" style="margin-top:10px;">
		        <h5 style="font-weight:600;">Phone No:</h5>
		        <ul class="list-unstyled">
		        <li> (+61) 383762664</li>
		    </ul>
		    </div>
			</div>
		<!--	<div class="col-md-5" style="padding-right:0px;">
		    <div class="address">
		   <h5 style="font-weight:600;">India Address:</h5>
		    <ul class="list-unstyled">
		       <p> Asteroid Publishers (Branch Office) <br/>Ramky Building, Gulmohar Avenue,<br/>
Raj Bhavan Rd, Somajiguda,<br/>
Hyderabad, Telangana 500082.<br/></p>
		    </ul>
		    </div>
			 <div class="phone" style="margin-top:10px;">
		        <h5 style="font-weight:600;">Phone No:</h5>
		        <ul class="list-unstyled">
		        <li> +91 9666699715 </li>
		    </ul>
		    </div>
			</div> -->
			
			
			</div>
		   
		    <hr>
		   
		</div>
		<div class="col-md-5">
		    <div class="card">
		        <div class="card-body">
<?php 
				  if($status=="success"){ ?> 
                     <h4 align="center" style="color:#549128;text-align:center;font-weight:bold;font-size:20px;margin-bottom:10px;"> Successfully Added Your Query</h4>
  
                  <?php }  if($status=="error"){?>
                     <h4 align="center" style="color:#FF0000;font-weight:bold;margin-bottom:10px;"> You Have Invalid Data.</h4>
                  <?php } ?>  
                  <form class="shake" role="form" method="post" action="contactinsert.php" id="contactForm" name="contact-form" data-toggle="validator">                        <div class="form-row">
                            <div class="form-group col-md-12">
                              <input id="name" name="name" placeholder="Full Name" class="form-control" type="text">
                            </div>
                            <div class="form-group col-md-12">
                              <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                            </div>
                          </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <input id="subject" name="subject" placeholder="Subject" class="form-control" required="required" type="text">
                            </div>
                          
                            <div class="form-group col-md-12">
                            <textarea id="message" name="message" cols="40" rows="5" placeholder="Your Message"class="form-control"></textarea>
                            </div>
                        </div>
                        
                        <div class="form-row">
                          <button class="btn btn-common btn-primary" type="submit" id="submit" name="submit"><i class="material-icons mdi mdi-message-outline"></i> Send Message</button>
                        </div>
                    </form>
		        </div>
		    </div>
		</div>
	</div>
	
	
</div>
</section>
  
					</div>
					</div>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->

     <!-- Latest Product Section End -->
<?php include("common/footer.php");?>
    <!-- Footer Section End -->
 <?php include("common/jsfiles.php");?>  
</body>
</html>