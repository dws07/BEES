<script src="<?php echo base_url('assets/js/'); ?>jquery-1.10.2.js"></script>
<script src="<?php echo base_url('assets/js/'); ?>jquery-ui.js"></script>
<script src="<?php echo base_url(); ?>assets/plugin/js/jquery.min.js"></script>
<script src="<?php echo base_url('assets/js/'); ?>jquery-ui.min.js"></script>
<script src="<?php echo base_url('assets/js/jquery.canvasjs.min.js'); ?>"></script>
<script src="<?php echo base_url(); ?>assets/plugin/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugin/js/fastclick.js"></script>
<script src="<?php echo base_url(); ?>assets/plugin/js/adminlte.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugin/js/dashboard2.js"></script>
<script src="<?php echo base_url(); ?>assets/plugin/js/demo.js"></script>
<script src="<?php echo base_url('assets/js/'); ?>moment.min.js"></script>
<script src="<?php echo base_url('assets/js/'); ?>daterangepicker.js"></script>
<script src="<?php echo base_url('assets/js/'); ?>summernote-bs4.min.js"></script>
<script src="<?php echo base_url('assets/js/'); ?>custome.js"></script>
<script src="<?php echo base_url('assets/js/'); ?>jquery.mjs.nestedSortable.js"></script>
<script src="<?php echo base_url('assets/plugin/js/select2.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/'); ?>jquery.overlayScrollbars.min.js"></script>
<script src="<?php echo base_url('assets/js/'); ?>jquery.mjs.nestedSortable.js"></script>
<script src="<?php echo base_url('assets/js/'); ?>Chart.js"></script>
<script src="<?php echo base_url('assets/js/webcam/'); ?>webcam.min.js"></script>
<script src="<?php echo base_url('assets/js/'); ?>nepali.datepicker.v4.0.4.min.js"></script>
<script src="<?php echo base_url('assets/js/'); ?>toastify.min.js"></script>
<script src="<?php echo base_url('assets/js/'); ?>dataTables.min.js"></script>  
<script src="https://unpkg.com/nepalify@0.5.0/umd/nepalify.production.min.js"></script> 

<script>

    // roman font
    // console.log(nepalify.availableLayouts());
    //personal roman
    var phone_number = nepalify.interceptElementById("phone_number");
    var name = nepalify.interceptElementById("name");
    var nationality = nepalify.interceptElementById("nationality");
    var identicard_number = nepalify.interceptElementById("identicard_number");
    var address = nepalify.interceptElementById("address");
    var marital_status_remarks = nepalify.interceptElementById("marital_status_remarks");
    var occupation = nepalify.interceptElementById("occupation");

    //travel roman
    var travel_start_country = nepalify.interceptElementById("travel_start_country");
    var entry_adress = nepalify.interceptElementById("entry_adress");
    var entry_address2 = nepalify.interceptElementById("entry_address2");
    var travel_destination = nepalify.interceptElementById("travel_destination");
    var travel_deuration = nepalify.interceptElementById("travel_deuration");
    var traveler_proporty = nepalify.interceptElementById("traveler_proporty"); 

    //health roman
    var health_status = nepalify.interceptElementById("health_status");
    var health_result = nepalify.interceptElementById("health_result");

    //vehicle roman
    var vehicle_number = nepalify.interceptElementById("vehicle_number");
    var drivers_name = nepalify.interceptElementById("drivers_name");
    var driving_licence = nepalify.interceptElementById("driving_licence");
    var drivers_number = nepalify.interceptElementById("drivers_number");
    var property_information = nepalify.interceptElementById("property_information");
    var pasengers = nepalify.interceptElementById("pasengers"); 
    
    var remarks = nepalify.interceptElementById("remarks"); 


    // GLOBAL SCOPE VARIABLE
    function handleItemClick(value, html) {
        var $button = $('.btn.btn-default.dropdown-toggle.codeValue');

        // Preserve existing HTML and update button text
        var existingHtml = $button.find('.caret').parent().html(); // Get existing HTML
        $button.html(value); // Update button text

        // Log clicked item details
        console.log('Item clicked with value:', value);
        console.log('Item clicked with HTML:', html);
        $('#country_code').val(value);
    }
    $(document).ready(function () {
        //open camera
        $(document).off('click','.camera_open_hai').on('click', '.camera_open_hai', function(){
            var camera_count = $(this).attr('camera_count');
            var default_img = "<?php echo base_url(); ?>assets/img/backgrouns_blabk.png",
            // alert(camera_count);
            $html = `<div class="CameraBoxChild" id="cmbx`+camera_count+`">
                        <div class="inside">
                            <div id="my_camera_child"></div>
                            <input type="hidden" name="captured_image_data_child" id="captured_image_data_child">
                            <div id="results_child" style="display:none;">
                                <div id="Capture_image_child">
                                    <img src="`+default_img+`" alt="Image">
                                </div>
                                <div class="actionss">
                                    <button type="button" id="svSnap" camera_count="`+camera_count+`">
                                        Save
                                    </button>
                                    <button type="button" id="refresh_camera" camera_count="`+camera_count+`">
                                        refresh
                                    </button>
                                    <button type="button" id="webcamclose1" camera_count="`+camera_count+`">
                                        exit
                                    </button>
                                </div>
                            </div>
                            <div class="actionss">
                                <button type="button" id="captureSnapChild" camera_count="`+camera_count+`">
                                    Capture
                                </button>
                                <button type="button" id="webcamclose">
                                    exit
                                </button>
                            </div>
                        </div>
                    </div>`; 
                    // console.log('rajesh'); 
                $('#appendcam'+camera_count).html($html);    
                configure(); 
        })

        //refresh camera
        $(document).off('click','#refresh_camera').on('click', '#refresh_camera', function(){
            Webcam.reset();
            var camera_count = $(this).attr('camera_count');
            var default_img = "<?php echo base_url(); ?>assets/img/backgrouns_blabk.png",
            // alert(camera_count);
            $html = `<div class="CameraBoxChild" id="cmbx`+camera_count+`">
                        <div class="inside">
                            <div id="my_camera_child"></div>
                            <input type="hidden" name="captured_image_data_child" id="captured_image_data_child">
                            <div id="results_child" style="display:none;">
                                <div id="Capture_image_child">
                                    <img src="`+default_img+`" alt="Image">
                                </div>
                                <div class="actionss">
                                    <button type="button" id="svSnap" camera_count="`+camera_count+`">
                                        Save
                                    </button>
                                    <button type="button" id="refresh_camera" camera_count="`+camera_count+`">
                                        refresh
                                    </button>
                                    <button type="button" id="webcamclose1" camera_count="`+camera_count+`">
                                        exit
                                    </button>
                                </div>
                            </div>
                            <div class="actionss">
                                <button type="button" id="captureSnapChild" camera_count="`+camera_count+`">
                                    Capture
                                </button>
                                <button type="button" id="webcamclose">
                                    exit
                                </button>
                            </div>
                        </div>
                    </div>`; 
                    // console.log('rajesh'); 
                $('#viewImage'+camera_count).html('');
                $('#appendcam'+camera_count).html($html);    
                configure(); 
        })

        function configure() {
            // alert(camera_count);
            Webcam.set({
                width: 440,
                height: 260,
                image_format: 'png',
                jpeg_quailaty: 90
            });
            Webcam.attach('#my_camera_child');
        } 

        //close camera
        $(document).off('click','#webcamclose').on('click','#webcamclose',function(){
            Webcam.reset();
            $('.CameraBoxChild').remove();
        }) 
        //close camera1
        $(document).off('click','#webcamclose1').on('click','#webcamclose1',function(){
            Webcam.reset();
            var camera_count = $(this).attr('camera_count');
            $('.CameraBoxChild').remove();
            $('#viewImage'+camera_count).html('');
        }) 

        //capture image
        $(document).off('click','#captureSnapChild').on('click','#captureSnapChild',function(){
            var camera_count = $(this).attr('camera_count');
            const Resultsss = document.querySelector('#results_child');
            Resultsss.style.display = "block";
            Webcam.snap(function (data_uri) {
                const Result = document.getElementById('Capture_image_child');
                const viewImage = document.getElementById('viewImage'+camera_count);
                Result.innerHTML = '<img id = "webcam" src = "' + data_uri + '">';
                viewImage.innerHTML = '<img id = "webcam" src = "' + data_uri + '">';
                $("#captured_image_data_child").val(data_uri);
            });
        })  
        

        //save snap 
        $(document).off('click','#svSnap').on('click','#svSnap',function(){
            var camera_count = $(this).attr('camera_count');
            var base64data = $("#captured_image_data_child").val();
            $.ajax({
                type: "POST",
                // dataType: "json",
                url: "<?php echo base_url(); ?>dataentryform/admin/saveSnaps/",
                data: { image: base64data },
                success: function (data) {
                    // alert("Saved");
                    $("#captured_image"+camera_count).val(data);
                    Webcam.reset();
                    $('.CameraBoxChild').remove();
                    // const cameraBox = document.querySelector('.CameraBox');
                    // const Resultsss = document.querySelector('#results');
                    // const viewimage = document.querySelector('#viewImage');
                    // Resultsss.style.display = "none";
                    // cameraBox.style.display = "none";
                    // viewimage.style.display = "block";
                    Toastify({

                        text: 'Snap Saved',

                        duration: 6000,

                        style: {
                            background: "linear-gradient(to right, red, yellow)",
                        }

                    }).showToast();
                }
            })
        }) 

        function isValidUTF8(str) {
            try {
                decodeURIComponent(escape(str));
                return true;
            } catch (e) {
                return false;
            }
        }

        // $(document).off('change', '.utf8val').on('change', '.utf8val', function (e) {
        //     var input = $(this).val(); 
        //     alert(input);
        //     const fontFamily = window.getComputedStyle(input).fontFamily;
        //     console.log(fontFamily);
        //     if (fontFamily.includes('Preeti')) {
        //         alert('Preeti font is applied!');
        //     } else {
        //         Toastify({

        //             text: "नेपालीमा लेख्नुहोस्",

        //             duration: 6000,

        //             style: {
        //                 background: "linear-gradient(to right, red, yellow)",
        //             }

        //         }).showToast();
        //     }
        //     // if (isValidUTF8(input)) {
        //     //     // alert('invalid');
        //     //     // console.log("The string is valid UTF-8.");
        //     //     $(this).val('');
        //     //     Toastify({

        //     //         text: "नेपालीमा लेख्नुहोस्",

        //     //         duration: 6000,

        //     //         style: {
        //     //             background: "linear-gradient(to right, red, yellow)",
        //     //         }

        //     //     }).showToast();
        //     // }
        //     // else {
        //     //     alert('valid');
        //     //     console.log("The string is not valid UTF-8.");
        //     // }
        // })



        var $countryCodeDropdown = $('#countryCode');
        var $countryList = []

        // Function to filter countries based on the search term
        var $searchInput = $('#countryCodeSearch');
        var $countryList = $('country-option')
        function filterCountries(data) {
            $('.country-option').remove();
            const filteredArr = [
                ...$countryList.filter(item => item.cca3.toLowerCase() === data),
                ...$countryList.filter(item => item.cca3.toLowerCase() !== data)
            ];
            appendCountry(filteredArr)
            // console.log("sagar", filteredArr)
        }

        $('#countryCodeSearch').on('keyup', () => {
            var searchTerm = $('#countryCodeSearch').val().toLowerCase();
            filterCountries(searchTerm)
        });




        $.ajax({
            url: 'https://restcountries.com/v3.1/all',
            type: 'GET',
            success: function (data) {
                $countryList = data;
                appendCountry(data)
            },
            error: function (xhr, status, error) {
                console.error("An error occurred while fetching country codes: " + error);
            }
        });
        function appendCountry(data) {
            data.forEach(function (country) {
                if (country.idd && country.idd.root && country.idd.suffixes && country.flags) {
                    let code = country.idd.root + country.idd.suffixes[0];
                    code = ent_to_nepali_num_convert(code);
                    var countryName = country.name.native;
                    var shortName = country.cca3;
                    var flagUrl = country.flags.svg; // You can use other flag URLs provided by the API
                    // var option = $('<option>').val(code).addClass('country-option')
                    //     .css('background-image', 'url(' + flagUrl + ')')
                    //     .text(shortName + '( ' + code + ' )');
                    var option = $('<li>')
                        .val(code)
                        .addClass('country-option')
                        .html('<img src="' + flagUrl + '" class="flag-icon" /> ' + shortName + ' (' + code + ')')
                        .attr('onclick', 'handleItemClick("' + code + '", "' + encodeURIComponent('<img src="' + flagUrl + '" class="flag-icon" /> ' + shortName + ' (' + code + ')') + '")');
                    $countryCodeDropdown.append(option);

                }
            });

        };

        function ent_to_nepali_num_convert(number) {
            const eng_number = ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "+", "-"];
            const nep_number = ["०", "१", "२", "३", "४", "५", "६", "७", "८", "९", "+", "-"];
            
            let result = '';
            
            for (let i = 0; i < number.length; i++) {
                const char = number[i];
                const index = eng_number.indexOf(char);
                if (index !== -1) {
                    result += nep_number[index];
                } else {
                    result += char;
                }
            }
            
            return result;
        };


        $('#document_upload').on('change', function () {
            var fileInput = document.getElementById('document_upload');
            var file = fileInput.files[0];

            if (file) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    const viewImage = document.getElementById('viewFile');
                    viewImage.innerHTML = '<p class="fleupled">फाईल अपलोड पूर्ण भयो !!!</p>';
                    viewImage.style.display = "block";
                }

                reader.readAsDataURL(file);

                var formData = new FormData();
                formData.append('document_upload', file);

                $.ajax({
                    url: "<?php echo base_url(); ?>dataentryform/admin/upload_image",
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        $("#captured_file").val(response);
                    },
                    error: function (xhr, status, error) {
                        Toastify({

                            text: "An error occurred: " + xhr.status + " " + xhr.statusText,

                            duration: 6000,

                            style: {
                                background: "linear-gradient(to right, red, yellow)",
                            }

                        }).showToast();
                    }
                });
            }
        });

        $(document).off('blur', '#phone_number').on('blur', '#phone_number', function (e) {
            var contact = $(this).val(); 
            var country_code = $('#country_code').val();
            // alert(country_code);
            if(!country_code || country_code == ''){
                $('#phone_number').val('');
                Toastify({

                    text: 'Please select Country Code First',

                    duration: 6000,

                    style: {
                        background: "linear-gradient(to right, red, yellow)",
                    }

                    }).showToast();
                    return false;
            }
            // alert(contact.toString().length);
            if (10 < contact.toString().length || contact.toString().length < 10) {
                $('#phone_number').val('');
                Toastify({

                    text: 'contact must be of length 10',

                    duration: 6000,

                    style: {
                        background: "linear-gradient(to right, red, yellow)",
                    }

                }).showToast();
                return false;
            } else {
                $.ajax({
                    url: '<?php echo base_url('dataentryform/admin/getDetailFromContact'); ?>',
                    type: "POST",
                    dataType: "json",
                    data: {
                        "conatct": contact,
                        "country_code": country_code,
                    },
                    success: function (resp) {
                        $(".field_validation").css("display", "none");
                        if (resp.status == "successfull") {
                            $('#nationality').val(resp.data.nationality);
                            $('#name').val(resp.data.name);
                            jQuery('input:radio[name="gender"]').filter(`[value="` + resp.data.gender + `"]`).attr('checked', true);
                            // $('#identicard_type option[value="'+resp.data.identicard_type+'"]').attr('selected', 'selected');
                            // $('#countryCode option[value="'+resp.data.country_code+'"]').attr('selected', true);
                            $('#identicard_type').val(resp.data.identicard_type);
                            $('#countryCode').val(resp.data.country_code);
                            $('#identicard_number').val(resp.data.identicard_number);
                            $('#dobssss').val(resp.data.date_of_birth);
                            var arr1 = resp.data.date_of_birth.split('-');
                            // console.log(arr1);
                            $('#datepicker').val(arr1[1]+'/'+arr1[2]+'/'+arr1[0]);

                            $('#nepali-datepicker').val(resp.data.nepali_date_of_birth); 
                            // $('#datepicker').val(resp.data.date_of_birth);
                            $('#age').val(resp.data.age);
                            $('#address').val(resp.data.address);
                            jQuery('input:radio[name="marital_status"]').filter(`[value="` + resp.data.marital_status + `"]`).attr('checked', true);
                            if (resp.data.marital_status == 'अन्य') {
                                $("#marital_status_remarks").css("display", "block");
                                $('#marital_status_remarks').val(resp.data.marital_status_remarks);
                            }
                            $('#occupation').val(resp.data.occupation);

                            $('#AppendForm2').html(resp.data.childrens);
                            $('#totalchildren').val(resp.data.totalchildren);
                            $('#captured_image').val(resp.data.profile_image);
                            $('#remarks').val(resp.data.remarks);
                            var filepath = `<?php echo base_url(''); ?>`;
                            $('#viewImage').html(`<img id = "webcam" src = "` + filepath + resp.data.profile_image + `">`);
                            $('#captured_file').val(resp.data.captured_file);
                            $('#viewFile').html(`<a href="` + filepath + resp.data.captured_file + `" target="_blank">फाईल हेर्नुहोस </a>`);
                            $("#viewImage").css("display", "block");
                            // initializeDatePickers();

                            if (resp.returned == 0) {
                                //travel
                                $('#travel_start_country').val(resp.data.travel_info.travel_start_country);
                                $('#entry_adress').val(resp.data.travel_info.entry_adress);
                                $('#entry_time').val(resp.data.travel_info.entry_time);
                                $('#exit_time').val(resp.data.travel_info.exit_time);
                                $('#entry_address2').val(resp.data.travel_info.entry_address2);
                                $('#travel_destination').val(resp.data.travel_info.travel_destination);
                                $('#travel_deuration').val(resp.data.travel_info.travel_deuration);
                                jQuery('input:radio[name="travel_porpose"]').filter(`[value="` + resp.data.travel_info.travel_porpose + `"]`).attr('checked', true);
                                $('#traveler_proporty').val(resp.data.travel_info.traveler_proporty);
                                jQuery('input:radio[name="travel_type"]').filter(`[value="` + resp.data.travel_info.travel_type + `"]`).attr('checked', true);
                                // $('#gone_dirction option[value="'+resp.data.travel_info.gone_dirction+'"]').attr('selected', 'selected')
                                $('#gone_dirction').val(resp.data.travel_info.gone_dirction);

                                //vehicle

                                //health
                                $('#health_status').val(resp.data.health_info.health_status);
                                $('#health_result').val(resp.data.health_info.health_result);

                                if (resp.data.travel_info.travel_type == 'गाडी') {
                                    $("#vehicle_detailssss").css("display", "block");
                                    jQuery('input:radio[name="vehicle_information"]').filter(`[value="` + resp.data.vehicle_info.vehicle_information + `"]`).attr('checked', true);
                                    jQuery('input:radio[name="types_of_vehicle"]').filter(`[value="` + resp.data.vehicle_info.types_of_vehicle + `"]`).attr('checked', true);
                                    $('#vehicle_number').val(resp.data.vehicle_info.vehicle_number);
                                    $('#drivers_name').val(resp.data.vehicle_info.drivers_name);
                                    $('#driving_licence').val(resp.data.vehicle_info.driving_licence);
                                    $('#drivers_number').val(resp.data.vehicle_info.drivers_number);
                                    jQuery('input:radio[name="use_of_vehicle"]').filter(`[value="` + resp.data.vehicle_info.use_of_vehicle + `"]`).attr('checked', true);
                                    jQuery('input:radio[name="heavy_vehicle_type"]').filter(`[value="` + resp.data.vehicle_info.heavy_vehicle_type + `"]`).attr('checked', true);
                                    $('#property_information').val(resp.data.vehicle_info.property_information);
                                    $('#pasengers').val(resp.data.vehicle_info.pasengers);
                                    jQuery('input:radio[name="is_returned_vehicle"]').filter(`[value="` + resp.data.vehicle_info.is_returned + `"]`).attr('checked', true);
                                } else {
                                    $("#vehicle_detailssss").css("display", "none");
                                    const personalinfo4 = document.querySelectorAll('.personalinfo4');
                                    $(personalinfo4).val("");
                                    const personalinfo4_checked = document.querySelectorAll('.personalinfo4_checked');
                                    // $(personalinfo4_checked).prop('checked', false);
                                    $(personalinfo4_checked).removeAttr('checked');
                                } 
                                for (let i = 1; i <= resp.data.totalchildren; i++) { 
                                    $( "#nepali-datepickerchild"+i ).nepaliDatePicker({
                                        ndpYear: true,
                                        ndpMonth: true,
                                        ndpYearCount: 100,
                                            onChange: function(value, ui) {
                                                console.log(value.ad);
                                                const AGe = document.querySelector('#children_age'+i);
                                                // const BODDD = document.querySelector('#dobsssschid1');  
                                                let today = new Date(),
                                                dob = new Date(value.ad),
                                                age = new Date(today - dob).getFullYear() - 1970;
                                                console.log(age);
                                                AGe.innerHTML = age;
                                                AGe.value = age;
                                                // BODDD.value = value.ad;
                                            
                                            },
                                        }); 

                                        var children_name1 = nepalify.interceptElementById("children_name"+i);
                                        var children_address1 = nepalify.interceptElementById("children_address"+i);
                                        var children_parent_name1 = nepalify.interceptElementById("children_parent_name"+i);
                                        var children_relations1 = nepalify.interceptElementById("children_relations"+i);
                                        var children_identicard_number1 = nepalify.interceptElementById("children_identicard_number"+i);
                                }
                            }else{
                                initializeDatePickers();  
                                $("#vehicle_detailssss").css("display", "none");
                                const personalinfo4 = document.querySelectorAll('.personalinfo4');
                                $(personalinfo4).val("");
                                const personalinfo4_checked = document.querySelectorAll('.personalinfo4_checked');
                                $(personalinfo4_checked).removeAttr('checked');
                                // $(personalinfo4_checked).prop('checked', false);

                                const personalinfo1 = document.querySelectorAll('.personalinfo1');
                                $(personalinfo1).val("");
                                const personalinfo1_checked = document.querySelectorAll('.personalinfo1_checked');
                                $(personalinfo1_checked).removeAttr('checked');
                                // $(personalinfo1_checked).prop('checked', false);

                                const personalinfo3 = document.querySelectorAll('.personalinfo3');
                                $(personalinfo3).val("");
                                const personalinfo3_checked = document.querySelectorAll('.personalinfo3_checked');
                                $(personalinfo3_checked).removeAttr('checked');
                                // $(personalinfo3_checked).prop('checked', false);
                            }
                        } else {
                            const all_fields = document.querySelectorAll('.cmnreset');
                            $(all_fields).val("");

                            const all_fields_checked = document.querySelectorAll('.cmnreset_checked');
                            // $(all_fields_checked).prop('checked', false);
                            $(all_fields_checked).removeAttr('checked');
                            $('#AppendForm2').html(resp.html);
                            $('#totalchildren').val(resp.totalchildren);
                            initializeDatePickers();  
                        }
                         
                    }
                });
            }
        });
        $('.select2').select2();
        $(document).off('click', '#generate_forex').on('click', '#generate_forex', function (e) {
            e.preventDefault();
            $.ajax({
                url: '<?php echo base_url('forex/admin/getForex'); ?>',
                type: "POST",
                dataType: "json",
                // data: {
                //   "role_id": role_id,
                // },
                success: function (resp) {
                    if (resp.status == "success") {
                        window.location.reload();
                    } else {
                        Toastify({

                            text: resp.status_message,

                            duration: 6000,

                            style: {
                                background: "linear-gradient(to right, red, yellow)",
                            }

                        }).showToast();
                        alert(resp.status_message);
                    }
                }
            });

        });


        // get location latitude and longitude
        $(document).off('change', '#role_id').on('change', '#role_id', function (e) {
            e.preventDefault();
            var role_id = $(this).val();

            $.ajax({

                url: '<?php echo base_url('module/admin/getForm'); ?>',
                type: "POST",
                // contentType: "application/json",  
                dataType: "json",
                data: {
                    "role_id": role_id,
                },
                success: function (resp) {
                    // console.log(resp.data);return false;
                    // var obj = jQuery.parseJSON(resp);
                    // console.log(resp.status);return false;
                    if (resp.status == "success") {
                        $('#append_persmission').html(resp.data);
                    } else {
                        Toastify({

                            text: resp.status_message,

                            duration: 6000,

                            style: {
                                background: "linear-gradient(to right, red, yellow)",
                            }

                        }).showToast();
                        // alert(resp.status_message);
                    }
                }
            });

        });

        $(document).off('change', '#page').on('change', '#page', function (e) {
            e.preventDefault();
            var val = $(this).val();
            //   alert(val);
            if (val == 'Home') {
                $('#rate_js').show();
            } else {
                $('#rate_js').hide();
            }
        });



        // on change role get permissions form
        $(document).off('change', '#role_id').on('change', '#role_id', function (e) {
            e.preventDefault();
            var role_id = $(this).val();

            $.ajax({

                url: '<?php echo base_url('module/admin/getForm'); ?>',
                type: "POST",
                // contentType: "application/json",  
                dataType: "json",
                data: {
                    "role_id": role_id,
                },
                success: function (resp) {
                    // console.log(resp.data);return false;
                    // var obj = jQuery.parseJSON(resp);
                    // console.log(resp.status);return false;
                    if (resp.status == "success") {
                        $('#append_persmission').html(resp.data);
                    } else {
                        Toastify({

                            text: resp.status_message,

                            duration: 6000,

                            style: {
                                background: "linear-gradient(to right, red, yellow)",
                            }

                        }).showToast();
                        // alert(resp.status_message);
                    }
                }
            });

        });

        //get form for functions for role
        $(document).off('click', '#add_function').on('click', '#add_function', function (e) {
            e.preventDefault();
            $('#apnd_funct').append(
                '<div class="col-md-4 rmv_modle"> <div class="row" ><div class="col-md-6"> <div class="form-group"> <label> Function name <span class="req"> * </span></label> <input type="text" name = "function_name[]" class = "form-control" placeholder = "Function Name" value = ""> </div> </div> <div class="col-md-6"><div class="form-group"> <label> Display name <span class="req"> * </span></label> <input type="text" name="display_name_function[]" class="form-control" placeholder="Display Name" value="" ></div></div></div><span class="rmv_btn_mdl rmv_functns"> X </span> </div> '
            );
        });


        // REMOVE item

        $(document).off('click', '.rmv').on('click', '.rmv', function (e) {
            e.preventDefault();
            // alert('hi');
            $(this).parent().parent().remove();
        });




        //Form Addition Functions

        $(document).off('click', '#FormAddFunction').on('click', '#FormAddFunction', function (e) {
            e.preventDefault();
            $('#AppendForm').append(
                '<div class="DeleteFunctionsssss"><div class="col-sm-3"><div class="form-group"><label>अन्य जानकारी : </label><input type="text" name="others_information" class="form-control personalinfo" id="others_information" placeholder="अन्य जानकारी" value=""><a class="btn btn-sm btn-danger FormRemoveFunction" id="FormRemoveFunction"><i class="fa fa-trash"></i></a></div></div></div>'
            );
        });

        $(document).off('click', '#FormAddFunction1').on('click', '#FormAddFunction1', function (e) {
            e.preventDefault();
            $('#AppendForm1').append(
                '<div class="DeleteFunctionsssss"><div class="col-sm-12"><div class="form-group"><label>अन्य जानकारी : </label><input type="text" name="others_information" class="form-control width100 personalinfo1" id="others_information" placeholder="अन्य जानकारी" value=""><a class="btn btn-sm btn-danger FormRemoveFunction" id="FormRemoveFunction"><i class="fa fa-trash"></i></a></div></div></div>'
            );
        });

        $(document).off('click', '#FormAddFunction2').on('click', '#FormAddFunction2', function (e) {
            e.preventDefault();
            let total_child = parseInt($('#totalchildren').val());
            total_child = (total_child + 1)
            $('#totalchildren').val(total_child);
            $('#AppendForm2').append(
                `<div class="DeleteFunctionsssss childraj">
                <div class="row MainForm">
                    <div class="col-sm-12">
                        <div class="form-group child_btn">
                            <label>पुरा नाम : </label>
                            <input type="text" name="children_name[]" class="form-control utf8val personalinfo2 cmnreset" id="children_name`+total_child+`" style="width:80% !important" placeholder="पुरा नाम" value="">
                        </div>
                    </div> 
                    <div class="col-sm-6">
                        <div class="form-group child_btn">
                            <div class="flexxx">
                                <label>जन्म मिति  : </label>
                                <div class="swtchcld">
                                    Switch
                                    <label class="switch">
                                        <input id="Switchssschild`+total_child+`"  type="checkbox">
                                        <span class="slider round"></span>
                                    </label>
                                </div> 
                            </div>    
                                <input type="text" name="nepali_date_of_birthss[]" id="nepali-datepickerchild`+total_child+`" style="width:58%" class="form-control personalinfo2 nepdatesschild activessssss cmnreset" placeholder="जन्म मिति" autocomplete="off"> 
                                <input type="text" name="english_date_of_birthss[]"
                                                                id="datepickerchild`+total_child+`"
                                                                style="width:58%"
                                                                class="form-control personalinfo2 engdatesschild "
                                                                placeholder="Date of Birth">
                                <input type="hidden" name="children_dob[]" id="dobsssschid`+total_child+`">
                        </div>
                    </div>    
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label> उमेर : </label> 
                            <input type="text" name="children_age[]" class="form-control width75 personalinfo2 cmnreset" id="children_age`+total_child+`" placeholder="उमेर" value="" readonly>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>लिंग : </label>
                            <div class="radiosss" style="width:59%">
                                <input type="radio" class="personalinfo2_checked cmnreset_checked" name="children_gender[`+(total_child-1)+`]" value="पुरुष"> <span>पुरुष</span>
                                <input type="radio" class="personalinfo2_checked cmnreset_checked" name="children_gender[`+(total_child-1)+`]" value="महिला"> <span>महिला</span>
                                <input type="radio" class="personalinfo2_checked cmnreset_checked" name="children_gender[`+(total_child-1)+`]" value="तेस्रोलिंगी"> <span>तेस्रोलिंगी</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>ठेगाना : </label>
                            <input type="text" name="children_address[]" class="form-control utf8val width75 personalinfo2 cmnreset" id="children_address`+total_child+`" placeholder="ठेगाना" value="">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label> संरक्षकको पुरा नाम : </label>
                            <input type="text" name="children_parent_name[]" class="form-control utf8val personalinfo2 cmnreset" id="children_parent_name`+total_child+`" style="width:80%" placeholder="संरक्षकको पुरा नाम " value="">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>सम्बन्ध : </label>
                            <input type="text" name="children_relations[]" class="form-control utf8val personalinfo2 cmnreset" style="width:80%" id="children_relations`+total_child+`" placeholder="सम्बन्ध " value=""> 
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>परिचय पत्र नम्बर : </label>
                            <input type="text" name="children_identicard_number[]" class="form-control utf8val personalinfo2 cmnreset" style="width:58%" id="children_identicard_number`+total_child+`" placeholder="परिचय पत्र नम्बर " value=""> 
                        </div>
                    </div>  
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>फर्केको : </label>
                            <div class="radiosss width75 ">
                                <input type="radio" class="personalinfo2_checked cmnreset_checked" name="is_returned_child[`+(total_child-1)+`]" value="1"> <span>हो</span>
                                <input type="radio" class="personalinfo2_checked cmnreset_checked" name="is_returned_child[`+(total_child-1)+`]" value="0"> <span>होइन</span> 
                            </div>  
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group"> 
                            <div id="camera_open`+total_child+`" class="camera_open_hai" camera_count="`+total_child+`">
                                <i class="fa fa-camera"></i>
                                <p>फोटो</p>
                                <input type="hidden" name="captured_image_child[]" id="captured_image`+total_child+`" value="">
                            </div>
                            <div id="viewImage`+total_child+`" class="chldimg"></div>
                            <div id="appendcam`+total_child+`">

                            </div> 
                            <a class="btn btn-sm btn-danger FormRemoveFunction" id="FormRemoveFunction"><i class="fa fa-trash"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            `
            ); 

            $( "#nepali-datepickerchild"+total_child).nepaliDatePicker({
            ndpYear: true,
            ndpMonth: true,
            ndpYearCount: 100,
                onChange: function(value, ui) {
                    console.log(value.ad);
                    const AGe = document.querySelector('#children_age'+total_child);
                    const BODDD = document.querySelector('#dobsssschid'+total_child);  
                    const BODDDEng = document.querySelector('#datepickerchild'+total_child);  
                    let today = new Date(),
                        dob = new Date(value.ad),
                        age = new Date(today - dob).getFullYear() - 1970;
                    console.log(age);
                    AGe.innerHTML = age;
                    age = ent_to_nepali_num_convert(''+age);
                    AGe.value = age;
                    BODDD.value = value.ad;
                    var arr1 = value.ad.split('-');
                    // console.log(arr1);
                    BODDDEng.value = arr1[1]+'/'+arr1[2]+'/'+arr1[0];

                },
            });
            
            $("#datepickerchild"+total_child).datepicker({
                changeMonth: true,
                changeYear: true,
                showButtonPanel: true,
                onSelect: function (value, ui) {
                    const AGe = document.querySelector('#children_age'+total_child);
                    const BODDD = document.querySelector('#dobsssschid'+total_child);
                    const BODDDNep = document.querySelector('#nepali-datepickerchild'+total_child);
                    let today = new Date(),
                        dob = new Date(value),
                        age = new Date(today - dob).getFullYear() - 1970;
                    AGe.innerHTML = age;
                    age = ent_to_nepali_num_convert(''+age);
                    AGe.value = age;
                    BODDD.value = value;

                    var arr1 = value.split('/');
                    var nep_date = NepaliFunctions.AD2BS({year: arr1[2], month: arr1[0], day: arr1[1]})
                    
                    var nep_date_converted = nep_date.year+'-'+nep_date.month+'-'+nep_date.day
                    BODDDNep.value = nep_date_converted; 
                },
                maxDate: '+0d',
                yearRange: '1920:2026',
                changeMonth: true,
                changeYear: true
            }); 

            var children_name1 = nepalify.interceptElementById("children_name"+total_child);
            var children_address1 = nepalify.interceptElementById("children_address"+total_child);
            var children_parent_name1 = nepalify.interceptElementById("children_parent_name"+total_child);
            var children_relations1 = nepalify.interceptElementById("children_relations"+total_child);
            var children_identicard_number1 = nepalify.interceptElementById("children_identicard_number"+total_child);

            const Dateswitchchild = document.querySelector('#Switchssschild'+total_child);
                Dateswitchchild.addEventListener('click', (event) => {
                Dateswitchchild.classList.toggle("actchild");
                let added_class = '';
                added_class = Dateswitchchild.className;
                // const ACTChILD = document.querySelector('.actchild');
                ACTChILD = false;
                if(added_class){
                    ACTChILD = document.querySelector('.'+added_class);
                }
                
                // console.log(ACTChILD);
                const endatechild = document.querySelector('#datepickerchild'+total_child);
                const nepdatechild = document.querySelector('#nepali-datepickerchild'+total_child);
                if (ACTChILD) {
                    endatechild.classList.add("activessssss")
                    nepdatechild.classList.remove("activessssss")
                }
                else {
                    endatechild.classList.remove("activessssss")
                    nepdatechild.classList.add("activessssss")
                }
            }); 
        });
        $(document).off('click', '#FormAddFunction3').on('click', '#FormAddFunction3', function (e) {
            e.preventDefault();
            $('#AppendForm3').append(
                '<div class="DeleteFunctionsssss"><div class="col-sm-12"><div class="form-group"><label>अन्य जानकारी : </label><input type="text" name="others_information" class="form-control width100 personalinfo3" id="others_information" placeholder="अन्य जानकारी" value=""><a class="btn btn-sm btn-danger FormRemoveFunction" id="FormRemoveFunction"><i class="fa fa-trash"></i></a></div></div></div>'
            );
        });
        $(document).off('click', '#FormAddFunction4').on('click', '#FormAddFunction4', function (e) {
            e.preventDefault();
            $('#AppendForm4').append(
                '<div class="DeleteFunctionsssss"><div class="col-sm-12"><div class="form-group"><label>अन्य जानकारी : </label><input type="text" name="others_information" class="form-control width100 personalinfo4" id="others_information" placeholder="अन्य जानकारी" value=""><a class="btn btn-sm btn-danger FormRemoveFunction" id="FormRemoveFunction"><i class="fa fa-trash"></i></a></div></div></div>'
            );
        });

        // REMOVE item

        $(document).off('click', '.FormRemoveFunction').on('click', '.FormRemoveFunction', function (e) {
            e.preventDefault();
            // const DeleteBTNSSS = document.querySelector('.DeleteFunctionsssss');
            // // $(this).parent().remove();
            // $(DeleteBTNSSS).remove();
            $(this).parent().parent().parent().parent().remove();
        });

        // reset 
        $(document).off('click', '#Resetfunction').on('click', '#Resetfunction', function (e) {
            e.preventDefault();
            const personalinfo = document.querySelectorAll('.personalinfo');
            $(personalinfo).val("");
            const personalinfo_checked = document.querySelectorAll('.personalinfo_checked');
            $(personalinfo_checked).prop('checked', false);
        });

        $(document).off('click', '#Resetfunction1').on('click', '#Resetfunction1', function (e) {
            e.preventDefault();
            const personalinfo1 = document.querySelectorAll('.personalinfo1');
            $(personalinfo1).val("");
            const personalinfo1_checked = document.querySelectorAll('.personalinfo1_checked');
            $(personalinfo1_checked).prop('checked', false);

            const personalinfo4_checked = document.querySelectorAll('.personalinfo4_checked');
            $(personalinfo4_checked).prop('checked', false);
            const vehicle_detailssss = document.querySelector('#vehicle_detailssss');
            vehicle_detailssss.style.display = "none";
        });

        $(document).off('click', '#Resetfunction2').on('click', '#Resetfunction2', function (e) {
            e.preventDefault();
            const personalinfo2 = document.querySelectorAll('.personalinfo2');
            $(personalinfo2).val("");

            const personalinfo2_checked = document.querySelectorAll('.personalinfo2_checked');
            $(personalinfo2_checked).prop('checked', false);
        });


        $(document).off('click', '#Resetfunction3').on('click', '#Resetfunction3', function (e) {
            e.preventDefault();
            const personalinfo3 = document.querySelectorAll('.personalinfo3');
            $(personalinfo3).val("");

            const personalinfo3_checked = document.querySelectorAll('.personalinfo3_checked');
            $(personalinfo3_checked).prop('checked', false);
        });
        $(document).off('click', '#Resetfunction4').on('click', '#Resetfunction4', function (e) {
            e.preventDefault();
            const personalinfo4 = document.querySelectorAll('.personalinfo4');
            $(personalinfo4).val("");
            const personalinfo4_checked = document.querySelectorAll('.personalinfo4_checked');
            $(personalinfo4_checked).prop('checked', false);
        });

        $(document).off('click', '#Gaddi').on('click', '#Gaddi', function (e) {
            const vehicle_detailssss = document.querySelector('#vehicle_detailssss');
            vehicle_detailssss.style.display = "block";
        });

        $(document).off('click', '#Paidalll').on('click', '#Paidalll', function (e) {
            const vehicle_detailssss = document.querySelector('#vehicle_detailssss');
            vehicle_detailssss.style.display = "none";
        });



        $(document).off('click', '#othersss').on('click', '#othersss', function (e) {
            const marital_status_remarks = document.querySelector('#marital_status_remarks');
            marital_status_remarks.style.display = "block";
        });
        $(document).off('click', '#married').on('click', '#married', function (e) {
            const marital_status_remarks = document.querySelector('#marital_status_remarks');
            marital_status_remarks.style.display = "none";
        });
        $(document).off('click', '#unmarried').on('click', '#unmarried', function (e) {
            const marital_status_remarks = document.querySelector('#marital_status_remarks');
            marital_status_remarks.style.display = "none";
        });



        // get staff of a department

        $(document).off('change', '#department_id').on('change', '#department_id', function (e) {
            var val = $(this).val();
            // alert(val);
            // return false;
            if (val == '') {
                alert('Select atleast one department');
                return false;
            }
            $.ajax({

                url: '<?php echo base_url('requisition/admin/getStaffOfDepartment'); ?>',
                type: "POST",
                // contentType: "application/json",  
                dataType: "json",
                data: {
                    "val": val,
                },
                success: function (resp) {
                    // console.log(resp.data);return false;
                    // var obj = jQuery.parseJSON(resp);
                    // console.log(resp.status);return false;
                    if (resp.status == "success") {
                        $('#requested_by').html(resp.data);
                    } else {
                        alert(resp.status_message);
                    }
                }
            });
        });



        $(document).off('change', '#type').on('change', '#type', function (e) {
            e.preventDefault();
            var val = $(this).val();
            // alert(val);
            if (val == 'others') {
                $('.ext_url').show();
            } else {
                $('.ext_url').hide();
            }
        });

        $('.free_charge_commission').hide();

        if ($('#types').val() == 'Commissions') {
            $('.free_charge_commission').show();

        }
        $(document).off('change', '#types').on('change', '#types', function (e) {
            e.preventDefault();
            var val = $(this).val();
            // alert(val);
            if (val == 'Commissions') {
                $('.free_charge_commission').show();
            } else {
                $('.free_charge_commission').hide();
            }
        });


        // REMOVE functions in module module

        $(document).off('click', '.rmv_functns').on('click', '.rmv_functns', function (e) {
            e.preventDefault();
            // alert('hi');
            $(this).parent().remove();
        });

    })
</script>

<?php if ($this->session->flashdata('error')) { ?>
    <script>
        Toastify({
            text: "<?php echo $this->session->flashdata('error'); ?>",
            duration: 2000,
            style: {
                background: "#e61d27",
                color: "#fff",
            }
        }).showToast();
    </script>
<?php }

if ($this->session->flashdata('success')) { ?>
    <script>
        Toastify({
            text: "<?php echo $this->session->flashdata('success'); ?>",
            duration: 2000,
            style: {
                background: "#00c468",
                color: "#fff",
            }

        }).showToast();
    </script>
<?php } ?>


<script>
    const ViewDataBTNs = document.querySelectorAll('.ViewDataBTN');
    ViewDataBTNs.forEach((personalbtn) => {
        personalbtn.addEventListener("click", (e) => {
            const personalbtn = document.querySelectorAll('.personal');
            const travelbtn = document.querySelectorAll('.travel');
            const vehiclebtn = document.querySelectorAll('.vehicle');
            const childrenbtn = document.querySelectorAll('.children');
            const healthbtn = document.querySelectorAll('.health');

            const personalData = document.querySelectorAll('.personalData ');
            const travelData = document.querySelectorAll('.travelData');
            const vehicleData = document.querySelectorAll('.vehicleData');
            const childrenData = document.querySelectorAll('.childrenData ');
            const healthData = document.querySelectorAll('.healthData');
            personalbtn.forEach(element1 => {
                element1.classList.add("activess");
                personalData.forEach(datael1 => {
                    datael1.classList.add("acitvesssssss");
                });
                travelData.forEach(datael2 => {
                    datael2.classList.remove("acitvesssssss");
                });
                vehicleData.forEach(datael3 => {
                    datael3.classList.remove("acitvesssssss");
                });
                childrenData.forEach(datael4 => {
                    datael4.classList.remove("acitvesssssss");
                });
                healthData.forEach(datael5 => {
                    datael5.classList.remove("acitvesssssss");
                });
                element1.addEventListener("click", (e) => {
                    element1.classList.add("activess");
                    travelbtn.forEach(element2 => {
                        element2.classList.remove("activess");
                    });
                    vehiclebtn.forEach(element3 => {
                        element3.classList.remove("activess");
                    });
                    childrenbtn.forEach(element4 => {
                        element4.classList.remove("activess");
                    });
                    healthbtn.forEach(element5 => {
                        element5.classList.remove("activess");
                    });

                    // data

                    personalData.forEach(datael1 => {
                        datael1.classList.add("acitvesssssss");
                    });
                    travelData.forEach(datael2 => {
                        datael2.classList.remove("acitvesssssss");
                    });
                    vehicleData.forEach(datael3 => {
                        datael3.classList.remove("acitvesssssss");
                    });
                    childrenData.forEach(datael4 => {
                        datael4.classList.remove("acitvesssssss");
                    });
                    healthData.forEach(datael5 => {
                        datael5.classList.remove("acitvesssssss");
                    });
                })
            });
            travelbtn.forEach(element1 => {
                element1.addEventListener("click", (e) => {
                    element1.classList.add("activess");
                    personalbtn.forEach(element2 => {
                        element2.classList.remove("activess");
                    });
                    vehiclebtn.forEach(element3 => {
                        element3.classList.remove("activess");
                    });
                    childrenbtn.forEach(element4 => {
                        element4.classList.remove("activess");
                    });
                    healthbtn.forEach(element5 => {
                        element5.classList.remove("activess");
                    });

                    // data

                    travelData.forEach(datael1 => {
                        datael1.classList.add("acitvesssssss");
                    });
                    personalData.forEach(datael2 => {
                        datael2.classList.remove("acitvesssssss");
                    });
                    vehicleData.forEach(datael3 => {
                        datael3.classList.remove("acitvesssssss");
                    });
                    childrenData.forEach(datael4 => {
                        datael4.classList.remove("acitvesssssss");
                    });
                    healthData.forEach(datael5 => {
                        datael5.classList.remove("acitvesssssss");
                    });
                })
            });
            vehiclebtn.forEach(element1 => {
                element1.addEventListener("click", (e) => {
                    element1.classList.add("activess");
                    personalbtn.forEach(element2 => {
                        element2.classList.remove("activess");
                    });
                    travelbtn.forEach(element3 => {
                        element3.classList.remove("activess");
                    });
                    childrenbtn.forEach(element4 => {
                        element4.classList.remove("activess");
                    });
                    healthbtn.forEach(element5 => {
                        element5.classList.remove("activess");
                    });

                    // data

                    vehicleData.forEach(datael1 => {
                        datael1.classList.add("acitvesssssss");
                    });
                    personalData.forEach(datael2 => {
                        datael2.classList.remove("acitvesssssss");
                    });
                    travelData.forEach(datael3 => {
                        datael3.classList.remove("acitvesssssss");
                    });
                    childrenData.forEach(datael4 => {
                        datael4.classList.remove("acitvesssssss");
                    });
                    healthData.forEach(datael5 => {
                        datael5.classList.remove("acitvesssssss");
                    });
                })
            });
            childrenbtn.forEach(element1 => {
                element1.addEventListener("click", (e) => {
                    element1.classList.add("activess");
                    personalbtn.forEach(element2 => {
                        element2.classList.remove("activess");
                    });
                    travelbtn.forEach(element3 => {
                        element3.classList.remove("activess");
                    });
                    vehiclebtn.forEach(element4 => {
                        element4.classList.remove("activess");
                    });
                    healthbtn.forEach(element5 => {
                        element5.classList.remove("activess");
                    });

                    // data

                    childrenData.forEach(datael1 => {
                        datael1.classList.add("acitvesssssss");
                    });
                    personalData.forEach(datael2 => {
                        datael2.classList.remove("acitvesssssss");
                    });
                    travelData.forEach(datael3 => {
                        datael3.classList.remove("acitvesssssss");
                    });
                    vehicleData.forEach(datael4 => {
                        datael4.classList.remove("acitvesssssss");
                    });
                    healthData.forEach(datael5 => {
                        datael5.classList.remove("acitvesssssss");
                    });
                })
            });
            healthbtn.forEach(element1 => {
                element1.addEventListener("click", (e) => {
                    element1.classList.add("activess");
                    personalbtn.forEach(element2 => {
                        element2.classList.remove("activess");
                    });
                    travelbtn.forEach(element3 => {
                        element3.classList.remove("activess");
                    });
                    vehiclebtn.forEach(element4 => {
                        element4.classList.remove("activess");
                    });
                    childrenbtn.forEach(element5 => {
                        element5.classList.remove("activess");
                    });

                    // data

                    healthData.forEach(datael1 => {
                        datael1.classList.add("acitvesssssss");
                    });
                    personalData.forEach(datael2 => {
                        datael2.classList.remove("acitvesssssss");
                    });
                    travelData.forEach(datael3 => {
                        datael3.classList.remove("acitvesssssss");
                    });
                    vehicleData.forEach(datael4 => {
                        datael4.classList.remove("acitvesssssss");
                    });
                    childrenData.forEach(datael5 => {
                        datael5.classList.remove("acitvesssssss");
                    });
                })

            });
        });
    });
</script>
<script>
    $(document).ready(function () {
        $('#MyTable').DataTable({
            pagingType: 'simple_numbers',
            "lengthMenu": [10, 25, 50, 75, 100],
        })
    })


</script>






<script type="text/javascript">
    $(function () {
        $("#nepali-datepicker").nepaliDatePicker({
            ndpYear: true,
            ndpMonth: true,
            ndpYearCount: 162,
            onChange: function (value, ui) {
                // console.log(value.ad);
                const AGe = document.querySelector('#age');
                const BODDD = document.querySelector('#dobssss');
                const BODDDEng = document.querySelector('#datepicker');
                let today = new Date(),
                    dob = new Date(value.ad),
                    age = new Date(today - dob).getFullYear() - 1970;
                console.log(age);
                AGe.innerHTML = age;
                age = ent_to_nepali_num_convert(''+age);
                AGe.value = age;
                BODDD.value = value.ad;
                var arr1 = value.ad.split('-');
                // console.log(arr1);
                BODDDEng.value = arr1[1]+'/'+arr1[2]+'/'+arr1[0];

            },
        });
    }); 
      
  function initializeDatePickers() {
        $( "#nepali-datepickerchild1" ).nepaliDatePicker({
            ndpYear: true,
            ndpMonth: true,
            ndpYearCount: 100,
                onChange: function(value, ui) {
                    console.log(value.ad);
                    const AGe = document.querySelector('#children_age1');
                    const BODDD = document.querySelector('#dobsssschid1');  
                    const BODDDEng = document.querySelector('#datepickerchild1');  
                    let today = new Date(),
                        dob = new Date(value.ad),
                        age = new Date(today - dob).getFullYear() - 1970;
                    console.log(age);
                    AGe.innerHTML = age;
                    age = ent_to_nepali_num_convert(''+age);
                    AGe.value = age;
                    BODDD.value = value.ad;
                    var arr1 = value.ad.split('-');
                    // console.log(arr1);
                    BODDDEng.value = arr1[1]+'/'+arr1[2]+'/'+arr1[0];

                },
            });

            $("#datepickerchild1").datepicker({
                changeMonth: true,
                changeYear: true,
                showButtonPanel: true,
                onSelect: function (value, ui) {
                    const AGe = document.querySelector('#children_age1');
                    const BODDD = document.querySelector('#dobsssschid1');
                    const BODDDNep = document.querySelector('#nepali-datepickerchild1');
                    let today = new Date(),
                        dob = new Date(value),
                        age = new Date(today - dob).getFullYear() - 1970;
                    AGe.innerHTML = age;
                    age = ent_to_nepali_num_convert(''+age);
                    AGe.value = age;
                    BODDD.value = value;

                    var arr1 = value.split('/');
                    var nep_date = NepaliFunctions.AD2BS({year: arr1[2], month: arr1[0], day: arr1[1]})
                    
                    var nep_date_converted = nep_date.year+'-'+nep_date.month+'-'+nep_date.day
                    BODDDNep.value = nep_date_converted; 
                },
                maxDate: '+0d',
                yearRange: '1920:2026',
                changeMonth: true,
                changeYear: true
            }); 
            
            //children roman
            var children_name1 = nepalify.interceptElementById("children_name1");
            var children_address1 = nepalify.interceptElementById("children_address1");
            var children_parent_name1 = nepalify.interceptElementById("children_parent_name1");
            var children_relations1 = nepalify.interceptElementById("children_relations1");
            var children_identicard_number1 = nepalify.interceptElementById("children_identicard_number1");
    };
    initializeDatePickers();
</script>
<script>
    function ent_to_nepali_num_convert(number) { 
            const eng_number = ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "+", "-"];
            const nep_number = ["०", "१", "२", "३", "४", "५", "६", "७", "८", "९", "+", "-"];
            
            let result = '';
            
            for (let i = 0; i < number.length; i++) {
                const char = number[i];
                const index = eng_number.indexOf(char);
                if (index !== -1) {
                    result += nep_number[index];
                } else {
                    result += char;
                }
            } 
            return result;
        };
    const Dateswitch = document.querySelector('#Switchsss');
    Dateswitch.addEventListener('click', (event) => {
        Dateswitch.classList.toggle("act");
        const ACT = document.querySelector('.act');
        const endate = document.querySelector('.engdatess');
        const nepdate = document.querySelector('.nepdatess');
        // endate.classList.toggle("activess") 
        // nepdate.classList.toggle("activess")   
        if (ACT) {
            endate.classList.add("activessssss")
            nepdate.classList.remove("activessssss")
        }
        else {
            endate.classList.remove("activessssss")
            nepdate.classList.add("activessssss")
        }
    });

    $("#datepicker").datepicker({
            changeMonth: true,
            changeYear: true,
            showButtonPanel: true,
            onSelect: function (value, ui) {
                var arr1 = value.split('/');
                var nep_date = NepaliFunctions.AD2BS({year: arr1[2], month: arr1[0], day: arr1[1]})
                
                var nep_date_converted = nep_date.year+'-'+nep_date.month+'-'+nep_date.day
                // console.log(nep_date_converted);
                const AGe = document.querySelector('#age');
                const BODDD = document.querySelector('#dobssss');
                const BODDDNep = document.querySelector('#nepali-datepicker');
                let today = new Date(),
                    dob = new Date(value),
                    age = new Date(today - dob).getFullYear() - 1970;
                // console.log(age);
                AGe.innerHTML = age;
                age = ent_to_nepali_num_convert(''+age);
                // console.log(age);
                AGe.value = age;
                BODDD.value = value;
                BODDDNep.value = nep_date_converted;

            },
            maxDate: '+0d',
            yearRange: '1920:2026',
            changeMonth: true,
            changeYear: true
        });

    const Dateswitchchild = document.querySelector('#Switchssschild1');
        Dateswitchchild.addEventListener('click', (event) => {
        Dateswitchchild.classList.toggle("actchild");
        let added_class = '';
        added_class = Dateswitchchild.className;
        // const ACTChILD = document.querySelector('.actchild');
        ACTChILD = false;
        if(added_class){
            ACTChILD = document.querySelector('.'+added_class);
        }
        
        // console.log(ACTChILD);
        const endatechild = document.querySelector('#datepickerchild1');
        const nepdatechild = document.querySelector('#nepali-datepickerchild1');
        if (ACTChILD) {
            endatechild.classList.add("activessssss")
            nepdatechild.classList.remove("activessssss")
        }
        else {
            endatechild.classList.remove("activessssss")
            nepdatechild.classList.add("activessssss")
        }
    }); 

    //   webcam
    function configure() {
        Webcam.set({
            width: 440,
            height: 260,
            image_format: 'png',
            jpeg_quailaty: 90
        });
        Webcam.attach('#my_camera');
    }
    function Camera_open() {
        const camera = document.querySelector('#camera_open');
        const Resultsss = document.querySelector('#results');
        Resultsss.style.display = "none";
        camera.addEventListener('click', (event) => {
            event.preventDefault();
            const cameraBox = document.querySelector('.CameraBox');
            cameraBox.style.display = "block";
            configure();

        })
    }
    function captureSnap() {
        const Resultsss = document.querySelector('#results');
        Resultsss.style.display = "block";
        Webcam.snap(function (data_uri) {
            const Result = document.getElementById('Capture_image');
            const viewImage = document.getElementById('viewImage');
            Result.innerHTML = '<img id = "webcam" src = "' + data_uri + '">';
            viewImage.innerHTML = '<img id = "webcam" src = "' + data_uri + '">';
            $("#captured_image_data").val(data_uri);
        });
        // Webcam.reset();
    }
    function webcamClose() {
        Webcam.reset();
        const cameraBox = document.querySelector('.CameraBox');
        const Resultsss = document.querySelector('#results');
        const viewimage = document.querySelector('#viewImage');
        Resultsss.style.display = "none";
        cameraBox.style.display = "none";
        viewimage.style.display = "none";
    }

    function saveSnap() {
        var base64data = $("#captured_image_data").val();
        $.ajax({
            type: "POST",
            // dataType: "json",
            url: "<?php echo base_url(); ?>dataentryform/admin/saveSnaps/",
            data: { image: base64data },
            success: function (data) {
                // alert("Saved");
                $("#captured_image").val(data);
                Webcam.reset();
                const cameraBox = document.querySelector('.CameraBox');
                const Resultsss = document.querySelector('#results');
                const viewimage = document.querySelector('#viewImage');
                Resultsss.style.display = "none";
                cameraBox.style.display = "none";
                viewimage.style.display = "block";
                Toastify({

                    text: 'Snap Saved',

                    duration: 6000,

                    style: {
                        background: "linear-gradient(to right, red, yellow)",
                    }

                }).showToast();
            }
        })


    } 

</script>