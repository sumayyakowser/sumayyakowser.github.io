<?php
	session_start();
	?>
<html>
	<head>
		<title> MULTI PAGE FORM</title>
		<link rel="stylesheet" href="style.css"/>
	</head>
	<body>
		<div class="container">
			<div class="main">
				<h2> MULTI PAGE FORM</h2>
					<span id="error">
					<?php
						if(!empty($_SESSION['error']))
						{
							echo $_SESSION['error'];
							unset($_SESSION['error']);
						}
					?>
					</span>
				<form action="page2_form.php" method="post">
					<label>Full Name:</label>
					<input type="text" name="name" required>
					<label>Email:</label>
					<input type="email" name="email" required>
					<label> Contact</label>
					<input type="text" name="contact" required>
					<label> Password</label>
					<input type="Password" name="password">
					<label> Re-enter Password</label>
					<input type="password" name="confirm">
					<input type="reset" value="reset">
					<input type="submit" value="next">
				</form>
			</div>
		</div>
	</body>
</html>