<style>
    .input-group.input-group-sm.hidden-xs {
        display: flex;
        flex-direction: row;
    }
    .box-tools {
        right: 38px !important;
    }
    .input-group.input-group-sm.hidden-xs label {
        font-size: 12px;
    }
    span.slider.round {
        /* top: -24px !important;
        bottom: 23px !important; */
        width: 40px !important;
        /* left: 10px !important; */
    }
    .switch {
        top: -24px !important;
        bottom: 23px !important;
        width: 40px !important;
        left: 10px !important;
    }
</style>
<?php 
    $session_form_data = $this->session->userdata('form_data');
    // echo "<pre>";
    // var_dump($session_form_data['fromdate']);
?>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"> 
                            <a href="<?php echo base_url('/dataentryform/admin/all') ?>" class="btn btn-sm btn-primary"> यात्रीहरुको सुची</a> 
                    </h3>
                    <div class="box-tools">
                        <form action="" method="post">
                            <div class="row" id="rfs">
                                <div class="input-group input-group-sm hidden-xs" id="rfschld"> 
                                    <label>Search Field</label> 
                                    <label class="switch">
                                        <input id="switch_search" type="checkbox">
                                        <span class="slider round"></span>
                                    </label>
                                    <input type="text" name="search_field" class="form-control pull-right searchswitch"
                                        placeholder="phone,vehicle and name" 
                                        value="<?php echo isset($session_form_data['search_field'])?$session_form_data['search_field']:'' ?>">  
                                    <label>From date</label>
                                    <input type="date" name="fromdate" class="form-control pull-right"
                                        placeholder="Search"
                                        value="<?php echo isset($session_form_data['fromdate'])?$session_form_data['fromdate']:'' ?>">
                                    <label>To date</label>
                                    <input type="date" name="todate" class="form-control pull-right"
                                        placeholder="Search"
                                        value="<?php echo isset($session_form_data['todate'])?$session_form_data['todate']:'' ?>">
                                    <div class="input-group-btn">
                                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered table-responsive" id="nepali_preeti">
                        <thead>
                            <tr>
                                <th>क्र. स.</th>
                                <th>पुरा नाम</th>
                                <th>सम्पर्क नम्बर</th> 
                                <th>राष्ट्रियता</th>
                                <th>परिचय पत्र किसिम</th>
                                <th>परिचय पत्र नम्बर</th> 
                                <th>जन्म मिति </th>
                                <th>उमेर</th>
                                <th>लिंग</th>
                                <th>ठेगाना </th>
                                <th>वैवाहिक स्थिति</th>
                                <th>पेशा / ब्यबसायी</th> 
                                <th>सिर्जना गर्ने</th>
                                <th>सिर्जना दिन</th>
                                <th>कार्य</th>
                            </tr>
                        </thead> 
                        <tbody>
                            <?php
                            if ($items) {
                                $i = 1;
                            foreach ($items as $key => $value) {  
                                $created_by = '';
                                if($value->created_by){ 
                                    $user_detail = $this->db->get_where('users',array('id'=>$value->created_by))->row();
                                    if($user_detail){
                                        $staff_detail = $this->db->get_where('staff_infos',array('id'=>$user_detail->staff_id))->row();
                                        if($staff_detail){
                                            $created_by = $staff_detail->full_name;
                                        }
                                    }
                                };
                            ?>
                            <tr>
                                <td><?php echo $this->crud_model->ent_to_nepali_num_convert($key+1); ?></td>
                                <td data-toggle="modal" data-target="#ViewData<?php echo $value->id; ?>"><?php echo $value->name; ?></td>
                                <td data-toggle="modal" data-target="#ViewData<?php echo $value->id; ?>"><?php echo $this->crud_model->ent_to_nepali_num_convert($value->country_code) ?>-<?php echo $value->phone_number; ?></td>
                                <td data-toggle="modal" data-target="#ViewData<?php echo $value->id; ?>"><?php echo $value->nationality; ?></td>
                                <td data-toggle="modal" data-target="#ViewData<?php echo $value->id; ?>"><?php echo $value->identicard_type; ?></td>
                                <td data-toggle="modal" data-target="#ViewData<?php echo $value->id; ?>"><?php echo $value->identicard_number; ?></td>
                                <td data-toggle="modal" data-target="#ViewData<?php echo $value->id; ?>" id="no_preeti"><?php echo $this->crud_model->ent_to_nepali_num_convert($value->nepali_date_of_birth); ?></td>
                                <td data-toggle="modal" data-target="#ViewData<?php echo $value->id; ?>" id="no_preeti"><?php echo $this->crud_model->ent_to_nepali_num_convert($value->age); ?></td>
                                <td data-toggle="modal" data-target="#ViewData<?php echo $value->id; ?>"><?php echo $value->gender; ?></td>
                                <td data-toggle="modal" data-target="#ViewData<?php echo $value->id; ?>"><?php echo $value->address; ?></td>
                                <td data-toggle="modal" data-target="#ViewData<?php echo $value->id; ?>">
                                <?php if($value->marital_status && $value->marital_status == 'अन्य'){ ?>
                                    <p style="margin-left:1rem;"><?php echo $value->marital_status?$value->marital_status:'' ?></p>
                                    <p style="margin-left:1rem;" id="nepali_preeti"><?php echo $value->marital_status_remarks?$value->marital_status_remarks:'' ?></p>
                                <?php }else{ ?>
                                    <p style="margin-left:1rem;"><?php echo $value->marital_status?$value->marital_status:'' ?></p>
                                <?php } ?>     
                                </td>
                                <td data-toggle="modal" data-target="#ViewData<?php echo $value->id; ?>"><?php echo $value->occupation; ?></td> 
                                <td data-toggle="modal" data-target="#ViewData<?php echo $value->id; ?>"><?php echo $created_by; ?></td> 
                                <td data-toggle="modal" data-target="#ViewData<?php echo $value->id; ?>"><?php echo $value->created; ?></td>
                                <td>
                                <?php
                                    $check_dataentryform_soft_delete = $this->crud_model->get_module_function_for_role('personal_information', 'soft_delete');
                                    if ($check_dataentryform_soft_delete == true) {
                                    ?>
                                    <!-- <a href="<?php echo base_url('dataentryform/admin/form/' . $value->id); ?>"
                                        class="btn bg-purple btn-flat margin"><i class="fa fa-edit"></i></a> -->
                                    <?php } ?>
                                    <?php
                                    $check_dataentryform_soft_delete = $this->crud_model->get_module_function_for_role('personal_information', 'soft_delete');
                                    if ($check_dataentryform_soft_delete == true) {
                                    ?>
                                    <!-- <a data-toggle="modal" data-target="#exampleModal<?php echo $value->id; ?>"
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
                                    </div> -->
                                    <?php } ?>
                                    <?php
                                    $check_dataentryform_soft_delete = $this->crud_model->get_module_function_for_role('travel', 'all');
                                    if ($check_dataentryform_soft_delete == true) {
                                    ?>
                                    <a href="<?php echo base_url('travel/admin/all/'.$value->id); ?>" class="btn bg-green btn-flat margin ViewDataBTN"><i class="fa fa-eye"></i></a> 
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
                    <!-- /.box-body -->
                    <?php if ($items) { ?>
                        <div class="box-footer clearfix">
                            <?php echo $pagination; ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</section>