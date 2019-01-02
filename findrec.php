
<?php
$course=$_REQUEST['course'];
$link = mysql_connect('localhost', 'root', 'technology'); //changet the configuration in required
if (!$link) {
    die('Could not connect: ' . mysqli_error());
}
mysql_select_db('studentinfo');
$query="select subid,subname from subject where courseid=$course";
$result=mysqli_query($con,$query);

?>
<select name="subject">
<option>Select Subject</option>
<? while($row=mysqli_fetch_array($result)) { ?>
<option value='<?=$row['subid']?>'><?php echo $row['subname']?></option>
<? } ?>
</select>
