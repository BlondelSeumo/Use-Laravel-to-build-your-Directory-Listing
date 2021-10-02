(function($) { "use strict";
    /* ----- Employee Dashboard Chart Js For Applications Statistics ----- */
function createConfig() {
    return {
        type: 'line',
        data: {
            labels: ['April', 'May', 'June', 'July', 'August'],
            datasets: [{
                label: 'Dataset',
                borderColor: window.chartColors.red,
                backgroundColor: window.chartColors.red,
                data: [10, 90, 75, 42, 70, 90, 0],
                fill: false,
            }]
        },
        options: {
            responsive: true,
            title: {
                display: true,
                text: 'Sample tooltip with border'
            },
            tooltips: {
                position: 'nearest',
                mode: 'index',
                intersect: false,
                yPadding: 10,
                xPadding: 10,
                caretSize: 8,
                backgroundColor: 'rgba(72, 241, 12, 1)',
                titleFontColor: window.chartColors.black,
                bodyFontColor: window.chartColors.black,
                borderColor: 'rgba(0,0,0,1)',
                borderWidth: 4
            },
        }
    };
}
window.onload = function() {
    var c_container = document.querySelector('.c_container');
    var div = document.createElement('div');
    div.classList.add('chart-container');

    var canvas = document.createElement('canvas');
    div.appendChild(canvas);
    c_container.appendChild(div);

    var ctx = canvas.getContext('2d');
    var config = createConfig();
    new Chart(ctx, config);
};

// Circle Doughnut Chart
var ctx = document.getElementById('myChart').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'doughnut',

    // The data for our dataset
    data: {
        labels: [' Principal and Interest $23,565', 'HOA Dues $2,036', 'Property Taxes $1,068'],
        datasets: [{
            label: 'My First dataset',
            segmentShowStroke : true,
            segmentStrokeColor : "transparent",
            segmentStrokeWidth : 17,
            backgroundColor: ["#92d060", "#4585ff", "#fb8855"],
            data: [50, 25, 25],
            responsive: true,
            showScale: true
        }]
    },

    // Configuration options go here
    options: {}
});


// LineChart Style 2
    var ctx = document.getElementById('myChartweave').getContext('2d');
    var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line', // also try bar or other graph types

    // The data for our dataset
    data: {
        labels: ["Jun 2019", "Jul 2019", "Aug 2019", "Sep 2019", "Oct 2019", "Nov 2019", "Dec 2019", "Jan 2020", "Feb 2020", "Mar 2020", "Apr 2020", "May 2020"],
        // Information about the dataset
    datasets: [{
            label: "Dataset",
            backgroundColor: 'lightblue',
            borderColor: 'blue',
            data: [26.4, 39.8, 66.8, 66.4, 40.6, 55.2, 77.4, 69.8, 57.8, 76, 110.8, 142.6],
        }]
    },

    // Configuration options
    options: {
        layout: {
          padding: 10,
        },
        legend: {
            position: 'top',
        },
        title: {
            display: false,
            text: 'Precipitation in Toronto'
        },
        scales: {
            yAxes: [{
                scaleLabel: {
                    display: false,
                    labelString: 'Precipitation in mm'
                }
            }],
            xAxes: [{
                scaleLabel: {
                    display: false,
                    labelString: 'Month of the Year'
                }
            }]
        }
    }
});

// BarChart Style
var data = {
  labels: ["Apr", "May", "Jun", "Jul", "Aug"],
  datasets: [{
    label: "Dataset #1",
    backgroundColor: "rgba(255,99,132,0.2)",
    borderColor: "rgba(255,99,132,1)",
    borderWidth: 1,
    hoverBackgroundColor: "rgba(255,99,132,0.4)",
    hoverBorderColor: "rgba(255,99,132,1)",
    data: [65, 59, 20, 81, 56, 55, 40],
  }]
};

var options = {
  maintainAspectRatio: false,
  scales: {
    yAxes: [{
      stacked: true,
      gridLines: {
        display: true,
        color: "rgba(255,99,132,0.2)"
      }
    }],
    xAxes: [{
      gridLines: {
        display: false
      }
    }]
  }
};

Chart.Bar('chart', {
  options: options,
  data: data
});
})(jQuery);