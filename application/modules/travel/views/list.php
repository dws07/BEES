<style>
    .content{
        background:#fff;
    }
    .imgprofile {
        text-align: -webkit-center;
        display: block;
    }

    .imgprofile img {
        height: 160px;
    }
    .profiledetail {
        display: block;
        text-align: center;
    }

    .profiledetail h3 {
        font-size: 22px;
        font-weight: bold;
        border-bottom: 1px solid #ddd;
        padding: 5px;
    }

    .detaillist p {
        font-size: 14px;
        color: #656161;
    }

    .detaillist p level {
        font-weight: bold;
    } 

    .profilt {
        border-bottom: 1px solid #ddd;
    }
</style>
<section class="content">
    <div class="row">
        <div class="col-md-6 col-sm-12 col-xs-12 col-xl-6">
            <div class="card">
            <div class="imgprofile">
                <img src="<?php echo ($person_detail->profile_image !== '' && $person_detail->profile_image)?base_url('/').$person_detail->profile_image:base_url('/uploads/Circle-icons-profile.svg.png');?>" alt="image">
                <h3><?php echo $person_detail->name?$person_detail->name:'' ?></h3>
            </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-12 col-xs-12 col-xl-6">
        <div class="profiledetail">
            <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12 col-xl-6" style="text-align : left">
                    <span class="label">सम्पर्क नम्बर :</span>
                    <p style="margin-left:1rem;"><?php echo $person_detail->phone_number?$person_detail->phone_number:'' ?></p>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12 col-xl-6" style="text-align : left">
                    <span class="label">राष्ट्रियता :</span>
                    <p style="margin-left:1rem;"><?php echo $person_detail->nationality?$person_detail->nationality:'' ?></p>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12 col-xl-6" style="text-align : left">
                    <span class="label">जन्म मिति :</span>
                    <p style="margin-left:1rem;"><?php echo $person_detail->nepali_date_of_birth?$person_detail->nepali_date_of_birth:'' ?></p>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12 col-xl-6" style="text-align : left">
                    <span class="label">उमेर :</span>
                    <p style="margin-left:1rem;"><?php echo $person_detail->age?$person_detail->age:'' ?></p>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12 col-xl-6" style="text-align : left">
                    <span class="label">लिंग :</span>
                    <p style="margin-left:1rem;"><?php echo $person_detail->gender?$person_detail->gender:'' ?></p>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12 col-xl-12">
                <hr style="border-top:1px solid #ddd" />
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12 col-xl-6" style="text-align : left">
                    <span class="label">ठेगाना :</span>
                    <p style="margin-left:1rem;"><?php echo $person_detail->address?$person_detail->address:'' ?></p>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12 col-xl-6" style="text-align : left">
                    <span class="label">परिचय पत्र किसिम :</span>
                    <p style="margin-left:1rem;"><?php echo $person_detail->identicard_type?$person_detail->identicard_type:'' ?></p>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12 col-xl-6" style="text-align : left">
                    <span class="label">परिचय पत्र नम्बर :</span>
                    <p style="margin-left:1rem;"><?php echo $person_detail->identicard_number?$person_detail->identicard_number:'' ?></p>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12 col-xl-6" style="text-align : left">
                    <span class="label">वैवाहिक स्थिति :</span>
                    <p style="margin-left:1rem;"><?php echo $person_detail->marital_status?$person_detail->marital_status:'' ?></p>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12 col-xl-6" style="text-align : left">
                    <span class="label">पेशा / ब्यबसायी :</span>
                    <p style="margin-left:1rem;"><?php echo $person_detail->occupation?$person_detail->occupation:'' ?></p>
                </div>

                    <!-- <div class="col-md-6" style="border-right: 1px solid #ddd;">
                        <div class="detaillist">
                                            <p><level>सम्पर्क नम्बर :</level><?php echo $person_detail->age?$person_detail->age:'' ?></p>
                                            <p><level>राष्ट्रियता :</level><?php echo $person_detail->age?$person_detail->age:'' ?></p>
                                            <p><level>जन्म मिति :</level><?php echo $person_detail->age?$person_detail->age:'' ?></p>
                                            <p><level>उमेर :</level><?php echo $person_detail->age?$person_detail->age:'' ?></p>
                                            <p><level>लिंग :</level><?php echo $person_detail->age?$person_detail->age:'' ?></p>
                        </div> 
                     </div>
                    <div class="col-md-6">
                        <div class="detaillist">
                                            <p><level>ठेगाना :</level><?php echo $person_detail->age?$person_detail->age:'' ?></p> 
                                            <p><level>परिचय पत्र किसिम :</level><?php echo $person_detail->age?$person_detail->age:'' ?></p>
                                            <p><level>परिचय पत्र नम्बर  :</level><?php echo $person_detail->age?$person_detail->age:'' ?></p>
                                            <p><level>वैवाहिक स्थिति :</level><?php echo $person_detail->age?$person_detail->age:'' ?></p>
                                            <p><level>पेशा / ब्यबसायी:</level><?php echo $person_detail->age?$person_detail->age:'' ?></p>
                            </div>
                        </div> -->
            </div> 
        </div>
        </div>
        <div class="col-md-12">
            <div class="box">
                <div class="box-body profilt">
                    <div class="row">
                        <div class="col-md-6">

                        </div>
                    </div>  
                </div>    
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered" id="MyTable">
                        <thead>
                            <tr>
                                <th>क्र. स.</th>
                                <th>यात्रा प्रारम्भ गरेको मुलुक</th>
                                <th>प्रवेश बिन्दू</th>
                                <th>प्रवेश समय</th>
                                <th>यात्रा गन्तब्य </th>
                                <th>यात्राको अबधि </th>
                                <th>दिशा तर्फ</th>
                                <th>यात्रा को उदेश्य</th>
                                <th>यात्राको किसिम</th>
                                <th>बालबालिका</th>
                                <th>फर्केको हो?</th>
                                <th>कार्य</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($travel_lit) { 
                            foreach ($travel_lit as $key => $value) {  
                            ?>
                            <tr>
                                <td><?php echo ($key+1); ?></td>
                                <td data-toggle="modal" data-target="#ViewData<?php echo $value->id; ?>"><?php echo $value->travel_start_country; ?></td>
                                <td data-toggle="modal" data-target="#ViewData<?php echo $value->id; ?>"><?php echo $value->entry_adress; ?></td>
                                <td data-toggle="modal" data-target="#ViewData<?php echo $value->id; ?>"><?php echo $value->entry_time; ?></td>
                                <td data-toggle="modal" data-target="#ViewData<?php echo $value->id; ?>"><?php echo $value->travel_destination; ?></td>
                                <td data-toggle="modal" data-target="#ViewData<?php echo $value->id; ?>"><?php echo $value->travel_deuration; ?></td>
                                <td data-toggle="modal" data-target="#ViewData<?php echo $value->id; ?>"><?php echo $value->gone_dirction; ?></td>
                                <td data-toggle="modal" data-target="#ViewData<?php echo $value->id; ?>"><?php echo $value->travel_porpose; ?></td>
                                <td data-toggle="modal" data-target="#ViewData<?php echo $value->id; ?>"><?php echo $value->travel_type; ?></td>
                                <td data-toggle="modal" data-target="#ViewData<?php echo $value->id; ?>"><?php echo $value->childrens_list?count($value->childrens_list):0; ?></td>
                                <td data-toggle="modal" data-target="#ViewData<?php echo $value->id; ?>"><?php echo ($value->is_returned && $value->is_returned == 1)?'हो':'होइन'; ?></td>
                                <td>
                                <?php
                                    $check_dataentryform_soft_delete = $this->crud_model->get_module_function_for_role('travel', 'form');
                                    if ($check_dataentryform_soft_delete == true) {
                                    ?>
                                    <!-- <a href="<?php //echo base_url('dataentryform/admin/form/' . $value->id); ?>"
                                        class="btn bg-purple btn-flat margin"><i class="fa fa-edit"></i></a> -->
                                    <?php } ?>
                                    <!-- <?php
                                    $check_dataentryform_soft_delete = $this->crud_model->get_module_function_for_role('travel', 'soft_delete');
                                    if ($check_dataentryform_soft_delete == true) {
                                    ?>
                                    <a data-toggle="modal" data-target="#exampleModal<?php echo $value->id; ?>"
                                        class="btn bg-red btn-flat margin"><i class="fa fa-trash-o"></i></a>

                                    <div class="modal fade" id="exampleModal<?php echo $value->id; ?>" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Are You Sure To Delete?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">No</button>
                                                    <a href="<?php echo base_url('dataentryform/admin/soft_delete/' . $value->id); ?>"
                                                        class="btn btn-primary">Yes</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?> -->
                                    <?php
                                    $check_travel_all = $this->crud_model->get_module_function_for_role('travel', 'all');
                                    if ($check_travel_all == true) {
                                    ?>
                                    <a data-toggle="modal" data-target="#ViewData<?php echo $value->id; ?>"
                                        class="btn bg-green btn-flat margin ViewDataBTN"><i class="fa fa-eye"></i>
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
                                                        <div class="details">
                                                            <ul class="TabBTNS"> 
                                                                <li class="travel activess">यात्रा विवरण</li>
                                                                <li class="vehicle">सवारी साधनको विवरण</li>
                                                                <li class="children">बालबालिका</li>
                                                                <li class="health">स्वाथ्य जानकारी</li>
                                                            </ul> 
                                                            <div class="Datasss travelData acitvesssssss">
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
                                                                <?php  if($value->travel_type == 'गाडी'){ ?>
                                                                    <table class="table  table-bordered">
                                                                        <tr>
                                                                            <th>सवारीको किसिम</th>
                                                                            <td><?php echo $value->vehicle_info->vehicle_information; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>सवारी साधनको किसिम</th>
                                                                            <td><?php echo $value->vehicle_info->types_of_vehicle; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>सवारी साधनको नम्बर</th>
                                                                            <td><?php echo $value->vehicle_info->vehicle_number; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>चालकको पुरा नाम</th>
                                                                            <td>
                                                                                <?php echo $value->vehicle_info->drivers_name; ?>
                                                                                
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>सवारी चालक अनुमतिपत्र नम्बर</th>
                                                                            <td><?php echo $value->vehicle_info->driving_licence; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>चालकको सम्पर्क नम्बर</th>
                                                                            <td><?php echo $value->vehicle_info->drivers_number; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>साधनको प्रयोजन </th>
                                                                            <td><?php echo $value->vehicle_info->use_of_vehicle; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>माल बाहक सवारी साधन किसिम</th>
                                                                            <td><?php echo $value->vehicle_info->heavy_vehicle_type; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>माल बाहक साधनमा ल्याएको सामानको विवरण</th>
                                                                            <td><?php echo $value->vehicle_info->property_information; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>सार्बजनिक सवारी साधन मा कुल यात्री संख्या (चालक सहित)</th>
                                                                            <td><?php echo $value->vehicle_info->pasengers; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>फर्केको हो?</th>
                                                                            <td><?php echo (isset($value->vehicle_info->is_returned) && $value->vehicle_info->is_returned == '1')?"हो":"होइन"; ?></td>
                                                                        </tr>
                                                                    </table>
                                                                <?php } else{echo "No Data";} ?>
                                                            </div> 
                                                            <div class="Datasss childrenData ">
                                                                <?php 
                                                                    if($value->childrens_list) {
                                                                        foreach($value->childrens_list as $key=>$child_val){ 
                                                                ?>
                                                                    <table class="table  table-bordered">
                                                                        <tr>
                                                                            <th>पुरा नाम</th>
                                                                            <td><?php echo $child_val->children_name; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>जन्म मिति</th>
                                                                            <td><?php echo $child_val->nepali_dob_children; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>उमेर</th>
                                                                            <td><?php echo $child_val->children_age; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>लिंग</th>
                                                                            <td>
                                                                                <?php echo $child_val->children_gender; ?>
                                                                                
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>ठेगाना</th>
                                                                            <td><?php echo $child_val->children_address; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>परिचय पत्र नम्बर</th>
                                                                            <td><?php echo $child_val->children_identicard_number; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>संरक्षकको पुरा नाम</th>
                                                                            <td><?php echo $child_val->children_parent_name; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>सम्बन्ध</th>
                                                                            <td><?php echo $child_val->children_relations; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>फर्केको हो?</th>
                                                                            <td><?php echo (isset($child_va->is_returned) && $child_val->is_returned == '1')?"हो":"होइन"; ?></td>
                                                                        </tr>
                                                                    </table>
                                                                <?php }}else{echo "No Data";} ?>
                                                            </div>
                                                            <div class="Datasss healthData">
                                                                <?php if($value->health_info){ ?>
                                                                <table class="table  table-bordered">
                                                                    <tr>
                                                                        <th>स्वाथ्य परिक्षण</th>
                                                                        <td><?php echo $value->health_info->health_status; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>परिणाम</th>
                                                                        <td><?php echo $value->health_info->health_result; ?></td>
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
                                    <?php } ?>
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
                    <?php if ($travel_lit) { ?>
                    <div class="box-footer clearfix">
                        <?php //echo $pagination; ?>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>

