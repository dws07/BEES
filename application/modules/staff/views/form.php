<section class="content">
    <div class="row">
        <div class="col-md-12">
            <form class="all_form" method="post" action enctype="multipart/form-data">
                <div class="box box-default">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>पुरा नाम <span>*</span></label>
                                    <input type="text" name="full_name" class="form-control" id="full_name"
                                        placeholder="पुरा नाम"
                                        value="<?php echo set_value('full_name', (((isset($detail->full_name)) && $detail->full_name != '')? $detail->full_name : '')); ?>">
                                    <?php echo form_error('full_name', '<div class="error_message">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>स्थाई ठेगाना<span>*</span></label>
                                    <input type="text" name="permanent_address" class="form-control"
                                        id="permanent_address" placeholder="स्थाई ठेगाना"
                                        value="<?php echo set_value('permanent_address', (((isset($detail->permanent_address)) && $detail->permanent_address != '')? $detail->permanent_address : '')); ?>">
                                    <?php echo form_error('permanent_address', '<div class="error_message">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>अस्थायी ठेगाना</label>
                                    <input type="text" name="temp_address" class="form-control" id="temp_address"
                                        placeholder="अस्थायी ठेगाना"
                                        value="<?php echo set_value('temp_address', (((isset($detail->temp_address)) && $detail->temp_address != '')? $detail->temp_address : '')); ?>">
                                    <?php echo form_error('temp_address', '<div class="error_message">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>सम्पर्क नम्बर</label>
                                    <input type="text" name="contact" class="form-control" id="contact"
                                        placeholder="सम्पर्क नम्बर"
                                        value="<?php echo set_value('contact', (((isset($detail->contact)) && $detail->contact != '')? $detail->contact : '')); ?>">
                                    <?php echo form_error('contact', '<div class="error_message">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>इमेल</label>
                                    <input type="text" name="email" class="form-control" id="email" placeholder="इमेल"
                                        value="<?php echo set_value('email', (((isset($detail->email)) && $detail->email != '')? $detail->email : '')); ?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>तोकिएको मिति <span>*</span></label>
                                    <input type="text" name="appointed_date" class="form-control" id="nepali-datepicker" placeholder="तोकिएको मिति"> 
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>पद चयन गर्नुहोस्</label>
                                    <select name="designation_code" class="form-control " id="designation_code"
                                        <?php echo (((isset($dep_deg->designation_code)) && $dep_deg->designation_code != '') ? '' : '') ?>>
                                        <option value>पद चयन गर्नुहोस्</option>
                                        <?php foreach ($designations as $key => $value) { ?>
                                        <option value="<?php echo $value->designation_code; ?>"
                                            <?php echo  set_select('designation_code', $value->designation_code, (isset($dep_deg->designation_code) && $dep_deg->designation_code == $value->designation_code) ? TRUE : '' );  ?>>
                                            <?php echo $value->designation_name; ?></option>
                                        <?php } ?>
                                        <?php echo form_error('designation_code', '<div class="error_message">', '</div>'); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>विभाग चयन गर्नुहोस् <span>*</span></label>
                                    <select name="department_code" class="form-control " id="department_code"
                                        <?php echo (((isset($dep_deg->department_code)) && $dep_deg->department_code != '') ? '' : '') ?>>
                                        <option value>बिभाग चयन गर्नुहोस</option>
                                        <?php foreach ($departments as $key => $value) { ?>
                                        <option value="<?php echo $value->department_code; ?>"
                                            <?php echo  set_select('department_code', $value->department_code, (isset($dep_deg->department_code) && $dep_deg->department_code == $value->department_code) ? TRUE : ''); ?>>
                                            <?php echo $value->department_name; ?></option>
                                        <?php } ?>

                                    </select>
                                    <?php echo form_error('department_code', '<div class="error_message">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>प्रोफाइल तस्वीर</label>
                                    <input type="file" name="featured_image" class="form-control" id="featured_image"
                                        placeholder="प्रोफाइल तस्वीर"
                                        value="<?php echo set_value('featured_image', (((isset($detail->featured_image)) && $detail->featured_image != '')? $detail->featured_image : '')); ?>"
                                        readonly="readonly">
                                    <?php echo form_error('featured_image', '<div class="error_message">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>स्थिति</label>
                                    <select name="status" class="form-control" id="status">
                                        <option value="1"
                                            <?php echo  set_select('status', '1', (isset($detail->status) && $detail->status == '1') ? TRUE : ''); ?>>
                                            Active</option>
                                        <option value="0"
                                            <?php echo  set_select('status', '0', (isset($detail->status) && $detail->status == '0') ? TRUE : ''); ?>>
                                            Inactive</option>
                                        <?php echo form_error('status', '<div class="error_message">', '</div>'); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label></label>
                                    <input type="submit" name="submit" class="form-control btn btn-sm btn-primary"
                                        id="submit" value="सेभ">
                                    <input type="hidden" name="id" class="form-control btn btn-sm btn-primary"
                                        id="submit"
                                        value="<?php echo (((isset($detail->id)) && $detail->id != '')? $detail->id : '') ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>