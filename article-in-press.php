<?php 
include('asteroid-admin/includes/connection.php');
$url=$_GET['page'];

$replaceurl=substr_replace($url ,"", -17);
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
<style>
.custom-btn {
    width: 100px;
    height: 30px;
    color: #fff;
    border-radius: 5px;
    padding: 10px 25px;
    font-family: 'Lato', sans-serif;
    font-weight: 500;
    background: transparent;
    cursor: pointer;
    transition: all 0.3s ease;
    position: relative;
    display: inline-block;
    box-shadow: inset 2px 2px 2px 0px rgba(255, 255, 255, .5),
        7px 7px 20px 0px rgba(0, 0, 0, .1),
        4px 4px 5px 0px rgba(0, 0, 0, .1);
    outline: none;
}

/* Button 5 */
.btn-1 {
    background: linear-gradient(0deg, rgba(255, 151, 0, 1) 0%, rgba(251, 75, 2, 1) 100%);
    line-height: 34px;
    padding: 0;
    border: none;
}

.btn-1 span {
    position: relative;
    display: block;
    width: 100%;
    height: 100%;
}

.btn-1:before,
.btn-1:after {
    position: absolute;
    content: "";
    right: 0;
    bottom: 0;
    background: rgba(251, 75, 2, 1);
    box-shadow:
        -7px -7px 20px 0px rgba(255, 255, 255, .9),
        -4px -4px 5px 0px rgba(255, 255, 255, .9),
        7px 7px 20px 0px rgba(0, 0, 0, .2),
        4px 4px 5px 0px rgba(0, 0, 0, .3);
    transition: all 0.3s ease;
}

.btn-1:before {
    height: 0%;
    width: 2px;
}

.btn-1:after {
    width: 0%;
    height: 2px;
}

.btn-1:hover {
    color: rgba(251, 75, 2, 1);
    background: transparent;
}

.btn-1:hover:before {
    height: 100%;
}

.btn-1:hover:after {
    width: 100%;
}

.btn-1 span:before,
.btn-1 span:after {
    position: absolute;
    content: "";
    left: 0;
    top: 0;
    background: rgba(251, 75, 2, 1);
    box-shadow:
        -7px -7px 20px 0px rgba(255, 255, 255, .9),
        -4px -4px 5px 0px rgba(255, 255, 255, .9),
        7px 7px 20px 0px rgba(0, 0, 0, .2),
        4px 4px 5px 0px rgba(0, 0, 0, .3);
    transition: all 0.3s ease;
}

.btn-1 span:before {
    width: 2px;
    height: 0%;
}

.btn-1 span:after {
    height: 2px;
    width: 0%;
}

.btn-1 span:hover:before {
    height: 100%;
}

.btn-1 span:hover:after {
    width: 100%;
}




/* Button 6 */
.btn-2 {
    background: rgb(22, 9, 240);
    background: linear-gradient(0deg, rgba(22, 9, 240, 1) 0%, rgba(49, 110, 244, 1) 100%);
    color: #fff;
    border: none;
    transition: all 0.3s ease;
    overflow: hidden;
}

.btn-2:after {
    position: absolute;
    content: " ";
    top: 0;
    left: 0;
    z-index: -1;
    width: 100%;
    height: 100%;
    transition: all 0.3s ease;
    -webkit-transform: scale(.1);
    transform: scale(.1);
}

.btn-2:hover {
    color: #fff;
    border: none;
    background: transparent;
}

.btn-2:hover:after {
    background: rgb(0, 3, 255);
    background: linear-gradient(0deg, rgba(2, 126, 251, 1) 0%, rgba(0, 3, 255, 1)100%);
    -webkit-transform: scale(1);
    transform: scale(1);
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
						<h2 class="headtitle" title="<?php echo $jname;?>"> <?php echo $jname;?>  </h2>
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

<div class="col-lg-9 col-md-9 col-sm-9">
<h4 class="subtitle">Article in Press </h4>



 <?php
				 $query=mysqli_query($db,"select * from article_in_press_tbl where journal_id='$jid' and status='1' order by article_id ASC");
			$nu_rows=mysqli_num_rows($query);
				if($nu_rows=='0'){
	?>
	<h5 class="csoon" style="text-align:left;">Coming Soon....</h5>
	
	<?php }
	else {
while($adata=mysqli_fetch_array($query)){
$article=$adata['article_name'];
$article=str_replace('-', '-', $adata['article_name']);
$article=str_replace(' ', '-', $article);
$article=str_replace('/', '-', $article);
$article=str_replace(':', '-', $article);
$article=str_replace(',', '-', $article);
$article=str_replace('--', '-', $article);
$article=str_replace('&', 'and', $article);
$article=strtolower($article);
?>
<div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="row journalbox">
                        <div class="col-lg-2 col-md-2 col-sm-2">
                            <div class="blog__item">
                                <div class="blog__item__pic">
              <img src="uploads/articleimages/<?php echo $adata['article_image'];?>" alt="<?php echo $adata['article_name'];?>" title="<?php echo $adata['article_name'];?>">
                                </div>
								</div>
								</div>
							  <div class="col-lg-10 col-md-10 col-sm-10">
                                <div class="blog__item__text">
                      <h6 title="<?php echo $adata['article_name'];?>"><?php echo $adata['article_name'];?></h6> 
									<p class="jtext" style="margin-bottom:-12px;"><?php echo $adata['short_desc'];?></p>

<a href="uploads/articlepdfs/<?php echo $adata['article_pdf'];?>" target="_blank"><button class="btn btn-md readpdf" name="submit" id="submit">PDF</button></a>
<a href="<?php echo $adata['article_url'];?>"><button class="btn btn-md readhtml" name="submit" id="submit">HTML</button></a>

                                </div>
								</div>
                            </div>
                        </div>
			<?php }  
}
	?>				
						
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