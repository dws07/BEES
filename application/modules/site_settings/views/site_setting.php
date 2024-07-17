<style>
    .Imagessssss{
    width: 100px!important;
}
</style>
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo $title ?></h3>
            </div>
            <form class="all_form" method="post" action enctype="multipart/form-data">
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Site Name</label>
                                <input type="text" name="site_name" class="form-control" id="site_name"
                                    placeholder="Site Name"
                                    value="<?php echo (((isset($site_settings->site_name)) && $site_settings->site_name != '') ? $site_settings->site_name : '') ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Site Short Name</label>
                                <input type="text" name="short_name" class="form-control" id="short_name"
                                    placeholder="Site Name"
                                    value="<?php echo (((isset($site_settings->short_name)) && $site_settings->short_name != '') ? $site_settings->short_name : '') ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="form-group">
                                    <label>Site Slogan</label>
                                    <input type="text" name="site_slogan" class="form-control" id="site_slogan"
                                        placeholder="Site Slogan"
                                        value="<?php echo (((isset($site_settings->site_slogan)) && $site_settings->site_slogan != '') ? $site_settings->site_slogan : '') ?>">
                                </div>
                                <!-- /.form-group -->
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Website Url</label>
                                <input type="text" name="web_url" class="form-control" id="web_url"
                                    placeholder="Web Url"
                                    value="<?php echo (((isset($site_settings->web_url)) && $site_settings->web_url != '') ? $site_settings->web_url : '') ?>">
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" name="address" class="form-control" id="address"
                                    placeholder="Address"
                                    value="<?php echo (((isset($site_settings->address)) && $site_settings->address != '') ? $site_settings->address : '') ?>">
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label>Mobile</label>
                                    <input type="text" name="mobile" class="form-control" id="mobile"
                                        placeholder="Mobile"
                                        value="<?php echo (((isset($site_settings->mobile)) && $site_settings->mobile != '') ? $site_settings->mobile : '') ?>">
                                </div>
                                <!-- /.form-group -->
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label>Telephone</label>
                                    <input type="text" name="telephone" class="form-control" id="telephone"
                                        placeholder="Telephone"
                                        value="<?php echo (((isset($site_settings->telephone)) && $site_settings->telephone != '') ? $site_settings->telephone : '') ?>">
                                </div>
                                <!-- /.form-group -->
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="email" class="form-control" id="email" placeholder="Email"
                                    value="<?php echo (((isset($site_settings->email)) && $site_settings->email != '') ? $site_settings->email : '') ?>">
                            </div>
                        </div>
                        <!-- /.col -->
                       
                       
                    </div>
                </div>

              
                
                <div class="box-header with-border">
                    <h3 class="box-title">Images</h3>
                </div>

                <!-- /.card-header -->
                <div class="box-body">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Logo</label>
                                    <input type="file" name="logo" class="form-control" id="logo" placeholder="Logo">
                                    <img class="Imagessssss" src="<?php echo (((isset($site_settings->logo)) && $site_settings->logo != '') ? $site_settings->logo : '') ?>" alt="Logo">
                                </div>
                            </div>
                        </div>
                       
                    </div>
                    
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="submit" name="submit" class="form-control btn btn-sm btn-primary"
                                        id="submit" value="Save">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function responsive_filemanager_callback(field_id) {
    var url = $('#' + field_id).val();
    // alert('yo'); 
    $('#' + field_id).next().next().attr('src', url);
    $('#' + field_id).next().next().show();
}
</script>