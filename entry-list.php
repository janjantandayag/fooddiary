<?php
   	include('database/Function.php');
    $db = new Database;
    $db->isLogin();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Entry - How do you feel?</title>
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
					<a href="food-detail.php"  class="breadcrumb-link">STEP 2</a>
					<a href="#"  class="breadcrumb-link  breadcrumb-link-active">Entry List</a>
				</div>
			</div>
		</div>
	</section>
	<section id="entryListMain">
		<div class="container entryListContainer">
			<div class="row">
				<div class="col-md-12">
					<h1 class="entryListHeader">Entry List</h1>
					<a href="food-detail.php" class="addMore">add more</a>
				</div>
			</div>
			<div class="row">
				<?php if(!$_SESSION['detail']['entry']) : ?>	
					<div class="col-md-12 noEntryContainer">
						<p class="noEntry">No entries found!</p>
					</div>
				<?php endif;?>
				<?php $i=0; foreach($_SESSION['detail']['entry'] as $entry): ?>
				<div class="col-md-4 entryItemcontainer" id="entryItemcontainer-<?=$i?>">
					<div class="row">
						<div class="col-md-6">
							<img src="data:image/jpeg;base64, <?php echo base64_encode($entry['deg45']); ?>" class="photoPreview"/>
							<img src="data:image/jpeg;base64, <?php echo base64_encode($entry['deg45']); ?>" class="photoPreview"/>
						</div>
						<div class="col-md-6">
							<h2 class="previewName"><?= $entry['name']; ?></h2>
							<div class="servingPreviewContainer">
								<h2 class="servingPreviewHeader">Serving Size: </h2>
								<p class="servingBody"><?= $entry['serving']; ?></p>
							</div>
							<div class="addInfoContainer">
								<h2 class="addInfoHeader">Additional Info: </h2>
								<p class="addInfoBody"><?= $entry['description']; ?></p>
							</div>
							<div class="removeButtonContainer">
								<a href="#" class="removeButton" onclick="removeEntry(<?= $i ?>)" >remove item</a>
							</div>
						</div>
					</div>
				</div>
				<?php $i++;endforeach; ?>
			</div>
			<div class="row">
				<div class="col-md-12 entryListSubmitHeader">
					<a href="#" class="entryListSubmit">submit</a>
				</div>
			</div>
		</div>
	</section>
<script>
	function removeEntry(id){
	 	if(confirm('Are you sure you want to delete?')){
			window.location.href='database/deleteEntry.php?id='+id;
        }
        else{
            return false;
        }
	}
</script>
</body>
</html>