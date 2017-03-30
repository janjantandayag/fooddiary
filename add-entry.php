<?php
   	include('database/Function.php');
    $db = new Database;
    $db->isLogin();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<?php include ('include/links.php'); ?>
	<script src="https://code.highcharts.com/highcharts.js"></script>
	<script src="https://code.highcharts.com/modules/exporting.js"></script>
</head>
<body class="mainPage">
	<header>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="left-col">
						<img src="img/logo.png">
						<h1 class="foodAppName" >Food Diary App</h1>
					</div>
					<div class="right-col">
						<ul id="topNav">
							<li><a href="archive.php"><span class="fa fa-calendar-o"></span>archive</a></li>
							<li class="navActive"><a href="add-entry.php"><span class="fa fa-plus-square-o"></span>add entry</a></li>	
							<li><a href="dashboard.php"><span class="fa fa-dashboard"></span>dashboard</a></li>
							<li><a href="database/logout.php"><span class="fa fa-user"></span> Hello, <?= $_SESSION['name'] ?></a></li>
						</ul>	
					</div>
					<div>
						<a href="javascript:void(0);" onclick="myFunction();" class="icon">&#9776;</a>
                        <ul  id="mobile"  class="displayNone">
                            <li><a href="archive.php"><span class="fa fa-calendar-o"></span> archive</a></li>
                            <li  class="mobile-navActive"><a href="add-entry.php"><span class="fa fa-plus-square-o"></span> add entry</a>  </li>   
                            <li><a href="dashboard.php"><span class="fa fa-dashboard"></span> dashboard</a></li>
                            <li><a href="database/logout.php"><span class="fa fa-user"></span> Hello, <?= $_SESSION['name'] ?></a></li>
                        </ul>   
                    </div>
				</div>
			</div>
		</div>
	</header>
	<section id="addEntry-header">
		<div class="container">
			<div class="row addEntry-header--container">
				<div class="col-md-12">
					<h3 class="addEntry--header">Today</h3>
				</div>
			</div>
		</div>
	</section>
	<section id="addEntry-body">
		<div class="container">
			<div class="row addEntry-body--container">
				<div class="col-md-3 col-sm-6 mealContainer">
					<p class="mealName">Breakfast</p>
					<a href="#" title="Add Entry" class="addEntryIcon"><span class="fa fa-plus"></span>+</a>
					<div class="mealQuantityContainer">
						<p class="mealQuantity">3</p>
					</div>
					<div class="show-container none">
						<a href="#" class="show"><span class="fa fa-plus">show</span></a>
					</div>
					<div class="entryContainer">
						<div class="row">
							<div class="col-md-4">
								<img src="img/bukayo.jpg" class="bodyImg"/>
							</div>
							<div class="col-md-8 ">
								<h2 class="entryName">Bukayo</h2>
								<p class="servingSize">5 cups</p>
								<p class="entryDate">10/12/17 7:23:02</p>
							</div>
						</div>						
					</div>
					<div class="entryContainer">
						<div class="row">
							<div class="col-md-4">
								<img src="img/halo-halo.jpg" class="bodyImg"/>
							</div>
							<div class="col-md-8 ">
								<h2 class="entryName">halo-halo</h2>
								<p class="servingSize">5 cups</p>
								<p class="entryDate">10/12/17 7:25:02</p>
							</div>
						</div>						
					</div>
					<div class="entryContainer">
						<div class="row">
							<div class="col-md-4">
								<img src="img/kalderata.jpg" class="bodyImg"/>
							</div>
							<div class="col-md-8 ">
								<h2 class="entryName">kaldereta</h2>
								<p class="servingSize">5 cups</p>
								<p class="entryDate">10/12/17 7:23:02</p>
							</div>
						</div>						
					</div>
					<div class="hide-item">
						<a href="#" class="hideItem"><span class="fa fa-plus">hide entries</span></a>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 mealContainer">
					<p class="mealName">Lunch</p>
					<a href="#" title="Add Entry" class="addEntryIcon"><span class="fa fa-plus"></span>+</a>
					<div class="mealQuantityContainer">
						<p class="mealQuantity">2</p>
					</div>
					<div class="show-container none">
						<a href="#" class="show"><span class="fa fa-plus">show entries</span></a>
					</div>
					<div class="entryContainer">
						<div class="row">
							<div class="col-md-4">
								<img src="img/halo-halo.jpg" class="bodyImg"/>
							</div>
							<div class="col-md-8 ">
								<h2 class="entryName">halo-halo</h2>
								<p class="servingSize">5 cups</p>
								<p class="entryDate">10/12/17 7:25:02</p>
							</div>
						</div>						
					</div>
					<div class="entryContainer">
						<div class="row">
							<div class="col-md-4">
								<img src="img/kalderata.jpg" class="bodyImg"/>
							</div>
							<div class="col-md-8 ">
								<h2 class="entryName">kaldereta</h2>
								<p class="servingSize">5 cups</p>
								<p class="entryDate">10/12/17 7:23:02</p>
							</div>
						</div>						
					</div>
					<div class="hide-item">
						<a href="#" class="hideItem"><span class="fa fa-plus">hide</span></a>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 mealContainer">
					<p class="mealName">Dinner</p>
					<a href="#" title="Add Entry" class="addEntryIcon"><span class="fa fa-plus"></span>+</a>
					<div class="mealQuantityContainer">
						<p class="mealQuantity">1</p>
					</div>
					<div class="show-container none">
						<a href="#" class="show"><span class="fa fa-plus">show entries</span></a>
					</div>
					<div class="entryContainer">
						<div class="row">
							<div class="col-md-4">
								<img src="img/kalderata.jpg" class="bodyImg"/>
							</div>
							<div class="col-md-8 ">
								<h2 class="entryName">kaldereta</h2>
								<p class="servingSize">5 cups</p>
								<p class="entryDate">10/12/17 7:23:02</p>
							</div>
						</div>						
					</div>
					<div class="hide-item">
						<a href="#" class="hideItem"><span class="fa fa-plus">hide entries</span></a>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 mealContainer">
					<p class="mealName">Snack</p>
					<a href="#" title="Add Entry" class="addEntryIcon"><span class="fa fa-plus"></span>+</a>
					<div class="mealQuantityContainer">
						<p class="mealQuantity">0</p>
					</div>
					<div class="show-container">
						<a href="#" class="show"><span class="fa fa-plus">show entries</span></a>
					</div>
					<div class="hide-item none">
						<a href="#" class="hideItem"><span class="fa fa-plus">hide entries</span></a>
					</div>
				</div>
			</div>
		</div>
	</section>
</body>
</html>