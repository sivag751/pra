<?php 
include('asteroid-admin/includes/connection.php');
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
<?php
$query=mysqli_query($db,"select * from home_meta_data order by meta_id DESC");
$mdata=mysqli_fetch_array($query);
?>
<title> <?php echo $mdata['meta_title'];?> </title>
<meta name="description" content="<?php echo $mdata['meta_desc'];?>" />
<meta name="keywords" content="<?php echo $mdata['meta_keywords'];?>" />
    <!-- Google Font -->
<?php include("common/cssfiles.php");?>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-YK1C15HXLV"></script>


</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>
    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
	
<?php include("common/top-header.php");?>	
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="hero__item set-bg" data-setbg="img/banner.jpg">
                    </div>
                </div>
				
				<div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>All Categories</span>
                        </div>
                        <ul>
						<?php
				 $query=mysqli_query($db,"select * from journal_categories_tbl where status='1' order by category_id ASC");
					while($cdata=mysqli_fetch_array($query)){
					$cat=$cdata['category_name'];
$cat=str_replace('-', '-', $cdata['category_name']);
$cat=str_replace(' ', '-', $cat);
$cat=str_replace('/', '-', $cat);
$cat=str_replace(':', '-', $cat);
$cat=str_replace(',', '-', $cat);
$cat=str_replace('--', '-', $cat);
$cat=str_replace('&', 'and', $cat);
$cat=strtolower($cat);
?>
                            <li><a href="journals/<?php echo $cat;?>"><?php echo $cdata['category_name'];?></a></li>
<?php }?>
                        </ul>
                    </div>
                </div>
				
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Categories Section Begin -->
    <section class="categories" >
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
				<?php
				 $query=mysqli_query($db,"select * from journal_categories_tbl where status='1' order by category_id ASC");
					while($cdata=mysqli_fetch_array($query)){
					$cat=$cdata['category_name'];
$cat=str_replace('-', '-', $cdata['category_name']);
$cat=str_replace(' ', '-', $cat);
$cat=str_replace('/', '-', $cat);
$cat=str_replace(':', '-', $cat);
$cat=str_replace(',', '-', $cat);
$cat=str_replace('--', '-', $cat);
$cat=str_replace('&', 'and', $cat);
$cat=strtolower($cat);
?>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="uploads/categoryimages/<?php echo $cdata['cat_img'];?>" alt="<?php echo $cdata['category_name'];?>" title="<?php echo $cdata['category_name'];?>">
                            <h5><a href="journals/<?php echo $cat;?>"><?php echo $cdata['category_name'];?></a></h5>
                        </div>
                    </div>
<?php }?>

                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->
<section class="categories" style="margin-top:20px;">
        <div class="container">
            <div class="row">
			<?php
					  $query=mysqli_query($db,"select * from about_journal_tbl order by about_id DESC");
					  $data=mysqli_fetch_array($query);
					  ?>
			
	<h2 title="Welcome to Asteroid Publishers" style="margin-bottom:15px;">Welcome to Asteroid Publishers</h2>		
<p><?php echo $data['description'];?></p>
</div>
</div>
</section>
    <!-- Latest Product Section Begin -->
    <section class="latest-product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="latest-product__text">
                        <h4>Latest Journals</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
							
							 <?php
				 $query=mysqli_query($db,"select * from journal_tbl order by journal_id ASC Limit 0,3");
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

                                <a href="https://asteroidpublishers.com/<?php echo $jdata['journal_url'];?>" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                       <img src="uploads/journalimages/<?php echo $jdata['journal_img'];?>" alt="<?php echo $jdata['journal_name'];?>" title="<?php echo $jdata['journal_name'];?>">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6><?php echo $jdata['journal_name'];?></h6>
                                        <span>https://asteroidpublishers.com/<?php echo $jdata['journal_url'];?></span>
                                    </div>
                                </a>
								
							<?php }?>
							
                            </div>
                            <div class="latest-prdouct__slider__item">
							 <?php
				 $query=mysqli_query($db,"select * from journal_tbl order by journal_id ASC Limit 4,3");
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
<a href="https://asteroidpublishers.com/<?php echo $jdata['journal_url'];?>" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                       <img src="uploads/journalimages/<?php echo $jdata['journal_img'];?>" alt="<?php echo $jdata['journal_name'];?>" title="<?php echo $jdata['journal_name'];?>">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6><?php echo $jdata['journal_name'];?></h6>
                                        <span>https://asteroidpublishers.com/<?php echo $jdata['journal_url'];?></span>
                                    </div>
                                </a>
                          <?php }?>
							
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="latest-product__text">
                        <h4>Top Journals</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
							 <?php
				 $query=mysqli_query($db,"select * from journal_tbl order by journal_id DESC Limit 0,3");
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
                               <a href="https://asteroidpublishers.com/<?php echo $jdata['journal_url'];?>" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                       <img src="uploads/journalimages/<?php echo $jdata['journal_img'];?>" alt="<?php echo $jdata['journal_name'];?>" title="<?php echo $jdata['journal_name'];?>">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6><?php echo $jdata['journal_name'];?></h6>
                                        <span>https://asteroidpublishers.com/<?php echo $jdata['journal_url'];?></span>
                                    </div>
                                </a>
                             <?php }?>
					
                            </div>
                            <div class="latest-prdouct__slider__item">
							 <?php
				 $query=mysqli_query($db,"select * from journal_tbl order by journal_id DESC Limit 4,3");
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
                               <a href="https://asteroidpublishers.com/<?php echo $jdata['journal_url'];?>" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                       <img src="uploads/journalimages/<?php echo $jdata['journal_img'];?>" alt="<?php echo $jdata['journal_name'];?>" title="<?php echo $jdata['journal_name'];?>">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6><?php echo $jdata['journal_name'];?></h6>
                                        <span>https://asteroidpublishers.com/<?php echo $jdata['journal_url'];?></span>
                                    </div>
                                </a>
                               <?php }?>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
    <!-- Latest Product Section End -->
<?php include("common/footer.php");?>
    <!-- Footer Section End -->
 <?php include("common/jsfiles.php");?>  
</body>

</html>