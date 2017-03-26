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
								<form>
									<input type="text" class="form-control" placeholder="username" />
									<input type="password" class="form-control" placeholder="password" />
									<input type="submit" value="Log in" />
								</form>
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
</body>
</html>