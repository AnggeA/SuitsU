<!DOCTYPE html>
<html>
<head>
	<title>Suits U</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

	<header>
		
		<a href="#"><label>Suits U</label></a>

		<input type="text" name="search" placeholder="Search">
		<img src="img/search.webp" class="search-img">
		<a href="#loginPage"><img src="img/user.webp" class="user-img"></a>
		<a href="#"><img src="" class=""></a>

	</header>


<div class="wrapper" id="loginPage">
		<div class="title-text">
			<div class="title login">Suits U</div>
		</div>
		<div class="form-container">
			<div class="slide-controls">
				<input type="radio" name="slider" id="login" checked>
				<input type="radio" name="slider" id="signup">
				<label for="login" class="slide login">Login</label>
				<label for="signup" class="slide signup">Signup</label>
				<div class="slide-tab"></div>
			</div>

			<div class="form-inner">
				<form action="login.php" method="POST" class="login">

					<div class="field">
						<input type="text" name="username" placeholder="Username" required>
					</div>
					<div class="field">
						<input type="password" name="password" placeholder="Password" required>
					</div>
					<div class="fieldbtn">
						<input type="submit" name="login-btn" value="Login">
					</div>
					<br>
					<center>
					<div class="pass-link"><a href="#">Forgot password?</a></div>
					</center>
					<br>
					<hr class="hr">
					<br>
					<center>
					<div class="signup-link">Not a member? <a href="#">Sign Up Now!</a></div>
					</center>
				</form>

				<form action="signup.php" method="POST" class="signup">
					<div class="field1">
						<input type="text" placeholder="Firstname" name="fname" required>
						<input type="text" placeholder="Lastname" name="lname" required>
					</div>
					
					<div class="field1">
						<input type="date" placeholder="Birthdate" name="bdate" required>
						
					<label>Gender</label>
						<select name="gender" class="gender">
							<option value="M">Male</option>
							<option value="F">Female</option>
							<option value="X">Prefer not to say</option>
						</select>
				
					</div>

					<div class="field1">
						<input type="text" placeholder="Mobile Number" name="mobileNum" required>
						<input type="text" placeholder="Email(Optional)" name="email">
					</div>
					<div class="field1">
						<input type="text" placeholder="Username" name="username" required>
						<input type="password" placeholder="Password" name="password" required>
					</div>

					<div class="fieldbtn">
						<input type="submit" name="signup-btn" value="Sign Up">
					</div>
					<br>
					<div class="login-link">Already have an account? <a href="#">Login here</a></div>
				</form>
		</div>
	</div>
</div>

	<script>
		const loginForm = document.querySelector("form.login");
		const signupForm = document.querySelector("form.signup");
		const loginBtn = document.querySelector("label.login");
		const signupBtn = document.querySelector("label.signup");
		const signuplink = document.querySelector(".signup-link a");
		const loginlink = document.querySelector(".login-link a");
		signupBtn.onclick = (()=>{
			loginForm.style.marginLeft = "-50%";
		});
		
		loginBtn.onclick = (()=>{
			loginForm.style.marginLeft = "0%";
		});
		signuplink.onclick = (()=>{
			signupBtn.click();
			return false;
		});
		loginlink.onclick = (()=>{
			loginBtn.click();
			return false;
		});
	</script>


</body>
</html>