<?php
   	include('database/Function.php');
    $db = new Database;
    $db->isLogin();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Entry - Food Detail</title>
	<?php include ('include/links.php'); ?>
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
	<section id="breadcrumb">
		<div class="container">
			<div class="row breadcrumbContainer">
				<div class="col-md-12">
					<a href="dashboard.php" class="breadcrumb-link"><span class="fa fa-dashboard"></span> dashboard</a>
					<a href="add-entry.php"  class="breadcrumb-link"><span class="fa fa-plus-square-o"></span> add entry</a>
					<a href="circumplex.php"  class="breadcrumb-link">Breakfast: STEP 1</a>
					<a href="#"  class="breadcrumb-link  breadcrumb-link-active">STEP 2</a>
				</div>
			</div>
		</div>
	</section>
	<div class="mainPageFoodDetail">
		<div class="mainPageFoodDetailContainer">
			<div class="container foodDetailContainer">
				<div class="row">
					<div class="col-md-6 uploadPhoto">
						<h1 class="uploadPhotoHeader">Upload Photo</h1>
						<div class="row">
							<div class="col-md-6 degree45">
								<h2 class="degreeHeader">45 degress photo</h2>
								<div class="row">
									<div class="col-md-6">
										<label for="file-photo" class="custom-file-take">
										    <i class="fa fa-camera"></i> Take Photo
										</label>
										<input type="file" id="file-photo" accept="image/*" capture="camera" onchange="loadFile(event)">
									</div>
									<div class="col-md-6">
											<label for="file-select" class="custom-file-select">
										    <i class="fa fa-cloud-upload"></i> Select Photo
										</label>
										<input id="file-select" type="file" onchange="loadFile(event)"/>
									</div>
								</div>
								<div class="imgContainer">
									<img src="img/45deg.jpg" class="imgSample" />
								</div>
							</div>
							<div class="col-md-6 degree45">
								<h2 class="degreeHeader">90 degress photo</h2>
								<div class="row">
									<div class="col-md-6">
										<label for="file-photo" class="custom-file-take">
										    <i class="fa fa-camera"></i> Take Photo
										</label>
										<input type="file" id="file-photo" accept="image/*" capture="camera" onchange="loadFile(event)">
									</div>
									<div class="col-md-6">
											<label for="file-select" class="custom-file-select">
										    <i class="fa fa-cloud-upload"></i> Select Photo
										</label>
										<input id="file-select" type="file" onchange="loadFile(event)"/>
									</div>
								</div>
								<div class="imgContainer">
									<img src="img/90deg.jpg" class="imgSample" />
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6 foodDetails">						
						<h1 class="foodDetailsHeader">Details</h1>
						<div class="formContainer">
							<form>
								<div class="row">
									<div class="col-md-6 col-xs-6">
										<div class="form-group">
									    	<label for="foodName" class="labelFood">Food Name</label>
									    	<input type="text" class="form-control" id="foodName">
									  	</div>
									</div>
									<div class="col-md-6 col-xs-6">
										<div class="form-group">
									    	<label for="servingSize" class="labelFood">Serving Size</label>
									    	<input type="text" class="form-control" id="servingSize">
									  	</div>
									</div>
								</div>
							  	<div class="form-group">
							    	<label for="description" class="labelFood">Description</label>
							    	<textarea class="form-control" id="description"></textarea>
							  	</div>
							  	<input type="submit" class="detailSubmit" value="Add to Diary" />
						 	</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>