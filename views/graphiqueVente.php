<html>
    <head>
        <meta charset="utf-8" />
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<!--<script type="application/json" src="json/completerArticle.json"></script>-->
	<script type="text/javascript" src="js/graphiqueVente.js"></script>
    </head>
    <body>
       <div id="chart_div" style="width: 900px; height: 500px;"></div>
    </body>
</html>

<?php
$title = 'Graphique des ventes';
$content = ob_get_clean();
include 'includes/layout.php';
?>