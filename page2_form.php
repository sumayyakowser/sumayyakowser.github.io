<?php
session_start();
if(isset($_POST['name'])){
	if(empty($_POST['name'])
		||empty($_POST['email'])
		||empty($_POST['contact'])
		||empty($_POST['password'])
		||empty($_POST['confirm'])){
			$_SESSION['error'] = "Mandatory fields required";
			header("location:page1_form.php");
		}
	else
	{
		$_POST['email'] = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
		if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
			
			if(!preg_match("/^[0-9]{10}$/",$_POST['contact'])){
				$_SESSION['error'] = "10 digit contact number required";
				header("location:page1_form.php");
			}
			else{
				if(($_POST['password'] === ($_POST['confirm'])){
					foreach($_POST as $key => $value){
						$_SESSION['post'][$key] = $value;
					}
				}
				else
				{
					$_SESSION['error'] = "Passwords doesnot match";
					header("location:page1_form.php");
				}
			}
		}
		else
		{
			$_SESSION['error'] = "Invalid Email";
			header("location:page1_form.php");
}}}
else{
	if(empty($_SESSION['error_page2']))
	{
		header("location: page1_form.php");
}}
?>
<html>
	<body>
		<div class="container">
			<div class="main">
				<h2> PHP Multipage Form</h2>
				<span id="error">
				<?php
				if(!empty($_SESSION['error_page2']))
				{
					echo $_SESSION['error_page2'];
					unset($_SESSION['error_page2']);
				}
				?>
				</span>
				<form action ="page3_form.php" method ="post">
				<label>Religion:</label>
				<input name ="religion" id="religion" type = "text">
				<label>Nationality:</label>
				<input name ="nationality" id="nationality" type = "text">
				<label>Gender:</label>
				<input type="radio" name ="gender" value = "male" required>male
				<input type="radio" name ="gender" value = "female" required>Female
				<label> Education:</label>
				<select name = "qualification">
				<option value="">---select---</option>
				<option value="graduation">graduation</option>
				<option value="postgraduation">postgraduation</option>
				<option value="others">others</option>
				</select>
				<label> Job Experience:</label>
				<select name="experience">
				<option value="">---select---</option>
				<option value="fresher">Fresher</option>
				<option value="less">Less Than 2Year</option>
				<option value="more">More than 2 year</option>
				</select>
				<input type= "reset" value ="reset"/>
				<input type= "submit" value="next"/>
				</form>
			</div>
		</div>
		</body>
		</html>