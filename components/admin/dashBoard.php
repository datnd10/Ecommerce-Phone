<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Purple Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../../assets/images/favicon.ico" />
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <?php include '../../partials/navbarAdmin.php' ?>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <?php include '../../partials/sideBar.php' ?>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-md-4 stretch-card grid-margin">
                            <div class="card bg-gradient-danger card-img-holder text-white">
                                <div class="card-body">
                                    <img src="../../assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                                    <h4 class="font-weight-normal mb-3">Tổng Doanh Thu Trong Tuần <i class="mdi mdi-chart-line mdi-24px float-right"></i>
                                    </h4>
                                    <h2 class="mb-5 revenue">$ 15,0000</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 stretch-card grid-margin">
                            <div class="card bg-gradient-info card-img-holder text-white">
                                <div class="card-body">
                                    <img src="../../assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                                    <h4 class="font-weight-normal mb-3">Tổng Đơn Hàng Theo Tuần<i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
                                    </h4>
                                    <h2 class="mb-5 total_order">45,6334</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 stretch-card grid-margin">
                            <div class="card bg-gradient-success card-img-holder text-white">
                                <div class="card-body">
                                    <img src="../../assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                                    <h4 class="font-weight-normal mb-3">Tổng Số Khách Hàng<i class="mdi mdi-diamond mdi-24px float-right"></i>
                                    </h4>
                                    <h2 class="mb-5 total_user">95,5741</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-7 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="clearfix">
                                        <h4 class="card-title float-left">Doanh thu theo tuần</h4>
                                        <div id="visit-sale-chart-legend" class="rounded-legend legend-horizontal legend-top-right float-right"></div>
                                    </div>
                                    <canvas id="barChart" class="mt-4"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Trạng thái đơn hàng</h4>
                                    <canvas id="traffic-chart"></canvas>
                                    <div id="traffic-chart-legend" class="rounded-legend legend-vertical legend-bottom-left pt-4"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="../../assets/vendors/chart.js/Chart.min.js"></script>
    <script src="../../assets/js/jquery.cookie.js" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="../../assets/js/dashboard.js"></script>
    <script src="../../assets/js/todolist.js"></script>
    <!-- End custom js for this page -->

    <script>
        // $(function() {
        //     /* ChartJS
        //      * -------
        //      * Data and config for chartjs
        //      */
        //     'use strict';
        //     var data = {
        //         labels: ["2013", "2014", "2014", "2015", "2016", "2017"],
        //         datasets: [{
        //             label: '# of Votes',
        //             data: [10, 19, 3, 5, 2, 3],
        //             backgroundColor: [
        //                 'rgba(255, 99, 132, 0.2)',
        //                 'rgba(54, 162, 235, 0.2)',
        //                 'rgba(255, 206, 86, 0.2)',
        //                 'rgba(75, 192, 192, 0.2)',
        //                 'rgba(153, 102, 255, 0.2)',
        //                 'rgba(255, 159, 64, 0.2)'
        //             ],
        //             borderColor: [
        //                 'rgba(255,99,132,1)',
        //                 'rgba(54, 162, 235, 1)',
        //                 'rgba(255, 206, 86, 1)',
        //                 'rgba(75, 192, 192, 1)',
        //                 'rgba(153, 102, 255, 1)',
        //                 'rgba(255, 159, 64, 1)'
        //             ],
        //             borderWidth: 1,
        //             fill: false
        //         }]
        //     };
        //     var dataDark = {
        //         labels: ["2013", "2014", "2014", "2015", "2016", "2017"],
        //         datasets: [{
        //             label: '# of Votes',
        //             data: [10, 19, 3, 5, 2, 3],
        //             backgroundColor: [
        //                 'rgba(255, 99, 132, 0.2)',
        //                 'rgba(54, 162, 235, 0.2)',
        //                 'rgba(255, 206, 86, 0.2)',
        //                 'rgba(75, 192, 192, 0.2)',
        //                 'rgba(153, 102, 255, 0.2)',
        //                 'rgba(255, 159, 64, 0.2)'
        //             ],
        //             borderColor: [
        //                 'rgba(255,99,132,1)',
        //                 'rgba(54, 162, 235, 1)',
        //                 'rgba(255, 206, 86, 1)',
        //                 'rgba(75, 192, 192, 1)',
        //                 'rgba(153, 102, 255, 1)',
        //                 'rgba(255, 159, 64, 1)'
        //             ],
        //             borderWidth: 1,
        //             fill: false
        //         }]
        //     };
        //     var multiLineData = {
        //         labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
        //         datasets: [{
        //                 label: 'Dataset 1',
        //                 data: [12, 19, 3, 5, 2, 3],
        //                 borderColor: [
        //                     '#587ce4'
        //                 ],
        //                 borderWidth: 2,
        //                 fill: false
        //             },
        //             {
        //                 label: 'Dataset 2',
        //                 data: [5, 23, 7, 12, 42, 23],
        //                 borderColor: [
        //                     '#ede190'
        //                 ],
        //                 borderWidth: 2,
        //                 fill: false
        //             },
        //             {
        //                 label: 'Dataset 3',
        //                 data: [15, 10, 21, 32, 12, 33],
        //                 borderColor: [
        //                     '#f44252'
        //                 ],
        //                 borderWidth: 2,
        //                 fill: false
        //             }
        //         ]
        //     };
        //     var options = {
        //         scales: {
        //             yAxes: [{
        //                 ticks: {
        //                     beginAtZero: true
        //                 }
        //             }]
        //         },
        //         legend: {
        //             display: false
        //         },
        //         elements: {
        //             point: {
        //                 radius: 0
        //             }
        //         }

        //     };
        //     var optionsDark = {
        //         scales: {
        //             yAxes: [{
        //                 ticks: {
        //                     beginAtZero: true
        //                 },
        //                 gridLines: {
        //                     color: '#322f2f',
        //                     zeroLineColor: '#322f2f'
        //                 }
        //             }],
        //             xAxes: [{
        //                 ticks: {
        //                     beginAtZero: true
        //                 },
        //                 gridLines: {
        //                     color: '#322f2f',
        //                 }
        //             }],
        //         },
        //         legend: {
        //             display: false
        //         },
        //         elements: {
        //             point: {
        //                 radius: 0
        //             }
        //         }

        //     };
        //     var doughnutPieData = {
        //         datasets: [{
        //             data: [30, 40, 30],
        //             backgroundColor: [
        //                 'rgba(255, 99, 132, 0.5)',
        //                 'rgba(54, 162, 235, 0.5)',
        //                 'rgba(255, 206, 86, 0.5)',
        //                 'rgba(75, 192, 192, 0.5)',
        //                 'rgba(153, 102, 255, 0.5)',
        //                 'rgba(255, 159, 64, 0.5)'
        //             ],
        //             borderColor: [
        //                 'rgba(255,99,132,1)',
        //                 'rgba(54, 162, 235, 1)',
        //                 'rgba(255, 206, 86, 1)',
        //                 'rgba(75, 192, 192, 1)',
        //                 'rgba(153, 102, 255, 1)',
        //                 'rgba(255, 159, 64, 1)'
        //             ],
        //         }],

        //         // These labels appear in the legend and in the tooltips when hovering different arcs
        //         labels: [
        //             'Pink',
        //             'Blue',
        //             'Yellow',
        //         ]
        //     };
        //     var doughnutPieOptions = {
        //         responsive: true,
        //         animation: {
        //             animateScale: true,
        //             animateRotate: true
        //         }
        //     };
        //     var areaData = {
        //         labels: ["2013", "2014", "2015", "2016", "2017"],
        //         datasets: [{
        //             label: '# of Votes',
        //             data: [12, 19, 3, 5, 2, 3],
        //             backgroundColor: [
        //                 'rgba(255, 99, 132, 0.2)',
        //                 'rgba(54, 162, 235, 0.2)',
        //                 'rgba(255, 206, 86, 0.2)',
        //                 'rgba(75, 192, 192, 0.2)',
        //                 'rgba(153, 102, 255, 0.2)',
        //                 'rgba(255, 159, 64, 0.2)'
        //             ],
        //             borderColor: [
        //                 'rgba(255,99,132,1)',
        //                 'rgba(54, 162, 235, 1)',
        //                 'rgba(255, 206, 86, 1)',
        //                 'rgba(75, 192, 192, 1)',
        //                 'rgba(153, 102, 255, 1)',
        //                 'rgba(255, 159, 64, 1)'
        //             ],
        //             borderWidth: 1,
        //             fill: true, // 3: no fill
        //         }]
        //     };

        //     var areaDataDark = {
        //         labels: ["2013", "2014", "2015", "2016", "2017"],
        //         datasets: [{
        //             label: '# of Votes',
        //             data: [12, 19, 3, 5, 2, 3],
        //             backgroundColor: [
        //                 'rgba(255, 99, 132, 0.2)',
        //                 'rgba(54, 162, 235, 0.2)',
        //                 'rgba(255, 206, 86, 0.2)',
        //                 'rgba(75, 192, 192, 0.2)',
        //                 'rgba(153, 102, 255, 0.2)',
        //                 'rgba(255, 159, 64, 0.2)'
        //             ],
        //             borderColor: [
        //                 'rgba(255,99,132,1)',
        //                 'rgba(54, 162, 235, 1)',
        //                 'rgba(255, 206, 86, 1)',
        //                 'rgba(75, 192, 192, 1)',
        //                 'rgba(153, 102, 255, 1)',
        //                 'rgba(255, 159, 64, 1)'
        //             ],
        //             borderWidth: 1,
        //             fill: true, // 3: no fill
        //         }]
        //     };

        //     var areaOptions = {
        //         plugins: {
        //             filler: {
        //                 propagate: true
        //             }
        //         }
        //     }

        //     var areaOptionsDark = {
        //         scales: {
        //             yAxes: [{
        //                 ticks: {
        //                     beginAtZero: true
        //                 },
        //                 gridLines: {
        //                     color: '#322f2f',
        //                     zeroLineColor: '#322f2f'
        //                 }
        //             }],
        //             xAxes: [{
        //                 ticks: {
        //                     beginAtZero: true
        //                 },
        //                 gridLines: {
        //                     color: '#322f2f',
        //                 }
        //             }],
        //         },
        //         plugins: {
        //             filler: {
        //                 propagate: true
        //             }
        //         }
        //     }

        //     var multiAreaData = {
        //         labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        //         datasets: [{
        //                 label: 'Facebook',
        //                 data: [8, 11, 13, 15, 12, 13, 16, 15, 13, 19, 11, 14],
        //                 borderColor: ['rgba(255, 99, 132, 0.5)'],
        //                 backgroundColor: ['rgba(255, 99, 132, 0.5)'],
        //                 borderWidth: 1,
        //                 fill: true
        //             },
        //             {
        //                 label: 'Twitter',
        //                 data: [7, 17, 12, 16, 14, 18, 16, 12, 15, 11, 13, 9],
        //                 borderColor: ['rgba(54, 162, 235, 0.5)'],
        //                 backgroundColor: ['rgba(54, 162, 235, 0.5)'],
        //                 borderWidth: 1,
        //                 fill: true
        //             },
        //             {
        //                 label: 'Linkedin',
        //                 data: [6, 14, 16, 20, 12, 18, 15, 12, 17, 19, 15, 11],
        //                 borderColor: ['rgba(255, 206, 86, 0.5)'],
        //                 backgroundColor: ['rgba(255, 206, 86, 0.5)'],
        //                 borderWidth: 1,
        //                 fill: true
        //             }
        //         ]
        //     };

        //     var multiAreaOptions = {
        //         plugins: {
        //             filler: {
        //                 propagate: true
        //             }
        //         },
        //         elements: {
        //             point: {
        //                 radius: 0
        //             }
        //         },
        //         scales: {
        //             xAxes: [{
        //                 gridLines: {
        //                     display: false
        //                 }
        //             }],
        //             yAxes: [{
        //                 gridLines: {
        //                     display: false
        //                 }
        //             }]
        //         }
        //     }

        //     var scatterChartData = {
        //         datasets: [{
        //                 label: 'First Dataset',
        //                 data: [{
        //                         x: -10,
        //                         y: 0
        //                     },
        //                     {
        //                         x: 0,
        //                         y: 3
        //                     },
        //                     {
        //                         x: -25,
        //                         y: 5
        //                     },
        //                     {
        //                         x: 40,
        //                         y: 5
        //                     }
        //                 ],
        //                 backgroundColor: [
        //                     'rgba(255, 99, 132, 0.2)'
        //                 ],
        //                 borderColor: [
        //                     'rgba(255,99,132,1)'
        //                 ],
        //                 borderWidth: 1
        //             },
        //             {
        //                 label: 'Second Dataset',
        //                 data: [{
        //                         x: 10,
        //                         y: 5
        //                     },
        //                     {
        //                         x: 20,
        //                         y: -30
        //                     },
        //                     {
        //                         x: -25,
        //                         y: 15
        //                     },
        //                     {
        //                         x: -10,
        //                         y: 5
        //                     }
        //                 ],
        //                 backgroundColor: [
        //                     'rgba(54, 162, 235, 0.2)',
        //                 ],
        //                 borderColor: [
        //                     'rgba(54, 162, 235, 1)',
        //                 ],
        //                 borderWidth: 1
        //             }
        //         ]
        //     }

        //     var scatterChartDataDark = {
        //         datasets: [{
        //                 label: 'First Dataset',
        //                 data: [{
        //                         x: -10,
        //                         y: 0
        //                     },
        //                     {
        //                         x: 0,
        //                         y: 3
        //                     },
        //                     {
        //                         x: -25,
        //                         y: 5
        //                     },
        //                     {
        //                         x: 40,
        //                         y: 5
        //                     }
        //                 ],
        //                 backgroundColor: [
        //                     'rgba(255, 99, 132, 0.2)'
        //                 ],
        //                 borderColor: [
        //                     'rgba(255,99,132,1)'
        //                 ],
        //                 borderWidth: 1
        //             },
        //             {
        //                 label: 'Second Dataset',
        //                 data: [{
        //                         x: 10,
        //                         y: 5
        //                     },
        //                     {
        //                         x: 20,
        //                         y: -30
        //                     },
        //                     {
        //                         x: -25,
        //                         y: 15
        //                     },
        //                     {
        //                         x: -10,
        //                         y: 5
        //                     }
        //                 ],
        //                 backgroundColor: [
        //                     'rgba(54, 162, 235, 0.2)',
        //                 ],
        //                 borderColor: [
        //                     'rgba(54, 162, 235, 1)',
        //                 ],
        //                 borderWidth: 1
        //             }
        //         ]
        //     }

        //     var scatterChartOptions = {
        //         scales: {
        //             xAxes: [{
        //                 type: 'linear',
        //                 position: 'bottom'
        //             }]
        //         }
        //     }

        //     var scatterChartOptionsDark = {
        //         scales: {
        //             xAxes: [{
        //                 type: 'linear',
        //                 position: 'bottom',
        //                 gridLines: {
        //                     color: '#322f2f',
        //                     zeroLineColor: '#322f2f'
        //                 }
        //             }],
        //             yAxes: [{
        //                 gridLines: {
        //                     color: '#322f2f',
        //                     zeroLineColor: '#322f2f'
        //                 }
        //             }]
        //         }
        //     }
        //     // Get context with jQuery - using jQuery's .get() method.
        //     if ($("#barChart").length) {
        //         var barChartCanvas = $("#barChart").get(0).getContext("2d");
        //         // This will get the first returned node in the jQuery collection.
        //         var barChart = new Chart(barChartCanvas, {
        //             type: 'bar',
        //             data: data,
        //             options: options
        //         });
        //     }

        //     if ($("#barChartDark").length) {
        //         var barChartCanvasDark = $("#barChartDark").get(0).getContext("2d");
        //         // This will get the first returned node in the jQuery collection.
        //         var barChartDark = new Chart(barChartCanvasDark, {
        //             type: 'bar',
        //             data: dataDark,
        //             options: optionsDark
        //         });
        //     }

        //     if ($("#lineChart").length) {
        //         var lineChartCanvas = $("#lineChart").get(0).getContext("2d");
        //         var lineChart = new Chart(lineChartCanvas, {
        //             type: 'line',
        //             data: data,
        //             options: options
        //         });
        //     }

        //     if ($("#lineChartDark").length) {
        //         var lineChartCanvasDark = $("#lineChartDark").get(0).getContext("2d");
        //         var lineChartDark = new Chart(lineChartCanvasDark, {
        //             type: 'line',
        //             data: dataDark,
        //             options: optionsDark
        //         });
        //     }

        //     if ($("#linechart-multi").length) {
        //         var multiLineCanvas = $("#linechart-multi").get(0).getContext("2d");
        //         var lineChart = new Chart(multiLineCanvas, {
        //             type: 'line',
        //             data: multiLineData,
        //             options: options
        //         });
        //     }

        //     if ($("#areachart-multi").length) {
        //         var multiAreaCanvas = $("#areachart-multi").get(0).getContext("2d");
        //         var multiAreaChart = new Chart(multiAreaCanvas, {
        //             type: 'line',
        //             data: multiAreaData,
        //             options: multiAreaOptions
        //         });
        //     }

        //     if ($("#doughnutChart").length) {
        //         var doughnutChartCanvas = $("#doughnutChart").get(0).getContext("2d");
        //         var doughnutChart = new Chart(doughnutChartCanvas, {
        //             type: 'doughnut',
        //             data: doughnutPieData,
        //             options: doughnutPieOptions
        //         });
        //     }

        //     if ($("#pieChart").length) {
        //         var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
        //         var pieChart = new Chart(pieChartCanvas, {
        //             type: 'pie',
        //             data: doughnutPieData,
        //             options: doughnutPieOptions
        //         });
        //     }

        //     if ($("#areaChart").length) {
        //         var areaChartCanvas = $("#areaChart").get(0).getContext("2d");
        //         var areaChart = new Chart(areaChartCanvas, {
        //             type: 'line',
        //             data: areaData,
        //             options: areaOptions
        //         });
        //     }

        //     if ($("#areaChartDark").length) {
        //         var areaChartCanvas = $("#areaChartDark").get(0).getContext("2d");
        //         var areaChart = new Chart(areaChartCanvas, {
        //             type: 'line',
        //             data: areaDataDark,
        //             options: areaOptionsDark
        //         });
        //     }

        //     if ($("#scatterChart").length) {
        //         var scatterChartCanvas = $("#scatterChart").get(0).getContext("2d");
        //         var scatterChart = new Chart(scatterChartCanvas, {
        //             type: 'scatter',
        //             data: scatterChartData,
        //             options: scatterChartOptions
        //         });
        //     }

        //     if ($("#scatterChartDark").length) {
        //         var scatterChartCanvas = $("#scatterChartDark").get(0).getContext("2d");
        //         var scatterChart = new Chart(scatterChartCanvas, {
        //             type: 'scatter',
        //             data: scatterChartDataDark,
        //             options: scatterChartOptionsDark
        //         });
        //     }

        //     if ($("#browserTrafficChart").length) {
        //         var doughnutChartCanvas = $("#browserTrafficChart").get(0).getContext("2d");
        //         var doughnutChart = new Chart(doughnutChartCanvas, {
        //             type: 'doughnut',
        //             data: browserTrafficData,
        //             options: doughnutPieOptions
        //         });
        //     }
        // });

        function formatVietnameseCurrency(amount) {
            try {
                // Đảm bảo amount là một số
                amount = parseFloat(amount);

                // Sử dụng hàm toLocaleString để định dạng số và thêm dấu phẩy
                formattedAmount = amount.toLocaleString('vi-VN', {
                    style: 'currency',
                    currency: 'VND'
                });

                return formattedAmount;
            } catch (error) {
                return "Số tiền không hợp lệ";
            }
        }

        $.ajax({
            url: 'http://localhost:3000/database/controller/dashBoardController.php',
            type: 'GET',
            success: (response) => {
                console.log(response);
                let data = JSON.parse(response)
                console.log(data);
                $('.revenue').html(formatVietnameseCurrency(data.revenue))
                $('.total_order').html(data.total_order)
                $('.total_user').html(data.total_user)


                // if ($("#visit-sale-chart").length) {

                var dataChart = {
                    labels: data.dayOfWeek.map(item => item.date),
                    datasets: [{
                        label: 'Doanh thu',
                        data: data.dayOfWeek.map(item => item.revenue_per_day),
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255,99,132,1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1,
                        fill: false
                    }]
                };

                var optionsChart = {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    },
                    legend: {
                        display: false
                    },
                    elements: {
                        point: {
                            radius: 0
                        }
                    }

                };

                if ($("#barChart").length) {
                    var barChartCanvas = $("#barChart").get(0).getContext("2d");
                    // This will get the first returned node in the jQuery collection.
                    var barChart = new Chart(barChartCanvas, {
                        type: 'bar',
                        data: dataChart,
                        options: optionsChart
                    });
                }

                $("#barChart").html(barChart.generateLegend());
                // }

                if ($("#traffic-chart").length) {
                    var ctx = document.getElementById('traffic-chart').getContext("2d");
                    var gradientStrokeBlue = ctx.createLinearGradient(0, 0, 0, 181);
                    gradientStrokeBlue.addColorStop(0, 'rgba(54, 215, 232, 1)');
                    gradientStrokeBlue.addColorStop(1, 'rgba(177, 148, 250, 1)');
                    var gradientLegendBlue = 'linear-gradient(to right, rgba(54, 215, 232, 1), rgba(177, 148, 250, 1))';

                    var gradientStrokeRed = ctx.createLinearGradient(0, 0, 0, 50);
                    gradientStrokeRed.addColorStop(0, 'rgba(255, 191, 150, 1)');
                    gradientStrokeRed.addColorStop(1, 'rgba(254, 112, 150, 1)');
                    var gradientLegendRed = 'linear-gradient(to right, rgba(255, 191, 150, 1), rgba(254, 112, 150, 1))';

                    var gradientStrokeGreen = ctx.createLinearGradient(0, 0, 0, 300);
                    gradientStrokeGreen.addColorStop(0, 'rgba(6, 185, 157, 1)');
                    gradientStrokeGreen.addColorStop(1, 'rgba(132, 217, 210, 1)');
                    var gradientLegendGreen = 'linear-gradient(to right, rgba(6, 185, 157, 1), rgba(132, 217, 210, 1))';


                    var gradientStrokeViolet = ctx.createLinearGradient(0, 0, 0, 181);
                    gradientStrokeViolet.addColorStop(0, 'rgba(218, 140, 255, 1)');
                    gradientStrokeViolet.addColorStop(1, 'rgba(154, 85, 255, 1)');
                    var gradientLegendViolet = 'linear-gradient(to right, rgba(218, 140, 255, 1), rgba(154, 85, 255, 1))';

                    var gradientStrokeTemp = ctx.createLinearGradient(0, 0, 0, 181);
                    gradientStrokeTemp.addColorStop(0, 'rgba(54, 215, 232, 1)'); // Màu xanh lá cây
                    gradientStrokeTemp.addColorStop(1, 'rgba(255, 165, 0, 1)'); // Màu cam
                    var gradientLegendTemp = 'linear-gradient(to right, rgba(54, 215, 232, 1), rgba(255, 165, 0, 1))';

                    var trafficChartData = {
                        datasets: [{
                            data: data.total_report.map(item => item.report),
                            backgroundColor: [
                                gradientStrokeBlue,
                                gradientStrokeGreen,
                                gradientStrokeRed,
                                gradientStrokeViolet,
                                gradientStrokeTemp
                            ],
                            hoverBackgroundColor: [
                                gradientStrokeBlue,
                                gradientStrokeGreen,
                                gradientStrokeRed,
                                gradientStrokeViolet,
                                gradientStrokeTemp
                            ],
                            borderColor: [
                                gradientStrokeBlue,
                                gradientStrokeGreen,
                                gradientStrokeRed,
                                gradientStrokeViolet,
                                gradientStrokeTemp
                            ],
                            legendColor: [
                                gradientLegendBlue,
                                gradientLegendGreen,
                                gradientLegendRed,
                                gradientLegendViolet,
                                gradientLegendTemp
                            ]
                        }],

                        // These labels appear in the legend and in the tooltips when hovering different arcs
                        labels: data.total_report.map(item => {
                            if (item.status == 'pending') {
                                return 'Đang duyệt'
                            }
                            if (item.status == 'approved') {
                                return 'Xác nhận'
                            }
                            if (item.status == 'shipping') {
                                return 'Đang vận chuyển'
                            }
                            if (item.status == 'received') {
                                return 'Nhận hàng'
                            }
                            if (item.status == 'canceled') {
                                return 'Đã hủy'
                            }
                        })
                    };
                    var trafficChartOptions = {
                        responsive: true,
                        animation: {
                            animateScale: true,
                            animateRotate: true
                        },
                        legend: false,
                        legendCallback: function(chart) {
                            var text = [];
                            text.push('<ul>');
                            for (var i = 0; i < trafficChartData.datasets[0].data.length; i++) {
                                console.log(trafficChartData.datasets[0].legendColor.length);
                                text.push('<li><span class="legend-dots" style="background:' +
                                    trafficChartData.datasets[0].legendColor[i] +
                                    '"></span>');
                                if (trafficChartData.labels[i]) {
                                    text.push(trafficChartData.labels[i]);
                                }
                                text.push('</li>');
                            }
                            text.push('</ul>');
                            return text.join('');
                        }
                    };
                    var trafficChartCanvas = $("#traffic-chart").get(0).getContext("2d");
                    var trafficChart = new Chart(trafficChartCanvas, {
                        type: 'doughnut',
                        data: trafficChartData,
                        options: trafficChartOptions
                    });
                    $("#traffic-chart-legend").html(trafficChart.generateLegend());
                }

            }
        })
    </script>
</body>

</html>