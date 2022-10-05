<?php 
include('asteroid-admin/includes/connection.php');
ob_start();
session_start();

if(isset($_POST['submit'])){

$_SESSION['amount']=$_POST['amount'];
    extract($_POST);
	

	 $_SESSION['post']=$_POST;
	 
	$_SESSION['regtitle']=mysqli_real_escape_string($db,$_POST['registration_title']);
	$_SESSION['regfname']=mysqli_real_escape_string($db,$_POST['registration_first_name']);
	$_SESSION['regsname']=mysqli_real_escape_string($db,$_POST['registration_second_name']);
	$_SESSION['regcompany']=mysqli_real_escape_string($db,$_POST['registration_company']);
	$_SESSION['regcity']=mysqli_real_escape_string($db,$_POST['registration_city']);
	$_SESSION['regstate']=mysqli_real_escape_string($db,$_POST['registration_state']);
	$_SESSION['regcountry']=mysqli_real_escape_string($db,$_POST['registration_country']);
	$_SESSION['regauthors_email']=mysqli_real_escape_string($db,$_POST['registration_email']);
	$_SESSION['regphone']=mysqli_real_escape_string($db,$_POST['registration_phone']);
	$_SESSION['regfull_postal_address']=mysqli_real_escape_string($db,$_POST['registration_Address']);
	$_SESSION['journal_name']=mysqli_real_escape_string($db,$_POST['Select_journal_Name']);
	$_SESSION['manuscript_title']=mysqli_real_escape_string($db,$_POST['registration_manuscript_title']);
    $_SESSION['invoice_number']=mysqli_real_escape_string($db,$_POST['Invoice_Number']);
	$_SESSION['billtitle']=mysqli_real_escape_string($db,$_POST['billing_title']);
	$_SESSION['billfname']=mysqli_real_escape_string($db,$_POST['billing_first_name']);
	$_SESSION['billsname']=mysqli_real_escape_string($db,$_POST['billing_second_name']);
	$_SESSION['billcompany']=mysqli_real_escape_string($db,$_POST['billing_company']);
	$_SESSION['billcity']=mysqli_real_escape_string($db,$_POST['billing_city']);
	$_SESSION['billstate']=mysqli_real_escape_string($db,$_POST['billing_state']);
	$_SESSION['billcountry']=mysqli_real_escape_string($db,$_POST['billing_country']);
	$_SESSION['billauthors_email']=mysqli_real_escape_string($db,$_POST['billing_email']);
	$_SESSION['billing_phone']=mysqli_real_escape_string($db,$_POST['billing_phone']);
	$_SESSION['billfull_postal_address']=mysqli_real_escape_string($db,$_POST['billing_address']);

    $random_num = mt_rand(100000, 999999);

    $sid=session_id();


$link=mysqli_query($db,"INSERT INTO `stripe_payment_details`(`random_num`, `reg_title`, `reg_first_name`, `reg_second_name`, `reg_company`, `reg_city`, `reg_state`, `reg_country`, `reg_authors_email`, `reg_phone`, `reg_address`, `journal_name`, `manuscript_title`, `invoice_number`, `bill_title`, `bill_first_name`, `billsname`, `bill_company`, `bill_city`, `bill_state`, `bill_country`, `bill_authors_email`, `bill_phone`, `bill_address`, `reg_datetime`, `amt`, `session_id`, `pay_from`) VALUES ('$random_num','$_SESSION[regtitle]','$_SESSION[regfname]','$_SESSION[regsname]','$_SESSION[regcompany]','$_SESSION[regcity]','$_SESSION[regstate]','$_SESSION[regcountry]','$_SESSION[regauthors_email]','$_SESSION[regphone]','$_SESSION[regfull_postal_address]','$_SESSION[journal_name]','$_SESSION[manuscript_title]','$_SESSION[invoice_number]','$_SESSION[billtitle]','$_SESSION[billfname]','$_SESSION[billsname]','$_SESSION[billcompany]','$_SESSION[billcity]','$_SESSION[billstate]','$_SESSION[billcountry]','$_SESSION[billauthors_email]','$_SESSION[billphone]','$_SESSION[billfull_postal_address]',now(),'$_SESSION[amount]','$sid','0')")or die(mysql_error());


$_SESSION['insert_id']=mysqli_insert_id($db);


 echo '<script>window.location="checkout.php"</script>';
}
?>

<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<title> Online Payment Asteroid Publishers</title>
<meta name="desciption" content="Please contact us to know more about our journals and Conferences." />
<meta name="keywords" content="contact Asteroid Publishers, Journals, Conferences." />

<?php include("common/cssfiles.php");?>
<style>
.captchapara{
    font-size: 20px;
    color: #cc0c26 !important;
    font-weight: bold;
    padding-top: 0px;
    margin-top: 0px !important;
}
</style>
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
    <section class="breadcrumb-section set-bg" >
        <img src="img/banner.jpg" class="img-responsive innerbanner" alt="Online Payment" title="Online Payment">
    </section>
    <!-- Breadcrumb Section End -->

    <section class="blog spad1">
	        <div class="container">
			<h2 class="headtitle" title="Online Payment"> Online Payment </h2>
          <div class="row">
              <!-- Section Titile -->
              <!-- contact form -->
              <div class="col-md-12 wow animated fadeInRight" data-wow-delay=".2s">
		<form name="reg" method="post" action='' class="form-horizontal clearfix" onSubmit="return validate1(this);">
		
    <div class="row">  
				    <div class="col-lg-6 col-md-6 col-sm-6">
                     <div class="form">
                        <div class="row" style="margin-bottom:10px;">
                            <div class="col-md-4">Title <span>*</span></div>
                            <div class="col-md-8">
                                <select class=" form-control" required="" name="registration_title">
                                     <option value="">Select your title</option>                        
                                     <option value='Mr'>Mr</option>
                                     <option value='Ms'>Ms</option>
                                     <option value='Mrs'>Mrs</option>
                                     <option value='Prof'>Prof</option>
                                     <option value='Dr'>Dr</option>
                                     <option value='Assist Prof Dr'>Assist Prof Dr</option>
                                     <option value='Assoc Prof Dr'>Assoc Prof Dr</option>                                                 
                                </select>
								<div class="help-block with-errors"></div>
                        </div>
                        </div>

                        <div class="row" style="margin-bottom:10px;">
                            <div class="col-md-4">Full Name <span>*</span></div>
                            <div class="col-md-4 nanana"><input type="text" placeholder="First Name" class="form-control" name="registration_first_name"  required="required" >
							<div class="help-block with-errors"></div>
							</div>
                            <div class="col-md-4 nanana2"><input type="text" placeholder="Second Name" class="form-control" name="registration_second_name" required="required">
							<div class="help-block with-errors"></div>
							</div>
                        </div>

                        <div class="row" style="margin-bottom:10px;">
                            <div class="col-md-4">Company Name</div>
                            <div class="col-md-8"><input type="text" class="form-control"  placeholder="Company Name" name="registration_company" required="required">
							<div class="help-block with-errors"></div>
							</div>
                        </div>

                        <div class="row" style="margin-bottom:10px;">
                            <div class="col-md-4">City</div>
                            <div class="col-md-8"><input type="text" class="form-control"  placeholder="City" name="registration_city"  required="required">
							<div class="help-block with-errors"></div>
							</div>
                        </div>

                        <div class="row" style="margin-bottom:10px;">
                            <div class="col-md-4">State</div>
                            <div class="col-md-8"><input type="text" class="form-control" placeholder="State" name="registration_state" required="required">
							<div class="help-block with-errors"></div>
							</div>
                        </div>

                        <div class="row" style="margin-bottom:10px;">
                            <div class="col-md-4">Country  <span>*</span></div>
                            <div class="col-md-8"><input type="text" class="form-control" placeholder="Country" name="registration_country" required="required">
							<div class="help-block with-errors"></div>
							</div>
                        </div>

                        <div class="row" style="margin-bottom:10px;">
                            <div class="col-md-4">Email  <span>*</span></div>
                            <div class="col-md-8"><input type="text" class="form-control" placeholder="Email" name="registration_email"  required="required">
							<div class="help-block with-errors"></div>
							</div>
                        </div>

                        <div class="row" style="margin-bottom:10px;">
                            <div class="col-md-4">Phone Number <span>*</span></div>
                            <div class="col-md-8"><input type="text" class="form-control" placeholder="Phone Number" name="registration_phone" required="required">
							<div class="help-block with-errors"></div>
							</div>
                        </div>
                         
                        <div class="row" style="margin-bottom:10px;">
                            <div class="col-md-4">Address</div>
                            <div class="col-md-8">
                            <textarea  class="form-control" placeholder="Address" rows="2" name="registration_Address" required="required"></textarea>
							<div class="help-block with-errors"></div>
							</div>
                        </div>
                        
                        <div class="row" style="margin-bottom:10px;">
                            <div class="col-md-4">Select Journal Name<span>*</span></div>
                            <div class="col-md-8">
                                <select  class=" form-control"  name="Select_journal_Name" required="required">
                                     <option value="">Select Journal Name</option>
<option value="Journal of Plastic and Aesthetic Surgery">Journal of Plastic and Aesthetic Surgery</option>
<option value="Journal of Hematology and Disorders">Journal of Hematology and Disorders</option>
<option value="Archives of General Surgery">Archives of General Surgery</option>
<option value="Expert Review of Andrology">Expert Review of Andrology</option>
<option value="Scientific Research in Respiratory Medicine">Scientific Research in Respiratory Medicine</option>
<option value="Genetics and Molecular Biology: Current Research">Genetics and Molecular Biology: Current Research</option>
<option value="Annals of Epidemiology and Global Health">Annals of Epidemiology and Global Health</option>
<option value="Journal of Medical and Clinical Toxicology">Journal of Medical and Clinical Toxicology</option>
<option value="Annals of Otorhinolaryngology">Annals of Otorhinolaryngology</option>
<option value="Trends in Neurology and Neuroscience">Trends in Neurology and Neuroscience</option>
<option value="Frontiers in Endocrinology and Metabolism">Frontiers in Endocrinology and Metabolism</option>
<option value="Reviews in Biotechnology and Biochemistry">Reviews in Biotechnology and Biochemistry</option>
<option value="Journal of Clinical Nutrition and Food Chemistry">Journal of Clinical Nutrition and Food Chemistry</option>
<option value="Current Trends in Emergency Medicine">Current Trends in Emergency Medicine</option>
<option value="Current Trends in Education">Current Trends in Education</option>
<option value="Asteroid Journal of Orthopedic Research">Asteroid Journal of Orthopedic Research</option>
<option value="Advances in Clinical Anesthesiology and Critical Care">Advances in Clinical Anesthesiology and Critical Care</option>
<option value="Advances in Animal Science and Research">Advances in Animal Science and Research</option>
<option value="Clinical and Medical Case Reports Journal">Clinical and Medical Case Reports Journal</option>
<option value="Current Research in Dentistry and Oral Health">Current Research in Dentistry and Oral Health</option>
<option value="Eye Research: Insights">Eye Research: Insights</option>
<option value="Current Research on Gastroenterology and Hepatology">Current Research on Gastroenterology and Hepatology</option>
<option value="Journal of Obstetrics & Gynecology: Reports">Journal of Obstetrics & Gynecology: Reports</option>
<option value="Current Trends in Advanced Nursing">Current Trends in Advanced Nursing</option>
<option value="Sports Medicine: Injuries and Therapy">Sports Medicine: Injuries and Therapy</option>
<option value="Journal of Surgical Urology">Journal of Surgical Urology</option>
<option value="Journal of Psychiatry and Mental Health Behavior">Journal of Psychiatry and Mental Health Behavior</option>
<option value="Asteroid Journal of Cancer Research">Asteroid Journal of Cancer Research</option>
<option value="Recent Advances in Clinical Dermatology">Recent Advances in Clinical Dermatology</option>
<option value="Asteroid Journal of Pediatrics">Asteroid Journal of Pediatrics</option>
<option value="Frontiers in Cardiology and Research">Frontiers in Cardiology and Research</option>
<option value="Trends in Family and Community Medicine">Trends in Family and Community Medicine</option>
<option value="Journal of Pharmaceutical Research and Drug Safety">Journal of Pharmaceutical Research and Drug Safety</option>
<option value="Journal of Nanotechnology Research and Applications">Journal of Nanotechnology Research and Applications</option>
<option value="Advances in Gerontology & Geriatric Medicine">Advances in Gerontology & Geriatric Medicine</option>
<option value="Journal of Addiction Therapy and Drug Abuse">Journal of Addiction Therapy and Drug Abuse</option>
<option value="Journal of Tropical Medicine and Infectious Diseases">Journal of Tropical Medicine and Infectious Diseases</option>
<option value="Archives of Sexual and Reproductive Medicine">Archives of Sexual and Reproductive Medicine</option>
<option value="Frontiers in Epidemiology and Public Health">Frontiers in Epidemiology and Public Health</option>
<option value="Journal of Genomic Research and Bioinformatics">Journal of Genomic Research and Bioinformatics</option>
<option value="Frontiers in Preventive Medicine and Public Health">Frontiers in Preventive Medicine and Public Health</option>
<option value="Journal of Women's Health Research">Journal of Women's Health Research</option>
<option value="Research Trends in General Medicine">Research Trends in General Medicine</option>
<option value="Journal of Immunology and Pathology">Journal of Immunology and Pathology</option>

<option value="Others">Others</option>   
 </select>
 <div class="help-block with-errors"></div>
                        </div>
                        </div>
                        
                        <div class="row" style="margin-bottom:10px;">
                            <div class="col-md-4">Manuscript Title</div>
                            <div class="col-md-8">
                            <textarea  class="form-control" placeholder="Manuscript Title" rows="3" name="registration_manuscript_title" 
 maxlength="300" required="required"></textarea>
 <div class="help-block with-errors"></div>
 </div>
                        </div>
                        
                        <div class="row" style="margin-bottom:10px;">
                            <div class="col-md-4">Invoice Number</div>
                            <div class="col-md-8">
                            <textarea  class="form-control" placeholder="Invoice Number" rows="1" name="Invoice_Number" maxlength="50" required="required"></textarea>
							<div class="help-block with-errors"></div>
							</div>
                        </div>
                     </div>
                 </div>
				    <div class="col-lg-6 col-md-6 col-sm-6"> 
 <input type="hidden" name="isbillable_diff" value="0" id="isbillable_diff">           
 <input type="checkbox" name="checkbox" id='check' onClick="display();$('#isbillable_diff').val(1)">If Billing Details Are Not Same

                 <div class="col-md-12" id='billing_details' style='display: none'>
                     <div class="form">
                        <div class="row" style="margin-bottom:10px;">
                            <div class="col-md-4">Title <span>*</span></div>
                            <div class="col-md-8">
                                <select  class=" form-control"  name="billing_title">
                                     <option value="">Select your title</option>                        
                                     <option value='Mr'>Mr</option>
                                     <option value='Ms'>Ms</option>
                                     <option value='Mrs'>Mrs</option>
                                     <option value='Prof'>Prof</option>
                                     <option value='Dr'>Dr</option>
                                     <option value='Assist Prof Dr'>Assist Prof Dr</option>
                                     <option value='Assoc Prof Dr'>Assoc Prof Dr</option>                                                 
                                </select>
								<div class="help-block with-errors"></div>
                        </div>
                        </div>

                        <div class="row" style="margin-bottom:10px;">
                            <div class="col-md-4">Full Name <span>*</span></div>
                            <div class="col-md-4 nanana"><input type="text" placeholder="First Name" class="form-control" name="billing_first_name" maxlength="10" >
							<div class="help-block with-errors"></div>
							</div>
                            <div class="col-md-4 nanana2"><input type="text" placeholder="Second Name" class="form-control" name="billing_second_name" maxlength="10" >
							<div class="help-block with-errors"></div>
							</div>
                        </div>

                        <div class="row" style="margin-bottom:10px;">
                            <div class="col-md-4">Company Name</div>
                            <div class="col-md-8"><input type="text" class="form-control"  placeholder="Company Name" name="billing_company"maxlength="20"> 
							<div class="help-block with-errors"></div>
							</div>
                        </div>

                        <div class="row" style="margin-bottom:10px;">
                            <div class="col-md-4">City</div>
                            <div class="col-md-8"><input type="text" class="form-control"  placeholder="City" name="billing_city"maxlength="15">
							<div class="help-block with-errors"></div></div>
                        </div>

                        <div class="row" style="margin-bottom:10px;">
                            <div class="col-md-4">State</div>
                            <div class="col-md-8"><input type="text" class="form-control" placeholder="State" name="billing_state"maxlength="15">
							<div class="help-block with-errors"></div></div>
                        </div>

                        <div class="row" style="margin-bottom:10px;">
                            <div class="col-md-4">Country  <span>*</span></div>
                            <div class="col-md-8"><input type="text" class="form-control" placeholder="Country" name="billing_country"maxlength="15">
							<div class="help-block with-errors"></div>
							</div>
                        </div>

                        <div class="row" style="margin-bottom:10px;">
                            <div class="col-md-4">Email  <span>*</span></div>
                            <div class="col-md-8"><input type="text" class="form-control" placeholder="Email" name="billing_email"maxlength="15">
							<div class="help-block with-errors"></div>
							</div>
                        </div>

                        <div class="row" style="margin-bottom:10px;">
                            <div class="col-md-4">Phone Number <span>*</span></div>
                       <div class="col-md-8"><input type="text" class="form-control" placeholder="Phone Number" name="billing_phone"maxlength="15">
							<div class="help-block with-errors"></div>
							</div>
                        </div>                        
                        <div class="row" style="margin-bottom:10px;">
                            <div class="col-md-4">Address</div>
                            <div class="col-md-8">
                            <textarea  class="form-control" placeholder="Address" rows="2" name="billing_address" maxlength="300" ></textarea>
							<div class="help-block with-errors"></div></div>
                        </div>
                 </div>
                 </div>
                 
                 <div class="row kujyht" style="text-align: center;">
    <div class="col-md-8 col-md-offset-2 amount-reg" style="margin-bottom:20px;">Total Amount(in USD only) <input type="text" name="amount" required="required" maxlength="10" class="input-amount"></div>

<div class="col-md-8 col-md-offset-2 amount-reg">
           <div id="g-recaptcha" ></div>
    
           <input type="hidden" id="captcha_response" value="">
    </div>
     
<div class="col-md-8 col-md-offset-2" ><br /><button type="submit" class="btn btn-success btn-effect" name="submit">Proceed To Pay</button></div>
</div>
</div>
</div>
</form>
              </div>
	     </div>
      </div>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->
<style>
#g-recaptcha div{width:100% !important;}
</style>
  
    <script type="text/javascript">
      var verifyCallback = function(response) {

         $('#captcha_response').val(response);
      };

      var onloadCallback = function() {
        grecaptcha.render('g-recaptcha', {
          'sitekey' : '6Ld7Dz0UAAAAANOMb5G3f-YO5FHAdfwnJlJbNpJe',
          'callback' : verifyCallback,
          'data-size':'compact'

        });
      };
    </script>
    <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
        async defer>
    </script>

<script type="text/javascript">
   $('#reload').click(function(){
        var timestamp = new Date().getTime();
        $('#captcha').attr('src','submit-manuscript1.php?'+timestamp)
    })
</script>
<script type="text/javascript">
  function validateForm()
  {
 var em=document.getElementById('email').value;
 alert(em);
  $.ajax({
        url:"https://gavinpublishers.online/online-payment1//ajax/regEmailCheck",
        method:"GET",
         data: {email:email}
        success: function(data) {
      alert(data);   
    //$("#res").html(data);
   
      },
      error: function(err) {
       console.log(err);
      }
  });

  }
</script>
<script type="text/javascript">
    function display()
    {
        var ck=document.getElementById('check');
        var bd=document.getElementById('billing_details');
        if(ck.checked==true)
        {
            //alert('hi');
            bd.style.display='block';

        }
       else
        {
           bd.style.display='none';  
        }
    }
</script>
     <!-- Latest Product Section End -->
<?php include("common/footer.php");?>
    <!-- Footer Section End -->
 <?php include("common/jsfiles.php");?>  
</body>
</html>