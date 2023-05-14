<!DOCTYPE html>
<html>

<head>
	<title>Multi-line Chart using Chart.js</title>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
</head>

<body>
	<div style="width: 800px;">
		<canvas id="myChart"></canvas>
	</div>

	<?php
	// Sample data for the chart
	$data = array(
		array(
			"label" => "Line 1",
			"color" => "rgba(255, 99, 132, 1)",
			"data" => array(10, 20, 17, 8, 50)
		),
		array(
			"label" => "Line 2",
			"color" => "rgba(54, 162, 235, 1)",
			"data" => array(20, 10, 40, 18, 24, 50)
		),
		array(
			"label" => "Line 3",
			"color" => "rgba(255, 206, 86, 1)",
			"data" => array(9, 20, 50, 35, 70, 5)
		)
	);
	?>

	<script>
		// Chart configuration options
		var chartOptions = {
			responsive: true,
			title: {
				display: true,
				text: 'Multi-line Chart using Chart.js'
			},
			scales: {
				xAxes: [{
					display: true,
					scaleLabel: {
						display: true,
						labelString: 'X-axis Label'
					}
				}],
				yAxes: [{
					display: true,
					scaleLabel: {
						display: true,
						labelString: 'Y-axis Label'
					}
				}]
			}
		};

		// Chart data
		var chartData = {
			labels: ["Label 1", "Label 2", "Label 3", "Label 4", "Label 5"],
			datasets: [
				<?php
				// Loop through the data and create a dataset for each line
				foreach ($data as $line) {
					echo "{
							label: '{$line['label']}',
							borderColor: '{$line['color']}',
							fill: false,
							data: [" . implode(", ", $line['data']) . "]
						},";
				}
				?>
			]
		};

		// Get the canvas element
		var ctx = document.getElementById("myChart").getContext("2d");

		// Create the chart
		var myChart = new Chart(ctx, {
			type: 'line',
			data: chartData,
			options: chartOptions
		});
	</script>
</body>

</html>