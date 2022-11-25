<?php

	function tmail_body(string $user, int $amount, string $method, string $tnxid, string $date) : string {
		$body = '
		<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css"/>
		<!--<![endif]-->
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
		<table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-1" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #ffffff;" width="100%">
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
		<div align="center" style="line-height:10px"><img class="big" src="https://coretiflex.com/coretiflex/images/logo/invest.png" style="display: block; height: auto; border: 0; width: 500px; max-width: 100%;" width="500"/></div>
		</td>
		</tr>
		</table>
		<table border="0" cellpadding="0" cellspacing="0" class="text_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
		<tr>
		<td style="padding-top:40px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
		<div style="font-family: `Trebuchet MS`, Tahoma, sans-serif">
		<div style="font-size: 12px; font-family: `Montserrat`, `Trebuchet MS`, `Lucida Grande`, `Lucida Sans Unicode`, `Lucida Sans`, Tahoma, sans-serif; mso-line-height-alt: 14.399999999999999px; color: #002e9a; line-height: 1.2;">
		<p style="margin: 0; font-size: 12px; text-align: center;"><strong><span style="font-size:26px; color: #a4c639;">Proof Of Payment</span></strong></p>
		</div>
		</div>
		</td>
		</tr>
		</table>
		<table border="0" cellpadding="10" cellspacing="0" class="text_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
		<tr>
		<td>
		<div style="font-family: sans-serif">
		<div style="font-size: 12px; mso-line-height-alt: 21.6px; color: #393d47; line-height: 1.8; font-family: Arial, Helvetica Neue, Helvetica, sans-serif;">
		<ul style="list-style-type: square; line-height: 180%;">
		<li><span style="font-size:14px;">User: '.$user.'</span></li>
		<li><span style="font-size:14px;">Amount: '.$amount.'</span></li>
		<li><span style="font-size:14px;">Transaction method: '.$method.'</span></li>
		<li><span style="font-size:14px;">Transaction Id: '.$tnxid.'</span></li>
		<li><span style="font-size:14px;">Date: '.$date.'</span></li>
		</ul>
		</div>
		</div>
		</td>
		</tr>
		</table>
		<table border="0" cellpadding="10" cellspacing="0" class="text_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
		<tr>
		<td>
		<div style="font-family: sans-serif">
		<div style="font-size: 12px; mso-line-height-alt: 14.399999999999999px; color: #393d47; line-height: 1.2; font-family: Arial, Helvetica Neue, Helvetica, sans-serif;">
		<p style="margin: 0; font-size: 12px;">Thank you for choosing Coretiflex Enterprise</p>
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
		<table border="0" cellpadding="10" cellspacing="0" class="text_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
		<tr>
		<td>
		<div style="font-family: sans-serif">
		<div style="color: #C0C0C0; font-size: 12px; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 14.399999999999999px; line-height: 1.2;">
		<p style="margin: 0; font-size: 12px; text-align: center;">Copyright © 2021 Coretiflex, All rights reserved.</p>
		<p style="margin: 0; font-size: 12px; text-align: center; mso-line-height-alt: 14.399999999999999px;"> </p>
		<p style="margin: 0; font-size: 12px; text-align: center;"><span style="">Where to find us:</span><br/>Interlaken, Switzerland</p>
		<p style="margin: 0; font-size: 12px; text-align: center; mso-line-height-alt: 14.399999999999999px;"> </p>
		</div>
		</div>
		</td>
		</tr>
		</table>
		<table border="0" cellpadding="0" cellspacing="0" class="html_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
		<tr>
		<td>
		<div align="center" style="font-family:Arial, Helvetica Neue, Helvetica, sans-serif;"><div height="40"> </div></div>
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
		</tbody>
		<span style="display: none"><?= $random_int(0, 100); ?></span>
		</table><!-- End -->
		</body>';

		return $body;
	}


	function activation(string $user1, string $amount1, string $pname1, string $tnxid1, string $date1, string $user, int $amount, string $pname, string $tnxid, string $date, string $extra) : string {
		$body = '
		<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css"/>
		<!--<![endif]-->
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
		<table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-1" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #ffffff;" width="100%">
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
		<div align="center" style="line-height:10px"><img class="big" src="https://coretiflex.com/coretiflex/images/logo/invest.png" style="display: block; height: auto; border: 0; width: 500px; max-width: 100%;" width="500"/></div>
		</td>
		</tr>
		</table>
		<table border="0" cellpadding="0" cellspacing="0" class="text_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
		<tr>
		<td style="padding-top:40px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
		<div style="font-family: `Trebuchet MS`, Tahoma, sans-serif">
		<div style="font-size: 12px; font-family: `Montserrat`, `Trebuchet MS`, `Lucida Grande`, `Lucida Sans Unicode`, `Lucida Sans`, Tahoma, sans-serif; mso-line-height-alt: 14.399999999999999px; color: #002e9a; line-height: 1.2;">
		<p style="margin: 0; font-size: 12px; text-align: center;"><strong><span style="font-size:26px; color: #a4c639;">Activity Details</span></strong></p>
		</div>
		</div>
		</td>
		</tr>
		</table>
		<table border="0" cellpadding="10" cellspacing="0" class="text_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
		<tr>
		<td>
		<div style="font-family: sans-serif">
		<div style="font-size: 12px; mso-line-height-alt: 21.6px; color: #393d47; line-height: 1.8; font-family: Arial, Helvetica Neue, Helvetica, sans-serif;">
		<ul style="list-style-type: square; line-height: 180%;">
		<li><span style="font-size:14px;">'.$user1.': '.$user.'</span></li>
		<li><span style="font-size:14px;">'.$amount1.': '.$amount.'</span></li>
		<li><span style="font-size:14px;">'.$pname1.': '.$pname.'</span></li>
		<li><span style="font-size:14px;">'.$tnxid1.': '.$tnxid.'</span></li>
		<li><span style="font-size:14px;">'.$date1.': '.$date.'</span></li>
		'.$extra.'
		</ul>
		</div>
		</div>
		</td>
		</tr>
		</table>
		<table border="0" cellpadding="10" cellspacing="0" class="text_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
		<tr>
		<td>
		<div style="font-family: sans-serif">
		<div style="font-size: 12px; mso-line-height-alt: 14.399999999999999px; color: #393d47; line-height: 1.2; font-family: Arial, Helvetica Neue, Helvetica, sans-serif;">
		<p style="margin: 0; font-size: 12px;">Thank you for choosing Coretiflex Enterprise</p>
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
		<table border="0" cellpadding="10" cellspacing="0" class="text_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
		<tr>
		<td>
		<div style="font-family: sans-serif">
		<div style="color: #C0C0C0; font-size: 12px; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 14.399999999999999px; line-height: 1.2;">
		<p style="margin: 0; font-size: 12px; text-align: center;">Copyright © 2021 Coretiflex, All rights reserved.</p>
		<p style="margin: 0; font-size: 12px; text-align: center; mso-line-height-alt: 14.399999999999999px;"> </p>
		<p style="margin: 0; font-size: 12px; text-align: center;"><span style="">Where to find us:</span><br/>Interlaken, Switzerland</p>
		<p style="margin: 0; font-size: 12px; text-align: center; mso-line-height-alt: 14.399999999999999px;"> </p>
		</div>
		</div>
		</td>
		</tr>
		</table>
		<table border="0" cellpadding="0" cellspacing="0" class="html_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
		<tr>
		<td>
		<div align="center" style="font-family:Arial, Helvetica Neue, Helvetica, sans-serif;"><div height="40"> </div></div>
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
		</tbody>
		<span style="display: none"><?= $random_int(0, 100); ?></span>
		</table><!-- End -->
		</body>';

		return $body;
	}
?>