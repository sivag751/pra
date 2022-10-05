<?php
session_start();
include('asteroid-admin/includes/connection.php');
error_reporting(0);
//echo $_POST['fullname'];

define('CAPTCHA1', rand(1,9));
define('CAPTCHA2', rand(1,9));

if (isset($_POST['submit'])) {

 	$captcha = $_POST['captcha'];
	$captcha1 = $_POST['captcha1'];
	$captcha2 = $_POST['captcha2'];

	if (CAPTCHA_ENABLED == '0') { $captcha1 = '1'; $captcha2 = '1'; $captcha = '2'; }
	
	if (($captcha1 + $captcha2) != $captcha) { 
       header("Location:submit-manuscript.php?status=invalid"); // Captcha verification is incorrect.
    } 
	else
    { 
	// Captcha verification is Correct. Final Code Execute here!		
//		$msg="<span style='color:green'>The Validation code has been matched.</span>";		


 $name=mysqli_real_escape_string($db,$_POST['name']);
 $email=mysqli_real_escape_string($db,$_POST['email']);
 $country=mysqli_real_escape_string($db,$_POST['country']);
 $phone_no=mysqli_real_escape_string($db,$_POST['phone_no']);
 $journal_name=mysqli_real_escape_string($db,$_POST['journal_name']);
 

     $allowedExts = array("doc", "docx");
     $extension = end(explode(".", $_FILES["article_pdf"]["name"]));
	
		
 if ((($_FILES["article_pdf"]["type"] == "application/pdf")
 || ($_FILES["article_pdf"]["type"] == "application/x-pdf")
|| ($_FILES["article_pdf"]["type"] == "applications/vnd.pdf")
|| ($_FILES["article_pdf"]["type"] == "text/x-pdf")
|| ($_FILES["article_pdf"]["type"] == "text/pdf")
|| ($_FILES["article_pdf"]["type"] == "application/x-rar-compressed")
|| ($_FILES["article_pdf"]["type"] == "application/octet-stream")
|| ($_FILES["article_pdf"]["type"] == "application/zip")
|| ($_FILES["article_pdf"]["type"] == "application/x-zip-compressed")
|| ($_FILES["article_pdf"]["type"] == "multipart/x-zip")
|| ($_FILES["article_pdf"]["type"] == "application/msword")
|| ($_FILES["article_pdf"]["type"] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document")
|| ($_FILES["article_pdf"]["type"] == "application/vnd.openxmlformats-officedocument.wordprocessingml.template")
|| ($_FILES["article_pdf"]["type"] == "application/vnd.ms-word.template.macroEnabled.12")))
  {

   if ($_FILES["article_pdf"]["error"] > 0) {
               "Return Code: " . $_FILES["article_pdf"]["error"] . "<br>";
            } else {


        $image_name = $_FILES['article_pdf']['name'];
        $filename = basename($_FILES['article_pdf']['name']);
        $ext = substr($filename, strrpos($filename, '.') + 1);
        $ext = strtolower($ext);
        $split=explode(".",$image_name);
        $timestamp=rand(1,99999);
        $image_name=$split[0].$timestamp.".".$ext;
        $image_name=str_replace(" ","",$image_name);

                if (file_exists("uploads/manuscriptpdfs/" . $image_name)) 
                {
                    echo $_FILES["article_pdf"]["name"] . " already exists. ";
                } else
                {
                    move_uploaded_file($_FILES["article_pdf"]["tmp_name"], "uploads/manuscriptpdfs/" . $image_name);
                    "Stored in: " . "uploads/manuscriptpdfs/" . $image_name;
                    
                    $product_image1 = $image_name;
                     
					 }
					 }
	  $qNewUsers = mysqli_query($db,"INSERT INTO submission_tbl SET name='$name',email='$email',country='$country',phone_no='$phone_no',journal_name='$journal_name',file='$product_image1',file1='file_name1',file2='file_name2',created_date=now()") or die(mysql_error());		


//header("Location:success.php?suc=ok");     
        // EDIT THE 2 LINES BELOW AS REQUIRED
		 

		 $email_to = "contact@asteroidpublishers.org";
		 
		  //$email_to = "suneetham.gavin@gmail.com";
		 //$email_to = "gavinwmaster@gmail.com";
       

        $email_subject = "Manuscript Details - Asteroid Publishers";


        // validation expected data exists

         if (!isset($_POST['name']) ||
                !isset($_POST['phone_no']) ||
                !isset($_POST['email']) ||
                !isset($_POST['country']) ||
                !isset($_POST['journal_name'])) {

            //died('We are sorry, but there appears to be a problem with the form you submitted.');
        }

        $name = $_POST['name'];
        $phone_no = $_POST['phone_no'];
        $email = $_POST['email'];
        $country = $_POST['country'];
        $journal_name = $_POST['journal_name'];
		
      
        function clean_string($string) {
            $bad = array("content-type", "bcc:", "to:", "cc:", "href");
            return str_replace($bad, "", $string);
        }

        $message .= "Name: " . clean_string($name) . "<br>";
        $message .= "Country: " . clean_string($country) . "<br>";
        $message .= "Mobile: " . clean_string($phone_no) . "<br>";
        $message .= "Email: " . clean_string($email) . "<br>";
        $message .= "Journal Name: " . clean_string($journal_name) . "<br>";



// create email headers

        $fileatt = "uploads/manuscriptpdfs/" . $product_image1; // Path to the file (example)
        $fileatt_type = $_FILES["article_pdf"]["type"]; // File Type
        $fileatt_name = $_FILES["article_pdf"]["name"]; // Filename that will be used for the file as the attachment
        $file = fopen($fileatt, 'rb');
        $data = fread($file, filesize($fileatt));
        fclose($file);
        $semi_rand = md5(time());
        $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";

        $headers = 'From: ' . $email . "\r\n" .
                'Reply-To: ' . $email . "\r\n" .
                'X-Mailer: PHP/' . phpversion();

        $headers .= "\nMIME-Version: 1.0\n" .
                "Content-Type: multipart/mixed;\n" .
                " boundary=\"{$mime_boundary}\"";
        $email_message .= "This is a multi-part message in MIME format.\n\n" .
                "--{$mime_boundary}\n" .
                "Content-Type:text/html; charset=\"iso-8859-1\"\n" .
                "Content-Transfer-Encoding: 7bit\n\n" . $message;
        $email_message .= "\n\n";
        $data = chunk_split(base64_encode($data));
        $email_message .= "--{$mime_boundary}\n" .
                "Content-Type: {$fileatt_type};\n" .
                " name=\"{$fileatt_name}\"\n" .
                "Content-Transfer-Encoding: base64\n\n" .
                $data . "\n\n" .
                "--{$mime_boundary}--\n";


        @mail($email_to, $email_subject, $email_message, $headers);
      header("Location:submit-manuscript.php?status=success");
       }
        }
		}
		
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
    <?php include("common/gatagcode.php");?>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Submit Manuscript - Asteroid Publishers</title>
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
  <!--  <section class="breadcrumb-section set-bg" >
        <img src="img/banner.jpg" class="img-responsive innerbanner" alt="Submit Manuscript - Asteroid Publishers" title="Submit Manuscript - Asteroid Publishers">
    </section> -->
    <!-- Breadcrumb Section End -->

    <section class="blog spad1">
        <div class="container">
						<h2 class="headtitle" title="Submit Manuscript"> Submit Manuscript </h2>
<div class="container">
	<div class="row justify-content-center">
		<div class="col-12 col-md-8 col-lg-6 pb-5">
		 <?php 
				  if($status=="success"){ ?> 
                     <h4 align="center" style="color:#549128;text-align:center;font-weight:bold;font-size:20px;text-align:center;"> Successfully submitted Your Manuscript</h4>
  
                  <?php }  if($status=="error"){?>
                     <h4 align="center" style="color:#FF0000;font-weight:bold;text-align:center;"> You Have Invalid Data.</h4>
					 
                  <?php }  if($status=="invalid"){?>
                     <h4 align="center" style="color:#FF0000;font-weight:bold;text-align:center;"> Captcha Code Incorrect! Please Try Again.</h4>
                  <?php } ?>  
<form class="shake" role="form" method="post" action="" id="contactForm" name="contact-form" data-toggle="validator" enctype="multipart/form-data">
                        <div class="card border-primary rounded-0" style="border-color:#17a2b8 !important;">
                            <div class="card-header p-0">
                                <div class="bg-info text-white text-center py-2">
                                    <p class="m-0" style="font-size:20px;">Please Enter Your Details</p>
                                </div>
                            </div>
                            <div class="card-body p-3">

                                <!--Body-->
                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-user text-info"></i></div>
                                        </div>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Full Name" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-envelope text-info"></i></div>
                                        </div>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                                    </div>
                                </div>
                                  <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-flag text-info"></i></div>
                                        </div>
                                        <input type="text" class="form-control" id="country" name="country" placeholder="Country" required>
                                    </div>
                                </div>
								 <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-phone text-info"></i></div>
                                        </div>
                                        <input type="text" class="form-control" id="phone_no" name="phone_no" placeholder="Phone Number" required>
                                    </div>
                                </div>
								
								<div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-user text-info"></i></div>
                                        </div>
                         <select name="journal_name" id="journal_name" class="form-control" required="required" onChange="showUser(this.value)">
						<option value="">Select Journal</option>
							<?php $dropdown=mysqli_query($db,"SELECT * FROM journal_tbl WHERE status=1");
							while($values=mysqli_fetch_array($dropdown)){?>
				<option value="<?php echo $values['journal_name'];?>"><?php echo $values['journal_name'];?></option>		
							<?php } ?>								
						</select>
						</div>
                                </div>
								<div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-file-pdf-o text-info"></i></div>
                                        </div>
                                        <input type="file" class="form-control" id="article_pdf" name="article_pdf" placeholder="File" required>
                                    </div>
                           <span style="margin-top:10px;color:#CC0000;"><i>Note: Valid File Extensions doc,docx,pdf,zip and rar format.</i></span>
                                </div>
								
								 <div class="form-group">
                                    <div class="input-group mb-12">
                                        <div class="input-group-prepend">
                                        <span style="margin-bottom: 10px;color: #000;font-weight: 600;"><i>Captcha *</i></span>
										</div>
									 <div class="input-group mb-12" style="display:block;">
                     <?php if (CAPTCHA_ENABLED != '0') { ?>
                      <p class="captchapara"><?php echo CAPTCHA1; ?> + <?php echo CAPTCHA2; ?> = ? 
                      <input type="text" class="form-control" name="captcha"  required/></p>
                      <input type="hidden" class="form-control" name="captcha1" value="<?php echo CAPTCHA1; ?>" />
                      <input type="hidden" class="form-control" name="captcha2" value="<?php echo CAPTCHA2; ?>" />
                       <?php } ?>
                                </div>
                                </div>								
                                <div class="text-center">
<button class="btn btn-common btn-primary" type="submit" id="submit" name="submit" style="background:#17a2b8;border-color:#17a2b8;">
						  <i class="material-icons mdi mdi-message-outline"></i> Send Message</button>
						       </div>
                            </div>

                        </div>
                    </form>
                    <!--Form with header-->


                </div>
	</div>
</div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->
<script type="text/javascript">
   $('#reload').click(function(){
        var timestamp = new Date().getTime();
        $('#captcha').attr('src','submit-manuscript.php?'+timestamp)
    })
</script>
     <!-- Latest Product Section End -->
<?php include("common/footer.php");?>
    <!-- Footer Section End -->
 <?php include("common/jsfiles.php");?>  
</body>
</html>