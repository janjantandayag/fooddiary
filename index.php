<?php
	include ('database/Function.php');	
	if(isset($_SESSION['loggedIn']) == true){
		echo "<script>
			alert('You are currently logged in! Please logged to used another account');
			window.location = 'dashboard.php';
		</script>";
	}
	else{
?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
	<?php include ('include/links.php'); ?>
</head>
<body>
	<section id="mainPage">
		<div class="container">
			<div class="row">
				<div class="col-md-6">	
					<div class="form-container">
						<div class="form--header">
							<img src="img/logo.png" class="img-logo"/>
							<h1>Food App</h1>
						</div>
						<div class="form--body">
							<div class="form">
								<form action="index.php" method="POST">
									<input type="text" class="form-control" name='username' required placeholder="username" />
									<input type="password" class="form-control" name='password' required placeholder="password" />
									<input type="submit" name='submit' value="Log in" />
								</form>
								<?php
									$db = new Database;
									if(isset($_POST['submit'])){
										if($db->isExist($_POST['username'], $_POST['password'])){
											$db->login($_POST['username'], $_POST['password']);
										}
										else{ ?>
								<div class="message">
									<p></p>Incorrect username or password! Please try again!</p>
								</div>
								<?php		
									}
								}
								?>
							</div>
						</div>
						<div class="form--footer">
							<a href="#">Create an account</a>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-sm-6">
					<div id="myCarousel" class="carousel slide" data-ride="carousel">
					  <!-- Indicators -->
					  <ol class="carousel-indicators">
					    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
					    <li data-target="#myCarousel" data-slide-to="1"></li>
					  </ol>
					  <!-- Wrapper for slides -->
					  <div class="carousel-inner" role="listbox">
					    <div class="item active">
					      <img src="img/mobile-carousel.png" alt="Mobile View">
					    </div>
					    <div class="item">
					      <img src="img/web-carousel.png" alt="Desktop View">
					    </div>
					  </div>
				</div>
			</section>
		</div>
	</div>	
<script>
	$('.message').fadeOut(3000);	
</script>
</body>
</html>
<?php } ?>