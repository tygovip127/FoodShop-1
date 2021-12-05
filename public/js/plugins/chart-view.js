var ctx = document.getElementById("chart-bars").getContext("2d");

new Chart(ctx, {
    type: "bar",
    data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
            label: "Sales",
            tension: 0.4,
            borderWidth: 0,
            pointRadius: 0,
            backgroundColor: "#fff",
            data: [450, 200, 100, 220, 500, 100, 400, 230, 500],
            maxBarThickness: 6
        }, ],
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        legend: {
            display: false,
        },
        tooltips: {
            enabled: true,
            mode: "index",
            intersect: false,
        },
        scales: {
            yAxes: [{
                gridLines: {
                    display: false,
                },
                ticks: {
                    suggestedMin: 0,
                    suggestedMax: 500,
                    beginAtZero: true,
                    padding: 0,
                    fontSize: 14,
                    lineHeight: 3,
                    fontColor: "#fff",
                    fontStyle: 'normal',
                    fontFamily: "Open Sans",
                },
            }, ],
            xAxes: [{
                gridLines: {
                    display: false,
                },
                ticks: {
                    display: false,
                    padding: 20,
                },
            }, ],
        },
    },
});

var ctx2 = document.getElementById("chart-line").getContext("2d");

var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);

gradientStroke1.addColorStop(1, 'rgba(253,235,173,0.4)');
gradientStroke1.addColorStop(0.2, 'rgba(245,57,57,0.0)');
gradientStroke1.addColorStop(0, 'rgba(255,214,61,0)'); //purple colors

var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);

gradientStroke2.addColorStop(1, 'rgba(33,184,253,0.4)');
gradientStroke2.addColorStop(0.2, 'rgba(0,0,253,0.0)');
gradientStroke2.addColorStop(0, 'rgba(0,0,253,0)'); //purple colors


new Chart(ctx2, {
    type: "line",
    data: {
        labels: dates,
        datasets: [{
            label: "Sales",
            tension: 0.4,
            borderWidth: 0,
            pointRadius: 0,
            borderColor: "#21b8fd",
            borderWidth: 3,
            backgroundColor: gradientStroke2,
            data: sales,
            maxBarThickness: 6
        }, ],
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        legend: {
            display: false,
        },
        tooltips: {
            enabled: true,
            mode: "index",
            intersect: false,
        },
        scales: {
            yAxes: [{
                gridLines: {
                    borderDash: [2],
                    borderDashOffset: [2],
                    color: '#dee2e6',
                    zeroLineColor: '#dee2e6',
                    zeroLineWidth: 1,
                    zeroLineBorderDash: [2],
                    drawBorder: false,
                },
                ticks: {
                    suggestedMin: 0,
                    suggestedMax: 10,
                    beginAtZero: true,
                    padding: 10,
                    fontSize: 11,
                    fontColor: '#adb5bd',
                    lineHeight: 3,
                    fontStyle: 'normal',
                    fontFamily: "Open Sans",
                },
            }, ],
            xAxes: [{
                gridLines: {
                    zeroLineColor: 'rgba(0,0,0,0)',
                    display: false,
                },
                ticks: {
                    padding: 10,
                    fontSize: 11,
                    fontColor: '#adb5bd',
                    lineHeight: 3,
                    fontStyle: 'normal',
                    fontFamily: "Open Sans",
                },
            }, ],
        },
    },
});