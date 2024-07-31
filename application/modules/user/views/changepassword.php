<section class="content">
  <div class="container-fluid">
    <form class="all_form" method="post" action enctype="multipart/form-data">
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title"><?php echo $title ?></h3>

          <div class="card-tools">
            <!-- <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
              <i class="fa fa-times"></i>
            </button> -->
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#autogenmodal">
              Autogenerate
            </button>

            <!-- Modal -->
            <div class="modal fade" id="autogenmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Autogenerate password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <?php $random_pass = $this->crud_model->generateRandomPassword(12);?>
                    <input type="text" name="autopass" class="form-control" id="autopassgen" value="<?php echo $random_pass ?>"/>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="refreshautopass">Refresh</button>
                    <button type="button" class="btn btn-success" onclick="copyToClipboard()">Copy and Use</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label style="margin-right: 10px;">Password <span id="pwchng"></span></label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label style="margin-right: 10px;">Confirm Password</label>
                <input type="password" name="password_conf" class="form-control" id="password_conf" placeholder="Confirm Password" required>
              </div>
            </div>
            <div class="col-md-12">
              <div class="SUB_BTN">
                <input type="submit" name="submit" class=" btn btn-sm btn-primary" id="submit" value="Save"> 
                <input type="hidden" name="id" class="form-control btn btn-sm btn-primary" id="submit" value="<?php echo (((isset($detail->id)) && $detail->id != '') ? $detail->id : '') ?>">
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</section>
<script>
  function responsive_filemanager_callback(field_id) {
    var url = $('#' + field_id).val();
    // alert('yo'); 
    $('#' + field_id).next().next().attr('src', url);
    $('#' + field_id).next().next().show();
  }
</script>