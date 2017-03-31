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
							<div class="circumplexFood" style="left:<?=$entry['xCoor']-4?>%;top:<?=$entry['yCoor']-4;?>%">
								<h5 class="circumplexFoodName"><?=$entry['entry_name'];?></h5>
								<img src="database/displayImage.php?entryId=<?=$entry['entry_id']?>" style="border:<?= $db->getBorderColor($entry['emotion_id']); ?>;" class="circumplexFoodImg" />
							</div>
								<?php

								}
							?>
						</div>		
					</div>
				</div>
				<div class="col-md-6 statContainer">
					<div class="stat-header">
						<h3 class="statTitle">Statistics </h3>
					</div>
					<div id="statChart">
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
				<div class="col-md-2 col-sm-4 recentContainer">
					<img class="recentEntriesImg" src="database/displayImage.php?entryId=<?=$recent['entry_id'] ?>" />
					<div class="recentEntriesDesc">
						<p class="recentFoodName"><?=$recent['entry_name'] ?> </p>
						<p class="recentEntriesDate"><?=$recent['entry_date'] ?></p>
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
    		echo "data: [".$db->getEmotionCount($emotion['emotion_id'])."]},";
    	}
    ?>
    ]
});
</script>
</body>
</html>