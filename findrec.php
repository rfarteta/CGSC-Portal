
<?php

$course=$_REQUEST['course'];

$link = mysqli_connect('localhost', 'root', '', 'studentinfo'); //changet the configuration in required
if (!$link) {
    die('Could not connect: ' . mysqli_error());
}

$query="select subid,subname from subject where courseid=$course";


$result=mysqli_query($link, $query);

?>
<select name="subject">
<option>Select Subject</option>
<? while($row=mysqli_fetch_array($result)) { ?>
    <?php if(!empty($row)){ ?>
<option value='<?=$row['subid']?>'><?php echo $row['subname']?></option>
    <?php } ?> 
<? } ?>
</select>
