<?php
include("conection.php");

$studid =$_POST['stuid'];
$subid =$_POST['subid'];
$submark =$_POST['subidd'];
$resul= $_POST['result'];
$comment = $_POST['comment'];
for($i=0;$i<$_POST["tst"];$i++)
{
	for($j=0;$j<$_POST['tsubb'];$j++)
	{
	 $sql="INSERT INTO examination (studid,subid,courseid,internaltype,maxmarks,scored,result,comment)
VALUES
('$studid[$i]','$subid[$j]','$_POST[ttcourse]','$_POST[tintt]','$_POST[tmarks]','$submark[$j]','$resul[$j]','$comment[$j]')";

if (!mysqli_query($con,$sql,$con))
  {
  die('Error: ' . mysqli_error());
  }
  else
  {
	  echo "Record inserted Successfully...";
  }

	}
	 
}
/*
  //$listvals=$_POST['mylist'];
  // $n=count($listvals);
  $examid=$_POST['examid'];
    $studid =$_POST['studid'];
	$scored =$_POST['scored'];
	$result =$_POST['result'];
//echo  $_POST["totstdnt"];
  for($i=0;$i<$_POST["totstdnt"];$i++)
  {
     //echo "Item".$stuid[$i]."<br>\n";
	 $sql="INSERT INTO examination (examid, studid, subid, internaltype, scored, result)
VALUES
('$examid[$i]','$_POST[subid]','$_POST[totclass]','$attclass[$i]','$percent[$i]','$comment[$i]')";

if (!mysqli_query($con,$sql,$con))
  {
  die('Error: ' . mysqli_error());
  }
  else
  {
	  echo "Record inserted Successfully...";
  }
echo "1 record added";
	 
   }

$rescourse = mysqli_query($con,"SELECT * FROM course where courseid='$_POST[course]'");
while($row1 = mysqli_fetch_array($rescourse))
  {
	$courseid =   $row1["courseid"];
	$coursename =   $row1["coursename"];
  }
  $resclass = mysqli_query($con,"SELECT * FROM subject where subid='$_POST[subject]'");
while($row2 = mysqli_fetch_array($resclass))
  {
	$subid =   $row2["subid"];
	$subname =   $row2["subname"];
  }
  */
  
  
    $restotst = mysqli_query($con,"SELECT * FROM studentdetails 
 where courseid='$_POST[course]' AND semester ='$_POST[semester]'");
$tstudent = mysqli_num_rows($restotst);

  $restotstrec = mysqli_query($con,"SELECT * FROM studentdetails where courseid='$_POST[course]' AND semester='$_POST[semester]'");

$ressub = mysqli_query($con,"SELECT * FROM subject where courseid='$_POST[course]' AND semester='$_POST[semester]'");

$restotsub = mysqli_query($con,"SELECT * FROM subject where courseid='$_POST[course]' AND semester='$_POST[semester]'");
$tsub = mysqli_num_rows($restotsub);
?>
<table width="1000" border="1">
<form name="form3" method="post" action="">
<input type="hidden" value="<?php echo $tsub; ?>" name="tsubb" />
  <tr>
    <td>&nbsp; Course : <?php echo $_POST['course']; ?>
    <input type="hidden" value="<?php echo $_POST['course']; ?>" name="ttcourse" />
    </td>
    <td>&nbsp; Semester : <?php echo $_POST['semester']; ?>'th Semester
    <input type="hidden" value="<?php echo $_POST['semester']; ?>" name="tsemm" />
    </td>
  </tr>
  <tr>
    <td>&nbsp; Internal Type : <?php echo $_POST['internal']; ?>'st Internal
    <input type="hidden" value="<?php echo $_POST['internal']; ?>" name="tintt" />
    </td>
    <td>&nbsp; Max marks : <?php echo $_POST['marks']; ?>
    <input type="hidden" value="<?php echo $_POST['marks']; ?>" name="tmarks" />
    </td>
  </tr>
</table><br>
<table width="1000" border="1">
  <tr>
    <td width="107"><strong>Roll No.</strong></td>
    <td width="144"><strong>Student Name</strong></td>
    <?php
	while($rowab = mysqli_fetch_array($ressub))
  {
    echo "<td><strong> $rowab[subname] </strong>
	<input type='hidden' value='$rowab[subid]' name='subid[]'>
	</td>";

  }
    ?>
    <td width="204"><strong>Total Marks</strong></td>
    <td width="257"><strong>Result</strong></td>
    <td width="258"> Comments</td>
  </tr>
<?php
 
 while($rowa = mysqli_fetch_array($restotstrec))
  {
  ?>
  <tr>
    <td>
      <label for="textfield3"><?php echo $rowa[studid]; ?></label></td>
    <td><?php echo $rowa[studfname]. " ". $rowa[studlname] ; ?></td>
    
<input type="hidden" value="<?php echo $rowa[studid]; ?>" name="stuid[]"?/>
<input type="hidden" value="<?php echo $tstudent; ?>" name="tst"?/>
       <?php
	   $ressubb = mysqli_query($con,"SELECT * FROM subject where courseid='$_POST[course]' AND semester='$_POST[semester]'");
	while($rowabb = mysqli_fetch_array($ressubb))
  {
    echo "<td><input type='text' name='subidd[]' size='5'></td>";
	
  }
    ?>

    
    <td>
      <label for="textfield4"></label>
      <input name="textfield4" type="text" size="5">
</td>
    <td>
      <label for="result"></label>
      <input type="text" name="result[]" id="result">
</td>
    <td>
      <label for="textarea"></label>
      <textarea name="comment[]" id="textarea" cols="35" rows="1"></textarea>
</td>
  </tr>
  <?php
  }
  ?>
</table>
<br>
<table width="1000" border="0">
  <?php
 
 while($rowa = mysqli_fetch_array($restotstrec))
  {
  ?>
  <?php
  }
  ?>
  <tr align="center">
    <td height="30" colspan="5"><input type="submit" name="button" id="button" value="Insert Records">
      <input type="submit" name="button2" id="button2" value="Reset"></td>
  </tr>
</table>
<p>&nbsp;</p>
