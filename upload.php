<?php
include 'connect.php';
$id = $_GET['updateid'];
$sql = "Select * from `crud` where id=$id";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
$name = $row['Name'];
$email = $row['Email'];
$mobile = $row['Mobile'];
$password = $row['Password'];
if (isset($_POST['submit'])) {
$name = $_POST['name'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$password = $_POST['password'];
$sql = "update `crud` set 
id=$id,name='$name',email='$email',mobile='$mobile',password='$password' where 
id=$id";
$result = mysqli_query($con, $sql);
if ($result) {
// echo "Updated successfully";
header('location:display.php');
} else {
die(mysqli_error($con));
}
}
?>
<!doctype html>
<html lang="en">

<head>
<link rel="stylesheet"
href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<title>Crud operation</title>
</head>

<body>
<div class="container my-5">
<form method="post">
<div class="form-group">
<label>Name</label>
<input type="text" class="form-control" placeholder="Enter your 
name" name="name" autocomplete="off" value=<?php echo $name; ?>>
</div>
<div class="form-group">
<label>Email</label>
<input type="email" class="form-control" placeholder="Enter your 
email" name="email" autocomplete="off" value=<?php echo $email; ?>>
</div>
<div class="form-group">
<label>Mobile</label>
<input type="text" class="form-control" placeholder="Enter your 
mobile number" name="mobile" autocomplete="off" value=<?php echo $mobile; ?>>
</div>
<div class="form-group">
<label>Password</label>
<input type="text" class="form-control" placeholder="Enter your 
password" name="password" autocomplete="off" value=<?php echo $password; ?>>
</div>
<button type="submit" class="btn btn=primary" name="submit">Update</button>
</form>
</div>
</body>
</html>
