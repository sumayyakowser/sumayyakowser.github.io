<?php
session_start();
if(isset($_POST['gender'])){
	if(empty($_POST['gender'])
		||empty($_POST['nationalityality'])
		||empty($_POST['religion'])
		||empty($_POST['qualification'])
		||empty($_POST['experience']))
		{
			$_SESSION['error_page2'] = "mandatory fields are missing";
			header("location:page2_form.php");
		}
		else
		{
			foreach ($_POST as $key => $value)
			{
				$_SESSION['post'][$key] = $value;
			}
		}
}
else
{
	if(empty($_SESSION['error_page3']))
	{
		header("location:page1_form.php");
	}
}
?>
<html>
<head>
<link rel="stylesheet" href="style.css"/>

</head>
<body>
<div class ="container">
<div class="main">
<h2>multi page form</h2>
<span id="error">
<?php
if(!empty($_SESSION['error_page3']))
{
	echo $_SESSION['error_page3'];
	unsset($_SESSION['error_page3']);
}
?>
</span>
<form action="page4_insertdata.php" method="post">
<b>Complete address</b>
<label>address line 1:</label>
<input name="address1" id="address1" type="text" required>
<label>address line 2:</label>
<input name="address2" id="address2" type="text" required>
<label>city:</label>
<input name="city" id="city" type="text" required>
<label>pincode:</label>
<input name="pin" id="pin" type="text" required>
<label>state:</label>
<input name="state" id="state" type="text" required>

<input type="reset" value="reset"/>
<input name="submit" type="submit" value="Submit"/>
</form>






</div>
</div>
</body>
</html>