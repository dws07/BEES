<?php 
function ent_to_nepali_num_convert($number){
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
	 						$Total = $total_data_gone_india->male_total + $total_data_gone_india->female_total + $total_data_gone_india->total_others + $total_data_gone_india->total_male_children + $total_data_gone_india->total_female_children + $total_data_gone_india->total_others_children;
							 echo ent_to_nepali_num_convert($Total);
                            ?> 
							</span>
                        </h2>
                        <ul>
                            <li> <span><?php echo isset($total_data_gone_india->male_total) ? ent_to_nepali_num_convert($total_data_gone_india->male_total):0; ?> </span>  <span>पुरूष यात्रु</span></li>
                            <li> <span><?php echo isset($total_data_gone_india->female_total) ? ent_to_nepali_num_convert($total_data_gone_india->female_total):0; ?></span>  <span>महिला यात्रु</span></li>
							<li> <span><?php echo isset($total_data_gone_india->total_others) ? ent_to_nepali_num_convert($total_data_gone_india->total_others):0; ?></span>  <span>तेस्रोलिंगी</span></li>
                            <li> <span><?php $ch = $total_data_gone_india->total_male_children + $total_data_gone_india->total_female_children + $total_data_gone_india->total_others_children;
							echo ent_to_nepali_num_convert($ch);
							 ?>
							</span><span>बालबालिका</span></li>
                            <li> <span><?php echo isset($total_data_gone_india->total_vehicle) ? ent_to_nepali_num_convert($total_data_gone_india->total_vehicle):0; ?></span>  <span>सवारीसाधनहरु</span></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="DBox">
					<?php echo $value->name; ?>
                        <h2>
                            नेपाल आउने कुल  यात्रुहरुको संख्या : 
                            <span>
							<?php
                             $Total = $total_data_gone_nepal->male_total + $total_data_gone_nepal->female_total + $total_data_gone_nepal->total_others + $total_data_gone_nepal->total_male_children + $total_data_gone_nepal->total_female_children + $total_data_gone_nepal->total_others_children;
							 
							 echo ent_to_nepali_num_convert($Total);
							?> 
							</span>
                        </h2>
                        <ul>
                            <li> <span><?php echo isset($total_data_gone_nepal->male_total) ? ent_to_nepali_num_convert($total_data_gone_nepal->male_total):0; ?> </span>  <span>पुरूष यात्रु</span></li>
                            <li> <span><?php echo isset($total_data_gone_nepal->female_total) ? ent_to_nepali_num_convert($total_data_gone_nepal->female_total):0; ?></span>  <span>महिला यात्रु</span></li>
                            <li> <span><?php echo isset($total_data_gone_nepal->total_others) ? ent_to_nepali_num_convert($total_data_gone_nepal->total_others):0; ?></span>  <span>तेस्रोलिंगी</span></li>
							<li> <span>
							<?php $child = $total_data_gone_nepal->total_male_children + $total_data_gone_nepal->total_female_children + $total_data_gone_nepal->total_others_children;
							echo ent_to_nepali_num_convert($child);
							?>
						</span>  <span>बालबालिका</span></li>
                            <li> <span><?php echo isset($total_data_gone_nepal->total_vehicle) ? ent_to_nepali_num_convert($total_data_gone_nepal->total_vehicle):0; ?></span>  <span>सवारीसाधनहरु</span></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-12">
				<div class="DBox">
				<div class="box-body">
                    <table class="table table-bordered" >
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
                                $i = 1;
                            foreach ($roles as $key => $value) {
                                $offset = $offset + $i;
                                $created_by = $this->db->get_where('users', array('id' => $value->created_by))->row();
                                if ($value->updated_by) {
                                $updated_by = $this->db->get_where('users', array('id' => $value->updated_by))->row()->user_name;
                                } else {
                                $updated_by = '';
                                }

                                if ($value->status == '1') {
                                    $status = '<span class="label label-success">Active</span>';
                                } else {
                                    $status = '<span class="label label-danger">Inactive</span>';
                                }
                            ?>
                            <tr>
                                <td data-toggle="modal" data-target="#ViewData<?php echo $value->id; ?>" class="ViewDataBTN"><?php echo $value->name; ?></td>
                                <td data-toggle="modal" data-target="#ViewData<?php echo $value->id; ?>">
                                    <?php echo (((isset($value->gender)) && $value->gender == 'male') ? 'पुरुष' : '') ?>
                                    <?php echo (((isset($value->gender)) && $value->gender == 'female') ? 'महिला' : '') ?>
                                    <?php echo (((isset($value->gender)) && $value->gender == 'others') ? 'तेस्रोलिंगी' : '') ?>
                                </td>
                                <td data-toggle="modal" data-target="#ViewData<?php echo $value->id; ?>"><?php echo $value->phone_number; ?></td>
                                <td data-toggle="modal" data-target="#ViewData<?php echo $value->id; ?>">
                                    <?php echo (((isset($value->gone_dirction)) && $value->gone_dirction == 'india') ? 'भारत तर्फ' : '') ?>
                                    <?php echo (((isset($value->gone_dirction)) && $value->gone_dirction == 'nepal') ? 'नेपाल तर्फ' : '') ?>
                                </td>
                                <td>
                                    <a data-toggle="modal" data-target="#ViewData<?php echo $value->id; ?>" class="btn bg-green btn-flat margin ViewDataBTN">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <div class="modal fade" id="ViewData<?php echo $value->id; ?>" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <div class="ContentBox">
                                                        <div class="img">
                                                            <img src="<?php echo base_url('');?><?php echo $value->profile_image ?>" alt="image">
                                                        </div>
                                                        <div class="details">
                                                            <ul class="TabBTNS">
                                                                <li class="personal activess">व्यक्तिगत विवरण</li>
                                                                <li class="travel">यात्रा विवरण</li>
                                                                <li class="vehicle">सवारी साधनको विवरण</li>
                                                                <li class="children">बालबालिका</li>
                                                                <li class="health">स्वाथ्य जानकारी</li>
                                                            </ul>
                                                            <div class="Datasss personalData acitvesssssss">
                                                                <table class="table  table-bordered">
                                                                    <tr>
                                                                        <th>पुरा नाम</th>
                                                                        <td><?php echo $value->name; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>उमेर</th>
                                                                        <td><?php echo $value->age; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>लिंग</th>
                                                                        <td><?php echo $value->gender; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>वैवाहिक स्थिति </th>
                                                                        <td>
                                                                            <?php echo $value->marital_status; ?>
                                                                            <?php if($value->marital_status == "others") { ?>
                                                                            <span>(<?php echo $value->marital_status_remarks; ?>)</span>
                                                                        <?php }?>
                                                                        </td>
                                                                        
                                                                    </tr>
                                                                    <tr>
                                                                        <th>ठेगाना</th>
                                                                        <td><?php echo $value->address; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>सम्पर्क नम्बर</th>
                                                                        <td><?php echo $value->phone_number; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>राष्ट्रियता</th>
                                                                        <td><?php echo $value->nationality; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>पेशा / ब्यबसायी</th>
                                                                        <td><?php echo $value->occupation; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>परिचय पत्र किसिम</th>
                                                                        <td><?php echo $value->identicard_type; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>परिचय पत्र नम्बर</th>
                                                                        <td><?php echo $value->identicard_number; ?></td>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                            <div class="Datasss travelData">
                                                                <table class="table  table-bordered">
                                                                    <tr>
                                                                        <th>यात्रा प्रारम्भ गरेको मुलुक</th>
                                                                        <td><?php echo $value->travel_start_country; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>प्रवेश बिन्दू</th>
                                                                        <td><?php echo $value->entry_adress; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>प्रवेश समय</th>
                                                                        <td><?php echo $value->entry_time; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>फर्केको समय</th>
                                                                        <td>
                                                                            <?php echo $value->exit_time; ?>
                                                                            
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>प्रबेश बिन्दू (सिमा निरीक्षण कक्ष / प्रबेश स्थाल)</th>
                                                                        <td><?php echo $value->entry_address2; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>यात्रा गन्तब्य</th>
                                                                        <td><?php echo $value->travel_destination; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>यात्राको अबधि ( गन्तव्यमा अपेक्षित रहने अबधि)</th>
                                                                        <td><?php echo $value->travel_deuration; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>यात्रा को उदेश्य</th>
                                                                        <td><?php echo $value->travel_porpose; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>सामानको विवरण</th>
                                                                        <td><?php echo $value->traveler_proporty; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>यात्राको किसिम</th>
                                                                        <td><?php echo $value->travel_type; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>दिशा तर्फ</th>
                                                                        <td><?php echo $value->gone_dirction; ?></td>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                            <div class="Datasss vehicleData">
                                                                <?php  if($value->travel_type == 'vehicle'){ ?>
                                                                    <table class="table  table-bordered">
                                                                        <tr>
                                                                            <th>सवारीको किसिम</th>
                                                                            <td><?php echo $value->vehicle_information; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>सवारी साधनको किसिम</th>
                                                                            <td><?php echo $value->types_of_vehicle; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>सवारी साधनको नम्बर</th>
                                                                            <td><?php echo $value->vehicle_number; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>चालकको पुरा नाम</th>
                                                                            <td>
                                                                                <?php echo $value->drivers_name; ?>
                                                                                
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>सवारी चालक अनुमतिपत्र नम्बर</th>
                                                                            <td><?php echo $value->driving_licence; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>चालकको सम्पर्क नम्बर</th>
                                                                            <td><?php echo $value->drivers_number; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>साधनको प्रयोजन </th>
                                                                            <td><?php echo $value->use_of_vehicle; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>माल बाहक सवारी साधन किसिम</th>
                                                                            <td><?php echo $value->heavy_vehicle_type; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>माल बाहक साधनमा ल्याएको सामानको विवरण</th>
                                                                            <td><?php echo $value->property_information; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>सार्बजनिक सवारी साधन मा कुल यात्री संख्या (चालक सहित)</th>
                                                                            <td><?php echo $value->pasengers; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>कुनै अतिरिक्त नोट वा बिशेष आवश्यकता</th>
                                                                            <td><?php echo $value->remarks; ?></td>
                                                                        </tr>
                                                                    </table>
                                                                <?php } else{
                                                                        echo "No Data";
                                                                    }
                                                                ?>
                                                            </div> 
                                                            <div class="Datasss childrenData ">
                                                                <?php if($value->children_name) { ?>
                                                                <table class="table  table-bordered">
                                                                    <tr>
                                                                        <th>पुरा नाम</th>
                                                                        <td><?php echo $value->children_name; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>जन्म मिति</th>
                                                                        <td><?php echo $value->children_dob; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>उमेर</th>
                                                                        <td><?php echo $value->children_age; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>लिंग</th>
                                                                        <td>
                                                                            <?php echo $value->children_gender; ?>
                                                                            
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>ठेगाना</th>
                                                                        <td><?php echo $value->children_address; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>परिचय पत्र नम्बर</th>
                                                                        <td><?php echo $value->children_identicard_number; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>संरक्षकको पुरा नाम</th>
                                                                        <td><?php echo $value->children_parent_name; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>सम्बन्ध</th>
                                                                        <td><?php echo $value->children_relations; ?></td>
                                                                    </tr>
                                                                </table>
                                                                <?php }else{
                                                                    echo "No Data";
                                                                }
                                                                
                                                                ?>
                                                            </div>
                                                            <div class="Datasss healthData">
                                                                <?php if($value->health_status){ ?>
                                                                <table class="table  table-bordered">
                                                                    <tr>
                                                                        <th>स्वाथ्य परिक्षण</th>
                                                                        <td><?php echo $value->health_status; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>परिणाम</th>
                                                                        <td><?php echo $value->health_result; ?></td>
                                                                    </tr>
                                                                </table>
                                                                <?php }else{echo "No Data";} ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                   
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
                    <a class="btn btn-success pull-right" href="<?php echo base_url('dataentryform/admin/all'); ?>">View More</a>
                </div>
				</div>
			</div>
            </div>
			
        </div>
        <div class="col-sm-6">
            <div class="row">
                <div class="col-sm-12">
                    <div class="DBox" style="overflow-x: scroll;">
                        <!-- <div id="GRAFContainer" style="height: 300px; max-width: 920px; margin: 0px auto;"></div> -->

                        <div id="curve_chart" style="width:594px; height: 300px"></div>
                    </div>
                </div>
                <div class="col-sm-6">
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
            </div>
        </div>
    </div>
</section>


   


<script type="text/javascript" src="<?php echo base_url() ?>assets/js/loader.js"></script>
<script type="text/javascript">
  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {
    // Define an array to hold the chart data
    var chartData = [];

    // Add column headers to the chart data array
    chartData.push(['Year', 'नेपाल आउने कुल यात्रुहरुको संख्या', 'नेपाल देखि भारत जाने कुल यात्रुहरुको संख्या']);

    // Loop through PHP data (assuming $All_Data is an array of objects fetched from PHP)
    <?php foreach ($All_Data as $row): ?>
      // Format each data row as an array and push to chartData array
      chartData.push(['<?php echo $row->created; ?>', <?php echo $row->nepal_gone; ?>,<?php echo $row->india_gone; ?>]);
    <?php endforeach; ?>

    // Convert the chartData array to a Google DataTable
    var data = google.visualization.arrayToDataTable(chartData);

    // Define chart options
    var options = {
      title: 'आवृति',
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
// 	var options = {
// 		exportEnabled: true,
// 		animationEnabled: true,
// 		title:{
// 			text: "आवृति"
// 		},
// 		subtitles: [{
// 			text: "यात्रीहरुको संख्या"
// 		}],
// 		axisX: {
// 			title: "आवृति"
// 		},
// 		axisY: {
// 			title: "",
// 			titleFontColor: "#4F81BC",
// 			lineColor: "#4F81BC",
// 			labelFontColor: "#4F81BC",
// 			tickColor: "#4F81BC"
// 		},
// 		axisY2: {
// 			title: "",
// 			titleFontColor: "#C0504E",
// 			lineColor: "#C0504E",
// 			labelFontColor: "#C0504E",
// 			tickColor: "#C0504E"
// 		},
// 		toolTip: {
// 			shared: true
// 		},
// 		legend: {
// 			cursor: "pointer",
// 			itemclick: toggleDataSeries
// 		},
// 		data: [{
// 			type: "spline",
// 			name: "नेपाल आउने कुल यात्रु र सवारी साधनको संख्या",
// 			showInLegend: true,
// 			xValueFormatString: "MMM YYYY",
// 			yValueFormatString: "#,##0 जना",
// 			dataPoints: [
// 				{ x: new Date(2024, 0, 1),  y: <?php echo isset($monthly_data_gone_nepal->nepal_gone) ? $monthly_data_gone_nepal->nepal_gone :1; ?> },
// 				{ x: new Date(2024, 1, 1), y: <?php echo isset($total_data_gone_nepal->nepal_gone) ? $total_data_gone_nepal->nepal_gone :1; ?> },
// 				{ x: new Date(2024, 2, 1), y: <?php echo isset($total_data_gone_nepal->nepal_gone) ? $total_data_gone_nepal->nepal_gone :1; ?> },
// 				{ x: new Date(2024, 3, 1),  y: <?php echo isset($total_data_gone_nepal->nepal_gone) ? $total_data_gone_nepal->nepal_gone :1; ?>},
// 				{ x: new Date(2024, 4, 1),  y: <?php echo isset($total_data_gone_nepal->nepal_gone) ? $total_data_gone_nepal->nepal_gone :1; ?> },
// 				{ x: new Date(2024, 5, 1),  y: <?php echo isset($total_data_gone_nepal->nepal_gone) ? $total_data_gone_nepal->nepal_gone :1; ?> },
// 				{ x: new Date(2024, 6, 1), y: <?php echo isset($total_data_gone_nepal->nepal_gone) ? $total_data_gone_nepal->nepal_gone :1; ?> },
// 				{ x: new Date(2024, 7, 1), y: <?php echo isset($total_data_gone_nepal->nepal_gone) ? $total_data_gone_nepal->nepal_gone :1; ?> },
// 				{ x: new Date(2024, 8, 1),  y: <?php echo isset($total_data_gone_nepal->nepal_gone) ? $total_data_gone_nepal->nepal_gone :1; ?> },
// 				{ x: new Date(2024, 9, 1),  y: <?php echo isset($total_data_gone_nepal->nepal_gone) ? $total_data_gone_nepal->nepal_gone :1; ?> },
// 				{ x: new Date(2024, 10, 1),  y: <?php echo isset($total_data_gone_nepal->nepal_gone) ? $total_data_gone_nepal->nepal_gone :1; ?> },
// 				{ x: new Date(2024, 11, 1), y: <?php echo isset($total_data_gone_nepal->nepal_gone) ? $total_data_gone_nepal->nepal_gone :1; ?>}
// 			]
// 		},
// 		{
// 			type: "spline",
// 			name: "भारत जाने कुल यात्रु र सवारी साधनको संख्या",
// 			axisYType: "secondary",
// 			showInLegend: true,
// 			xValueFormatString: "MMM YYYY",
// 			yValueFormatString: "#,##0.# जना",
// 			dataPoints: [
// 				{ x: new Date(2024, 0, 1),  y: <?php echo isset($monthly_data_gone_india->IndiaGone) ? $monthly_data_gone_india->IndiaGone:0; ?> },
// 				{ x: new Date(2024, 1, 1), y: <?php echo isset($total_data_gone_india->india_gone) ? $total_data_gone_india->india_gone:0; ?> },
// 				{ x: new Date(2024, 2, 1), y: <?php echo isset($total_data_gone_india->india_gone) ? $total_data_gone_india->india_gone:0; ?> },
// 				{ x: new Date(2024, 3, 1),  y: <?php echo isset($total_data_gone_india->india_gone) ? $total_data_gone_india->india_gone:0; ?> },
// 				{ x: new Date(2024, 4, 1),  y: <?php echo isset($total_data_gone_india->india_gone) ? $total_data_gone_india->india_gone:0; ?> },
// 				{ x: new Date(2024, 5, 1),  y: <?php echo isset($total_data_gone_india->india_gone) ? $total_data_gone_india->india_gone:0; ?> },
// 				{ x: new Date(2024, 6, 1), y: <?php echo isset($total_data_gone_india->india_gone) ? $total_data_gone_india->india_gone:0; ?> },
// 				{ x: new Date(2024, 7, 1), y: <?php echo isset($total_data_gone_india->india_gone) ? $total_data_gone_india->india_gone:0; ?> },
// 				{ x: new Date(2024, 8, 1),  y: <?php echo isset($total_data_gone_india->india_gone) ? $total_data_gone_india->india_gone:0; ?> },
// 				{ x: new Date(2024, 9, 1),  y: <?php echo isset($total_data_gone_india->india_gone) ? $total_data_gone_india->india_gone:0; ?> },
// 				{ x: new Date(2024, 10, 1),  y: <?php echo isset($total_data_gone_india->india_gone) ? $total_data_gone_india->india_gone:0; ?> },
// 				{ x: new Date(2024, 11, 1), y: <?php echo isset($total_data_gone_india->india_gone) ? $total_data_gone_india->india_gone:0; ?> }
// 			]
// 		}]
// 	};
// $("#GRAFContainer").CanvasJSChart(options);

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
	title:{
		text: "नेपाल देखि भारत जाने कुल यात्रुहरुको संख्या"
	},
	legend:{
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
			{color: "#4A90E2", y: <?php echo isset($total_data_gone_india->male_total) ? $total_data_gone_india->male_total:1; ?>, name: "पुरूष यात्रु" },
			{color: "#FF69B4", y: <?php echo isset($total_data_gone_india->female_total) ? $total_data_gone_india->female_total:1; ?>, name: "महिला यात्रु" },
			{color: "#c7cfd7", y: <?php echo isset($total_data_gone_india->total_others) ? $total_data_gone_india->total_others:1; ?>, name: "तेस्रोलिंगी" },
			{color: "#FFD700", y: <?php echo isset($total_data_gone_india->total_male_children )? $total_data_gone_india->total_male_children + $total_data_gone_india->total_female_children + $total_data_gone_india->total_others_children : 1
 ?>, name: "बालबालिका" },
			{color: "#32CD32", y: <?php echo isset($total_data_gone_india->total_vehicle) ? $total_data_gone_india->total_vehicle:1; ?>, name: " सवारीसाधनहरु " }
		]
	}]
};
$("#chartContainer1").CanvasJSChart(options);

// FOR CHAT 2

var options = {
	// exportEnabled: true,
	animationEnabled: true,
	title:{
		text: "नेपाल आउने कुल यात्रुहरुको संख्या"
	},
	legend:{
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
			{color: "#4A90E2", y: <?php echo isset($total_data_gone_nepal->male_total) ? $total_data_gone_nepal->male_total:1; ?>, name: "पुरूष यात्रु" },
			{color: "#FF69B4", y: <?php echo isset($total_data_gone_nepal->female_total) ? $total_data_gone_nepal->female_total:1; ?>, name: "महिला यात्रु" },
			{color: "#c7cfd7", y: <?php echo isset($total_data_gone_nepal->total_others) ? $total_data_gone_nepal->total_others:1; ?>, name: "तेस्रोलिंगी" },
			{color: "#FFD700", y: <?php echo isset($total_data_gone_nepal->total_male_children ) ? $total_data_gone_nepal->total_male_children + $total_data_gone_nepal->total_female_children + $total_data_gone_nepal->total_others_children : 1
 ?>, name: "बालबालिका" },
			{color: "#32CD32", y: <?php echo isset($total_data_gone_nepal->total_vehicle) ? $total_data_gone_nepal->total_vehicle:1; ?>, name: "सवारीसाधनहरु" }
		]
	}]
};
$("#chartContainer2").CanvasJSChart(options);

}


</script>