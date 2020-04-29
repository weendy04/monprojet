<html>
  <head>
    
  </head>
  <body>
    
  </body>
</html>

<html>
    <head>
        <meta charset="utf-8" />
   
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script type="text/javascript" src="json/completerArticle.json"></script>
	<script type="text/javascript" src="graphiqueVente.js"></script>
    </head>
    <body>
		<script type="text/javascript">
			google.charts.load("current", {packages:["corechart"]});
			  google.charts.setOnLoadCallback(drawChart);
			  function drawChart() 
			  {
				var data = google.visualization.arrayToDataTable([
				  ['Article', 'Nb_Article'],
					  ['Amoire', 2],
					  ['Cage', 10],
					  ['Bougeoir', 20],
					  ['Poire', 15],
					  ['Parc', 8]
				  ]);

				   var options = {
					title: 'Article',
					legend: { position: 'none' },
					colors: ['green'],
			  };

			var chart = new google.visualization.Histogram(document.getElementById('chart_div'));
			chart.draw(data, options);
		  }
</script>
       <div id="chart_div" style="width: 900px; height: 500px;"></div>
    </body>
</html>

<?php
$title = 'Graphique des ventes';
$content = ob_get_clean();
include 'includes/layout.php';
?>