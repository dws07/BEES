<?php
// $current_user = $this->session->userdata('current_user');
//  $site_settings = $this->session->userdata('site_settings'); ?>
<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu" data-widget="tree">
            <li class="<?php echo isset($dashboard)? 'active' : ''; ?>">
                <a href="<?php echo base_url('dashboard'); ?>">
                    <!-- <i class="fa fa-dashboard"></i>  -->
                    <span>ड्यासबोर्ड</span>
                </a>
            </li>
            <?php
                $check_designation = $this->crud_model->get_module_for_role('designation');
                if ($check_designation == true) {
                ?>
            <li class="<?php echo isset($designation)? 'active' : ''; ?>">
                <?php $check_designation_all = $this->crud_model->get_module_function_for_role('designation', 'all');
                    if ($check_designation_all == true) {
                    ?>
                    <a href="<?php echo base_url('designation/admin/all'); ?>">
                        <!-- <i class="fa fa-edit"></i> -->
                        <span>पद</span>
                    </a>
                <?php } ?>
            </li>
            <?php } ?>
            <?php
                $check_department = $this->crud_model->get_module_for_role('department');
                if ($check_department == true) {
                ?>
            <li class=" <?php echo isset($department)? 'active' : ''; ?>">
                <?php
                    $check_department_all = $this->crud_model->get_module_function_for_role('department', 'all');
                    if ($check_department_all == true) {
                    ?>
                        <a href="<?php echo base_url('department/admin/all'); ?>">
                        <!-- <i class="fa fa-edit"></i>  -->
                        <span>विभाग</span></a>
                    <?php } ?>
            </li>
            <?php } ?>

            <?php
                $check_province = $this->crud_model->get_module_for_role('province');
                if ($check_province == true) {
                ?>
            <li class=" <?php echo isset($province)? 'active' : ''; ?>">
                <?php
                    $check_province_all = $this->crud_model->get_module_function_for_role('province', 'all');
                    if ($check_province_all == true) {
                    ?>
                   
                        <a href="<?php echo base_url('province/admin/all'); ?>">
                        <!-- <i class="fa fa-edit"></i>  -->
                        <span>प्रदेश</span>
                        </a>
                
                    <?php } ?>
            </li>
            <?php } ?>
            <?php
                $check_district = $this->crud_model->get_module_for_role('district');
                if ($check_district == true) {
                ?>
            <li class=" <?php echo isset($district)? 'active' : ''; ?>">
           
                <?php
                    $check_district_all = $this->crud_model->get_module_function_for_role('district', 'all');
                    if ($check_district_all == true) {
                    ?>
                        <a href="<?php echo base_url('district/admin/all'); ?>">
                            <!-- <i class="fa fa-edit"></i> -->
                            <span>जिल्ला</span>
                        </a>
                    <?php } ?>
            </li>
            <?php } ?>

            <?php
                $check_user_role = $this->crud_model->get_module_for_role('user_role');
                if ($check_user_role == true) {
                ?>
            <li class=" <?php echo isset($user_role)? 'active' : ''; ?>">
                 <?php
                      $check_user_role_all = $this->crud_model->get_module_function_for_role('user_role', 'all');
                      if ($check_user_role_all == true) {
                      ?>
                        <a href="<?php echo base_url('user_role/admin/all'); ?>">
                            <!-- <i class="fa fa-user-secret"></i> -->
                            <span>प्रयोगकर्ता भूमिका</span>
                        </a>
                    <?php } ?>
            </li>
            <?php } ?>
            <?php
                $check_module = $this->crud_model->get_module_for_role('module');
                if ($check_module == true) {
                ?>

            <li class=" <?php echo isset($modules)?  'active' : ''; ?>">
                <?php
                    $check_module_all = $this->crud_model->get_module_function_for_role('module', 'all');
                    if ($check_module_all == true) {
                    ?>
                    <a href="<?php echo base_url('module/admin/role_function'); ?>">
                        <!-- <i class="fa fa-user-plus"></i> -->
                        <span>प्रयोगकर्ता अनुमति</span>
                    </a>
                <?php } ?>
            </li>


            <?php } ?>
            <?php
                $check_user = $this->crud_model->get_module_for_role('user');
                if ($check_user == true) {
                ?>

            <li class=" <?php echo isset($users)?'active' : ''; ?>">
                <?php
                      $check_user_all = $this->crud_model->get_module_function_for_role('user', 'all');
                      if ($check_user_all == true) {
                      ?>
                        <a href="<?php echo base_url('user/admin/all'); ?>">
                            <!-- <i class="fa fa-users"></i> -->
                            <span>प्रयोगकर्ताहरू</span></a>
                    <?php } ?>
            </li>
            <?php } ?>
            <?php
            $check_staff = $this->crud_model->get_module_for_role('staff');
            if ($check_staff == true) {
            ?>
            <li class=" <?php echo isset($staff)? 'active' : ''; ?>">
                <?php
                    $check_staff_all = $this->crud_model->get_module_function_for_role('staff', 'all');
                    if ($check_staff_all == true) {
                    ?>
                        <a href="<?php echo base_url('staff/admin/all'); ?>">
                            <!-- <i class="fa fa-user"></i>  -->
                            <span>कर्मचारीहरु</span></a>
                    <?php } ?>
            </li>
            <?php } ?>
            <?php
                $check_dataentryform_form = $this->crud_model->get_module_function_for_role('dataentryform', 'form');
                if ($check_dataentryform_form == true) {
                ?>
                <li class=" <?php echo isset($dataentryform)? 'active' : ''; ?>">
                 <?php
                    $check_dataentryform_all = $this->crud_model->get_module_function_for_role('dataentryform', 'all');
                    if ($check_dataentryform_all == true) {
                    ?>
                    <a href="<?php echo base_url('dataentryform/admin/form'); ?>">
                        <!-- <i class="fa fa-edit"></i> -->
                        <span>यात्री फारम</span>
                    </a>
                <?php } ?>
            </li>
            <?php } ?>
        </ul>
    </section>

</aside>