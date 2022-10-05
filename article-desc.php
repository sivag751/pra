<?php 
include('asteroid-admin/includes/connection.php');
$url=$_GET['page'];

$getgid=mysqli_fetch_array(mysqli_query($db,"SELECT * FROM article_in_press_tbl WHERE `article_url`='$url'"));
$jid= $getgid['journal_id'];
$aname= $getgid['article_name'];
$aid= $getgid['article_id'];
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
 <?php $journal=mysqli_fetch_array(mysqli_query($db,"SELECT * FROM journal_tbl WHERE `journal_id`='$jid'"));
               ?>
<meta name="citation_publisher" content="Asteroid Publishers" />
<meta name="citation_journal_title" content="<?php echo $journal['journal_name'];?>">
<meta name="citation_issn" content="<?php echo $journal['issn'];?>">
<meta name="citation_title" content="<?php echo $getgid['article_name'];?>">
<meta name="citation_author" content="<?php echo $getgid['author_name'];?>" />
<meta name="citation_month" content="<?php echo $getgid['article_month'];?>">
<meta name="citation_year" content="<?php echo $getgid['year'];?>">
<meta name="citation_publication_date" content="<?php echo $getgid['published_date'];?>" />
<meta name="citation_pdf_url" content="https://asteroidpublishers.com/uploads/articlepdfs/<?php echo $getgid['article_pdf'];?>">
<meta name="citation_abstract_html_url" content="https://asteroidpublishers.com/<?php echo $getgid['article_url'];?>">
<meta property="og:title" content="<?php echo $getgid['meta_title'];?>" />
<meta property="og:url" content="https://asteroidpublishers.com/<?php echo $getgid['article_url'];?>" />
<meta property="og:description" content="<?php echo $getgid['meta_desc'];?>" />
<meta property="og:site_name" content="Asteroid Publishers" />
<meta property="og:image" content="https://asteroidpublishers.com/images/favicon.ico" />
<link href="css/bootstrap1.css" rel="stylesheet" type="text/css" media="all" />

<?php include("common/cssfiles.php");?>
<style>
.nav-tabs { border-bottom: 2px solid #DDD; }
.nav-tabs > li.active > a, .nav-tabs > li.active > a:focus, .nav-tabs > li.active > a:hover { border-width: 0; }
.nav-tabs > li > a { border: none; color: #ffffff;background: #163f6a;font-size:16px; }
.nav-tabs > li.active > a { border: none;  color: #163f6a !important; background: #fff;font-size:16px; }
.nav-tabs > li.active > a:hover { border: none;  color: #163f6a !important; background: #fff; }
.nav-tabs > li > a:hover { border: none;  color: #fff !important; background: #5eadff; }
.nav-tabs > li > a::after { content: ""; background: #163f6a; height: 2px; position: absolute; width: 100%; left: 0px; bottom: -1px; transition: all 250ms ease 0s; transform: scale(0); }
.nav-tabs > li.active > a::after, .nav-tabs > li:hover > a::after { transform: scale(1); }
.tab-nav > li > a::after { background: ##163f6a none repeat scroll 0% 0%; color: #fff; }
.tab-pane { padding: 15px 0; }
.tab-content{padding:20px}
.nav-tabs > li  {width:14.285%; text-align:center;}
a:hover, a:focus {
    text-decoration: none;
    outline: none;
    color: #0056b3;
}
@media all and (max-width:724px){
.nav-tabs > li > a > span {display:none;}	
.nav-tabs > li > a {padding: 5px 5px;}
}
.nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
    color: #495057;
    background-color: #fff;
    border-color: #dee2e6 #dee2e6 #fff;
}
</style>
<!-- Global site tag (gtag.js) - Google Analytics -->


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
        <div class="row">
 <div class="container">
              <div class="row">
			 <h4 class="breadcom" style="color:#03508c;"><?php echo $getgid['article_type'];?></h4>	
			   <?php
				 $query=mysqli_query($db,"select * from article_in_press_tbl where article_url='$url' order by article_id ASC");
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
					<div class="col-lg-12 col-md-12 col-sm-12 jbox">
					<div class="col-lg-12 col-md-12 col-sm-12" style="text-align:left;padding-left:0px;margin-top:10px;">
					<h4 class="articlehead" style="color:#075fa3;" title="<?php echo $adata['article_name'];?>"><?php echo $adata['article_name'];?></h4>
					<!--<p class="jtext authorname"><b><?php echo $adata['author_name'];?></b></p>-->
			        <p class="jtext"><?php echo $adata['research_article'];?></p>
					
<div class="container" style="padding-left:0px;padding-right:0px;margin-left:0px;margin-right:0px;">
  <div class="row">
    <div class="col-lg-12 col-sm-12 col-md-12"> 
      <!-- Nav tabs -->
      <div class="card">
        <ul class="nav nav-tabs" role="tablist">
		 <?php $journal=mysqli_fetch_array(mysqli_query($db,"SELECT * FROM journal_tbl WHERE `journal_id`='$jid'"));
               ?>
          <li role="presentation" style="padding-left: 3px;"><a href="<?php echo $journal['journal_url'];?>-article-in-press"><span>Home</span></a></li>
          <li role="presentation" class="active"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab"><span>Abstract</span></a></li>
          <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab"><span>Article</span></a></li>
          <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab"><span>Figures</span></a></li>
         <li role="presentation"><a href="#extra" aria-controls="extra" role="tab" data-toggle="tab"><span>Tables</span></a></li>
		 <li role="presentation"><a href="#References" aria-controls="References" role="tab" data-toggle="tab"><span>References</span></a></li>
         <li role="presentation"><a href="#Citation" aria-controls="Citation" role="tab" data-toggle="tab"><span>Citation</span></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
          <div role="tabpanel" class="tab-pane active" id="profile">
              <p><?php echo $adata['abstract'];?></p>
		  </div>
          <div role="tabpanel" class="tab-pane" id="messages">
              <p><?php echo $adata['introduction'];?></p> 
		  </div>
          <div role="tabpanel" class="tab-pane" id="settings">
		  <p><?php echo $adata['figures'];?></p>
		  </div>
          <div role="tabpanel" class="tab-pane" id="extra">
		    <p><?php  echo $adata['tables'];?> </p>
		  </div>
		  <div role="tabpanel" class="tab-pane" id="References">
		   <p><?php echo $adata['reff_data'];?></p>
		  </div>
		  <div role="tabpanel" class="tab-pane" id="Citation">
		   <p><?php echo $adata['suggested_citation'];?> </p>
		  </div>
        </div>
      </div>
    </div>
  </div>
</div>
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
    <!-- Blog Section End -->

     <!-- Latest Product Section End -->
<?php include("common/footer.php");?>
    <!-- Footer Section End -->
 <?php include("common/jsfiles.php");?>  
</body>
</html>