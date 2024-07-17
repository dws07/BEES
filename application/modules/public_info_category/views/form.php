<section class="content">
      <div class="container-fluid"> 
        <form class="all_form" method="post" action enctype="multipart/form-data">    
            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title"><?php echo $title ?></h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div> 
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Title <span>*</span></label>
                      <input type="text" name="title" class="form-control" id="title" placeholder="Title" value="<?php echo (((isset($detail->title)) && $detail->title != '')? $detail->title : '') ?>">
                    </div> 
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Title Nepali</label>
                      <input type="text" name="title_nepali" class="form-control" id="title_nepali" placeholder="Title Nepali" value="<?php echo (((isset($detail->title_nepali)) && $detail->title_nepali != '')? $detail->title_nepali : '') ?>">
                    </div> 
                  </div>
                </div> 
                <div class="row">  
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Featured Image</label> 
                      <input type="text" name="featured_image" class="form-control" id="featured_image" placeholder="featured_image" value="<?php echo (((isset($detail->featured_image)) && $detail->featured_image != '')? $detail->featured_image : '') ?>" readonly="readonly"> 
                      <a  class="btn btn-default featured_image button_cls" type="button">Upload</a>
                      <?php if((isset($detail->featured_image)) && $detail->featured_image != ''){ ?>
                        <img src="<?php echo $detail->featured_image; ?>" class="img_cl img-fluid" id="defff0" style="max-height: 675px;object-fit: contain;">
                      <?php }else{ ?>
                        <img src="" class="img_cl img-fluid" id="defff0" style="display:none;max-height: 675px;object-fit: contain;">
                      <?php }?>  
                    </div> 
                  </div> 
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Order <span>*</span></label>
                      <input type="numer" name="order_no" class="form-control" id="order_no" placeholder="Order" value="<?php echo (((isset($detail->order_no)) && $detail->order_no != '')? $detail->order_no : '') ?>">
                    </div> 
                  </div>
                </div>   
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Description</label> 
                      <textarea name="description" id="description" class="form-control" rows="5" cols="80" autocomplete="off"><?php echo (((isset($detail->description)) && $detail->description != '')? $detail->description : '') ?></textarea>
                    </div> 
                  </div> 
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Description Nepali</label> 
                      <textarea name="description_nepali" id="DescriptionNepali" class="form-control" rows="5" cols="80" autocomplete="off"><?php echo (((isset($detail->description_nepali)) && $detail->description_nepali != '')? $detail->description_nepali : '') ?></textarea>
                    </div> 
                  </div> 
                </div>
                <div class="row">  
                  
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Status</label>
                      <select name="status" class="form-control selct2" id="status">
                        <option value="1" <?php echo (((isset($detail->status)) && $detail->status == '1') ? 'selected' : '') ?>>Active</option>
                        <option value="0" <?php echo (((isset($detail->status)) && $detail->status == '0') ? 'selected' : '') ?>>Inactive</option> 
                      </select>  
                    </div> 
                  </div>  
                </div> 
                <div class="row"> 
                  <div class="col-md-12">
                    <div class="form-group">  
                        <input type="submit" name="submit" class="form-control btn btn-sm btn-primary" id="submit" value="Save">  
                        <input type="hidden" name="id" class="form-control btn btn-sm btn-primary" id="submit" value="<?php echo (((isset($detail->id)) && $detail->id != '')? $detail->id : '') ?>">  
                    </div> 
                  </div> 
                </div> 
              </div> 
            </div>  
        </form>
      </div>
</section>
<script>
  function responsive_filemanager_callback(field_id){  
        var url=$('#'+field_id).val();
        // alert('yo'); 
        $('#'+field_id).next().next().attr('src',url);
        $('#'+field_id).next().next().show(); 
  } 
</script>