var ctx = document.getElementById("myChart");
      var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
          datasets: [
            {
            label : 'income',
            data: [0, 21345, 18483, 24003, 23489, 24092, 12034],
            lineTension: 0,
            backgroundColor: 'green',
            borderColor: 'green',
            fill: 'false',
            borderWidth: 4,
            pointBackgroundColor: 'green'
            },
            {
            label : 'expence',
            data: [12034,24092,23489,24003,18483,21345,0],
            lineTension: 0,
            backgroundColor: 'red',
            borderColor: 'red',
            fill: 'false',
            borderWidth: 4,
            pointBackgroundColor: 'red'
            }
          ]
        },
        options: {
				responsive: true,
				title: {
					display: true,
					text: 'Balance budget chart'
				},
				tooltips: {
					mode: 'index',
					intersect: false,
				},
				hover: {
					mode: 'nearest',
					intersect: true
				},
				scales: {
					xAxes: [{
						display: true,
						scaleLabel: {
							display: true,
							labelString: 'Day'
						}
					}],
					yAxes: [{
						display: true,
						scaleLabel: {
							display: true,
							labelString: 'Amount'
						}
					}]
				}
			  },
        });