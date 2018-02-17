<html>
<head>
<title> PHP multipage form</title>
<link rel="stylesheet" href="style.css"/>
</head>
<body>
<div class="container">
<div class="main">
<h2>PHP Multi Form</h2>
<?php
session_start();
if(isset($_POST['state']))
{
	if(!empty($_SESSION['post']))
	{
		if(empty($_POST['address1'])
			||empty($_POST['city'])
			||empty($_POST['pin'])
			||empty($_POST['state']))
			{
				$_SESSION['error_page3'] = "mandtory fields required";
				header("location:page3_form.php");
			}
			else
			{
				foreach ($_POST as $key => $value)
				{
					$_SESSION['post'][$key] = $value;
				}
				extract($_SESSION['post']);
				$connection = mysql_connect("localhost","root","");
				$db = mysql_select_db("phpmultipage",$connection);
				$query = mysql_query("insert into detail (name,email,contact,password,religion,nationality,gender,qualification,experience,address1,address2,city,pin,state)values ('$name','$email','$contact','$password','$religion','$nationality','$gender','$qualification','$experience','$address1','$address2','$city','$pin','$state')",$connection);
				if($query){
					echo 'form submitted';
				}
					else{
						echo 'form failed';
					}
					unset($_SESSION['post']);
			}
	}
	else
	{
		header("location:page1_form.php");
}}
else{
	header("location:page1_form.php");
}?>

</div>
</div>
</body>
</html>