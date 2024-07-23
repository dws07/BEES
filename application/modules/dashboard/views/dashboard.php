<?php
function ent_to_nepali_num_convert($number)
{
    $eng_number = array(
        "0",
        "1",
        "2",
        "3",
        "4",
        "5",
        "6",
        "7",
        "8",
        "9"
    );
    $nep_number = array(
        "०",
        "१",
        "२",
        "३",
        "४",
        "५",
        "६",
        "७",
        "८",
        "९"
    );
    return str_replace($eng_number, $nep_number, $number);

}



?>


<section class="content">
    <div class="row">
        <div class="col-sm-6">
            <div class="row">
                <div class="col-sm-6">
                    <div class="DBox">
                        <h2>
                            नेपाल देखि भारत जाने कुल यात्रुहरुको संख्या :
                            <span>
                                <?php
                                $Total = $total_data_gone_direction->india_gone_male + $total_data_gone_direction->india_gone_female + $total_data_gone_direction->india_gone_other + $total_data_gone_direction->india_gone_children;
                                echo ent_to_nepali_num_convert($Total);
                                ?>
                            </span>
                        </h2>
                        <ul>
                            <li> <span><?php echo isset($total_data_gone_direction->india_gone_male) ? ent_to_nepali_num_convert($total_data_gone_direction->india_gone_male) : 0; ?>
                                </span> <span>पुरूष यात्रु</span></li>
                            <li> <span><?php echo isset($total_data_gone_direction->india_gone_female) ? ent_to_nepali_num_convert($total_data_gone_direction->india_gone_female) : 0; ?></span>
                                <span>महिला यात्रु</span>
                            </li>
                            <li> <span><?php echo isset($total_data_gone_direction->india_gone_other) ? ent_to_nepali_num_convert($total_data_gone_direction->india_gone_other) : 0; ?></span>
                                <span>तेस्रोलिंगी</span>
                            </li>
                            <li> <span><?php echo isset($total_data_gone_direction->india_gone_children) ? ent_to_nepali_num_convert($total_data_gone_direction->india_gone_children) : 0; ?></span>
                                <span>बालबालिका</span>
                            </li>
                            <li> <span><?php echo isset($total_data_gone_direction->india_gone_vehicle) ? ent_to_nepali_num_convert($total_data_gone_direction->india_gone_vehicle) : 0; ?></span>
                                <span>सवारीसाधनहरु</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="DBox">
                        <?php echo $value->name; ?>
                        <h2>
                            नेपाल आउने कुल यात्रुहरुको संख्या :
                            <span>
                                <?php
                                $Total = $total_data_gone_direction->nepal_gone_male + $total_data_gone_direction->nepal_gone_female + $total_data_gone_direction->nepal_gone_other + $total_data_gone_direction->nepal_gone_children;

                                echo ent_to_nepali_num_convert($Total);
                                ?>
                            </span>
                        </h2>
                        <ul>
                            <li> <span><?php echo isset($total_data_gone_direction->nepal_gone_male) ? ent_to_nepali_num_convert($total_data_gone_direction->nepal_gone_male) : 0; ?>
                                </span> <span>पुरूष यात्रु</span></li>
                            <li> <span><?php echo isset($total_data_gone_direction->nepal_gone_female) ? ent_to_nepali_num_convert($total_data_gone_direction->nepal_gone_female) : 0; ?></span>
                                <span>महिला यात्रु</span>
                            </li>
                            <li> <span><?php echo isset($total_data_gone_direction->nepal_gone_other) ? ent_to_nepali_num_convert($total_data_gone_direction->nepal_gone_other) : 0; ?></span>
                                <span>तेस्रोलिंगी</span>
                            </li>
                            <li> <span><?php echo isset($total_data_gone_direction->nepal_gone_children) ? ent_to_nepali_num_convert($total_data_gone_direction->nepal_gone_children) : 0; ?></span>
                                <span>बालबालिका</span>
                            </li>
                            <li> <span><?php echo isset($total_data_gone_direction->nepal_gone_vehicle) ? ent_to_nepali_num_convert($total_data_gone_direction->nepal_gone_vehicle) : 0; ?></span>
                                <span>सवारीसाधनहरु</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-12">
				<div class="DBox">
				<div class="box-body">
                    <table class="table table-bordered" id="nepali_preeti" >
                        <thead>
                            <tr>
                                <th>पुरा नाम</th>
                                <th>लिंग</th>
                                <th>सम्पर्क नम्बर</th>
                                <th>दिशा तर्फ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($roles) { 
                            foreach ($roles as $key => $value) { 
                            ?>
                            <tr>
                                <td class="ViewDataBTN"><?php echo $value->name; ?></td>
                                <td>
                                    <?php echo $value->gender?> 
                                </td>
                                <td><p id="no_preeti"><?php echo $this->crud_model->ent_to_nepali_num_convert($value->country_code) ?></p><?php echo $value->phone_number; ?></td>
                                <td>
                                    <?php echo $value->gone ?> 
                                </td>
                                <td>
                                    <a href="<?php echo base_url('travel/admin/all/'.$value->id); ?>" class="btn btn-flat margin ViewDataBTN"
                                                        style="background-color : #053775; color:#fff">
                                        <i class="fa fa-eye"></i>
                                    </a> 
                                   
                                </td>
                            </tr>


                                        <?php } ?>

                                    <?php } else { ?>
                                        <tr>
                                            <td colspan="9" style="text-align:center;">No Records Found</td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <?php if ($roles) { ?>
                                <div class="box-footer clearfix">
                                    <?php echo $pagination; ?>
                                </div>
                            <?php } ?>
                            <a style="background-color : #053775; color:#fff" class="btn btn-success pull-right"
                                href="<?php echo base_url('dataentryform/admin/all') ?>">View More</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-sm-6">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 col-xl-12 ">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 col-xl-12">
                            <div class="ChartBox">
                                <h2>आवृति</h2>
                                <div id="curve_chart" style="min-height:280px; width: 100%;">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-12 col-lg-6 col-xs-12 col-xl-12"
                            style="border-right: 1px solid #ddd">
                            <div class="ChartBox">
                                <div id="chartContainer1" style="min-height: 300px; width: 100%;"></div>
                                <!-- <h2 class="text-center">नेपाल देखि भारत जाने कुल यात्रुहरुको संख्या</h2> -->
                                <h2 class="text-center">नेपाल निकास</h2>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-lg-6 col-xs-12 col-xl-12">
                            <div class="ChartBox">
                                <div id="chartContainer2" style="height: 300px; width: 100%;"></div>
                                <!-- <h2 class="text-center">नेपाल आउने कुल यात्रुहरुको संख्या</h2> -->
                                <h2 class="text-center">नेपाल प्रवेश</h2>
                            </div>
                        </div>
                    </div>
                    <!-- <div class=" col-sm-12">
                                <div class="DBox" style="overflow-x: scroll;padding:0px">
                                    <div id="curve_chart"
                                        style="height:100%; width: 100%;min-height:300px;min-width:800px"></div>
                                </div>
                            </div>
                            <div class=" col-sm-6">
                                <div class="DBox">
                                    <div class="chart">
                                        <div id="chartContainer1" style="height: 300px; width: 100%;"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="DBox">
                                    <div class="chart">
                                        <div id="chartContainer2" style="height: 300px; width: 100%;"></div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                </div>
            </div>
</section>





<script type="text/javascript" src="<?php echo base_url() ?>assets/js/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', { 'packages': ['corechart'] });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        // Define an array to hold the chart data
        var chartData = [];

        // Add column headers to the chart data array
        chartData.push(['Year', 'नेपाल आउने कुल यात्रुहरुको संख्या', 'नेपाल देखि भारत जाने कुल यात्रुहरुको संख्या']);

        // Loop through PHP data (assuming $All_Data is an array of objects fetched from PHP)
        <?php foreach ($All_Data as $row): ?>
            // Format each data row as an array and push to chartData array
            chartData.push(['<?php echo $row->created; ?>', <?php echo $row->nepal_gone; ?>, <?php echo $row->india_gone; ?>]);
        <?php endforeach; ?>

        // Convert the chartData array to a Google DataTable
        var data = google.visualization.arrayToDataTable(chartData);

        // Define chart options
        var options = {
            // title: 'आवृति',
            curveType: 'function',
            legend: { position: 'bottom' }
        };

        // Instantiate and draw the chart, using LineChart from Google Charts
        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
        chart.draw(data, options);
    }
</script>


<script>
    window.onload = function () {

        function toggleDataSeries(e) {
            if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                e.dataSeries.visible = false;
            } else {
                e.dataSeries.visible = true;
            }
            e.chart.render();
        }

        // FOR CHRTSS

        var options = {
            exportEnabled: true,
            animationEnabled: true,
            // title: {
            //     text: "नेपाल देखि भारत जाने कुल यात्रुहरुको संख्या"
            // },
            legend: {
                horizontalAlign: "right",
                verticalAlign: "center"
            },
            data: [{

                type: "doughnut",
                innerRadius: "30%",
                // showInLegend: true,
                toolTipContent: "<b>{name}</b>: {y} (#percent%)",
                indexLabel: "{name}",
                legendText: "{name} (#percent%)",
                indexLabelPlacement: "inside",
                dataPoints: [
                    { color: "#1f66f2", y: <?php echo isset($total_data_gone_direction->india_gone_male) ? $total_data_gone_direction->india_gone_male : 1; ?>, name: "पुरूष यात्रु" },
                    { color: "#72a0fe", y: <?php echo isset($total_data_gone_direction->india_gone_female) ? $total_data_gone_direction->india_gone_female : 1; ?>, name: "महिला यात्रु" },
                    { color: "#c7cfd7", y: <?php echo isset($total_data_gone_direction->india_gone_other) ? $total_data_gone_direction->india_gone_other : 1; ?>, name: "तेस्रोलिंगी" },
                    { color: "#eae5ff", y: <?php echo isset($total_data_gone_direction->india_gone_children) ? $total_data_gone_direction->india_gone_children : 1; ?>, name: "बालबालिका" },
                    { color: "#e0effc", y: <?php echo isset($total_data_gone_direction->india_gone_vehicle) ? $total_data_gone_direction->india_gone_vehicle : 1; ?>, name: " सवारीसाधनहरु " }
                ]
            }]
        };
        $("#chartContainer1").CanvasJSChart(options);

        // FOR CHAT 2

        var options = {
            // exportEnabled: true,
            animationEnabled: true,
            // title: {
            //     text: "नेपाल आउने कुल यात्रुहरुको संख्या"
            // },
            legend: {
                horizontalAlign: "right",
                verticalAlign: "center",
                fontColor: "#fff",
            },

            data: [{
                type: "doughnut",
                innerRadius: "30%",
                // showInLegend: true,
                toolTipContent: "<b>{name}</b>: {y} (#percent%)",
                indexLabel: "{name}",
                legendText: "{name} (#percent%)",
                indexLabelPlacement: "inside",
                dataPoints: [
                    { color: "#1f66f2", y: <?php echo isset($total_data_gone_direction->nepal_gone_male) ? $total_data_gone_direction->nepal_gone_male : 1; ?>, name: "पुरूष यात्रु" },
                    { color: "#72a0fe", y: <?php echo isset($total_data_gone_direction->nepal_gone_female) ? $total_data_gone_direction->nepal_gone_female : 1; ?>, name: "महिला यात्रु" },
                    { color: "#c7cfd7", y: <?php echo isset($total_data_gone_direction->nepal_gone_other) ? $total_data_gone_direction->nepal_gone_other : 1; ?>, name: "तेस्रोलिंगी" },
                    { color: "#eae5ff", y: <?php echo isset($total_data_gone_direction->nepal_gone_children) ? $total_data_gone_direction->nepal_gone_children : 1; ?>, name: "बालबालिका" },
                    { color: "#e0effc", y: <?php echo isset($total_data_gone_direction->nepal_gone_vehicle) ? $total_data_gone_direction->nepal_gone_vehicle : 1; ?>, name: "सवारीसाधनहरु" }
                ]
            }]
        };
        $("#chartContainer2").CanvasJSChart(options);

    }


</script>