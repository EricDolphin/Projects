
<!-- This is the log in form that users fill out to log into their accounts -->

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Login</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
				<h2>Login</h2>
				<p>Plase fill in your email and password</p>
				<!-- Form creation (process.php is used here to check the data base for already existing users and)-->
					<form action="process.php" method="post">
					
						<!-- "email" input field -->
						<div class="form-group">
							<label>Email Address</label>
							<input type="email" name="email" class="form-control" required>
						</div>
						
						<!-- "password" input field -->
						<div class="form-group">
							<label>Password</label>
							<input type="password" name="password" class="form-control" required>
						</div>
						
						<!-- Submit button to submit the log in attempt -->
						<div class="form-group">
							<input type="submit" name="login" class="btn btn-primary" value="Submit">
						</div>
						<!-- Takes you to the register page to register an account -->
						<p>Don't have an account? <a href="register.php">Click here to register</a>.</p>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>