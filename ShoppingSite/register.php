
<!-- This is the register form that users fill out to register their accounts -->

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Sign Up</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2>Register</h2>
					<p>Please fill this form to create an account.</p>
					
						<!-- Form creation (process.php is used here to check the data base for already existing users and for saving information)-->
					<form action="process.php" method="post">
					
						<!-- "Name" input field -->
						<div class="form-group">
							<label>Name</label>
							<input type="text" name="name" class="form-control" required>
						</div>
						
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
						
						<!-- Submit button to submit the registration -->
						<div class="form-group">
							<input type="submit" name="register" class="btn btn-primary" value="Submit">
							<!-- Takes you to the log in page to log in an account if you don't want to be on the register page -->
						<p>Already registered? <a href="index.php">Login Here!</a>.</p>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>
	