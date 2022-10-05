<?php
include('asteroid-admin/includes/connection.php');
error_reporting(0);

$page=$_GET['page'];
$cid=$_GET['cid'];
$sid=$_GET['sid'];

$page=mysqli_escape_string($db,$_GET['page']);
$page1=mysqli_escape_string($db,$_GET['page']);

$journalcount=mysqli_num_rows(mysqli_query($db,"select * from journal_tbl where journal_url='$page' and status='1' limit 1"));
$articlecount=mysqli_num_rows(mysqli_query($db,"select * from article_in_press_tbl where article_url='$page' and status='1' limit 1"));
$currentcount=mysqli_num_rows(mysqli_query($db,"select * from article_in_press_tbl where article_url='$page' and status='2' limit 1"));
$yearcount=mysqli_num_rows(mysqli_query($db,"select * from article_year_tbl where year_name='$page' and status='1' limit 1"));


if($journalcount>0){
//echo "journal";
include("journals1.php");
}
if($articlecount>0){
//echo "articledesc";
include("article-desc.php");
}

if($currentcount>0){
//echo "journal";
include("current-article-desc.php");
}

else if (strpos($page, '-editorial-board-members') !== false) {
$category=str_replace("-editorial-board-members","",$page);
//echo $category;
include("board-members.php");
}
else if (strpos($page, '-reviewer-board-members') !== false) {
$category=str_replace("-reviewer-board-members","",$page);
//echo $category;
include("reviewer-members.php");
}
else if (strpos($page, '-article-in-press') !== false) {
$category=str_replace("-article-in-press","",$page);
//echo $category;
include("article-in-press.php");
}
else if (strpos($page, '-current-issue') !== false) {
$category=str_replace("-current-issue","",$page);
//echo $category;
include("current-issue.php");
}
else if (strpos($page, '-article-process-fee') !== false) {
$category=str_replace("-article-process-fee","",$page);
//echo $category;
include("article-process-fee.php");
}
else if (strpos($page, '-special-issue') !== false) {
$category=str_replace("-special-issue","",$page);
//echo $category;
include("special-issue.php");
}
else if (strpos($page, '-archive') !== false) {
$category=str_replace("-archive","",$page);
//echo $category;
include("archive.php");
}
else if (strpos($page, '-issue') !== false) {
if($cid=="2019"){	
//echo "cid";
include("archive-year.php");
}
}

if($page=="testpage3"){	
include("adesc.php");
}
if($page=="testpage2"){	
include("adesc1.php");
}


if($page=="journals"){	
if($cid=="medical" || $cid=="basic-sciences" || $cid=="engineering" || $cid=="pharmaceutical" || $cid=="clinical"){	
//echo "sub";
include("category-sub.php");
}
else{
//echo "cat";
include("category1.php");
}
}

if($page=="careers"){	
if($cid[0]=="2" && $cid[1]=="-" ){
//echo "sub";
include("careers-desc.php");
}
else{
//echo "cat";
include("careers1.php");
}
}



else{
header("Location:/index");
exit;
}
?>
<?php mysqli_close($db); ?>