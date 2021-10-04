<?php
require('dbconn.php');
?>


<!DOCTYPE html>
<html>

<!-- Head -->
<head>

	<title>Library Management System </title>

	<!-- Meta-Tags -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="keywords" content="Library Member Login Form Widget Responsive, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates, Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design" />
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!-- //Meta-Tags -->

	<!-- Style --> <link rel="stylesheet" href="css/style.css" type="text/css" media="all">

	<!-- Fonts -->
		<link href="//fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
		<style>
			h2{
				color:orangered;
			}
			h1{
				color:whitesmoke;
			}
			h1:hover{
				padding:1px 0px 1px 0px;
				text-align: center;
				width:80%;
				margin-left:10%;
				background-color: white;
				color:orangered;
				border-radius: 50px;
			}
			
		</style>
	<!-- //Fonts -->

</head>
<!-- //Head -->

<!-- Body -->
<body>

	<h1>Welcome to mk17phoenix Library</h1>

	<div class="container" style="background-color:whitesmoke;margin-bottom:15px;border-radius:50px;">

		<div class="login">
			<h2>Login</h2>
			<form action="index.php" onsubmit="return validate()" method="post">
				<input style="color:blue;border-radius:50px;border:1px solid orangered" id="num" type="number" Name="RollNo" placeholder="RollNo" required="">
				<input style="color:blue;border-radius:50px;border:1px solid orangered" id="pass" type="password" Name="Password" placeholder="Password" required="">
			
			
			<div class="send-button">
				<!--<form>-->
					<input style="background-color:orangered;border-radius:50px;color:white;border:1px solid orangered" type="submit" name="signin"; value="Login">
				</form>
			</div>
			
			<div class="clear"></div>
		</div>

		<div class="register">
			<h2>Registration</h2>
			<form action="index.php" onsubmit="return validate1()" method="post" enctype="multipart/form-data">
				<input style="color:green;border-radius:50px;border:1px solid orangered" id="name" type="text" Name="Name" placeholder="Name" required>
				<input style="color:green;border-radius:50px;border:1px solid orangered" id="email" type="email" Name="Email" placeholder="Email" required>
				<input style="color:green;border-radius:50px;border:1px solid orangered" id="pass1" type="password" Name="Password" placeholder="Password" required>
				<input style="color:green;border-radius:50px;border:1px solid orangered" id="num1" type="number" Name="PhoneNumber" placeholder="Phone Number" required>
				<input style="color:green;border-radius:50px;border:1px solid orangered" id="num2" type="number" Name="RollNo" placeholder="Roll Number" required="">
				<input type="file" Name="image" required="">
				<br>
			
			
			<br>
			<div class="send-button">
			    <input style="background-color:orangered;border-radius:50px;color:white;border:1px solid orangered" type="submit" name="signup" value="Registration">
			    </form>
		</div>
		</div>

		<div class="clear"></div>

	</div>
		</div>

	

<?php
if(isset($_POST['signin']))
{$u=$_POST['RollNo'];
 $p=$_POST['Password'];
 $c=$_POST['Category'];

 $sql="select * from LMS.user where RollNo='$u'";

 $result = $conn->query($sql);
$row = $result->fetch_assoc();
$x=$row['Password'];
$y=$row['Type'];
if(strcasecmp($x,$p)==0 && !empty($u) && !empty($p))
  {//echo "Login Successful";
   $_SESSION['RollNo']=$u;
   

  if($y=='Admin')
   header('location:admin/index.php');
  else
  	header('location:student/index.php');
        
  }
else 
 { echo "<script type='text/javascript'>alert('Failed to Login! Incorrect RollNo or Password')</script>";
}
   

}

if(isset($_POST['signup']))
{
	$name=$_POST['Name'];
	$email=$_POST['Email'];
	$password=$_POST['Password'];
	$mobno=$_POST['PhoneNumber'];
	$rollno=$_POST['RollNo'];
	$type='Student';
	$image=$_FILES['image']['tmp_name'];
	$img_name=$_FILES['image']['name'];

	$image=file_get_contents($image);
	$image=base64_encode($image);

	$sql="insert into LMS.user (Name,Type,RollNo,EmailId,MobNo,Password,img_name,image) values ('$name','$type','$rollno','$email','$mobno','$password','$img_name','$image')";

		if ($conn->query($sql) === TRUE) {
	echo "<script type='text/javascript'>alert('Registration Successful')</script>";
	} else {
		//echo "Error: " . $sql . "<br>" . $conn->error;
	echo "<script type='text/javascript'>alert('User Exists')</script>";
	}
}

?>

</body>
<script>
	
	 function validate(){
		let num=document.getElementById("num");
		let pass=document.getElementById("pass");
		if(num.value.trim()==""||pass.value.trim()==""){
			alert("please fill all the field in login side");
			return false;
		}else{
			return true;
		}
	}
	
	
	
	 function validate1(){
		let name=document.getElementById("name");
		let num1=document.getElementById("num1");
		let num2=document.getElementById("num2");
		let pass=document.getElementById("pass1");
		let email=document.getElementById("email");
		let roll=document.getElementById("roll");
		if(num1.value.trim()==""||num2.value.trim()==""||pass1.value.trim()==""||email.value.trim()==""||roll.value.trim()==""||name.value.trim()==""){
			alert("please fill all the field in Registration side");
			return false;
		}else{
			return true;
		}
	}
</script>

</html>
