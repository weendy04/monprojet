$( document ).ready(function() {
google.charts.load('current', {'packages':['corechart', 'bar']});
google.charts.setOnLoadCallback(drawChart);

	function drawChart()
	{
		$.get("http://monprojet.weendy/graphiqueJson").done(function(jsonData){
			var data = new google.visualization.DataTable();
			data.addColumn('string', 'Article');
			data.addColumn('number', 'Nombre');

			jsonData = JSON.parse(jsonData);

			for(var i in jsonData)
			{
				data.addRow([jsonData[i].Article, parseInt(jsonData[i].Nombre)]);
			}
			
			console.log(data);
			
			var options = 
			{
				title: 'Nombre d\'articles',
				bar: {groupWidth: "95%"},
				legend: {position: 'none'}
			};
			

			var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
			
			chart.draw(data, options);
		});
	}
});