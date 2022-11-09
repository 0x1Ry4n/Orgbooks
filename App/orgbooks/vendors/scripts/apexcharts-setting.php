<script>
	let colorPalette = ['#00D8B6', '#008FFB', '#FEB019', '#FF4560', '#775DD0', '#8217D0', '#1317B1', '#213A21'];

	let options = {
		chart: {
			type: 'pie',
			width: '100%'
		},
		dataLabels: {
			enabled: true,
		},
		plotOptions: {
			pie: {
				donut: {
					size: '75%',
				},
				offsetY: 80,
			},
			stroke: {
				colors: undefined
			}
		},
		colors: colorPalette,
		title: {
			text: 'Livros',
			style: {
				fontSize: '20px'
			}
		},
		series: [
			<?= sizeof($materias['fisica']) ?>, <?= sizeof($materias['quimica']) ?>,
			<?= sizeof($materias['filosofia']) ?>, <?= sizeof($materias['historia']) ?>,
			<?= sizeof($materias['espanhol']) ?>, <?= sizeof($materias['portugues']) ?>,
			<?= sizeof($materias['matematica']) ?>, <?= sizeof($materias['ingles']) ?>,
			<?= sizeof($materias['sociologia']) ?>, <?= sizeof($materias['geografia']) ?>,
			<?= sizeof($materias['ed.fisica']) ?>, <?= sizeof($materias['biologia']) ?>
		],
		labels: ["Física", "Química", "Filosofia", "História", "Espanhol", "Português", "Matemática", "Inglês", "Sociologia", "Geografia", "Ed.Física", "Biologia"],
		legend: {
			position: 'left',
			offsetY: 80
		}, 
		responsive: [{
			title: {
				style: {
					fontSize: '10px'
				}
			}
		}]
	}

	let element = document.getElementById("chart");

	let chart = new ApexCharts(element, options);

	chart.render();
</script>