<style>
    .content {
        background-color: #fff;
    }

    .required {
        color: red;
    }

    span.field_validation {
        color: red;
        display: inline-block;
        margin-top: 8px;
    }

    select#countryCode {
        border: 1px solid #ddd;
        color: #f04848;
    }

    .chldimg img {
        width: 33%;
        border: 1px solid #ddd;
        border-radius: 15px;
        float: right;
    }

    .chldimg {
        background: #ffff;
        /* border: 1px solid #ddd; */
        /* width: 35%; */
        /* float: left; */
    }

    .camera_open_hai {
        font-size: 20px;
        font-weight: bold;
    }

    .swtchcld {
        margin-left: 33px;
        /* position: absolute;
        bottom: -20px; */
    }

    .iles_upld a {
        color: #3c0280 !important;
    }

    .media_uploader_child:hover a {
        cursor: pointer;
        color: #fff !important;
    }

    .form-group.travel_files {
        flex-direction: column;
    }
</style>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="listBTNSS">
                <a class="btn btn-sm btn-info" href="<?php echo base_url('dataentryform/admin/all'); ?>"><i
                        class="fa fa-list"> यात्रीहरुको सुची</i></a>
            </div>
            <form class="all_form" id="submit" method="post" action enctype="multipart/form-data">
                <div class="box box-default">
                    <div class="box-body">
                        <div class="EntryBox">
                            <div class="EntryForms">
                                <div class="Titleofbox">
                                    <span>व्यक्तिगत विवरण</span>
                                    <div class="ActionBTN">
                                        <!-- <a class="btn btn-sm btn-info" id="FormAddFunction"><i class="fa fa-plus"></i></a> -->
                                        <a class="btn btn-sm btn-danger" id="Resetfunction"><i
                                                class="fa fa-refresh"></i></a>
                                    </div>
                                </div>
                                <div class="MainForm">
                                    <div id="AppendForm">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <label>सम्पर्क नम्बर : <span class="required">*</span></label>
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-btn">
                                                            <button type="button"
                                                                class="btn btn-default dropdown-toggle codeValue"
                                                                data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false"><?php echo $this->crud_model->ent_to_nepali_num_convert('+977'); ?><span
                                                                    class="caret"></span></button>
                                                            <ul class="dropdown-menu" id="countryCode">
                                                                <li>
                                                                    <input type="text" id="countryCodeSearch"
                                                                        placeholder="Search country code..."
                                                                        class="form-control">
                                                                </li>
                                                            </ul>
                                                            <input type="hidden" name="country_code" id="country_code" value="<?php echo $this->crud_model->ent_to_nepali_num_convert('+977'); ?>">
                                                            <?php if (form_error('country_code'))
                                                                echo '<span class="field_validation">' . form_error('country_code') . '</span>' ?>
                                                            </div><!-- /btn-group -->
                                                            <input type="text" name="phone_number"
                                                                class="form-control utf8val personalinfo phone_number_class"
                                                                id="phone_number" placeholder="सम्पर्क नम्बर"
                                                                value="<?php echo (((isset($detail->phone_number)) && $detail->phone_number != '') ? $detail->phone_number : '') ?>"
                                                            required>
                                                        <?php if (form_error('phone_number'))
                                                            echo '<span class="field_validation">' . form_error('phone_number') . '</span>' ?>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label>पुरा नाम : <span class="required">*</span></label>
                                                        <input type="text" name="name"
                                                            class="form-control utf8val personalinfo cmnreset" id="name"
                                                            placeholder="पुरा नाम"
                                                            value="<?php echo (((isset($detail->name)) && $detail->name != '') ? $detail->name : '') ?>"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>राष्ट्रियता : <span class="required">*</span></label>
                                                    <input type="text" name="nationality"
                                                        class="form-control utf8val personalinfo cmnreset"
                                                        id="nationality" placeholder="राष्ट्रियता"
                                                        value="<?php echo (((isset($detail->nationality)) && $detail->nationality != '') ? $detail->nationality : '') ?>"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>लिंग : <span class="required">*</span></label>
                                                    <div class="radiosss">
                                                        <input type="radio"
                                                            class="personalinfo_checked cmnreset_checked" name="gender"
                                                            value="पुरुष" <?php echo (((isset($detail->gender)) && $detail->gender == 'पुरुष') ? 'checked' : '') ?> required>
                                                        <span>पुरुष</span>
                                                        <input type="radio"
                                                            class="personalinfo_checked cmnreset_checked" name="gender"
                                                            value="महिला" <?php echo (((isset($detail->gender)) && $detail->gender == 'महिला') ? 'checked' : '') ?>>
                                                        <span>महिला</span>
                                                        <input type="radio"
                                                            class="personalinfo_checked cmnreset_checked" name="gender"
                                                            value="तेस्रोलिंगी" <?php echo (((isset($detail->gender)) && $detail->gender == 'तेस्रोलिंगी') ? 'checked' : '') ?>>
                                                        <span>तेस्रोलिंगी</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>परिचय पत्र किसिम : <span class="required">*</span></label>
                                                    <select name="identicard_type" id="identicard_type"
                                                        class="form-control personalinfo_checked cmnreset_checked"
                                                        required>
                                                        <option value="">परिचय पत्र किसिम</option>
                                                        <option value="नागरिता" <?php echo (((isset($detail->identicard_type)) && $detail->identicard_type == 'नागरिता') ? 'selected' : '') ?>>
                                                            नागरिता</option>
                                                        <option value="सवारी चालक पत्र" <?php echo (((isset($detail->identicard_type)) && $detail->identicard_type == 'सवारी चालक पत्र') ? 'selected' : '') ?>>सवारी चालक पत्र</option>
                                                        <option value="पस्स्पोर्ट" <?php echo (((isset($detail->identicard_type)) && $detail->identicard_type == 'पस्स्पोर्ट') ? 'selected' : '') ?>>पस्स्पोर्ट</option>
                                                        <option value="अन्य" <?php echo (((isset($detail->identicard_type)) && $detail->identicard_type == 'अन्य') ? 'selected' : '') ?>>अन्य
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>परिचय पत्र नम्बर : <span class="required">*</span></label>
                                                    <input type="text" name="identicard_number"
                                                        class="form-control utf8val personalinfo cmnreset"
                                                        id="identicard_number" placeholder="परिचय पत्र नम्बर"
                                                        value="<?php echo (((isset($detail->identicard_number)) && $detail->identicard_number != '') ? $detail->identicard_number : '') ?>"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <div class="flexxx">
                                                        <label>जन्म मिति : </label>
                                                        <div>
                                                            AD / BS
                                                            <label class="switch">
                                                                <input id="Switchsss" type="checkbox">
                                                                <span class="slider round"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <input type="text" name="nepali_date_of_birth"
                                                        id="nepali-datepicker"
                                                        class="form-control dobnep personalinfo cmnreset nepdatess activessssss"
                                                        placeholder="जन्म मिति" value="" />
                                                    <input type="text" name="english_date_of_birth" id="datepicker"
                                                        class="form-control personalinfo cmnreset engdatess "
                                                        placeholder="Date of Birth">
                                                    <input type="hidden" name="date_of_birth" id="dobssss"
                                                        class="cmnreset">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>उमेर : </label>
                                                    <input readonly type="text" name="age"
                                                        class="form-control personalinfo cmnreset" id="age"
                                                        placeholder="उमेर"
                                                        value="<?php echo (((isset($detail->age)) && $detail->age != '') ? $detail->age : '') ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>ठेगाना : <span class="required">*</span></label>
                                                    <input type="text" name="address"
                                                        class="form-control utf8val personalinfo cmnreset" id="address"
                                                        placeholder="ठेगाना"
                                                        value="<?php echo (((isset($detail->address)) && $detail->address != '') ? $detail->address : '') ?>"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>वैवाहिक स्थिति : <span class="required">*</span></label>
                                                    <div class="radiosss personalinfo_checked cmnreset_checked">
                                                        <input type="radio"
                                                            class="personalinfo_checked cmnreset_checked"
                                                            name="marital_status" id="unmarried" value="अविवाहित" <?php echo (((isset($detail->marital_status)) && $detail->marital_status == 'अविवाहित') ? 'checked' : '') ?>
                                                            required> <span>अविवाहित</span>
                                                        <input type="radio"
                                                            class="personalinfo_checked cmnreset_checked"
                                                            name="marital_status" id="married" value="विवाहित" <?php echo (((isset($detail->marital_status)) && $detail->marital_status == 'विवाहित') ? 'checked' : '') ?>>
                                                        <span>विवाहित</span>
                                                        <input type="radio"
                                                            class="personalinfo_checked cmnreset_checked"
                                                            name="marital_status" id="othersss" value="अन्य" <?php echo (((isset($detail->marital_status)) && $detail->marital_status == 'अन्य') ? 'checked' : '') ?>>
                                                        <span>अन्य</span>
                                                        <input type="text" class="form-control personalinfo cmnreset"
                                                            id="marital_status_remarks" style="display:none"
                                                            name="marital_status_remarks"
                                                            value="<?php echo (((isset($detail->marital_status_remarks)) && $detail->marital_status_remarks != '') ? $detail->marital_status_remarks : '') ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>पेशा / ब्यबसायी : </label>
                                                    <input type="text" name="occupation"
                                                        class="form-control utf8val personalinfo cmnreset"
                                                        id="occupation" placeholder="पेशा / व्यापार"
                                                        value="<?php echo (((isset($detail->occupation)) && $detail->occupation != '') ? $detail->occupation : '') ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-xl-6 col-md-12 col-sm-12 col-xs-12">
                                <div class="EntryBox ndssss">
                                    <div class="Titleofbox">
                                        <span>यात्रा विवरण</span>
                                        <div class="ActionBTN">
                                            <!-- <a class="btn btn-sm btn-info" id="FormAddFunction1"><i class="fa fa-plus"></i></a> -->
                                            <a class="btn btn-sm btn-danger" id="Resetfunction1"><i
                                                    class="fa fa-refresh"></i></a>
                                        </div>
                                    </div>
                                    <div class="MainForm">
                                        <div class="row" id="AppendForm1">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>यात्रा प्रारम्भ गरेको मुलुक : <span
                                                            class="required">*</span></label>
                                                    <input type="text" name="travel_start_country"
                                                        class="form-control utf8val personalinfo1 width70 cmnreset"
                                                        id="travel_start_country"
                                                        placeholder="यात्रा प्रारम्भ गरेको मुलुक"
                                                        value="<?php echo (((isset($detail->travel_start_country)) && $detail->travel_start_country != '') ? $detail->travel_start_country : '') ?>"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>प्रवेश बिन्दू : <span class="required">*</span></label>
                                                    <input type="text" name="entry_adress"
                                                        class="form-control utf8val personalinfo1 cmnreset width70"
                                                        id="entry_adress" placeholder="प्रबेश बिन्दू"
                                                        value="<?php echo (((isset($detail->entry_adress)) && $detail->entry_adress != '') ? $detail->entry_adress : '') ?>"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-sm-7">
                                                <div class="form-group">
                                                    <label>प्रवेश समय : <span class="required">*</span></label>
                                                    <input type="time" name="entry_time"
                                                        class="form-control personalinfo1 cmnreset" id="entry_time"
                                                        placeholder="प्रबेश समय" style="width:47%"
                                                        value="<?php echo (((isset($detail->entry_time)) && $detail->entry_time != '') ? $detail->entry_time : '') ?>"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-sm-5">
                                                <div class="form-group">
                                                    <label>फर्केको समय : </label>
                                                    <input type="time" name="exit_time"
                                                        class="form-control personalinfo1 cmnreset" id="exit_time"
                                                        placeholder="प्रबेश समय"
                                                        value="<?php echo (((isset($detail->exit_time)) && $detail->exit_time != '') ? $detail->exit_time : '') ?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>प्रबेश बिन्दू (सिमा निरीक्षण कक्ष / प्रबेश स्थाल) : <span
                                                            class="required">*</span></label>
                                                    <input type="text" name="entry_address2"
                                                        class="form-control utf8val personalinfo1 cmnreset"
                                                        id="entry_address2" placeholder="प्रबेश बिन्दू"
                                                        value="<?php echo (((isset($detail->entry_address2)) && $detail->entry_address2 != '') ? $detail->entry_address2 : '') ?>"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label> यात्रा गन्तब्य : <span class="required">*</span></label>
                                                    <input type="text" name="travel_destination"
                                                        class="form-control utf8val personalinfo1 width70 cmnreset"
                                                        id="travel_destination" placeholder="यात्रा गन्तब्य"
                                                        value="<?php echo (((isset($detail->travel_destination)) && $detail->travel_destination != '') ? $detail->travel_destination : '') ?>"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>यात्राको अबधि ( गन्तव्यमा अपेक्षित रहने अबधि) : <span
                                                            class="required">*</span></label>
                                                    <input type="text" name="travel_deuration"
                                                        class="form-control utf8val personalinfo1 cmnreset"
                                                        id="travel_deuration" placeholder="यात्राको अबधि"
                                                        value="<?php echo (((isset($detail->travel_deuration)) && $detail->travel_deuration != '') ? $detail->travel_deuration : '') ?>"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>यात्रा को उदेश्य : <span class="required">*</span></label>
                                                    <div class="radiosss">
                                                        <input type="radio"
                                                            class="personalinfo1_checked cmnreset_checked"
                                                            name="travel_porpose" value="पर्यटन" <?php echo (((isset($detail->travel_porpose)) && $detail->travel_porpose == 'पर्यटन') ? 'checked' : '') ?>
                                                            required> <span>पर्यटन</span>
                                                        <input type="radio"
                                                            class="personalinfo1_checked cmnreset_checked"
                                                            name="travel_porpose" value="व्यापार" <?php echo (((isset($detail->travel_porpose)) && $detail->travel_porpose == 'व्यापार') ? 'checked' : '') ?>>
                                                        <span>व्यापार</span>
                                                        <input type="radio"
                                                            class="personalinfo1_checked cmnreset_checked"
                                                            name="travel_porpose" value="व्यक्तिगत_काम" <?php echo (((isset($detail->travel_porpose)) && $detail->travel_porpose == 'व्यक्तिगत_काम') ? 'checked' : '') ?>> <span>व्यक्तिगत काम</span>
                                                        <input type="radio"
                                                            class="personalinfo1_checked cmnreset_checked"
                                                            name="travel_porpose" value="उपचार" <?php echo (((isset($detail->travel_porpose)) && $detail->travel_porpose == 'उपचार') ? 'checked' : '') ?>>
                                                        <span>उपचार</span>
                                                        <input type="radio"
                                                            class="personalinfo1_checked cmnreset_checked"
                                                            name="travel_porpose" value="ट्रान्जिट" <?php echo (((isset($detail->travel_porpose)) && $detail->travel_porpose == 'ट्रान्जिट') ? 'checked' : '') ?>>
                                                        <span>ट्रान्जिट</span>
                                                        <input type="radio"
                                                            class="personalinfo1_checked cmnreset_checked"
                                                            name="travel_porpose" value="अन्य" <?php echo (((isset($detail->travel_porpose)) && $detail->travel_porpose == 'अन्य') ? 'checked' : '') ?>>
                                                        <span>अन्य</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>सामानको विवरण (यदि लानु छ भने) : </label>
                                                    <input type="text" name="traveler_proporty"
                                                        class="form-control utf8val personalinfo width70 cmnreset"
                                                        id="traveler_proporty" placeholder="सामानको विवरण "
                                                        value="<?php echo (((isset($detail->traveler_proporty)) && $detail->traveler_proporty != '') ? $detail->traveler_proporty : '') ?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label> यात्राको किसिम : <span class="required">*</span></label>
                                                    <div class="radiosss width60 ">
                                                        <span>
                                                            <input id="Paidalll" type="radio"
                                                                class="personalinfo1_checked cmnreset_checked"
                                                                name="travel_type" value="पैदल" <?php echo (((isset($detail->travel_type)) && $detail->travel_type == 'पैदल') ? 'checked' : '') ?>
                                                                required>
                                                            <span>पैदल</span>
                                                        </span>
                                                        <span>
                                                            <input id="Gaddi" type="radio"
                                                                class="personalinfo1_checked cmnreset_checked"
                                                                name="travel_type" value="गाडी" <?php echo (((isset($detail->travel_type)) && $detail->travel_type == 'गाडी') ? 'checked' : '') ?>>
                                                            <span>गाडी</span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>दिशा तर्फ: <span class="required">*</span></label>
                                                    <select name="gone_dirction" id="gone_dirction"
                                                        class="form-control personalinfo1_checked cmnreset_checked">
                                                        <option value="" required>दिशा तर्फ</option>
                                                        <option value="नेपाल" <?php echo (((isset($detail->gone_dirction)) && $detail->gone_dirction == 'नेपाल') ? 'selected' : '') ?>>नेपाल
                                                            तर्फ</option>
                                                        <option value="भारत" <?php echo (((isset($detail->gone_dirction)) && $detail->gone_dirction == 'भारत') ? 'selected' : '') ?>>भारत
                                                            तर्फ</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="media_uploader travel_detail_media" style="margin-bottom:0px">
                                                <div class="media_uploader travel_detail_media"
                                                    style=" width: 100%; display: flex; align-items: center; justify-content: center;height: 200px;margin-bottom:0px;border:none">
                                                    <div class="media_uploader_child"
                                                        style="min-height: 150px; display: flex; align-items: center; justify-content: center; width: 100%; position: relative;">
                                                        <div
                                                            style="width: 100%; height: 100%; position: absolute; top: 0; left: 0; display: flex; align-items: center; justify-content: center;">
                                                            <label for="document_upload_travel"
                                                                style="display: flex; align-items: center; justify-content: center; width: 100%; height: 100%; cursor: pointer;flex-direction:column">
                                                                <i class="fa fa-file-photo-o"
                                                                    style="font-size: 25px; color: #3c0280;"></i>
                                                                <p style="font-weight:400">
                                                                    Upload File</p>
                                                            </label>
                                                            <input type="file" name="document_upload_travel"
                                                                id="document_upload_travel" style="display: none;">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="divider"></div>
                                                <div class="media_uploader_child" style="height:100%">
                                                    <div class="form-group travel_files">
                                                        <p>Uploaded Files</p>
                                                        <div class="appnd_iles_upld_travel">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-xl-6 col-md-12 col-sm-12 col-xs-12">
                                <div class="EntryBox ndssss">
                                    <div class="Titleofbox">
                                        <span>बालबालिका</span>
                                        <div class="ActionBTN">
                                            <a class="btn btn-sm btn-info" id="FormAddFunction2"><i
                                                    class="fa fa-plus"></i></a>
                                            <a class="btn btn-sm btn-danger" id="Resetfunction2"><i
                                                    class="fa fa-refresh"></i></a>
                                        </div>
                                    </div>
                                    <div class="MainForm">
                                        <input type="hidden" name="totalchildren" id="totalchildren" value="1">
                                        <div class="row" id="AppendForm2">
                                            <div class="DeleteFunctionsssss childraj">
                                                <div class="row MainForm">
                                                    <div class="col-sm-12">
                                                        <div class="form-group child_btn">
                                                            <label>पुरा नाम : </label>
                                                            <input type="text" name="children_name[]"
                                                                class="form-control utf8val personalinfo2 cmnreset"
                                                                id="children_name1" placeholder="पुरा नाम"
                                                                style="width:80% !important"
                                                                value="<?php echo (((isset($detail->children_name)) && $detail->children_name != '') ? $detail->children_name : '') ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="form-group child_btn">
                                                            <div class="flexxx">
                                                                <label>जन्म मिति : </label>
                                                            </div>
                                                            <div class="swtchcld">
                                                                AD / BS
                                                                <label class="switch">
                                                                    <input id="Switchssschild1" type="checkbox">
                                                                    <span class="slider round"></span>
                                                                </label>
                                                            </div>
                                                            <input type="text" style="width:58%"
                                                                name="nepali_date_of_birthss[]"
                                                                id="nepali-datepickerchild1"
                                                                class="form-control personalinfo2 nepdatesschild activessssss cmnreset"
                                                                placeholder="जन्म मिति" value="" />
                                                            <input type="text" style="width:58%"
                                                                name="english_date_of_birthss[]" id="datepickerchild1"
                                                                class="form-control personalinfo2 engdatesschild cmnreset"
                                                                placeholder="Date of Birth" value="" />
                                                            <input type="hidden" name="children_dob[]"
                                                                id="dobsssschid1">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label> उमेर : </label>
                                                            <input style="width:80%" type="text" name="children_age[]"
                                                                class="form-control personalinfo2 cmnreset"
                                                                id="children_age1" placeholder="उमेर"
                                                                value="<?php echo (((isset($detail->children_age)) && $detail->children_age != '') ? $detail->children_age : '') ?>"
                                                                readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>लिंग : </label>
                                                            <div class="radiosss" style="width:59%">
                                                                <input type="radio" class="personalinfo2"
                                                                    name="children_gender[0]" value="पुरुष" <?php echo (((isset($detail->children_gender)) && $detail->children_gender == 'पुरुष') ? 'checked' : '') ?>>
                                                                <span>पुरुष</span>
                                                                <input type="radio" class="personalinfo2"
                                                                    name="children_gender[0]" value="महिला" <?php echo (((isset($detail->children_gender)) && $detail->children_gender == 'महिला') ? 'checked' : '') ?>>
                                                                <span>महिला</span>
                                                                <input type="radio" class="personalinfo2"
                                                                    name="children_gender[0]" value="तेस्रोलिंगी" <?php echo (((isset($detail->children_gender)) && $detail->children_gender == 'तेस्रोलिंगी') ? 'checked' : '') ?>> <span>तेस्रोलिंगी</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>ठेगाना : </label>
                                                            <input type="text" name="children_address[]"
                                                                class="form-control utf8val width75 personalinfo2 cmnreset"
                                                                id="children_address1" placeholder="ठेगाना"
                                                                value="<?php echo (((isset($detail->children_address)) && $detail->children_address != '') ? $detail->children_address : '') ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label> संरक्षकको पुरा नाम : </label>
                                                            <input type="text" name="children_parent_name[]"
                                                                class=" form-control utf8val personalinfo2 cmnreset"
                                                                id="children_parent_name1"
                                                                placeholder="संरक्षकको पुरा नाम " style="width:80%"
                                                                value="<?php echo (((isset($detail->children_parent_name)) && $detail->children_parent_name != '') ? $detail->children_parent_name : '') ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label>सम्बन्ध : </label>
                                                            <input type="text" name="children_relations[]"
                                                                class="form-control utf8val personalinfo2 cmnreset"
                                                                style="width:80%" id="children_relations1"
                                                                placeholder="सम्बन्ध "
                                                                value="<?php echo (((isset($detail->children_relations)) && $detail->children_relations != '') ? $detail->children_relations : '') ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>परिचय पत्र नम्बर : </label>
                                                            <input type="text" name="children_identicard_number[]"
                                                                class="form-control utf8val personalinfo2 cmnreset"
                                                                id="children_identicard_number1"
                                                                placeholder="परिचय पत्र नम्बर " style="width:58%"
                                                                value="<?php echo (((isset($detail->children_identicard_number)) && $detail->children_identicard_number != '') ? $detail->children_identicard_number : '') ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>फर्केको : </label>
                                                            <div class="radiosss width75 ">
                                                                <input type="radio"
                                                                    class="personalinfo2_checked cmnreset"
                                                                    name="is_returned_child[0]" value="1" <?php echo (((isset($detail->is_returned_child)) && $detail->is_returned_child == '1') ? 'checked' : '') ?>> <span>हो</span>
                                                                <input type="radio"
                                                                    class="personalinfo2_checked cmnreset"
                                                                    name="is_returned_child[0]" value="0" <?php echo (((isset($detail->is_returned_child)) && $detail->is_returned_child == '0') ? 'checked' : '') ?>> <span>होइन</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group children-photo">
                                                            <div id="camera_open1" class="camera_open_hai"
                                                                camera_count="1">
                                                                <i class="fa fa-camera"></i>
                                                                <p>फोटो</p>
                                                                <input type="hidden" name="captured_image_child[]"
                                                                    id="captured_image1" value="">
                                                            </div>
                                                            <div id="viewImage1" class="chldimg"></div>
                                                            <div id="appendcam1">

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <!-- <div class="form-group children-photo">
                                                            <p id="viewFileChildren1">Upload File</p>
                                                            <input type="file" name="document_upload"
                                                                class="children_doc" id="document_upload_children1"
                                                                filecount='1'>
                                                            <input type="hidden" name="captured_file_children[]"
                                                                id="captured_file_children1" value="">
                                                        </div> -->
                                                        <div class="form-group children-photo"
                                                            style="position: relative; cursor: pointer;min-height:108px;display:flex; align-items:center; justify-content:center;">
                                                            <p id="viewFileChildren1"
                                                                style="font-size: 2.5rem; color: #3c0280;">Upload File
                                                            </p>
                                                            <input type="file" name="document_upload"
                                                                class="children_doc" id="document_upload_children1"
                                                                filecount='1' style="display: none;">
                                                            <input type="hidden" name="captured_file_children[]"
                                                                id="captured_file_children1" value="">
                                                            <label for="document_upload_children1"
                                                                style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;"></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="EntryBox ndssss">
                                    <div class="Titleofbox">
                                        <span>स्वाथ्य जानकारी</span>
                                        <div class="ActionBTN">
                                            <!-- <a class="btn btn-sm btn-info" id="FormAddFunction3"><i class="fa fa-plus"></i></a> -->
                                            <a class="btn btn-sm btn-danger" id="Resetfunction3"><i
                                                    class="fa fa-refresh"></i></a>
                                        </div>
                                    </div>
                                    <div class="MainForm">
                                        <div class="row" id="AppendForm3">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="width25">स्वाथ्य परिक्षण : </label>
                                                    <input type="text" name="health_status"
                                                        class="form-control utf8val personalinfo3 cmnreset width70 "
                                                        id="health_status" placeholder="स्वाथ्य परिक्षण "
                                                        value="<?php echo (((isset($detail->health_status)) && $detail->health_status != '') ? $detail->health_status : '') ?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="width25">परिणाम : </label>
                                                    <input type="text" name="health_result"
                                                        class="form-control utf8val personalinfo3 cmnreset width70"
                                                        id="health_result" placeholder="परिणाम"
                                                        value="<?php echo (((isset($detail->health_result)) && $detail->health_result != '') ? $detail->health_result : '') ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row vehicle_detailssss" id="vehicle_detailssss" style="display:none">
                            <div class="col-sm-12">
                                <div class="EntryBox ndssss">
                                    <div class="Titleofbox">
                                        <span>सवारी साधनको विवरण</span>
                                        <div class="ActionBTN">
                                            <!-- <a class="btn btn-sm btn-info" id="FormAddFunction4"><i class="fa fa-plus"></i></a> -->
                                            <a class="btn btn-sm btn-danger" id="Resetfunction4"><i
                                                    class="fa fa-refresh"></i></a>
                                        </div>
                                    </div>
                                    <div class="MainForm">
                                        <div class="row" id="AppendForm4">
                                            <div class="col-sm-6">
                                                <div class="VehicleDetails row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label>सवारीको किसिम : <span
                                                                    class="required">*</span></label>
                                                            <div class="radiosss width60">
                                                                <input type="radio"
                                                                    class="personalinfo4_checked cmnreset_checked"
                                                                    name="vehicle_information" value="निजि" <?php echo (((isset($detail->vehicle_information)) && $detail->vehicle_information == 'निजि') ? 'checked' : '') ?>> <span>निजि</span>
                                                                <input type="radio"
                                                                    class="personalinfo4_checked cmnreset_checked"
                                                                    name="vehicle_information" value="सार्बजनिक" <?php echo (((isset($detail->vehicle_information)) && $detail->vehicle_information == 'सार्बजनिक') ? 'checked' : '') ?>> <span>सार्बजनिक</span>
                                                                <input type="radio"
                                                                    class="personalinfo4_checked cmnreset_checked"
                                                                    name="vehicle_information" value="सरकारी" <?php echo (((isset($detail->vehicle_information)) && $detail->vehicle_information == 'सरकारी') ? 'checked' : '') ?>> <span>सरकारी</span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label>सवारी साधनको किसिम : <span
                                                                    class="required">*</span></label>
                                                            <div class="radiosss width100">
                                                                <input type="radio"
                                                                    class="personalinfo4_checked cmnreset_checked"
                                                                    name="types_of_vehicle" value="कार" <?php echo (((isset($detail->types_of_vehicle)) && $detail->types_of_vehicle == 'कार') ? 'checked' : '') ?>> <span>कार</span>
                                                                <input type="radio"
                                                                    class="personalinfo4_checked cmnreset_checked"
                                                                    name="types_of_vehicle" value="जीप" <?php echo (((isset($detail->types_of_vehicle)) && $detail->types_of_vehicle == 'जीप') ? 'checked' : '') ?>> <span>जीप</span>
                                                                <input type="radio"
                                                                    class="personalinfo4_checked cmnreset_checked"
                                                                    name="types_of_vehicle" value="ट्रक" <?php echo (((isset($detail->types_of_vehicle)) && $detail->types_of_vehicle == 'ट्रक') ? 'checked' : '') ?>> <span>ट्रक</span>
                                                                <input type="radio"
                                                                    class="personalinfo4_checked cmnreset_checked"
                                                                    name="types_of_vehicle" value="बस" <?php echo (((isset($detail->types_of_vehicle)) && $detail->types_of_vehicle == 'बस') ? 'checked' : '') ?>> <span>बस</span>
                                                                <input type="radio"
                                                                    class="personalinfo4_checked cmnreset_checked"
                                                                    name="types_of_vehicle" value="मोटरसाइकल" <?php echo (((isset($detail->types_of_vehicle)) && $detail->types_of_vehicle == 'मोटरसाइकल') ? 'checked' : '') ?>> <span>मोटरसाइकल</span>
                                                                <input type="radio"
                                                                    class="personalinfo4_checked cmnreset_checked"
                                                                    name="types_of_vehicle" value="साइकल" <?php echo (((isset($detail->types_of_vehicle)) && $detail->types_of_vehicle == 'साइकल') ? 'checked' : '') ?>> <span>साइकल</span>
                                                                <input type="radio"
                                                                    class="personalinfo4_checked cmnreset_checked"
                                                                    name="types_of_vehicle" value="एम्बुलेन्स" <?php echo (((isset($detail->types_of_vehicle)) && $detail->types_of_vehicle == 'एम्बुलेन्स') ? 'checked' : '') ?>> <span>एम्बुलेन्स</span>
                                                                <input type="radio"
                                                                    class="personalinfo4_checked cmnreset_checked"
                                                                    name="types_of_vehicle" value="स्कुटर" <?php echo (((isset($detail->types_of_vehicle)) && $detail->types_of_vehicle == 'स्कुटर') ? 'checked' : '') ?>> <span>स्कुटर</span>
                                                                <input type="radio"
                                                                    class="personalinfo4_checked cmnreset_checked"
                                                                    name="types_of_vehicle" value="अन्य" <?php echo (((isset($detail->types_of_vehicle)) && $detail->types_of_vehicle == 'अन्य') ? 'checked' : '') ?>> <span>अन्य</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label class="width50">सवारी साधनको नम्बर : <span
                                                                    class="required">*</span></label>
                                                            <div>
                                                                Switch
                                                                <label class="switch">
                                                                    <input id="switch_vehicle_number" type="checkbox">
                                                                    <span class="slider round"></span>
                                                                </label>
                                                            </div>
                                                            <input type="text" name="vehicle_number_nepali"
                                                                class="form-control utf8val personalinfo4 cmnreset activessssss"
                                                                id="vehicle_number_nepali"
                                                                placeholder="सवारी साधनको नम्बर" style="display:none"
                                                                value="<?php echo (((isset($detail->vehicle_number_nepali)) && $detail->vehicle_number_nepali != '') ? $detail->vehicle_number_nepali : '') ?>">
                                                            <input type="text" name="vehicle_number"
                                                                class="form-control utf8val personalinfo4 cmnreset"
                                                                id="vehicle_number" placeholder="Vehicle Number"
                                                                style="display:none"
                                                                value="<?php echo (((isset($detail->vehicle_number)) && $detail->vehicle_number != '') ? $detail->vehicle_number : '') ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label class="width50">चालकको पुरा नाम : <span
                                                                    class="required">*</span></label>
                                                            <input type="text" name="drivers_name"
                                                                class="form-control utf8val personalinfo4 cmnreset"
                                                                id="drivers_name" placeholder="चालकको पुरा नाम"
                                                                value="<?php echo (((isset($detail->drivers_name)) && $detail->drivers_name != '') ? $detail->drivers_name : '') ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label class="width50">सवारी चालक अनुमतिपत्र नम्बर : <span
                                                                    class="required">*</span></label>
                                                            <input type="text" name="driving_licence"
                                                                class="form-control personalinfo4 cmnreset"
                                                                id="driving_licence"
                                                                placeholder="सवारी चालक अनुमतिपत्र नम्बर"
                                                                value="<?php echo (((isset($detail->driving_licence)) && $detail->driving_licence != '') ? $detail->driving_licence : '') ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label class="width50">चालकको सम्पर्क नम्बर : <span
                                                                    class="required">*</span></label>
                                                            <input type="text" name="drivers_number"
                                                                class="form-control personalinfo4 utf8val cmnreset"
                                                                id="drivers_number" placeholder="चालकको सम्पर्क नम्बर"
                                                                value="<?php echo (((isset($detail->drivers_number)) && $detail->drivers_number != '') ? $detail->drivers_number : '') ?>">
                                                        </div>
                                                    </div>
                                                    <!-- <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label class="width50">DL number : </label>
                                                            <input type="text" name="dl_number" class="form-control" id="dl_number" placeholder="DL number"
                                                                value="<?php //echo (((isset($detail->dl_number)) && $detail->dl_number != '')? $detail->dl_number : '') ?>">
                                                        </div>
                                                    </div> -->
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label>साधनको प्रयोजन : </label>
                                                            <div class="radiosss">
                                                                <input type="radio"
                                                                    class="personalinfo4_checked cmnreset_checked"
                                                                    name="use_of_vehicle" value="पर्यटन" <?php echo (((isset($detail->use_of_vehicle)) && $detail->use_of_vehicle == 'पर्यटन') ? 'checked' : '') ?>> <span>पर्यटन</span>
                                                                <input type="radio"
                                                                    class="personalinfo4_checked cmnreset_checked"
                                                                    name="use_of_vehicle" value="ब्यापार" <?php echo (((isset($detail->use_of_vehicle)) && $detail->use_of_vehicle == 'ब्यापार') ? 'checked' : '') ?>> <span>ब्यापार</span>
                                                                <input type="radio"
                                                                    class="personalinfo4_checked cmnreset_checked"
                                                                    name="use_of_vehicle" value="व्यक्तिगत काम" <?php echo (((isset($detail->use_of_vehicle)) && $detail->use_of_vehicle == 'व्यक्तिगत काम') ? 'checked' : '') ?>> <span>व्यक्तिगत काम</span>
                                                                <input type="radio"
                                                                    class="personalinfo4_checked cmnreset_checked"
                                                                    name="use_of_vehicle" value="उपचार" <?php echo (((isset($detail->use_of_vehicle)) && $detail->use_of_vehicle == 'उपचार') ? 'checked' : '') ?>> <span>उपचार</span>
                                                                <input type="radio"
                                                                    class="personalinfo4_checked cmnreset_checked"
                                                                    name="use_of_vehicle" value="ट्रान्जिट" <?php echo (((isset($detail->use_of_vehicle)) && $detail->use_of_vehicle == 'ट्रान्जिट') ? 'checked' : '') ?>> <span>ट्रान्जिट</span>
                                                                <input type="radio"
                                                                    class="personalinfo4_checked cmnreset_checked"
                                                                    name="use_of_vehicle" value="others" <?php echo (((isset($detail->use_of_vehicle)) && $detail->use_of_vehicle == 'others') ? 'checked' : '') ?>> <span>अन्य</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label>माल बाहक सवारी साधन किसिम : </label>
                                                            <div class="radiosss width60">
                                                                <input type="radio"
                                                                    class="personalinfo4_checked cmnreset_checked"
                                                                    name="heavy_vehicle_type" value="ठुलो" <?php echo (((isset($detail->heavy_vehicle_type)) && $detail->heavy_vehicle_type == 'ठुलो') ? 'checked' : '') ?>> <span>ठुलो</span>
                                                                <input type="radio"
                                                                    class="personalinfo4_checked cmnreset_checked"
                                                                    name="heavy_vehicle_type" value="सानो" <?php echo (((isset($detail->heavy_vehicle_type)) && $detail->heavy_vehicle_type == 'सानो') ? 'checked' : '') ?>> <span>सानो</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label>माल बाहक साधनमा ल्याएको सामानको विवरण : </label>
                                                            <input type="text" name="property_information"
                                                                class="form-control utf8val width100 personalinfo4 cmnreset"
                                                                id="property_information"
                                                                placeholder="माल बाहक साधनमा ल्याएको सामानको विवरण "
                                                                value="<?php echo (((isset($detail->property_information)) && $detail->property_information != '') ? $detail->property_information : '') ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label>सार्बजनिक सवारी साधन मा कुल यात्री संख्या (चालक सहित)
                                                                : </label>
                                                            <input type="text" name="pasengers"
                                                                class="form-control width100 personalinfo4 utf8val cmnreset"
                                                                id="pasengers"
                                                                placeholder="सार्बजनिक सवारी साधन मा कुल यात्री संख्या (चालक सहित)"
                                                                value="<?php echo (((isset($detail->pasengers)) && $detail->pasengers != '') ? $detail->pasengers : '') ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label>फर्केको : </label>
                                                            <div class="radiosss width60">
                                                                <input type="radio"
                                                                    class="personalinfo4_checked cmnreset_checked"
                                                                    name="is_returned_vehicle" value="1" <?php echo (((isset($detail->is_returned)) && $detail->is_returned == "1") ? 'checked' : '') ?>>
                                                                <span>हो</span>
                                                                <input type="radio"
                                                                    class="personalinfo4_checked cmnreset_checked"
                                                                    name="is_returned_vehicle" value="0" <?php echo (((isset($detail->is_returned)) && $detail->is_returned == "0") ? 'checked' : '') ?>>
                                                                <span>होइन</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="EntryBox ndssss">
                                    <div class="Titleofbox">
                                        <span> कुनै अतिरिक्त नोट वा बिशेष आवश्यकता</span>
                                    </div>
                                    <div class="MainForm">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <textarea name="remarks" id="remarks"
                                                        class="form-control utf8val cmnreset width100">
                                                    <?php echo (((isset($detail->remarks)) && $detail->remarks != '') ? $detail->remarks : '') ?>
                                                    </textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 dissflexxxx">
                                <div class="media_uploader">
                                    <div class="media_uploader_child">
                                        <div id="viewImage"></div>
                                        <div class="form-group" style="width: 100%;">
                                            <div id="camera_open" onclick="Camera_open();">
                                                <i class="fa fa-camera"></i>
                                                <p>फोटो</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="divider"></div>
                                    <!-- <div class="media_uploader_child">
                                        <div class="form-group">
                                            <div id="camera_open">
                                                <label for="document_upload"> <i class="fa fa-file-photo-o">
                                                    </i></label>
                                                <p>Upload
                                                    File</p>
                                                <input type="file" name="document_upload" id="document_upload">
                                            </div>
                                        </div>
                                    </div> -->
                                    <div class="media_uploader_child"
                                        style="min-height: 112px; display: flex; align-items: center; justify-content: center; width: 100%; position: relative;">
                                        <div class="form-group">
                                            <div id="camera_open"
                                                style="width: 100%; height: 100%; position: absolute; top: 0; left: 0; display: flex; align-items: center; justify-content: center;">
                                                <label for="document_upload"
                                                    style="display: flex; align-items: center; justify-content: center; width: 100%; height: 100%; cursor: pointer;flex-flow:column">
                                                    <i class="fa fa-file-photo-o"
                                                        style="font-size: 25px; color: #3c0280;"></i>
                                                    <p style="font-weight:400">
                                                        Upload File</p>
                                                </label>
                                                <input type="file" name="document_upload" id="document_upload"
                                                    style="display: none;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="divider"></div>
                                    <div class="media_uploader_child" style="height:100%">
                                        <div class="form-group">
                                            <p>Uploaded Files</p>
                                            <div class="appnd_iles_upld">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group align-right" style=text-align:end>
                                    <input type="hidden" name="captured_image" id="captured_image" value="">
                                    <!-- <input type="hidden" name="captured_file" id="captured_file" value=""> -->
                                    <input type="submit" name="submit" class=" form-control btn btn-sm btn-primary"
                                        value="सेभ गर्नुहोस" id="sbmt">
                                    <input type="hidden" name="id" class="form-control btn btn-sm btn-primary"
                                        value="<?php echo (((isset($detail->id)) && $detail->id != '') ? $detail->id : '') ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<div class="CameraBox" style="display:none;">
    <div class="inside">
        <div id="my_camera"></div>
        <input type="hidden" name="captured_image_data" id="captured_image_data">
        <div id="results">
            <div id="Capture_image">
                <img src="<?php echo base_url('assets/img/'); ?>backgrouns_blabk.png" alt="Image">
            </div>
            <div class="actionss">
                <button type="button" onclick="saveSnap();">
                    Save
                </button>
                <button type="button" onclick="Camera_open();">
                    refresh
                </button>
                <button type="button" onclick="webcamClose();">
                    exit
                </button>
            </div>
        </div>
        <div class="actionss">
            <button type="button" onclick="captureSnap();">
                Capture
            </button>
            <button type="button" onclick="webcamClose();">
                exit
            </button>
        </div>
    </div>
</div>



<!-- <script>
   $("#submit").submit(function(e){
        e.preventDefault();
        alert('hi');
        console.log("here");
        $.ajax({
            url:'<?php echo base_url(); ?>dataentryform/admin/form',
            method:'POST',
            data:new FormData(this),
            contentType: false,  
            cache: false,  
            processData:false,
            dataType:"json",
            beforeSend:function(){
                $('#contact').attr('disabled', 'disabled');
            },
            success:function(data){
                if(data.error){
                    if(data.name_error != '')
                    {
                    $('#name_error').html(data.name_error);
                    }
                    else
                    {
                    $('#name_error').html('');
                    }
                    
                    if(data.email_error != '')
                    {
                    $('#email_error').html(data.email_error);
                    }
                    else
                    {
                    $('#email_error').html('');
                    }
                    if(data.phone_error != '')
                    {
                    $('#phone_error').html(data.phone_error);
                    }
                    else
                    {
                    $('#phone_error').html('');
                    }
                    if(data.address_error != '')
                    {
                    $('#address_error').html(data.address_error);
                    }
                    else
                    {
                    $('#address_error').html('');
                    }
                    if(data.DocPath_error != '')
                    {
                    $('#DocPath_error').html(data.DocPath_error);
                    }
                    else
                    {
                    $('#DocPath_error').html('');
                    }
                }
                if(data.success){
                    $('#success_message').html(data.success);
                    $('#name_error').html('');
                    $('#email_error').html('');
                    $('#phone_error').html('');
                    $('#address_error').html('');
                    $('#DocPath_error').html('');
                    $('#submit')[0].reset();
                }
                $('#contact').attr('disabled', false);
            }
        })
    })

</script> -->