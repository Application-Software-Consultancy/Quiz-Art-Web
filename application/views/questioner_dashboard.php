<!DOCTYPE html>
<html lang="en">
    <head>    
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">

        <title>Dashboard | <?php echo ($app_name) ? $app_name['message'] : "" ?></title>        

        <?php base_url() . include 'include.php'; ?>  
    </head>
    <style>
        .item-card {
            height: 72px;
            padding: 14px;
            font-weight: bold;
            text-align: center;
        }
    </style>
    <body>
        <div id="app">
            <div class="main-wrapper">

                <?php base_url() . include 'questioner_header.php'; ?>  
                <!-- Main Content -->
                <div class="main-content">
                    <section class="section">
                        
                        <div class="row mt-4">
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-2">
                                <div class="card card-statistic-1 item-card" style="background-color:#e9900a;color:white;">
                                    Questions Contributed
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="card card-statistic-1 item-card" style="background-color:#0000ff;color:white;">
                                    Approved Questions
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="card card-statistic-1 item-card" style="background-color:#339966;color:white;">
                                    Total Earned Points
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="card card-statistic-1 item-card" style="background-color:#800080;color:white;">
                                    Balance Points
                                </div>
                            </div>
                        </div>
                        
                        <div class="row mt-4">
                            <div class="col-md-3">
                                <div class="card card-statistic-1 item-card">
                                    TODAY
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="card card-statistic-1 item-card" style="background-color:#e9900a;color:white;">
                                    <?= $today_question;?>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="card card-statistic-1 item-card" style="background-color:#0000ff;color:white;">
                                    <?= $today_approved_question; ?>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="card card-statistic-1 item-card" style="background-color:#339966;color:white;">
                                    0
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="card card-statistic-1 item-card" style="background-color:#800080;color:white;">
                                    0
                                </div>
                            </div>
                        </div>
                        
                        <div class="row mt-4">
                            <div class="col-md-3">
                                <div class="card card-statistic-1 item-card">
                                    WEEKLY
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="card card-statistic-1 item-card" style="background-color:#e9900a;color:white;">
                                    <?= $weekly_question; ?>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="card card-statistic-1 item-card" style="background-color:#0000ff;color:white;">
                                    <?= $weekly_approved_question; ?>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="card card-statistic-1 item-card" style="background-color:#339966;color:white;">
                                    0
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="card card-statistic-1 item-card" style="background-color:#800080;color:white;">
                                    0
                                </div>
                            </div>
                        </div>
                        
                        <div class="row mt-4">
                            <div class="col-md-3">
                                <div class="card card-statistic-1 item-card">
                                    MONTHLY
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="card card-statistic-1 item-card" style="background-color:#e9900a;color:white;">
                                    <?= $monthly_question; ?>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="card card-statistic-1 item-card" style="background-color:#0000ff;color:white;">
                                    <?= $monthly_approved_question; ?>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="card card-statistic-1 item-card" style="background-color:#339966;color:white;">
                                    0
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="card card-statistic-1 item-card" style="background-color:#800080;color:white;">
                                    0
                                </div>
                            </div>
                        </div>
                        
                        <div class="row mt-4">
                            <div class="col-md-3">
                                <div class="card card-statistic-1 item-card">
                                    YEARLY
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="card card-statistic-1 item-card" style="background-color:#e9900a;color:white;">
                                   <?= $yearly_question; ?>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="card card-statistic-1 item-card" style="background-color:#0000ff;color:white;">
                                    <?= $yearly_approved_question; ?>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="card card-statistic-1 item-card" style="background-color:#339966;color:white;">
                                   0
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="card card-statistic-1 item-card" style="background-color:#800080;color:white;">
                                    0
                                </div>
                            </div>
                        </div>

                        </div>
                    </section>
                </div>

            </div>
        </div>

        <?php base_url() . include 'footer.php'; ?> 

        <script src="<?= base_url(); ?>assets/js/chart.min.js" type="text/javascript"></script>

        <script type="text/javascript">
<?php
$mLable = $mData = array();
foreach ($month_data as $mD) {
    $mLable[] = $mD->month_name;
    $mData[] = ($mD->user_count == NULL) ? 0 : (int) $mD->user_count;
}
$mName = json_encode($mLable);
$mD = json_encode($mData);

$wLable = $wData = array();
foreach ($week_data as $wD) {
    $wLable[] = $wD->day_name;
    $wData[] = ($wD->user_count == NULL) ? 0 : (int) $wD->user_count;
}
$wName = json_encode($wLable);
$wD = json_encode($wData);

$dLable = $dData = array();
foreach ($day_data as $dD) {
    $dLable[] = $dD->day_name;
    $dData[] = (int) $dD->user_count;
}
$dName = json_encode($dLable);
$dD = json_encode($dData);

// For day data
$maxDayData = $dData ? max($dData) : 0;
$stepSizeDay = $maxDayData > 10 ? round($maxDayData / 10) : 1; // Change 10 to the number of steps you want

// For week data
$maxWeekData = $wData ? max($wData) : 0;
$stepSizeWeek = $maxWeekData > 10 ? round($maxWeekData / 10) : 1; // Change 10 to the number of steps you want

// For month data
$maxMonthData = $mData ? max($mData) : 0;
$stepSizeMonth = $maxMonthData > 10 ? round($maxMonthData / 10) : 1; // Change 10 to the number of steps you want
?>

            var daytx = document.getElementById("dayChart").getContext('2d');
            var myChart = new Chart(daytx, {
                type: 'bar',
                data: {
                    labels: <?= $dName; ?>,
                    datasets: [{
                            label: 'Statistics',
                            data: <?= $dD ?>,
                            borderWidth: 2,
                            backgroundColor: '<?=$theme_color ?? "#f05387" ?>',
                            borderColor: '<?=$theme_color ?? "#f05387" ?>',
                            pointBackgroundColor: '#ffffff',
                            pointRadius: 4
                        }]
                },
                options: {
                    legend: {
                        display: false
                    },
                    scales: {
                        yAxes: [{
                                gridLines: {
                                    drawBorder: false,
                                    color: '#f2f2f2',
                                },
                                ticks: {
                                    beginAtZero: true,
                                    stepSize: <?= $stepSizeDay ?>
                                }
                            }],
                        xAxes: [{
                                ticks: {
                                    display: true
                                },
                                gridLines: {
                                    display: false
                                }
                            }]
                    },
                }
            });

            var weektx = document.getElementById("weekChart").getContext('2d');
            var myChart = new Chart(weektx, {
                type: 'bar',
                data: {
                    labels: <?= $wName; ?>,
                    datasets: [{
                            label: 'Statistics',
                            data: <?= $wD ?>,
                            borderWidth: 2,
                            backgroundColor: '<?=$theme_color ?? "#f05387" ?>',
                            borderColor: '<?=$theme_color ?? "#f05387" ?>',
                            pointBackgroundColor: '#ffffff',
                            pointRadius: 4
                        }]
                },
                options: {
                    legend: {
                        display: false
                    },
                    scales: {
                        yAxes: [{
                                gridLines: {
                                    drawBorder: false,
                                    color: '#f2f2f2',
                                },
                                ticks: {
                                    beginAtZero: true,
                                    stepSize: <?= $stepSizeWeek ?>
                                }
                            }],
                        xAxes: [{
                                ticks: {
                                    display: true
                                },
                                gridLines: {
                                    display: false
                                }
                            }]
                    },
                }
            });


            var monthtx = document.getElementById("monthChart").getContext('2d');
            var monthChartVar;
            monthChartVar = new Chart(monthtx, {
                type: 'bar',
                data: {
                    labels: <?= $mName; ?>,
                    datasets: [{
                            label: 'Statistics',
                            data: <?= $mD ?>,
                            borderWidth: 2,
                            backgroundColor: '<?=$theme_color ?? "#f05387" ?>',
                            borderColor: '<?=$theme_color ?? "#f05387" ?>',
                            pointBackgroundColor: '#ffffff',
                            pointRadius: 4
                        }]
                },
                options: {
                    legend: {
                        display: false
                    },
                    scales: {
                        yAxes: [{
                                gridLines: {
                                    drawBorder: false,
                                    color: '#f2f2f2',
                                },
                                ticks: {
                                    beginAtZero: true,
                                    stepSize: <?= $stepSizeMonth ?>
                                }
                            }],
                        xAxes: [{
                                ticks: {
                                    display: true
                                },
                                gridLines: {
                                    display: false
                                }
                            }]
                    },
                }
            });

            $(document).ready(function () {
                $("#yearDropdown").hide();
                $('#month-tab3').trigger('click');
            });
            $("#month-tab3").on('click',function(){
                $("#yearDropdown").show();
            });
            $("#week-tab3").on('click',function(){
                $("#yearDropdown").hide();
            });
            $("#day-tab3").on('click',function(){
                $("#yearDropdown").hide();
            });
            
            $("#yearDropdown").on("change", function () {
                var base_url = "<?php echo base_url(); ?>";
                let value = $(this).val();
                $.ajax({
                    url: base_url + 'dashboard-year/' + value,
                    type: "GET",
                    success: function (response) {
                        response = JSON.parse((response));
                        var mName = response.mName;
                        var mD = response.mD;
                        var stepSizeMonth = response.stepSizeMonth

                        var monthtx = document.getElementById("monthChart").getContext('2d');
                        // If the chart exists, destroy it before creating a new one
                        if (monthChartVar) {
                            monthChartVar.destroy();
                        }
                        monthChartVar = new Chart(monthtx, {
                            type: 'bar',
                            data: {
                                labels: mName,
                                datasets: [{
                                    label: 'Statistics',
                                    data: mD,
                                    borderWidth: 2,
                                    backgroundColor: '<?=$theme_color ?? "#f05387" ?>',
                                    borderColor: '<?=$theme_color ?? "#f05387" ?>',
                                    pointBackgroundColor: '#ffffff',
                                    pointRadius: 4
                                }]
                            },
                            options: {
                                legend: {
                                    display: false
                                },
                                scales: {
                                    yAxes: [{
                                        gridLines: {
                                            drawBorder: false,
                                            color: '#f2f2f2',
                                        },
                                        ticks: {
                                            beginAtZero: true,
                                            stepSize: stepSizeMonth
                                        }
                                    }],
                                    xAxes: [{
                                        ticks: {
                                            display: true
                                        },
                                        gridLines: {
                                            display: false
                                        }
                                    }]
                                },
                            }
                        });
                    }
                });
            });
        </script>
    </body>

</html>