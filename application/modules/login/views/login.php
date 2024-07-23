<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $site_settings->short_name; ?></title>

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugin/css/bootstrap.min.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugin/css/font-awesome.min.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugin/css/ionicons.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugin/css/AdminLTE.min.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugin/css/blue.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">


    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"> 
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="<?php echo  base_url('login'); ?>"><img width="100px" src="<?php echo base_url();?>/uploads/<?php echo  $site_settings->logo ?>" alt=""></a>

        </div>

        <div class="login-box-body">
            <h2 class="login-box-msg"><b><?php echo $site_settings->short_name; ?></b></h2>
            <!-- <p><?php echo $site_settings->address; ?></p> -->

            <form action="" method="post">
                <div class="form-group has-feedback">
                    <input type="text" name="username" class="form-control" id="unique-input-1" placeholder="Username"
                        value="<?php echo set_value('username'); ?>">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    <?php echo form_error('username'); ?>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" name="password" class="form-control" placeholder="Password"
                        value="<?php echo set_value('password'); ?>">
                    <span class="fa fa-lock form-control-feedback"></span>
                    <?php echo form_error('password'); ?>
                </div>
                <div class="row">
                    <!-- <div class="col-xs-8">
                        <div class="checkbox icheck">
                            <label>
                                <input type="checkbox"> Remember Me
                            </label>
                        </div>
                    </div> -->

                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary logiii btn-block btn-flat">Log In</button>
                    </div>

                </div>
            </form>

            <!-- <a href="#">I forgot my password</a><br>
            <a href="register.html" class="text-center">Register a new membership</a> -->
        </div>

    </div>


    <script src="<?php echo base_url(); ?>assets/plugin/js/jquery.min.js"></script>

    <script src="<?php echo base_url(); ?>assets/plugin/js//bootstrap.min.js"></script>

    <script src="<?php echo base_url(); ?>assets/plugin/js/icheck.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugin/js/notify.js"></script>

    <!-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            const textInput = document.getElementById('textInput');

            const nepaliMap = {
                            //for small letter 
                            'a': 'ब', 'b': 'द', 'c': 'अ', 'd': 'म', 'e': 'भ', 'f': 'ा', 'g': 'न', 'h': 'ज',
                            'i': 'ष', 'j': 'न', 'k': 'प', 'l': 'ग', 'm': 'थ', 'n': 'त', 'o': 'च', 'p': 'ट', 
                            'q': 'ष', 'r': 'य', 's': 'व', 't': 'ल', 'u': 'ग', 'v': 'ख', 'w': 'घ', 'x': 'श',
                            'y': 'फ', 'z': 'श',
                            //for capital letter
                            'A': 'ब्', 'B': 'द्य', 'C': 'ऋ', 'D': 'म्', 'E': 'भ्', 'F': 'ँ', 'G': 'न्', 'H': 'ज्', 
                            'I': ' क्ष् ', 'J': ' व् ', 'K': ' प् ', 'L': ' ी ', 'M': ' ः ', 'N': ' ल् ', 'O': ' इ ', 'P': ' ए ', 
                            'Q': ' त्त ', 'R': ' च् ', 'S': ' क् ', 'T': ' त् ', 'U': ' ग् ', 'V': ' ख् ', 'W': ' ध् ', 'X': ' ह् ', 
                            'Y': ' थ् ', 'Z': ' श्',
                            //numbers
                            '1': ' ज्ञ', '2': ' द्द ', '3': 'घ', '4': ' द्ध', '5': 'छ', '6': 'ट', '7': 'ठ', '8': 'ड',
                            '9': 'ढ', '0': 'ण',

                            //special characteres
                            '~': '',
                            '`': '',
                            '!': '',
                            '@': '',
                            '#': '',
                            '$': '',
                            '%': '',
                            '^': '',
                            '&': '',
                            '*': '',
                            '(': '',
                            ')': '',
                            '_': '',
                            '-': '',
                            '+': '',
                            '=': '',
                            '|': '', 
                            '\\': '्',
                            '}': '',
                            ']': 'े',
                            '{': '',
                            '[': '',
                            '"': 'ू',
                            "'": 'ु',
                            ':': '',
                            ';': '',
                            '?': '',
                            '/': 'र',
                            '>': '',
                            '.': '',
                            '<': '', 
                            ',': '',  
                        };

            const nepaliAltMap = {
                '0170': 'ङ', 
            };

            let numberSequence = '';
            let altPressed = false;

            textInput.addEventListener('keydown', function(event) {
                if (event.altKey) {
                    altPressed = true;

                    if (!isNaN(event.key) && event.key !== ' ') {
                        numberSequence += event.key;
                        event.preventDefault(); // Prevent default behavior for numbers
                    }

                    // Check for Enter key and process the number sequence
                    if (event.key === 'Enter') {
                        if (nepaliAltMap.hasOwnProperty(numberSequence)) {
                            const nepaliChar = nepaliAltMap[numberSequence];
                            insertCharacterAtCursor(textInput, nepaliChar);
                        }
                        numberSequence = '';
                        event.preventDefault(); // Prevent default behavior for Enter
                    }
                } else {
                    altPressed = false;
                    numberSequence = '';
                    const key = event.key.toLowerCase();
                    if (nepaliMap.hasOwnProperty(key)) {
                        event.preventDefault(); // Prevent default behavior for mapped keys
                        const nepaliChar = nepaliMap[key];
                        insertCharacterAtCursor(textInput, nepaliChar);
                    }
                }
            });

            textInput.addEventListener('keyup', function(event) {
                if (event.key === 'Alt') {
                    altPressed = false;
                    numberSequence = '';
                }
            });

            function insertCharacterAtCursor(input, char) {
                const start = input.selectionStart;
                const end = input.selectionEnd;
                const text = input.value;
                input.value = text.slice(0, start) + char + text.slice(end);
                input.setSelectionRange(start + char.length, start + char.length);
            }
        });
    </script> -->
    <!-- <script>
        const preetiMap = {
            //for small letter 
            'a': 'ब', 'b': 'द', 'c': 'अ', 'd': 'म', 'e': 'भ', 'f': 'ा', 'g': 'न', 'h': 'ज',
            'i': 'ष', 'j': 'न', 'k': 'प', 'l': 'ग', 'm': 'थ', 'n': 'त', 'o': 'च', 'p': 'ट', 
            'q': 'ष', 'r': 'य', 's': 'व', 't': 'ल', 'u': 'ग', 'v': 'ख', 'w': 'घ', 'x': 'श',
            'y': 'फ', 'z': 'श',
            //for capital letter
            'A': 'ब्', 'B': 'द्य', 'C': 'ऋ', 'D': 'म्', 'E': 'भ्', 'F': 'ँ', 'G': 'न्', 'H': 'ज्', 
            'I': ' क्ष् ', 'J': ' व् ', 'K': ' प् ', 'L': ' ी ', 'M': ' ः ', 'N': ' ल् ', 'O': ' इ ', 'P': ' ए ', 
            'Q': ' त्त ', 'R': ' च् ', 'S': ' क् ', 'T': ' त् ', 'U': ' ग् ', 'V': ' ख् ', 'W': ' ध् ', 'X': ' ह् ', 
            'Y': ' थ् ', 'Z': ' श्',
            //numbers
            '1': ' ज्ञ', '2': ' द्द ', '3': 'घ', '4': ' द्ध', '5': 'छ', '6': 'ट', '7': 'ठ', '8': 'ड',
            '9': 'ढ', '0': 'ण',

            //special characteres
            '~': '',
            '`': '',
            '!': '',
            '@': '',
            '#': '',
            '$': '',
            '%': '',
            '^': '',
            '&': '',
            '*': '',
            '(': '',
            ')': '',
            '_': '',
            '-': '',
            '+': '',
            '=': '',
            '|': '', 
            '\\': '्',
            '}': '',
            ']': 'े',
            '{': '',
            '[': '',
            '"': 'ू',
            "'": 'ु',
            ':': '',
            ';': '',
            '?': '',
            '/': 'र',
            '>': '',
            '.': '',
            '<': '', 
            ',': '',  
        };

        const nepaliAltMap = {
                'a': 'अल्ट123',
                '1234': 'अल्ट1234',
                // Add more mappings for Alt+Number combinations as needed
            };

        document.addEventListener('DOMContentLoaded', (event) => {
            const preetiInput = document.getElementById('preetiInput');
            

            preetiInput.addEventListener('keydown', function (e) { 
                e.preventDefault();
                if (e.altKey){
                    e.preventDefault();
                    // alert('hi');
                    console.log(e);
                    if (nepaliAltMap[e.key]) {
                        alert(nepaliAltMap[e.key]);
                        e.preventDefault();
                        preetiInput.value += nepaliAltMap[e.key];
                    }
                }else{
                    if (preetiMap[e.key]) {
                        e.preventDefault();
                        preetiInput.value += preetiMap[e.key];
                    }
                } 
            });
        });
    </script> -->
    <!-- <script src="https://unpkg.com/nepalify@0.5.0/umd/nepalify.production.min.js"></script> -->
    <script>
        // console.log(nepalify.availableLayouts());
        // var inputEl = nepalify.interceptElementById("unique-input-1");
        // // console.log('raj',inputEl);
        // // var textareaEl = nepalify.interceptElementById("unique-textarea-1");

        // // Further options can be provided as a second argument
        // // const options = {
        // // layout: "traditional",
        // // enable: false,
        // // };
        // // nepalify.interceptElementById("unique-input-2", options);

        // // When the options are not provided, the following defaults are used
        // const defaultOptions = {
        // layout: "romanized",
        // enable: true,
        // };
    $(function() {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' /* optional */
        });

    });
    </script>
    <?php if($this->session->flashdata('error')){ ?>
    <script>
    $.notify("<?php echo $this->session->flashdata('error'); ?>", {
        color: "#fff",
        background: "#D44950",
        close: true
    });
    </script>
    <?php }else{ ?>
    <script>
    $.notify("<?php echo $this->session->flashdata('success'); ?>", {
        color: "#fff",
        background: "#4B7EE0",
        close: true
    });
    </script>
    <?php } ?>
</body>

</html>