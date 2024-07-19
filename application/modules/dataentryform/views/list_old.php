<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered" id="MyTable">
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
                                <th>कार्य</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($items) {
                                $i = 1;
                            foreach ($items as $key => $value) {  
                            ?>
                            <tr>
                                <td><?php echo ($key+1); ?></td>
                                <td data-toggle="modal" data-target="#ViewData<?php echo $value->id; ?>"><?php echo $value->name; ?></td>
                                <td data-toggle="modal" data-target="#ViewData<?php echo $value->id; ?>"><?php echo $value->phone_number; ?></td>
                                <td data-toggle="modal" data-target="#ViewData<?php echo $value->id; ?>"><?php echo $value->nationality; ?></td>
                                <td data-toggle="modal" data-target="#ViewData<?php echo $value->id; ?>"><?php echo $value->identicard_type; ?></td>
                                <td data-toggle="modal" data-target="#ViewData<?php echo $value->id; ?>"><?php echo $value->identicard_number; ?></td>
                                <td data-toggle="modal" data-target="#ViewData<?php echo $value->id; ?>"><?php echo $value->date_of_birth; ?></td>
                                <td data-toggle="modal" data-target="#ViewData<?php echo $value->id; ?>"><?php echo $value->age; ?></td>
                                <td data-toggle="modal" data-target="#ViewData<?php echo $value->id; ?>"><?php echo $value->gender; ?></td>
                                <td data-toggle="modal" data-target="#ViewData<?php echo $value->id; ?>"><?php echo $value->address; ?></td>
                                <td data-toggle="modal" data-target="#ViewData<?php echo $value->id; ?>"><?php echo $value->marital_status; ?></td>
                                <td data-toggle="modal" data-target="#ViewData<?php echo $value->id; ?>"><?php echo $value->occupation; ?></td>
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
                    <?php if ($items) { ?>
                    <div class="box-footer clearfix">
                        <?php //echo $pagination; ?>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>

