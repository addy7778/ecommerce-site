<?php  $con=mysql_connect("localhost","root","");
 mysql_select_db("e_commerce",$con)?>
<html><head><link rel='stylesheet' href='css/bootstrap.min.css'> <script src='css/jquery.min.js'></script>  <script src='css/bootstrap.min.js'></script>  <link rel='stylesheet' href='css/all.css'>  <link rel='stylesheet' type='text/css' href='style.css' /><title>Rating</title><link href="mystyle.css" rel="stylesheet" type="text/css"  />
<link rel="stylesheet" type="text/css" href="tcal.css" />
<script type="text/javascript" src="tcal.js"></script> 
<script language="javascript">
function check()
{
if (document.form1.txtFeedbackDate.value=="")
{
alert("Please Enter FeedbackDate");
document1.form1.txtFeedbackDate.focus();
return;
}
if (document.form1.txtPersonName.value=="")
{
alert("Please Enter PersonName");
document1.form1.txtPersonName.focus();
return;
}
if (document.form1.txtContactNo.value=="")
{
alert("Please Enter ContactNo");
document1.form1.txtContactNo.focus();
return;
}
if (document.form1.txtFeedbackAbout.value=="")
{
alert("Please Enter FeedbackAbout");
document1.form1.txtFeedbackAbout.focus();
return;
}
if (document.form1.txtFeedbackDescription.value=="")
{
alert("Please Enter FeedbackDescription");
document.form1.txtFeedbackDescription.focus();
return;
}
document.form1.submit();
}
</script>
</head><body>
<form name="form1" method="post" >
<table style="width:1000px; margin-left:auto; margin-right:auto;"><tr><td><?php include("Header2.php")?></td><td></tr>
<tr><td  align="center" valign="top">
<table class='table table-bordered table-hover table-striped'" border="0" width="600" height="400">
<tr><td align="right"><span class="mylabel">Rating</span></td><td align="left" <input type="text" value=""/> <select name="txtFeedbackDate">
             <option value="*">*</option>
             <option value="* *">* *</option>
             <option value="* * *">* * *</option>
             <option value="* * * *">* * * *</option>
             <option value="* * * * *">* * * * *</option>

		</select> </td></tr>
<tr><td align="right"><span class="mylabel">PersonName</span></td><td align="left"><input type="text" value="" name="txtPersonName" name="txtPersonName"/></td></tr>
<tr><td align="right"><span class="mylabel">ContactNo</span></td><td align="left"><input type="text" value="" name="txtContactNo" name="txtContactNo"/></td></tr>
<tr><td align="right"><span class="mylabel">FeedbackAbout</span></td><td align="left"><input type="text" value="" name="txtFeedbackAbout" name="txtFeedbackAbout"/></td></tr>
<tr><td align="right"><span class="mylabel">FeedbackDescription</span></td><td align="left"><textarea rows="5" cols="20" name="txtFeedbackDescription" name="txtFeedbackDescription"></textarea></td></tr>
<tr><td colspan="2" align="center"><input type="submit" value="Save" id="Save"  onClick="check()" name="Save" /></td></tr>
<tr><td colspan="2">
 <?php
 
  if(isset($_POST['Save']))
   {         
       
     $sql="INSERT INTO feedbacks ( `FeedbackDate`, `PersonName`, `ContactNo`, `FeedbackAbout`, `FeedbackDescription`) VALUES	                            ('$_POST[txtFeedbackDate]','$_POST[txtPersonName]','$_POST[txtContactNo]','$_POST[txtFeedbackAbout]','$_POST[txtFeedbackDescription]')";
      if($_POST['txtPersonName']!=NULL && $_POST['txtContactNo']!=NULL && $_POST['txtFeedbackAbout']!=NULL && $_POST['txtFeedbackDescription']!=NULL)
	  {
    mysql_query($sql);
   
    mysql_close($con);
	?>
    
    <div style="border-radius:20px; border:solid 1px;background-color:#AB0A16; color:#ffffff; text-align:center; width:250px;">
	Feedbacks Details saved</div>
    
	<?php }
    
   }	
 ?>

</td></tr>
</table></td></tr></table>
</form></body></html>

