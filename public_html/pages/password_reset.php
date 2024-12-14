<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>Reset Password</title>
    <style>
        body {
            background-color: #002855; /* Dark blue background color */
            background-image: url('Logo pkm2.png'); /* You can add an image here */
            background-size: 70%; /* Reduce the background image size to 70% */
            
            background-attachment: fixed;
            background-position: center;
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            padding-top: 35px;
        }

        .reset-box {
            background-color: rgba(255, 255, 255, 0.6); /* Semi-transparent white background */
            padding: 20px;
            border-radius: 10px;
            text-align: center;
        }

        h1 {
            font-size: 28px;
            font-weight: bold;
            color: #333;
        }

        .btn-primary {
            background-color: #4e73df;
            border-color: #4e73df;
        }

        .btn-primary:hover {
            background-color: #2e59d9;
            border-color: #2e59d9;
        }

        .sign-up-link {
            text-align: center;
            margin-top: 20px;
        }

        .sign-up-link a {
            color: #fff;
        }

        .sign-up-link a:hover {
            color: #f8f9fc;
        }
    </style>
</head>
<body class="bg-gradient-primary">
    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5 reset-box">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Reset Password</h1>
                            </div>
                            <!-- Your reset password form can be added here if needed -->

                            <!-- Example message -->
                            <?php
                            $output = '';
                            $input = '';
                            $no_wa = '+6281267930086';
                            ?>

                            <?php echo $output ?>

                            <p style="color: #333;">Jika Anda lupa kata sandi, silakan hubungi kami via WhatsApp untuk bantuan:</p>
                            <a href="https://wa.me/<?php echo $no_wa ?>?text=Saya Lupa Password" target="_blank" style="color: #333;">Hubungi Kami via WhatsApp</a>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
