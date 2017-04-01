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
								<h2 class="degreeHeader">45 degree photo</h2>
								<form action='food-detail.php' method="POST" enctype="multipart/form-data">
								<div class="row">
									<div class="col-md-6 col-xs-6">
										<label for="file-photo-45" class="custom-file-take">
										    <i class="fa fa-camera"></i> Take Photo
										</label>
										<input type="file" id="file-photo-45" name="deg45" accept="image/*" capture="camera" onchange="document.getElementById('deg45').src = window.URL.createObjectURL(this.files[0])">
									</div>
									<div class="col-md-6 col-xs-6">
											<label for="file-select-45" class="custom-file-select">
										    <i class="fa fa-cloud-upload"></i> Select Photo
										</label>
										<input id="file-select-45" type="file" name="deg45" onchange="document.getElementById('deg45').src = window.URL.createObjectURL(this.files[0])"/>
									</div>
								</div>
								<div class="imgContainer">
									<img src="img/45deg.jpg" id="deg45"  class="imgPreview" />
								</div>
							</div>
							<div class="col-md-6 degree90">
								<h2 class="degreeHeader">90 degree photo</h2>
								<div class="row">
									<div class="col-md-6 col-xs-6">
										<label for="file-photo-90" class="custom-file-take">
										    <i class="fa fa-camera"></i> Take Photo
										</label>
										<input type="file" id="file-photo-90" name="deg90" accept="image/*" capture="camera" onchange="document.getElementById('deg90').src = window.URL.createObjectURL(this.files[0])">
									</div>
									<div class="col-md-6 col-xs-6">
										<label for="file-select-90" class="custom-file-select">
										    <i class="fa fa-cloud-upload"></i> Select Photo
										</label>
										<input id="file-select-90" type="file" name="deg90" onchange="document.getElementById('deg90').src = window.URL.createObjectURL(this.files[0])"/>
									</div>
								</div>
								<div class="imgContainer">
									<img src="img/90deg.jpg" id="deg90"  class="imgPreview" />
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6 foodDetails">						
						<h1 class="foodDetailsHeader">Details</h1>
						<div class="formContainer">
								<div class="row">
									<div class="col-md-6 col-sm-6">
										<div class="form-group">
									    	<label for="foodName" class="labelFood">Food Name</label>
									    	<input type="text" class="form-control" id="foodName" name="foodName">
									  	</div>
									</div>
									<div class="col-md-6 col-sm-6">
										<div class="form-group">
									    	<label for="servingSize" class="labelFood">Serving Size</label>
									    	<input type="text" class="form-control" id="servingSize" name="servingSize">
									  	</div>
									</div>
								</div>
							  	<div class="form-group">
							    	<label for="description" class="labelFood">Description</label>
							    	<textarea class="form-control" id="description" name="description"></textarea>
							  	</div>
							  	<input type="submit" name="addDiary" class="detailSubmit" value="Add to Diary" />
						 	</form>
							<?php
								if(isset($_POST['addDiary'])){
									$img45 = $_FILES["deg45"]["tmp_name"];
									$img90 = $_FILES["deg90"]["tmp_name"];

									$_SESSION['item']['name'] = $_POST['foodName'];
									$_SESSION['item']['serving'] = $_POST['servingSize'];
									$_SESSION['item']['description'] = $_POST['description'];
									$_SESSION['item']['deg45'] =  file_get_contents($img45);
									$_SESSION['item']['deg90'] =  file_get_contents($img90);
									if (!array_key_exists('entry', $_SESSION['detail'])){
										$_SESSION['detail']['entry'] = [];
									}									
									array_push($_SESSION['detail']['entry'], $_SESSION['item']);
									$_SESSION['item'] = [];

									echo "<script>window.location.href='entry-list.php';</script>";
								}
							?>						 	
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>