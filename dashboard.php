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
							<li><a href="add-entry.php"><span class="fa fa-plus-square-o"></span>add entry</a>	</li>	
							<li class="navActive"><a href="dashboard.php"><span class="fa fa-dashboard"></span>dashboard</a></li>
							<li><a href="#"><span class="fa fa-user"></span> Hello, janjan</a></li>
						</ul>	
					</div>
					<div>
						<a href="javascript:void(0);" onclick="myFunction();" class="icon">&#9776;</a>
                        <ul  id="mobile"  class="displayNone">
                            <li><a href="archive.php"><span class="fa fa-calendar-o"></span> archive</a></li>
                            <li><a href="add-entry.php"><span class="fa fa-plus-square-o"></span> add entry</a>  </li>   
                            <li class="mobile-navActive"><a href="dashboard.php"><span class="fa fa-dashboard"></span> dashboard</a></li>
                            <li><a href="#"><span class="fa fa-user"></span> Hello, janjan</a></li>
                        </ul>   
                    </div>
				</div>
			</div>
		</div>
	</header>
	<section id="visualization">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="circumplex-header">
						<h3 class="circumplexTitle">Circumplex Model of Affect</h3>
					</div>
					<div class="circumplex-body">		
						<div class="circumplex-model" id="circumplex-model">	
							<div class="label top">Pumped</div>
							<div class="label left">Negative</div>
							<div class="label right">Positive</div>
							<div class="label bottom">Relaxed</div>
							<div class="circumplexFood" id="circumplexFood1" style="left:43%;top:5%">
								<h5 class="circumplexFoodName">kare-kare</h5>
								<img src="img/food-sample.png" class="circumplesFoodImg" />
							</div>
							<div class="circumplexFood" id="circumplexFood2" style="left:0.2%;top:9%">
								<h5 class="circumplexFoodName">kare-kare</h5>
								<img src="img/food-sample.png" class="circumplesFoodImg" />
							</div>
						</div>		
					</div>
				</div>
				<div class="col-md-6 statContainer">
					<div class="stat-header">
						<h3 class="statTitle">Statistics</h3>
					</div>
					<div id="statChart">
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
				<div class="col-md-2 col-sm-4 recentContainer">
					<img class="recentEntriesImg" src="img/bukayo.jpg" />
					<div class="recentEntriesDesc">
						<p class="recentFoodName">bukayo</p>
						<p class="recentEntriesDate">10/19/12</p>
					</div>
				</div>
				<div class="col-md-2 col-sm-4 recentContainer">
					<img class="recentEntriesImg" src="img/champorado.jpg" />
					<div class="recentEntriesDesc">
						<p class="recentFoodName">champorado</p>
						<p class="recentEntriesDate">10/19/12</p>
					</div>
				</div>
				<div class="col-md-2 col-sm-4 recentContainer">
					<img class="recentEntriesImg" src="img/dinuguan.jpg" />
					<div class="recentEntriesDesc">
						<p class="recentFoodName">dinuguan</p>
						<p class="recentEntriesDate">10/18/12</p>
					</div>
				</div>
				<div class="col-md-2 col-sm-4 recentContainer">
					<img class="recentEntriesImg" src="img/halo-halo.jpg" />
					<div class="recentEntriesDesc">
						<p class="recentFoodName">halo-halo</p>
						<p class="recentEntriesDate">10/16/12</p>
					</div>
				</div>
				<div class="col-md-2 col-sm-4 recentContainer">
					<img class="recentEntriesImg" src="img/kalderata.jpg" />
					<div class="recentEntriesDesc">
						<p class="recentFoodName">kaldereta</p>
						<p class="recentEntriesDate">10/15/12</p>
					</div>
				</div>
				<div class="col-md-2 col-sm-4 recentContainer">
					<img class="recentEntriesImg" src="img/kare-kare.jpg" />
					<div class="recentEntriesDesc">
						<p class="recentFoodName">kare-kare</p>
						<p class="recentEntriesDate">10/9/12</p>
					</div>
				</div>
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
    series: [{
        name: 'Sad',
        data: [51]
    }, {
        name: 'Happy',
        data: [22]
    }, {
        name: 'Trust',
        data: [23]
    }, {
        name: 'Depressed',
        data: [10]
    }, {
        name: 'Enjoy',
        data: [9]
    }, {
        name: 'Arouse',
        data: [15]
    }, {
        name: 'Stressed',
        data: [50]
    }, {
        name: 'Loved',
        data: [15]
    }]
});
</script>
</body>
</html>