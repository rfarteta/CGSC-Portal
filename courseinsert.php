<?php
include("validation.php");
include("conection.php");

$totcourse = mysqli_query($con,"SELECT MAX(courseid) FROM course");

 while($row1 = mysqli_fetch_array($totcourse))
  {
$totid = $row1[0]+1;
  }
if(isset($_POST["button"]))
{
$sql="INSERT INTO course (courseid, coursename, comment, coursekey)
VALUES
('$_POST[courseid]','$_POST[coursename]','$_POST[comment]','$_POST[coursekey]')";

if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error());
  }
  else
  {
	  echo "1 record Inserted Successfully...";
  }
}

if(isset($_POST["button2"]))
{
mysqli_query($con,"UPDATE course SET coursename='$_POST[coursename]', 	comment='$_POST[comment]', 	coursekey='$_POST[coursekey]' WHERE courseid = '$_POST[courseid]'");
echo "Record updated successfully...";
}

if(isset($_GET["view"])){
if($_GET["view"] == "course")
{
$result = mysqli_query($con,"SELECT * FROM course where courseid='$_GET[slid]'");	
 while($row1 = mysqli_fetch_array($result))
  {
	$totid = $row1["courseid"];
	$coursename = $row1["coursename"];
	$comment = $row1["comment"];
	$coursekey = $row1["coursekey"];
	}
}
}
else
{
$result = mysqli_query($con,"SELECT * FROM course");
}

?> 
<form name="form1" method="post" action="" id="formID">
  <p>
    <label for="textfield">Course ID</label>
    <input type="text" name="courseid" id="textfield" class="validate[required] text-input" value="<?php echo $totid; ?>" readonly >
  </p>
  <p>
    <label for="textfield2">Course Name</label>
    <input type="text" name="coursename" id="textfield2" class="validate[required,custom[onlyLetterSp]] text-input" value="<?php
     if(!empty($coursename)){ 
     echo $coursename; 
     }
     ?>">
  </p>
  <p>
    <label for="textarea">Comment</label>
    <textarea name="comment" id="textarea" class="validate[required]" cols="25" rows="5" ><?php 
    if(!empty($comment)){ 
    echo $comment; }?>
    </textarea>
  </p>
  <p>

    <label for="coursekey">Course Key</label>
    <input type="text" name="coursekey" id="coursekey" class="validate[required,custom[onlyLetterSp]] text-input" value="<?php if(!empty($coursekey)){ echo $coursekey; }?>">
  </p>
  <p>
    <input class = "button" type="submit" name="button" id="button" value="Submit">
    <input class = "button" type="submit" name="button2" id="button2" value="Update" />
    <input class = "button" type="submit" name="button2" id="button2" value="Reset">
<form id="myform">
  <input type="button" value="Close" name="B1" onClick="parent.emailwindow.hide()" /></p>
</form>
  </p>
</form>
<p>&nbsp;</p>
