<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sample PDF</title>
    <style>
        @font-face {
            font-family: 'Preeti';
            src: url('/../../../../assets/webfonts/nepali/Preeti.otf') format('truetype');
        }
        body {
            font-family: Arial, sans-serif;
        }
        h1 {
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1><?php echo $person_detail->name?$person_detail->name:'' ?></h1>
    <img src="https://clients.babal.host/templates/lagom2/assets/img/logo/logo_big.1896803989.png" alt="Logo">
    <p>This is a sample PDF document created using Dompdf in CodeIgniter.</p>
    <div class="box-body">
                    <table class="table table-bordered" id="MyTable">
                        <thead>
                            <tr>
                                <th>क्र. स.</th>
                                <th>यात्रा प्रारम्भ गरेको मुलुक</th>
                                <th>प्रवेश बिन्दू</th>
                                <th>प्रवेश समय</th>
                                <th>यात्रा गन्तब्य </th>
                                <th>यात्राको अबधि </th>
                                <th>दिशा तर्फ</th>
                                <th>यात्रा को उदेश्य</th>
                                <th>यात्राको किसिम</th>
                                <th>बालबालिका</th>
                                <th>फर्केको हो?</th>
                                <th>कार्य</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($travel_lit) { 
                            foreach ($travel_lit as $key => $value) {  
                            ?>
                            <tr>
                                <td><?php echo ($key+1); ?></td>
                                <td data-toggle="modal" data-target="#ViewData<?php echo $value->id; ?>"><?php echo $value->travel_start_country; ?></td>
                                <td data-toggle="modal" data-target="#ViewData<?php echo $value->id; ?>"><?php echo $value->entry_adress; ?></td>
                                <td data-toggle="modal" data-target="#ViewData<?php echo $value->id; ?>"><?php echo $value->entry_time; ?></td>
                                <td data-toggle="modal" data-target="#ViewData<?php echo $value->id; ?>"><?php echo $value->travel_destination; ?></td>
                                <td data-toggle="modal" data-target="#ViewData<?php echo $value->id; ?>"><?php echo $value->travel_deuration; ?></td>
                                <td data-toggle="modal" data-target="#ViewData<?php echo $value->id; ?>"><?php echo $value->gone_dirction; ?></td>
                                <td data-toggle="modal" data-target="#ViewData<?php echo $value->id; ?>"><?php echo $value->travel_porpose; ?></td>
                                <td data-toggle="modal" data-target="#ViewData<?php echo $value->id; ?>"><?php echo $value->travel_type; ?></td>
                                <td data-toggle="modal" data-target="#ViewData<?php echo $value->id; ?>"><?php echo $value->childrens_list?count($value->childrens_list):0; ?></td>
                                <td data-toggle="modal" data-target="#ViewData<?php echo $value->id; ?>"><?php echo ($value->is_returned && $value->is_returned == 1)?'हो':'होइन'; ?></td> 
                            </tr>
                            <?php } }?>
                        </tbody>
                    </table> 
                </div>
</body>
</html>
