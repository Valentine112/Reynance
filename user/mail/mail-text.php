<?php

    function email_body() : string {
        $body = '
            <style>
                * {
                    box-sizing: border-box;
                }

                body {
                    margin: 0;
                    padding: 0;
                }

                a[x-apple-data-detectors] {
                    color: inherit !important;
                    text-decoration: inherit !important;
                }

                #MessageViewBody a {
                    color: inherit;
                    text-decoration: none;
                }

                p {
                    line-height: inherit
                }

                @media (max-width:520px) {
                    .row-content {
                        width: 100% !important;
                    }

                    .image_block img.big {
                        width: auto !important;
                    }

                    .stack .column {
                        width: 100%;
                        display: block;
                    }
                }
            </style>
            </head>
            <body style="background-color: #FFFFFF; margin: 0; padding: 0; -webkit-text-size-adjust: none; text-size-adjust: none;">
            <table border="0" cellpadding="0" cellspacing="0" class="nl-container" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #FFFFFF;" width="100%">
            <tbody>
            <tr>
            <td>
            <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-1" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
            <tbody>
            <tr>
            <td>
            <table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 500px;" width="500">
            <tbody>
            <tr>
            <td class="column" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 5px; padding-bottom: 5px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="100%">
            <table border="0" cellpadding="0" cellspacing="0" class="image_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
            <tr>
            <td style="width:100%;padding-right:0px;padding-left:0px;">
            <div align="center" style="line-height:10px"><img class="big" src="images/Invest.jpeg" style="display: block; height: auto; border: 0; width: 500px; max-width: 100%;" width="500"/></div>
            </td>
            </tr>
            </table>
            </td>
            </tr>
            </tbody>
            </table>
            </td>
            </tr>
            </tbody>
            </table>
            <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-2" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
            <tbody>
            <tr>
            <td>
            <table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 500px;" width="500">
            <tbody>
            <tr>
            <td class="column" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 5px; padding-bottom: 5px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="100%">
            <table border="0" cellpadding="10" cellspacing="0" class="text_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
            <tr>
            <td>
            <div style="font-family: `Trebuchet MS`, Tahoma, sans-serif">
            <div style="font-size: 12px; font-family: `Trebuchet MS`, `Lucida Grande`, `Lucida Sans Unicode`, `Lucida Sans`, Tahoma, sans-serif; mso-line-height-alt: 14.399999999999999px; color: #2d92cc; line-height: 1.2;">
            <p style="margin: 0; font-size: 12px; text-align: center;"><span style="font-size:28px;"><strong>Coretiflex</strong></span></p>
            </div>
            </div>
            </td>
            </tr>
            </table>
            <table border="0" cellpadding="10" cellspacing="0" class="text_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
            <tr>
            <td>
            <div style="font-family: sans-serif">
            <div style="font-size: 14px; mso-line-height-alt: 16.8px; color: #393d47; line-height: 1.2; font-family: Arial, Helvetica Neue, Helvetica, sans-serif;">
            <p style="margin: 0; font-size: 16px;">Hi there,</p>
            <p style="margin: 0; font-size: 16px; mso-line-height-alt: 16.8px;"> </p>
            <p style="margin: 0; font-size: 16px;">Thanks for signing up to Coretiflex. From now on you are part of the family and we promise that you would not regret joining us after we spoil you with our special packages that to help boost your income and make you a professional investor.</p>
            <p style="margin: 0; font-size: 16px; mso-line-height-alt: 16.8px;"> </p>
            <p style="margin: 0; font-size: 16px;">Not to keep you waiting, why don`t i just let you dive in? I hope you enjoy your stay.</p>
            <p style="margin: 0; font-size: 16px; mso-line-height-alt: 16.8px;"> </p>
            <p style="margin: 0; font-size: 16px;">Welcome</p>
            </div>
            </div>
            </td>
            </tr>
            </table>
            </td>
            </tr>
            </tbody>
            </table>
            </td>
            </tr>
            </tbody>
            </table>
            <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-3" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
            <tbody>
            <tr>
            <td>
            <table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 500px;" width="500">
            <tbody>
            <tr>
            <td class="column" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 5px; padding-bottom: 5px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="100%">
            <table border="0" cellpadding="10" cellspacing="0" class="text_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
            <tr>
            <td>
            <div style="font-family: sans-serif">
            <div style="font-size: 12px; mso-line-height-alt: 14.399999999999999px; color: #8a8d8d; line-height: 1.2; font-family: Arial, Helvetica Neue, Helvetica, sans-serif;">
            <p style="margin: 0; font-size: 12px; text-align: center;">copyright 2021 Coretiflex</p>
            </div>
            </div>
            </td>
            </tr>
            </table>
            </td>
            </tr>
            </tbody>
            </table>
            </td>
            </tr>
            </tbody>
            </table>
            </td>
            </tr>
            <span style="display: none"><?= $random_int(0, 100); ?></span>
            </tbody>
            </table><!-- End -->
            </body>
            </html>
        ';
        return $body;
    }

    function forgot_email(string $token) : string {
        $body = '
            <style>
                * {
                    box-sizing: border-box;
                }

                body {
                    margin: 0;
                    padding: 0;
                }

                a[x-apple-data-detectors] {
                    color: inherit !important;
                    text-decoration: inherit !important;
                }

                #MessageViewBody a {
                    color: inherit;
                    text-decoration: none;
                }

                p {
                    line-height: inherit
                }

                @media (max-width:520px) {
                    .row-content {
                        width: 100% !important;
                    }

                    .image_block img.big {
                        width: auto !important;
                    }

                    .stack .column {
                        width: 100%;
                        display: block;
                    }
                }
            </style>
            </head>
            <body style="background-color: #FFFFFF; margin: 0; padding: 0; -webkit-text-size-adjust: none; text-size-adjust: none;">
            <table border="0" cellpadding="0" cellspacing="0" class="nl-container" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #FFFFFF;" width="100%">
            <tbody>
            <tr>
            <td>
            <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-1" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
            <tbody>
            <tr>
            <td>
            <table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 500px;" width="500">
            <tbody>
            <tr>
            <td class="column" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 5px; padding-bottom: 5px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="100%">
            <table border="0" cellpadding="0" cellspacing="0" class="image_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
            <tr>
            <td style="width:100%;padding-right:0px;padding-left:0px;">
            <div align="center" style="line-height:10px"><img class="big" src="images/Invest.jpeg" style="display: block; height: auto; border: 0; width: 500px; max-width: 100%;" width="500"/></div>
            </td>
            </tr>
            </table>
            </td>
            </tr>
            </tbody>
            </table>
            </td>
            </tr>
            </tbody>
            </table>
            <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-2" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
            <tbody>
            <tr>
            <td>
            <table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 500px;" width="500">
            <tbody>
            <tr>
            <td class="column" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 5px; padding-bottom: 5px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="100%">
            <table border="0" cellpadding="10" cellspacing="0" class="text_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
            <tr>
            <td>
            <div style="font-family: `Trebuchet MS`, Tahoma, sans-serif">
            <div style="font-size: 12px; font-family: `Trebuchet MS`, `Lucida Grande`, `Lucida Sans Unicode`, `Lucida Sans`, Tahoma, sans-serif; mso-line-height-alt: 14.399999999999999px; color: #2d92cc; line-height: 1.2;">
            <p style="margin: 0; font-size: 12px; text-align: center;"><span style="font-size:28px;"><strong>Coretiflex</strong></span></p>
            </div>
            </div>
            </td>
            </tr>
            </table>
            <table border="0" cellpadding="10" cellspacing="0" class="text_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
            <tr>
            <td>
            <div style="font-family: sans-serif">
            <div style="font-size: 14px; mso-line-height-alt: 16.8px; color: #393d47; line-height: 1.2; font-family: Arial, Helvetica Neue, Helvetica, sans-serif;">
            <p style="margin: 0; font-size: 16px;">Hi there,</p>
            <p style="margin: 0; font-size: 16px; mso-line-height-alt: 16.8px;"> </p>
            <p style="margin: 0; font-size: 16px;">Please follow this link to <a href="https://Coretiflex.com/new-pass.php?'.$token.'">change your password</a></p>
            <p style="margin: 0; font-size: 16px; mso-line-height-alt: 16.8px;"> </p>
            <p style="margin: 0; font-size: 16px;"><b>NOTE</b>, if you did not request for this, kindly login to your account and change your password</p>
            <p style="margin: 0; font-size: 16px; mso-line-height-alt: 16.8px;"> </p>
            <p style="margin: 0; font-size: 16px;">Welcome</p>
            </div>
            </div>
            </td>
            </tr>
            </table>
            </td>
            </tr>
            </tbody>
            </table>
            </td>
            </tr>
            </tbody>
            </table>
            <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-3" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
            <tbody>
            <tr>
            <td>
            <table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 500px;" width="500">
            <tbody>
            <tr>
            <td class="column" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 5px; padding-bottom: 5px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="100%">
            <table border="0" cellpadding="10" cellspacing="0" class="text_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
            <tr>
            <td>
            <div style="font-family: sans-serif">
            <div style="font-size: 12px; mso-line-height-alt: 14.399999999999999px; color: #8a8d8d; line-height: 1.2; font-family: Arial, Helvetica Neue, Helvetica, sans-serif;">
            <p style="margin: 0; font-size: 12px; text-align: center;">copyright 2021 Coretiflex</p>
            </div>
            </div>
            </td>
            </tr>
            </table>
            </td>
            </tr>
            </tbody>
            </table>
            </td>
            </tr>
            </tbody>
            </table>
            </td>
            </tr>
            <span style="display: none"><?= $random_int(0, 100); ?></span>
            </tbody>
            </table><!-- End -->
            </body>
            </html>
        ';
        return $body;
    }

?>