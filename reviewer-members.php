<?php 
include('asteroid-admin/includes/connection.php');
$url=$_GET['page'];

$replaceurl=substr_replace($url ,"", -23);
$replaceurl;

$getgid=mysqli_fetch_array(mysqli_query($db,"SELECT * FROM journal_tbl WHERE `journal_url`='$replaceurl'"));
$jid= $getgid['journal_id'];
$jname= $getgid['journal_name'];

$imfact_factor= $getgid['imfact_factor'];
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <?php include("common/gatagcode.php");?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<title><?php echo $getgid['meta_title'];?></title>
<meta name="description" content="<?php echo $getgid['meta_desc'];?>" />
<meta name="keywords" content="<?php echo $getgid['meta_keywords'];?>" />

<!--Add the following script at the bottom of the web page (before </body></html>)-->
<script type="text/javascript">function add_chatinline(){var hccid=<?php echo $getgid['script_code'];?>;var nt=document.createElement("script");nt.async=true;nt.src="https://www.mylivechat.com/chatinline.aspx?hccid="+hccid;var ct=document.getElementsByTagName("script")[0];ct.parentNode.insertBefore(nt,ct);}
add_chatinline();</script>

<?php include("common/cssfiles.php");?>
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
	<div class="banner">
		<div id="kb" class="carousel kb_elastic animate_text kb_wrapper" data-ride="carousel" data-interval="6000" data-pause="hover"  >
            <!-- Wrapper-for-Slides -->
            <div class="carousel-inner" role="listbox">
			 <?php $innerbanner=mysqli_fetch_array(mysqli_query($db,"SELECT * FROM inner_banners WHERE `journal_id`='$jid'"));
               ?>
                <!-- First-Slide -->
                <div class="item active">
                    <img src="uploads/journalbanners/<?php echo $innerbanner['inner_banner'];?>" alt="<?php echo $getgid['meta_title'];?>" title="<?php echo $getgid['meta_title'];?>" class="img-responsive" />
                </div>
            
            </div>
			
        </div>
	</div>
    <!-- Breadcrumb Section End -->

    <section class="blog spad1">
        <div class="container">
<h2 class="headtitle" title="<?php echo $jname;?>"> <?php echo $jname;?> - Reviewer / Board Members </h2>
<div class="col-lg-12 col-md-12 col-sm-12 row">
<div class="col-lg-3 col-md-3 col-sm-3">

<h4 class="subtitle"> Journal Menu </h4>
 <div class="menu-group">
<ul class="menulist">
<li><a href="<?php echo $replaceurl;?>"><i class="fa fa-home"></i> <span>Home</span></a></li>
<li><a href="<?php echo $replaceurl;?>-editorial-board-members"><i class="fa fa-pencil-square-o"></i> <span>Editorial Board Members</span></a></li>
<li><a href="<?php echo $replaceurl;?>-reviewer-board-members"><i class="fa fa-users"></i> <span>Reviewer Board Members</span></a></li>
<li><a href="<?php echo $replaceurl;?>-article-in-press"><i class="fa fa-book"></i> <span>Article in Press</span></a></li>
<li><a href="<?php echo $replaceurl;?>-current-issue"><i class="fa fa-compass"></i> <span>Current Issue</span></a></li>
<li><a href="<?php echo $replaceurl;?>-archive"><i class="fa fa-folder-open"></i> <span>Archive</span></a></li>
	<!-- <li><a href="<?php echo $url;?>-article-process-fee"><i class="fa fa-usd"></i> <span>Article Process & Fee</span></a></li>-->
<li><a href="<?php echo $replaceurl;?>-special-issue"><i class="fa fa-compass"></i> <span>Special Issue</span></a></li>
</ul>
</div>
  </div>

<div class="col-lg-9 col-md-9 col-sm-9"  style="margin-top:33px;">
<div class="row">
 <?php
				 $query=mysqli_query($db,"select * from reviewer_members_tbl where journal_id='$jid' and status='1' order by order_num ASC");
				 			$nu_rows=mysqli_num_rows($query);
				if($nu_rows=='0'){
	?>
	<h5 class="boardcsoon">Coming Soon....</h5>
	
	<?php }
	else {
	 while($data=mysqli_fetch_array($query)){
				 ?>
<div class="col-lg-4 col-md-4 col-md-4 ">
<div class="card">
    <div class="box">
        <div class="img">
            <img src="uploads/reiewerimgs/<?php echo $data['memberimg'];?>">
        </div>
        <h2><?php echo $data['name'];?><br></h2>
        <p> <?php echo $data['university'];?>,<br/><?php echo $data['country'];?></p>
        <span>
            <ul>
                 <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal<?php echo $data['reviewer_id'];?>">Biography</button>

            </ul>
        </span>
    </div>
</div>

 <!-- Modal -->
  <div class="modal fade" id="myModal<?php echo $data['reviewer_id'];?>" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="display:initial;">
<h4 class="modal-title" style="text-align: center;color: #0098a3;font-size: 20px;font-weight: 600;">Author Name: <?php echo $data['name'];?></h4>
        </div>
        <div class="modal-body">
          <p><?php echo $data['description'];?></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
  
</div>
<?php }}?>




</div>
</div>
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