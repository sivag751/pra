<?php 
include('asteroid-admin/includes/connection.php');
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<title> All Journals | Asteroid Publishers </title>
<meta name="description" content="Our Asteroids journals cover various disciplines in pharmaceutical research and development, medical subspecialties, engineering, technology, and life sciences." />
<meta name="keywords" content="All types of journals, list of journals, open access journals, Asteroid Publishers, Asteroid Publishers Journals." />

<?php include("common/cssfiles.php");?>
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
    <section class="breadcrumb-section set-bg" >
        <img src="img/banner.jpg" class="img-responsive" alt="All Journals - Asteroid Publishers" title="All Journals - Asteroid Publishers">
    </section>
    <!-- Breadcrumb Section End -->

    <section class="blog spad1">
        <div class="container">
						<h2 class="headtitle"> All Journals  </h2>
            <div class="row">
			  <?php
				 $query=mysqli_query($db,"select * from journal_tbl order by journal_id ASC");
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
              <img src="uploads/journalimages/<?php echo $jdata['journal_img'];?>" alt="<?php echo $jdata['journal_name'];?>" title="<?php echo $jdata['journal_name'];?>">
                                </div>
								</div>
								</div>
							  <div class="col-lg-9 col-md-9 col-sm-9">
                                <div class="blog__item__text">
                                    <h6 title="<?php echo $jdata['journal_name'];?>"><?php echo $jdata['journal_name'];?></h6>
                                      <a href="<?php echo $jdata['journal_url'];?>">  <span> https://www.asteroidjournals.com/<?php echo $jdata['journal_url'];?></span></a>
                                </div>
								</div>
                            </div>
                        </div>
                    <?php }?>
                  
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