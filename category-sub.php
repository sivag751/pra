<?php 
include('asteroid-admin/includes/connection.php');
$url=$_GET['cid'];


$getgid=mysqli_fetch_array(mysqli_query($db,"SELECT * FROM journal_categories_tbl WHERE `category_url`='$url'"));
$cid= $getgid['category_id'];
$cname= $getgid['category_name'];
?>

<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<title> <?php echo $getgid['meta_title'];?> </title>

<meta name="description" content="<?php echo $getgid['meta_desc'];?>" />
<meta name="keywords" content="<?php echo $getgid['meta_keywords'];?>" />

<?php include("common/cssfiles1.php");?>
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
  <?php include("common/top-header1.php");?>	

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
<img src="../img/banner.jpg" class="img-responsive innerbanner" alt="<?php echo $getgid['meta_title'];?>" title="<?php echo $getgid['meta_title'];?>">
    </section>
    <!-- Breadcrumb Section End -->

    <section class="blog spad1">
        <div class="container">
						<h2 class="headtitle" title="<?php echo $cname;?>"> <?php echo $cname;?> </h2>
            <div class="row">
			  <?php
				 $query=mysqli_query($db,"select * from journal_tbl where cat_id='$cid' order by journal_id ASC");
			$nu_rows=mysqli_num_rows($query);
				if($nu_rows=='0'){
	?>
	<h5 class="csoon">Coming Soon....</h5>
	
	<?php }
	else {
while($jdata=mysqli_fetch_array($query)){
$issn=$jdata['issn'];

$journ=$jdata['journal_name'];

$journ=str_replace('-', '-', $jdata['journal_name']);
$journ=str_replace(' ', '-', $journ);
$journ=str_replace('/', '-', $journ);
$journ=str_replace(':', '-', $journ);
$journ=str_replace(',', '-', $journ);
$journ=str_replace('--', '-', $journ);
$journ=str_replace('&', 'and', $journ);
$journ=strtolower($journ);
?>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="row journalbox">
                        <div class="col-lg-3 col-md-3 col-sm-3">
                            <div class="blog__item">
                                <div class="blog__item__pic">
              <img src="../uploads/journalimages/<?php echo $jdata['journal_img'];?>" alt="<?php echo $jdata['journal_name'];?>" title="<?php echo $jdata['journal_name'];?>">
                                </div>
								</div>
								</div>
							  <div class="col-lg-9 col-md-9 col-sm-9">
                                <div class="blog__item__text">
                                    <h6 title="<?php echo $jdata['journal_name'];?>"><?php echo $jdata['journal_name'];?></h6>
                                      <a href="../<?php echo $jdata['journal_url'];?>">  <span> https://www.asteroidjournals.com/<?php echo $jdata['journal_url'];?></span></a>
                                </div>
								</div>
                            </div>
                        </div>
                  <?php }  
}
	?>
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