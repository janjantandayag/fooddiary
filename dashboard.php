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
	<script src="highChart/highcharts.js"></script>
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
							<li><a href="add-entry.php"><span class="fa fa-plus-square-o"></span>add entry</a>	</li>	
							<li class="navActive"><a href="dashboard.php"><span class="fa fa-dashboard"></span>dashboard</a></li>
							<li><a href="database/logout.php"><span class="fa fa-user"></span> Hello, <?= $_SESSION['name'] ?></a></li>
						</ul>	
					</div>
					<div>
						<a href="javascript:void(0);" onclick="myFunction();" class="icon">&#9776;</a>
                        <ul  id="mobile"  class="displayNone">
                            <li><a href="archive.php"><span class="fa fa-calendar-o"></span> archive</a></li>
                            <li><a href="add-entry.php"><span class="fa fa-plus-square-o"></span> add entry</a>  </li>   
                            <li class="mobile-navActive"><a href="dashboard.php"><span class="fa fa-dashboard"></span> dashboard</a></li>
                            <li><a href="database/logout.php"><span class="fa fa-user"></span> Hello, <?= $_SESSION['name'] ?></a></li>
                        </ul>   
                    </div>
				</div>
			</div>
		</div>
	</header>
	<section id="visualization">
		<div class="container">
			<div class="row">
				<div class="col-md-6 mealCountContainer">
					<div class="stat-header">
						<h3 class="mealHeader">Total Food Intake By Meal</h3>
					</div>
					<?php 
						$ids = [1,2,3,4];
						foreach($ids as $id):
					?>
					<div class="mealEntryContainer">
						<p class="mealLabelName"><?= $db->getMealName($id); ?></p>
						<div class="entryCountContainer">
							<p class="entryCount"><?= $db->countTotalEntries($id); ?></p>
							<p class="entryLevel">entries</p>
						</div>
					</div>
					<?php endforeach; ?>
					<div class="totalCountContainer">
						<p class="totalCount">Total</p>
						<div class="entryCountContainer">
							<p class="totalEntryCount"><?= $db->getTotalEntry(); ?></p>
							<p class="totalLabel">entries</p>
						</div>
					</div>
				</div>
				<div class="col-md-6 circumplexContainer">
					<div class="circumplex-header">
						<h3 class="circumplexTitle">Food Distribution (Circumplex Model)</h3>
					</div>
					<div class="circumplex-body">		
						<div class="circumplex-model" id="circumplex-model">	
							<div class="label top">Pumped</div>
							<div class="label left">Negative</div>
							<div class="label right">Positive</div>
							<div class="label bottom">Relaxed</div>
							<?php
								$entries = $db->getEntries();
								foreach($entries as $entry){ ?>						
							<div class="circumplexFood" style="left:<?=$entry['xCoor']-5;?>%;top:<?=$entry['yCoor']-5;?>%">
								<h5 class="circumplexFoodName"><?=$entry['food_name'];?></h5>
								<img src="database/displayImage.php?itemId=<?=$entry['item_id']?>" style="border:<?= $db->getBorderColor($entry['emotion_id']); ?>;" class="circumplexFoodImg" />
							</div>
								<?php }	?>
						</div>		
					</div>
				</div>
			</div>
		</div>
	</section>
	<section id="visualization">
		<div class="container">
			<div class="row">
				<div class="col-md-6 statContainer">
					<div class="stat-header">
						<!-- <h3 class="statTitle">Statistics </h3> -->
					</div>
					<div id="statChart">
						<?php $emotions = $db->getEmotion(); ?>				
					</div>
				</div>
				<div class="col-md-6 statContainer">
					<div class="stat-header">
						<!-- <h3 class="statTitle">Statistics </h3> -->
					</div>
					<div id="statChartByMeal">
						<?php $emotions = $db->getEmotion(); ?>				
					</div>
				</div>
			</div>
		</div>
	</section>
	<section id="recent-entries">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="recentEntriesHeading">
							<h3 class="recentEntriesHeader">Recent Entries</h3>
					</div>
				</div>
			</div>
			<div class="row recent-container">
				<?php foreach($db->getRecentEntries() as $recent) { ?>
				<div class="col-md-3 col-sm-6 recentContainer">
					<img class="recentEntriesImg" src="database/displayImage.php?itemId=<?=$recent['item_id'] ?>" />
					<div class="recentEntriesDesc">
						<p class="recentFoodName"><?=$recent['food_name'] ?> </p>
						<p class="recentEntriesDate"><span style="margin-right:5px" class="fa fa-calendar-o"></span><?=$recent['entry_date'] ?></p>
						<p class="recentServing"><span style="margin-right:5px" class="fa fa-cutlery"></span><?=$recent['serving_size'] ?> </p>
					</div>
				</div>
				<?php } ?>
			</div>
		</disv>
	</section>
<script>	
Highcharts.chart('statChart', {
    chart: {
        type: 'bar'
    },
    title: {
        text: 'Food Intake per Emotion'
    },
    xAxis: {
        categories: ['Emotions']
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Total Food Intake'
        }
    },
    legend: {
        reversed: true
    },
    plotOptions: {
        series: {
            stacking: 'normal'
        }
    },
    series: [
    <?php 
    	foreach($emotions as $emotion){
    		echo "{ name: '".strtoupper($emotion['emotion_name'])."',";
    		echo "data: [".$db->getEmotionCount($emotion['emotion_id'])."], color:'".$db->getBgColor($emotion['emotion_id'])."'},";
    	}
    ?>
    ]
});
Highcharts.chart('statChartByMeal', {
    chart: {
        type: 'bar'
    },
    title: {
        text: 'Food Intake By Meal Per Emotion'
    },
    xAxis: {
        categories: ['Breakfast','Lunch','Dinner','Snack']
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Total Food Intake'
        }
    },
    legend: {
        reversed: true
    },
    plotOptions: {
        series: {
            stacking: 'normal'
        }
    },
    series: [
    <?php 
    	$mids = [1,2,3,4];
    	foreach($emotions as $emotion){
    		echo "{ name: '".strtoupper($emotion['emotion_name'])."',";
    		echo "data: [";
    		foreach($mids as $mid){
    		echo $db->getValue($emotion['emotion_id'],$mid).',';
    		}
    		echo "], color:'".$db->getBgColor($emotion['emotion_id'])."'},";
    	}
    ?>
    ]
});
</script>
</body>
</html>