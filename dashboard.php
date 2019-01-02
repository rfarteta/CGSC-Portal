<?php
session_start();
include("validation.php"); 
include("conection.php");
include("sidebar.php"); 

if(isset($_POST["submit"]))
{
$result = mysqli_query($con,"SELECT * FROM administrator
WHERE adminid='$_POST[uid]' and password='$_POST[pwd]'");
if(mysqli_num_rows($result)==0)
{
$log =  "Login failed";
}
else
{
	header("Location: dashboard.php");
}
}
?>
<section id="page">
<header id="pageheader" class="normalheader">
<h2 class="sitedescription">
  </h2>
</header>

<section id="contents">

<article class="post">
  <header class="postheader">
  <h2>Welcome Admin!</h2>
  </header>
  <section class="entry">
  <form action="" method="post" class="form">
   
   <div class="list-group">
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/> 
  </div>

   <p>
     <input name="comment_post_ID" value="1" type="hidden">
 </p>
  </form>
  </section>
</article>

<article class="post">
  <header class="postheader">
  <h2>&nbsp;</h2>
  </header>
  <section class="entry"></section>
</article>

</section>

<?php 
include("footer.php"); ?>