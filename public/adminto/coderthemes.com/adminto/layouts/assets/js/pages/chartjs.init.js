"use strict";
! function (s) {
    function r() {}
    r.prototype.respChart = function (r, o, a, e) {
        Chart.defaults.global.defaultFontColor = "#6c7897", Chart.defaults.scale.gridLines.color = "rgba(108, 120, 151, 0.1)";
        var t = r.get(0).getContext("2d"),
            n = s(r).parent();

        function i() {
            r.attr("width", s(n).width());
            switch (o) {
                case "Line":
                    new Chart(t, {
                        type: "line",
                        data: a,
                        options: e
                    });
                    break;
                case "Doughnut":
                    new Chart(t, {
                        type: "doughnut",
                        data: a,
                        options: e
                    });
                    break;
                case "Pie":
                    new Chart(t, {
                        type: "pie",
                        data: a,
                        options: e
                    });
                    break;
                case "Bar":
                    new Chart(t, {
                        type: "bar",
                        data: a,
                        options: e
                    });
                    break;
                case "Radar":
                    new Chart(t, {
                        type: "radar",
                        data: a,
                        options: e
                    });
                    break;
                case "PolarArea":
                    new Chart(t, {
                        data: a,
                        type: "polarArea",
                        options: e
                    })
            }
        }
        s(window).resize(i), i()
    }, r.prototype.init = function () {
        this.respChart(s("#lineChart"), "Line", {
            labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "Desember"],
            datasets: [{
                label: "Belum Checkout",
                fill: !1,
                lineTension: .1,
                backgroundColor: "#96C3EB",
                borderColor: "#96C3EB",
                borderCapStyle: "butt",
                borderDash: [],
                borderDashOffset: 0,
                borderJoinStyle: "miter",
                pointBorderColor: "#96C3EB",
                pointBackgroundColor: "#fff",
                pointBorderWidth: 1,
                pointHoverRadius: 5,
                pointHoverBackgroundColor: "#96C3EB",
                pointHoverBorderColor: "#eef0f2",
                pointHoverBorderWidth: 2,
                pointRadius: 1,
                pointHitRadius: 10,
                data: [belumcheckout]
            }, {
                label: "Sudah Checkout",
                fill: !1,
                lineTension: .1,
                backgroundColor: "#039cfd",
                borderColor: "#10c469",
                borderCapStyle: "butt",
                borderDash: [],
                borderDashOffset: 0,
                borderJoinStyle: "miter",
                pointBorderColor: "#039cfd",
                pointBackgroundColor: "#fff",
                pointBorderWidth: 1,
                pointHoverRadius: 5,
                pointHoverBackgroundColor: "#039cfd",
                pointHoverBorderColor: "#eef0f2",
                pointHoverBorderWidth: 2,
                pointRadius: 1,
                pointHitRadius: 10,
                data: [sudahcheckout]
            }]
        }, {
            scales: {
                yAxes: [{
                    ticks: {
                        max: 100,
                        min: 1,
                        stepSize: 10
                    }
                }]
            }
        });
        this.respChart(s("#doughnut"), "Doughnut", {
            labels: ["Sudah Checkout", "Belum Checkout"],
            datasets: [{
                data: [sudahco, belumco],
                backgroundColor: ["#0388FD", "#10c469"],
                hoverBackgroundColor: ["#0388FD", "#10c469"],
                hoverBorderColor: "#fff"
            }]
        });
        this.respChart(s("#pie"), "Pie", {
            labels: ["Sudah Checkout", "Belum Checkout"],
            datasets: [{
                data: [sudahco, belumco],
                backgroundColor: ["#ff8acc", "#5b69bc"],
                hoverBackgroundColor: ["#ff8acc", "#5b69bc"],
                hoverBorderColor: "#fff"
            }]
        });
        this.respChart(s("#bar"), "Bar", {
            labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "Desember"],
            datasets: [{
                label: "Belum Checkout",
                backgroundColor: "RGBA(3,149,253,0.3)",
                borderColor: "#96C3EB",
                borderWidth: 1,
                hoverBackgroundColor: "RGBA(3,149,253,0.6)",
                hoverBorderColor: "#96C3EB",
                data: [belumcheckout]
            }, {
                label: "Sudah Checkout",
                backgroundColor: "RGBA(3,149,253,0.3)",
                borderColor: "#039cfd",
                borderWidth: 1,
                hoverBackgroundColor: "RGBA(3,149,253,0.6)",
                hoverBorderColor: "#039cfd",
                data: [sudahcheckout]
            }]
        });
        this.respChart(s("#radar"), "Radar", {
            labels: ["Eating", "Drinking", "Sleeping", "Designing", "Coding", "Cycling", "Running"],
            datasets: [{
                label: "Desktops",
                backgroundColor: "rgba(179,181,198,0.2)",
                borderColor: "rgba(179,181,198,1)",
                pointBackgroundColor: "rgba(179,181,198,1)",
                pointBorderColor: "#fff",
                pointHoverBackgroundColor: "#fff",
                pointHoverBorderColor: "rgba(179,181,198,1)",
                data: [65, 59, 90, 81, 56, 55, 40]
            }, {
                label: "Tablets",
                backgroundColor: "rgba(255,99,132,0.2)",
                borderColor: "rgba(255,99,132,1)",
                pointBackgroundColor: "rgba(255,99,132,1)",
                pointBorderColor: "#fff",
                pointHoverBackgroundColor: "#fff",
                pointHoverBorderColor: "rgba(255,99,132,1)",
                data: [28, 48, 40, 19, 96, 27, 100]
            }]
        }, {
            scale: {
                angleLines: {
                    color: "rgba(108, 120, 151, 0.1)"
                }
            }
        });
        this.respChart(s("#polarArea"), "PolarArea", {
            datasets: [{
                data: [11, 16, 7, 3, 14],
                backgroundColor: ["#ff8acc", "#5b69bc", "#f1b53d", "#E7E9ED", "#10c469"],
                label: "My dataset",
                hoverBorderColor: "#fff"
            }],
            labels: ["Series 1", "Series 2", "Series 3", "Series 4", "Series 5"]
        })
    }, s.ChartJs = new r, s.ChartJs.Constructor = r
}(window.jQuery), window.jQuery.ChartJs.init();
