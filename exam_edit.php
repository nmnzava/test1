<?php
include("auth.php");
require('db.php');
$id=$_REQUEST['id'];
$query = "SELECT * from users where id='".$id."'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error($con));
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Update User</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
<p><a href="dashboard.php">Dashboard</a> 
| <a href="insert.php">Insert New Record</a> 
| <a href="logout.php">Logout</a></p>
<h1>Update User</h1>
<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$id=$_REQUEST['first_name'];
$trn_date = date("last_name");
$username=$_REQUEST['username'];
$email =$_REQUEST['gender'];
$submittedby = $_SESSION["address"];
$update="update users set trn_date='".$trn_date."',
username='".$username."', email='".$email."' where id='".$id."'";
mysqli_query($con, $update) or die(mysqli_error($con));
$status = "User Updated Successfully. </br></br>
<a href='user_view.php'>View Updated User</a>";
echo '<p style="color:#FF0000;">'.$status.'</p>';
}else {
?>
<div>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<input name="id" type="hidden" value="<?php echo $row['id'];?>" />
<p><input type="text" name="first_name" placeholder="first_name" 
required value="<?php echo $row['last_name'];?>" /></p>
<p><input type="text" name="email" placeholder="Enter email" 
required value="<?php echo $row['email'];?>" /></p>
<p><input name="submit" type="submit" value="Update" /></p>
</form>
<?php } ?>
</div>
</div>
</body>
</html>