<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!function_exists('header_email_reset_password')) {
	function header_email_reset_password()
	{
		return `<!DOCTYPE html>
			<html lang="en" xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:v="urn:schemas-microsoft-com:vml">
			<head>
			<title></title>
			<meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
			<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
			<style type="text/css">
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

					.desktop_hide,
					.desktop_hide table {
						mso-hide: all;
						display: none;
						max-height: 0px;
						overflow: hidden;
					}

					@media (max-width:620px) {

						.desktop_hide table.icons-inner,
						.social_block.desktop_hide .social-table {
							display: inline-block !important;
						}

						.icons-inner {
							text-align: center;
						}

						.icons-inner td {
							margin: 0 auto;
						}

						.row-content {
							width: 100% !important;
						}

						.mobile_hide {
							display: none;
						}

						.stack .column {
							width: 100%;
							display: block;
						}

						.mobile_hide {
							min-height: 0;
							max-height: 0;
							max-width: 0;
							overflow: hidden;
							font-size: 0px;
						}

						.desktop_hide,
						.desktop_hide table {
							display: table !important;
							max-height: none !important;
						}
					}
				</style>
			</head>
			<body style="margin: 0; background-color: #eee; padding: 0; -webkit-text-size-adjust: none; text-size-adjust: none;">
			<table border="0" cellpadding="0" cellspacing="0" class="nl-container" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #eee; margin-top: 20px" width="100%">
			<tbody>
			<tr>
			<td>
			<table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-1" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #eee; background-position: center top; background-repeat: repeat;" width="100%">
			<tbody>
			<tr>
			<td>
			<table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 600px;" width="600">
			<tbody>
			<tr>
			<td class="column column-1" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; padding-left: 10px; padding-right: 10px; vertical-align: top; padding-top: 5px; padding-bottom: 15px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px; border: 4px #000 solid; border-radius: 30px; background-color: #000;" width="100%" bgcolor="#000">
		`;
	}
}

if (!function_exists('footer_email_reset_password')) {
	function footer_email_reset_password()
	{
		return `
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
		</table><!-- End -->
		</body>
		</html>
		`;
	}
}