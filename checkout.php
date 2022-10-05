<?php 
include('asteroid-admin/includes/connection.php');
ob_start();
session_start();
require_once('config.php');
$insertid=$_SESSION['insert_id'];

 ?>
<!DOCTYPE html>
<html lang="zxx">
<head>
<title> Asteroid Publishers | Online Submission </title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="desciption" content="Asteroid Publishers, Online Submission" />
<meta name="keywords" content="Asteroid Publishers, Online manuscript Submission" />
<?php include("common/cssfiles.php");?>
<style>
.captchapara{
    font-size: 20px;
    color: #cc0c26 !important;
    font-weight: bold;
    padding-top: 0px;
    margin-top: 0px !important;
}
.payleft{
text-align:left;
}
</style>
</head>
<body>
<!-- header -->
<?php include("common/top-header.php");?>	
<!-- //header -->
<!-- banner -->
	
<!-- //banner -->
<!-- work -->
<div class="work" id="about">
		<div class="agileits_works-top">
				<div class="col-md-12 agileits_works-grid two">
				    <div class="innercontent">
					   <h3 title="Online Payment"> Online Payment </h3>
<section id="projects">
  <!-- Contact Us Section -->
    <section class="Material-contact-section section-padding section-dark">

<div class="col-lg-6 col-md-6 col-sm-6">
<div class='row'>
<div class='col-md-12'>
<h4  style="margin-bottom:10px;">Registration Details</h4>
</div>
</div>
            <div class="row">
                <div class="col-md-4 payleft">Name <span>:</span></div>
                <div class="col-md-8 payleft"><?php echo 
$_SESSION['regtitle'].' '.$_SESSION['regfname'].
$_SESSION['regsname'];?></div>
            </div>           
            <div class="row">
                <div class=" col-md-4 payleft">Company <span>:</span></div>
                <div class="col-md-8  payleft"><?php echo $_SESSION['regcompany'];?></div>
            </div>
             <div class="row">
                
                <div class=" col-md-4 payleft">Email<span>:</span></div>
                <div class="col-md-8  payleft"><?php echo $_SESSION['regauthors_email'];?></div>
            </div>

             <div class="row">
               
                <div class=" col-md-4 payleft">City <span>:</span></div>
                <div class="col-md-8  payleft"><?php echo $_SESSION['regcity'];?></div>
            </div>

             <div class="row">
                
                <div class=" col-md-4 payleft">State <span>:</span></div>
                <div class="col-md-8  payleft"><?php echo $_SESSION['regstate'];?></div>
            </div>

            <div class="row">
                
                <div class=" col-md-4 payleft">Country <span>:</span></div>
                <div class="col-md-8  payleft"><?php echo $_SESSION['regcountry'];?></div>
            </div>

            <div class="row">
                
                <div class=" col-md-4 payleft">Phone Number <span>:</span></div>
                <div class="col-md-8  payleft"><?php echo $_SESSION['regphone'];?></div>
            </div>
            <div class="row">
               
                <div class=" col-md-4 payleft">Address<span>:</span></div>
                <div class="col-md-8  payleft"><?php echo $_SESSION['regfull_postal_address'];?></div>
            </div>
             
               <div class="row">
                <div class=" col-md-4 payleft">Journal Name<span>:</span></div>
                <div class="col-md-8  payleft"><?php echo 
$_SESSION['journal_name'];?></div>
</div>

 <div class="row">
                <div class="col-md-4 payleft">Manuscript Title<span>:</span></div>
                <div class="col-md-8  payleft"><?php echo 
$_SESSION['manuscript_title'];?></div>
</div>
 
               <div class="row">
                <div class=" col-md-4 payleft">Amount <span>:</span></div>
                <div class="col-md-8  payleft"><?php echo 
$_SESSION['amount'];?></div>
            </div>


               <div class="row">
                <div class=" col-md-4 payleft">Invoice Number<span>:</span></div>
                <div class="col-md-8  payleft"><?php echo 
$_SESSION['invoice_number'];?></div>
               </div>
               </div>
<div class="col-md-6">       
<div class='row'>
<div class='col-md-12'>
<h4  style="margin-bottom:10px;">Billing Details</h4>
</div>
</div>
    
           <div class="row">
                <div class=" col-md-4 payleft"> Name <span>:</span></div>
                <div class="col-md-8  payleft">
		<?php 
		if($_POST['isbillable_diff'] ==1){
		
		echo 
$_SESSION['billtitle'].' '.
$_SESSION['billfname']." ".
$_SESSION['billsname'];
		}else{
		
		echo 
$_SESSION[regtitle].' '.
$_SESSION[regfname]." ".
$_SESSION[regsname];
		                        
		}
		?>

</div>
            </div>

            
            <div class="row">
                
                <div class=" col-md-4 payleft">Company <span>:</span></div>
                <div class="col-md-8  payleft">
                
                <?php echo ($_POST['isbillable_diff'] == 1)? 
$_SESSION['billcompany']:
$_SESSION['regcompany']; ?>
                
                </div>
                
            </div>


             <div class="row">
                
                <div class=" col-md-4 payleft">Email<span>:</span></div>
                <div class="col-md-8  payleft">
                
                 <?php echo ($_POST['isbillable_diff'] == 1)? 
$_SESSION['billauthors_email']:
$_SESSION['regauthors_email']; ?>
                
                </div>
            </div>

             <div class="row">
               
                <div class=" col-md-4 payleft">City <span>:</span></div>
                <div class="col-md-8  payleft"><?php echo ($_POST['isbillable_diff'] == 1)? 
$_SESSION['billcity']:
$_SESSION['regcity']; ?></div>
            </div>

            <div class="row">
               
                <div class=" col-md-4 payleft">City <span>:</span></div>
                <div class="col-md-8  payleft"><?php echo ($_POST['isbillable_diff'] == 1)? 
$_SESSION['billstate']:
$_SESSION['regstate']; ?></div>
            </div>

            <div class="row">
                
                <div class=" col-md-4 payleft">Country <span>:</span></div>
                <div class="col-md-8  payleft">
                <?php echo ($_POST['isbillable_diff'] == 1)? 
$_SESSION['billcountry']:
$_SESSION['regcountry']; ?>
                </div>
            </div>

            <div class="row">
               
                <div class=" col-md-4 payleft">Phone Number <span>:</span></div>
                <div class="col-md-8  payleft">
               
                <?php echo ($_POST['isbillable_diff'] == 1)? 
$_SESSION['billing_phone']:
$_SESSION['regphone']; ?>
                </div>
            </div>

             <div class="row">
             
                <div class=" col-md-4 payleft">Address <span>:</span></div>
                <div class="col-md-8  payleft">
                 <?php echo ($_POST['isbillable_diff'] == 1)? 
$_SESSION['billfull_postal_address']:
$_SESSION['regfull_postal_address']; ?>
                </div>
            </div>
</div>
 <div class="col-md-12 row"  style="margin-bottom:30px;">
	<h3>Stripe Payment</h3>
 <form action="charge.php" method="POST" class="form-inline">
<input type="hidden" value="<?php echo $_SESSION['amount']?>" id="amount" name="amount">
<input type="hidden" value="<?php echo $_SESSION['journal_name'];?>" id="journal_name" name="journal_name">
<input type="hidden" value="<?php echo $_SESSION['manuscript_title'];?>"  name="manuscript_title">

<input type="hidden" value="<?php echo $_SESSION['regauthors_email'];?>"  name="regauthors_email">

  <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
          data-key="<?php echo $stripe['publishable_key']; ?>"
          
          data-description="Payment for Asteroid Publishers"
		  data-amount="<?php echo $_SESSION['amount']*100?>",
          data-locale="auto"></script>

</form>


	</section>
              </section>
			</div>
				</div>
		    <div class="clearfix"> </div>
		</div>
</div>

<script type="text/javascript">
   $('#reload').click(function(){
        var timestamp = new Date().getTime();
        $('#captcha').attr('src','submit-manuscript1.php?'+timestamp)
    })
</script>
<!--//reviews-->

<?php include("common/footer.php");?>

<?php include("common/jsfiles.php");?>
</body>
</html>