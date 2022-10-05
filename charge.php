<?php
include('asteroid-admin/includes/connection.php');
ob_start();
session_start();
$insertid=$_SESSION['insert_id'];
require_once('config.php');

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

   <div class="payment container">
   <div class="row">
  <div class="col-md-12">
                 <h3 class="row main-heading" style="text-align:center;margin-bottom:20px;font-weight:bold;">Payment Status</h3>
</div>
</div>

<?php
  require_once('config.php');

$token  = $_POST['stripeToken'];
  $amount  = $_SESSION['amount']*100;
  $journal= $_SESSION['journal_name'];
  
  $title= $_SESSION['manuscript_title'];

  $email= $_SESSION['regauthors_email'];  

try{

  $customer = \Stripe\Customer::create(array(
      'email' => $email,
      'source'  => $token      
  ));

  $charge = \Stripe\Charge::create(array(
        'customer' => $customer->id,
      'amount' => $amount,
      'currency' => 'usd'
  ));

  
  
  echo '<p style="font-size:20px;text-align:center;">Your payment has been sucessfully processed towards Asteroid Publishers </p><br/>';
  echo '<p style="font-size:20px;text-align:center;">Amount: $'.$_SESSION["amount"].'USD</p><br/>';
  echo '<p style="font-size:20px;text-align:center;">Journal: '.$_SESSION["journal_name"].'</p><br/>';
  echo '<p style="font-size:20px;text-align:center;">Manuscript Title: '.$_SESSION["manuscript_title"].'</p><br/>';
  //$token;
 // echo https://api.stripe.com
  $customer=$customer->id;
  
   mysqli_query($db,"update stripe_payment_details set `transaction_id`='$customer',`payment_status`='success',`pay_from`='Stripe',`pay_from`='Stripe',status='1' where id='$insertid'");
  
}
catch (Stripe_CardError $e) {
          
            echo json_encode(array('status' => 500, 'error' => STRIPE_FAILED));
			mysqli_query($db,"update stripe_payment_details set `error_code`='500',`payment_status`='STRIPE_FAILED',`pay_from`='Stripe',`message`='$msg' where id='$insertid' and  status='0'");
            exit();
        } catch (Stripe_InvalidRequestError $e) {

            // Invalid parameters were supplied to Stripe's API
            echo json_encode(array('status' => 501, 'error' => $e->getMessage()));
			
			 mysqli_query($db,"update stripe_payment_details set `error_code`='501',`payment_status`='STRIPE_FAILED',`pay_from`='Stripe',`message`='$msg' where id='$insertid' and  status='0'");
            exit();
        } catch (Stripe_AuthenticationError $e) {

            // Authentication with Stripe's API failed
            echo json_encode(array('status' => 502, 'error' => AUTHENTICATION_STRIPE_FAILED));
		 mysqli_query($db,"update stripe_payment_details set `error_code`='502',`payment_status`='AUTHENTICATION_STRIPE_FAILED',`pay_from`='Stripe',`message`='$msg' where id='$insertid' and  status='0'");
            exit();
        } catch (Stripe_ApiConnectionError $e) {

            // Network communication with Stripe failed
            echo json_encode(array('status' => 503, 'error' => NETWORK_STRIPE_FAILED));
		 mysqli_query($db,"update stripe_payment_details set `error_code`='503',`payment_status`='NETWORK_STRIPE_FAILED',`pay_from`='Stripe',`message`='$msg' where id='$insertid' and  status='0'");

            exit();
        } catch (Stripe_Error $e) {

            // Display a very generic error to the user, and maybe send
            echo json_encode(array('status' => 504, 'error' => STRIPE_FAILED));
			mysqli_query($db,"update stripe_payment_details set `error_code`='504',`payment_status`='STRIPE_FAILED',`pay_from`='Stripe',`message`='$msg' where id='$insertid' and  status='0'");
            exit();
        } catch (Exception $e) {

            // Something else happened, completely unrelated to Stripe
           echo  json_encode(array('status' => 505, 'error' => STRIPE_FAILED,'msg'=> $e->getMessage()));
		   $msg=$e->getMessage();
		      mysqli_query($db,"update stripe_payment_details set `error_code`='505',`payment_status`='STRIPE_FAILED',`pay_from`='Stripe',`message`='$msg' where id='$insertid' and  status='0'");

            exit();
        }

	


?>
<?php include("common/footer.php");?>

<?php include("common/jsfiles.php");?>
    </section>