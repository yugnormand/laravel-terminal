<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Terminal</title>
</head>

<body>
    <style>
        .terminal {
            background: black;
            color: white;
            font-family: 'Courier New', monospace;
            padding: 10px;
            height: 100px;
            overflow: hidden;
        }

        .line {
            display: table;
            width: 100%;
        }

        .terminal span {
            display: table-cell;
            width: 1px;
        }

        .terminal input {
            display: table-cell;
            width: 100%;
            border: none;
            background: black;
            color: white;
            outline: none;
        }
    </style>
    <div class="container pt-5">
        <div class="row">
            <div class="col-12">
                <!-- Content wrapper start -->
                <div class="content-wrapper">
                    <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">
                    <h1 style="color: green">Terminal artisan command</h1>
                    <p style="color: green"> Pour entrer une commande artisan, exemple:<strong>php artisan
                            config:clear</strong> entrez juste <strong
                            style="color: green; font-style:italic">config:clear</strong></p>
                    <div class="terminal mt-5" style="overflow-y: scroll; ">
                        <div id="history" style="color: green">

                        </div>

                        <div class="line">
                            <span id="path" style="color:green">root:/></span>
                            <input type="text" id="input">
                        </div>
                    </div>
                </div>
                <!-- Content wrapper end -->
            </div>
        </div>
    </div>
    <div class="align-content-center justify-content-center text-center mt-5">
        <p>Copyright © <a href="http://www.todocoding.fr">ToDoCoding</a> <?php echo date('Y'); ?></p>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script>
        $(function() {
            $('.terminal').on('click', function() {
                $('#input').focus();
            });

            $('#input').on('keydown', function search(e) {
                if (e.keyCode == 13) {
                    // append your output to the history,
                    // here I just append the input
                    $('#history').append('<br/>root:/>php artisan ' + $(this).val() + '<br/>');

                    // you can change the path if you want
                    // crappy implementation here, but you get the idea
                    if ($(this).val().substring(0, 3) === 'cd ') {
                        $('#path').html($(this).val().substring(3) + '&nbsp;>&nbsp;');
                    }
                    var command = $(this).val();
                    $.ajax({
                        url: "/terminalpost",
                        method: "POST",
                        data: {
                            "_token": $('#csrf-token')[0].content,
                            command: command,
                        },
                        success: function(data) {
                            //$('#filtretask').html(data.html);
                            $('#history').append(data.html);
                            console.log(data);
                        }
                    });

                    if ($(this).val() === 'clear') {
                        $('#history').empty();
                    }

                    // clear the input
                    $('#input').val('');

                }
            });
        });
    </script>
</body>

</html>
