<style>
    span.rmv_btn_mdl {
        float: right;
        background: red;
        border-radius: 50%;
        padding: 1px 0px 0px 8px;
        width: 25px;
        height: 25px;
        font-size: 17px;
        color: #fff;
        font-weight: bold;
    }

    .function-table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    .function-table th,
    .function-table td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    .function-table th {
        background-color: #f2f2f2;
    }
</style>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <form class="all_form" method="post" action enctype="multipart/form-data">
                <div class="box box-default">
                    <!-- <div class="box-header">
                        <h3 class="box-title"><?php echo $title ?></h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                    class="fa fa-remove"></i></button>
                        </div>
                    </div> -->
                    <div class="box-body">

                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Select Role</label>
                                    <select name="role_id" class="form-control" id="role_id">
                                        <?php
                                        foreach ($role as $key => $val) {
                                            ?>
                                            <option value="<?php echo $val->id; ?>"><?php echo $val->name; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="functions" style="border: 1px solid #ddd; padding: 10px;margin-bottom: 20px;"
                            id="append_persmission">
                            <table class="function-table">
                                <?php
                                foreach ($module as $key => $val) {
                                    $module_function = $this->crud_model->get_where('module_function', array('module_id' => $val->id));
                                    ?>
                                    <thead>
                                        <tr>
                                            <th colspan="4"><?php echo $val->display_name; ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <?php
                                            $col_count = 0;
                                            foreach ($module_function as $key_f => $val_f) {
                                                if ($col_count > 0 && $col_count % 4 == 0) {
                                                    echo '</tr><tr>';
                                                }
                                                ?>
                                                <td>
                                                    <input type="checkbox" name="module_function_id[]"
                                                        value="<?php echo $val_f->id; ?>" style="margin-right: 10px;" <?php foreach ($module_function_role as $key_fr => $val_fr) {
                                                               if ($val_fr->module_function_id == $val_f->id) {
                                                                   echo "checked";
                                                               }
                                                           } ?>><?php echo $val_f->display_name ?>
                                                </td>
                                                <?php
                                                $col_count++;
                                            }
                                            while ($col_count % 4 != 0) {
                                                echo '<td></td>';
                                                $col_count++;
                                            }
                                            ?>
                                        </tr>
                                    </tbody>
                                    <?php
                                }
                                ?>
                            </table>
                        </div>
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
</section>