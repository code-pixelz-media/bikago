<?php
/** this email is for kyc form link */
function kyc_email_template( $order_id, $plan, $customer_name ){ 

	$user_token = base64_encode( $customer_name . '-' . $order_id  );

	$font_mon = "Montserrat";
    $font_bool = 'true';

	$body = '<body class="clean-body u_body" style="margin: 0;padding: 0;-webkit-text-size-adjust: 100%;background-color: #ffffff;color: #000000">
		    <!--[if IE]><div class="ie-container"><![endif]-->
		    <!--[if mso]><div class="mso-container"><![endif]-->
		    <table id="u_body" style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;min-width: 320px;Margin: 0 auto;background-color: #ffffff;width:100%" cellpadding="0" cellspacing="0">
		        <tbody>
		            <tr style="vertical-align: top">
		                <td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top">
		                    <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td align="center" style="background-color: #ffffff;"><![endif]-->


		                    <div class="u-row-container" style="padding: 0px 0px 30px;background-color: transparent">
		                        <div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 500px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;">
		                            <div style="border-collapse: collapse;display: table;width: 100%;height: 100%;background-color: transparent;">
		                                <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px 0px 30px;background-color: transparent;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:500px;"><tr style="background-color: transparent;"><![endif]-->

		                                <!--[if (mso)|(IE)]><td align="center" width="500" style="background-color: #3598db;width: 500px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;" valign="top"><![endif]-->
		                                <div class="u-col u-col-100" style="max-width: 320px;min-width: 500px;display: table-cell;vertical-align: top;">
		                                    <div style="background-color: #01AFEC;height: 100%;width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
		                                        <!--[if (!mso)&(!IE)]><!-->
		                                        <div style="height: 100%; padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
		                                            <!--<![endif]-->

		                                            <table style="font-family:'. $font_mon .',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
		                                                <tbody>
		                                                    <tr>
		                                                        <td style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:'. $font_mon .',sans-serif;" align="left">

		                                                            <h1 style="margin: 0px; color: #ffffff; line-height: 140%; text-align: center; word-wrap: break-word; font-weight: normal; font-family: '. $font_mon .',sans-serif; font-size: 26px;font-weight: 600;">
		                                                                <div>
		                                                                    <div>eSIM DTAC</div>
		                                                                </div>
		                                                            </h1>

		                                                        </td>
		                                                    </tr>
		                                                </tbody>
		                                            </table>

		                                            <!--[if (!mso)&(!IE)]><!-->
		                                        </div>
		                                        <!--<![endif]-->
		                                    </div>
		                                </div>
		                                <!--[if (mso)|(IE)]></td><![endif]-->
		                                <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
		                            </div>
		                        </div>
		                    </div>



		                    <div class="u-row-container" style="padding: 0px;background-color: transparent">
		                        <div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 500px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;">
		                            <div style="border-collapse: collapse;display: table;width: 100%;height: 100%;background-color: transparent;">
		                                <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px;background-color: transparent;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:500px;"><tr style="background-color: transparent;"><![endif]-->

		                                <!--[if (mso)|(IE)]><td align="center" width="500" style="width: 500px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;" valign="top"><![endif]-->
		                                <div class="u-col u-col-100" style="max-width: 320px;min-width: 500px;display: table-cell;vertical-align: top;">
		                                    <div style="height: 100%;width: 100% !important;">
		                                        <!--[if (!mso)&(!IE)]><!-->
		                                        <div style="height: 100%; padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;">
		                                            <!--<![endif]-->

		                                            <table style="font-family:'. $font_mon .',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
		                                                <tbody>
		                                                    <tr>
		                                                        <td style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:'. $font_mon .',sans-serif;" align="left">

		                                                            <h1 style="margin: 0px; line-height: 140%; text-align: center; word-wrap: break-word; font-weight: normal; font-family: '. $font_mon .',sans-serif; font-size: 22px;">
		                                                                <div>Thank you for your purchase!</div>
		                                                            </h1>

		                                                        </td>
		                                                    </tr>
		                                                </tbody>
		                                            </table>

		                                            <table style="font-family:'. $font_mon .',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
		                                                <tbody>
		                                                    <tr>
		                                                        <td style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:'. $font_mon .',sans-serif;" align="left">

		                                                            <div style="line-height: 140%; text-align: center; word-wrap: break-word;">
		                                                                <p style="font-size: 14px; line-height: 140%;"><span style="font-size: 18px; line-height: 22.4px;"><strong>Product: </strong>'. $plan .'</span></p>
		                                                            </div>

		                                                        </td>
		                                                    </tr>
		                                                </tbody>
		                                            </table>

		                                            <table style="font-family:'. $font_mon .',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
		                                                <tbody>
		                                                    <tr>
		                                                        <td style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:'. $font_mon .',sans-serif;" align="left">

		                                                            <div style="line-height: 140%; text-align: center; word-wrap: break-word;">
		                                                                <p style="font-size: 14px; line-height: 140%;"><span style="font-size: 18px; line-height: 22.4px;">Order ID: <strong>'. $order_id .'</strong></span></p>
		                                                            </div>

		                                                        </td>
		                                                    </tr>
		                                                </tbody>
		                                            </table>

		                                            <table style="font-family:'. $font_mon .',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
		                                                <tbody>
		                                                    <tr>
		                                                        <td style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:'. $font_mon .',sans-serif;" align="left">
		                                                            <div style="line-height: 140%; text-align: center; word-wrap: break-word;">
		                                                                <p style="line-height: 140%; font-size: 14px;"><span style="font-size: 18px; line-height: 22.4px;">Please click the button below to upload your scanned passport and IMEI Number to recieve the Esim QR code and antivate you Esim.
		                                                                </p>
		                                                                <a href="'. esc_url( home_url("/kyc-form/?user_token=") . $user_token ) .'" style="background: #219b0d;color: #fff;padding:10px 20px;border-radius: 5px;text-decoration: none;font-size: 18px;margin-top: 10px;display: inline-block;">Upload Scanned Passport</a>
		                                                            </div>
		                                                        </td>
		                                                    </tr>
		                                                </tbody>
		                                            </table>

		                                            <!--[if (!mso)&(!IE)]><!-->
		                                        </div>
		                                        <!--<![endif]-->
		                                    </div>
		                                </div>
		                                <!--[if (mso)|(IE)]></td><![endif]-->
		                                <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
		                            </div>
		                        </div>
		                    </div>

		                    <div class="u-row-container" style="padding: 50px 0px 0px;background-color: transparent">
		                        <div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 500px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;">
		                            <div style="border-collapse: collapse;display: table;width: 100%;height: 100%;background-color: transparent;">
		                                <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 50px 0px 0px;background-color: transparent;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:500px;"><tr style="background-color: transparent;"><![endif]-->

		                                <!--[if (mso)|(IE)]><td align="center" width="500" style="background-color: #000000;width: 500px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;" valign="top"><![endif]-->
		                                <div class="u-col u-col-100" style="max-width: 320px;min-width: 500px;display: table-cell;vertical-align: top;">
		                                    <div style="background-color: #000000;height: 100%;width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
		                                        <!--[if (!mso)&(!IE)]><!-->
		                                        <div style="height: 100%; padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
		                                            <!--<![endif]-->

		                                            <table style="font-family:'. $font_mon .',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
		                                                <tbody>
		                                                    <tr>
		                                                        <td style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:'. $font_mon .',sans-serif;" align="left">

		                                                            <div class="menu" style="text-align:center">
		                                                                <!--[if (mso)|(IE)]><table role="presentation" border="0" cellpadding="0" cellspacing="0" align="center"><tr><![endif]-->

		                                                                <!--[if (mso)|(IE)]><td style="padding:5px 15px"><![endif]-->

		                                                                <a href="#" target="_blank" style="padding:5px 15px;display:inline-block;color:#ffffff;font-family:'. $font_mon .',sans-serif;font-size:16px;text-decoration:underline">Terms & Conditions</a>

		                                                                <!--[if (mso)|(IE)]></td><![endif]-->


		                                                                <!--[if (mso)|(IE)]><td style="padding:5px 15px"><![endif]-->

		                                                                <a href="#" target="_blank" style="padding:5px 15px;display:inline-block;color:#ffffff;font-family:'. $font_mon .',sans-serif;font-size:16px;text-decoration:underline">Contact Us</a>

		                                                                <!--[if (mso)|(IE)]></td><![endif]-->


		                                                                <!--[if (mso)|(IE)]><td style="padding:5px 15px"><![endif]-->

		                                                                <a href="#" target="_blank" style="padding:5px 15px;display:inline-block;color:#ffffff;font-family:'. $font_mon .',sans-serif;font-size:16px;text-decoration:underline">Support</a>

		                                                                <!--[if (mso)|(IE)]></td><![endif]-->


		                                                                <!--[if (mso)|(IE)]></tr></table><![endif]-->
		                                                            </div>

		                                                        </td>
		                                                    </tr>
		                                                </tbody>
		                                            </table>

		                                            <!--[if (!mso)&(!IE)]><!-->
		                                        </div>
		                                        <!--<![endif]-->
		                                    </div>
		                                </div>
		                                <!--[if (mso)|(IE)]></td><![endif]-->
		                                <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
		                            </div>
		                        </div>
		                    </div>


		                    <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
		                </td>
		            </tr>
		        </tbody>
		    </table>
		    <!--[if mso]></div><![endif]-->
		    <!--[if IE]></div><![endif]-->
		</body>' ;

	return $body;
}

/** this email is when email is verified by admin */ 
function kycupdate_email_template( $order_id ){ 

	$font_mon = "Montserrat";
    $font_bool = 'true';

		$body = '<body class="clean-body u_body" style="margin: 0;padding: 0;-webkit-text-size-adjust: 100%;background-color: #ffffff;color: #000000">
		    <!--[if IE]><div class="ie-container"><![endif]-->
		    <!--[if mso]><div class="mso-container"><![endif]-->
		    <table id="u_body" style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;min-width: 320px;Margin: 0 auto;background-color: #ffffff;width:100%" cellpadding="0" cellspacing="0">
		        <tbody>
		            <tr style="vertical-align: top">
		                <td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top">
		                    <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td align="center" style="background-color: #ffffff;"><![endif]-->


		                    <div class="u-row-container" style="padding: 0px 0px 30px;background-color: transparent">
		                        <div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 500px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;">
		                            <div style="border-collapse: collapse;display: table;width: 100%;height: 100%;background-color: transparent;">
		                                <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px 0px 30px;background-color: transparent;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:500px;"><tr style="background-color: transparent;"><![endif]-->

		                                <!--[if (mso)|(IE)]><td align="center" width="500" style="background-color: #3598db;width: 500px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;" valign="top"><![endif]-->
		                                <div class="u-col u-col-100" style="max-width: 320px;min-width: 500px;display: table-cell;vertical-align: top;">
		                                    <div style="background-color: #01AFEC;height: 100%;width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
		                                        <!--[if (!mso)&(!IE)]><!-->
		                                        <div style="height: 100%; padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
		                                            <!--<![endif]-->

		                                            <table style="font-family:'. $font_mon .',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
		                                                <tbody>
		                                                    <tr>
		                                                        <td style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:'. $font_mon .',sans-serif;" align="left">

		                                                            <h1 style="margin: 0px; color: #ffffff; line-height: 140%; text-align: center; word-wrap: break-word; font-weight: normal; font-family: '. $font_mon .',sans-serif; font-size: 26px;font-weight: 600;">
		                                                                <div>
		                                                                    <div>eSIM DTAC</div>
		                                                                </div>
		                                                            </h1>

		                                                        </td>
		                                                    </tr>
		                                                </tbody>
		                                            </table>

		                                            <!--[if (!mso)&(!IE)]><!-->
		                                        </div>
		                                        <!--<![endif]-->
		                                    </div>
		                                </div>
		                                <!--[if (mso)|(IE)]></td><![endif]-->
		                                <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
		                            </div>
		                        </div>
		                    </div>



		                    <div class="u-row-container" style="padding: 0px;background-color: transparent">
		                        <div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 500px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;">
		                            <div style="border-collapse: collapse;display: table;width: 100%;height: 100%;background-color: transparent;">
		                                <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px;background-color: transparent;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:500px;"><tr style="background-color: transparent;"><![endif]-->

		                                <!--[if (mso)|(IE)]><td align="center" width="500" style="width: 500px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;" valign="top"><![endif]-->
		                                <div class="u-col u-col-100" style="max-width: 320px;min-width: 500px;display: table-cell;vertical-align: top;">
		                                    <div style="height: 100%;width: 100% !important;">
		                                        <!--[if (!mso)&(!IE)]><!-->
		                                        <div style="height: 100%; padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;">
		                                            <!--<![endif]-->

		                                            <table style="font-family:'. $font_mon .',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
		                                                <tbody>
		                                                    <tr>
		                                                        <td style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:'. $font_mon .',sans-serif;" align="left">

		                                                            <h1 style="margin: 0px; line-height: 140%; text-align: center; word-wrap: break-word; font-weight: normal; font-family: '. $font_mon .',sans-serif; font-size: 22px;">
		                                                                <div>Thank you. Your KYC for esim has been updated.</div>
		                                                            </h1>

		                                                        </td>
		                                                    </tr>
		                                                </tbody>
		                                            </table>

		                                            <table style="font-family:'. $font_mon .',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
		                                                <tbody>
		                                                    <tr>
		                                                        <td style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:'. $font_mon .',sans-serif;" align="left">

		                                                            <div style="line-height: 140%; text-align: center; word-wrap: break-word;">
		                                                                <p style="font-size: 14px; line-height: 140%;"><span style="font-size: 18px; line-height: 22.4px;">Order ID: <strong>'. $order_id .'</strong></span></p>
		                                                            </div>

		                                                        </td>
		                                                    </tr>		                                                   
		                                                </tbody>
		                                            </table>

 		                                            <!--[if (!mso)&(!IE)]><!-->
		                                        </div>
		                                        <!--<![endif]-->
		                                    </div>
		                                </div>
		                                <!--[if (mso)|(IE)]></td><![endif]-->
		                                <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
		                            </div>
		                        </div>
		                    </div>



		                    <div class="u-row-container" style="padding: 50px 0px 0px;background-color: transparent">
		                        <div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 500px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;">
		                            <div style="border-collapse: collapse;display: table;width: 100%;height: 100%;background-color: transparent;">
		                                <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 50px 0px 0px;background-color: transparent;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:500px;"><tr style="background-color: transparent;"><![endif]-->

		                                <!--[if (mso)|(IE)]><td align="center" width="500" style="background-color: #000000;width: 500px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;" valign="top"><![endif]-->
		                                <div class="u-col u-col-100" style="max-width: 320px;min-width: 500px;display: table-cell;vertical-align: top;">
		                                    <div style="background-color: #000000;height: 100%;width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
		                                        <!--[if (!mso)&(!IE)]><!-->
		                                        <div style="height: 100%; padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
		                                            <!--<![endif]-->

		                                            <table style="font-family:'. $font_mon .',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
		                                                <tbody>
		                                                    <tr>
		                                                        <td style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:'. $font_mon .',sans-serif;" align="left">

		                                                            <div class="menu" style="text-align:center">
		                                                                <!--[if (mso)|(IE)]><table role="presentation" border="0" cellpadding="0" cellspacing="0" align="center"><tr><![endif]-->

		                                                                <!--[if (mso)|(IE)]><td style="padding:5px 15px"><![endif]-->

		                                                                <a href="#" target="_blank" style="padding:5px 15px;display:inline-block;color:#ffffff;font-family:'. $font_mon .',sans-serif;font-size:16px;text-decoration:underline">Terms & Conditions</a>

		                                                                <!--[if (mso)|(IE)]></td><![endif]-->


		                                                                <!--[if (mso)|(IE)]><td style="padding:5px 15px"><![endif]-->

		                                                                <a href="#" target="_blank" style="padding:5px 15px;display:inline-block;color:#ffffff;font-family:'. $font_mon .',sans-serif;font-size:16px;text-decoration:underline">Contact Us</a>

		                                                                <!--[if (mso)|(IE)]></td><![endif]-->


		                                                                <!--[if (mso)|(IE)]><td style="padding:5px 15px"><![endif]-->

		                                                                <a href="#" target="_blank" style="padding:5px 15px;display:inline-block;color:#ffffff;font-family:'. $font_mon .',sans-serif;font-size:16px;text-decoration:underline">Support</a>

		                                                                <!--[if (mso)|(IE)]></td><![endif]-->


		                                                                <!--[if (mso)|(IE)]></tr></table><![endif]-->
		                                                            </div>

		                                                        </td>
		                                                    </tr>
		                                                </tbody>
		                                            </table>

		                                            <!--[if (!mso)&(!IE)]><!-->
		                                        </div>
		                                        <!--<![endif]-->
		                                    </div>
		                                </div>
		                                <!--[if (mso)|(IE)]></td><![endif]-->
		                                <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
		                            </div>
		                        </div>
		                    </div>


		                    <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
		                </td>
		            </tr>
		        </tbody>
		    </table>
		    <!--[if mso]></div><![endif]-->
		    <!--[if IE]></div><![endif]-->
		</body>' ;

		return $body;
}

/** this email is when email is verified by admin */ 
function verification_email_template_flexiroam( $order_id, $plan, $approval = "verified", $qr_code ){ 

	if( $approval == "verified"){
		$approval_text = 'approved';
	}else if( $approval == "rejected"){
		$approval_text = 'rejected';
	}else{
		$approval_text = 'waiting for verification';
	}

	$qrcode_img= "https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl=" . $qr_code;

	$font_mon = "Montserrat";
    $font_bool = 'true';

		$body = '<body class="clean-body u_body" style="margin: 0;padding: 0;-webkit-text-size-adjust: 100%;background-color: #ffffff;color: #000000">
		    <!--[if IE]><div class="ie-container"><![endif]-->
		    <!--[if mso]><div class="mso-container"><![endif]-->
		    <table id="u_body" style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;min-width: 320px;Margin: 0 auto;background-color: #ffffff;width:100%" cellpadding="0" cellspacing="0">
		        <tbody>
		            <tr style="vertical-align: top">
		                <td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top">
		                    <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td align="center" style="background-color: #ffffff;"><![endif]-->


		                    <div class="u-row-container" style="padding: 0px 0px 30px;background-color: transparent">
		                        <div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 500px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;">
		                            <div style="border-collapse: collapse;display: table;width: 100%;height: 100%;background-color: transparent;">
		                                <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px 0px 30px;background-color: transparent;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:500px;"><tr style="background-color: transparent;"><![endif]-->

		                                <!--[if (mso)|(IE)]><td align="center" width="500" style="background-color: #3598db;width: 500px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;" valign="top"><![endif]-->
		                                <div class="u-col u-col-100" style="max-width: 320px;min-width: 500px;display: table-cell;vertical-align: top;">
		                                    <div style="background-color: #01AFEC;height: 100%;width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
		                                        <!--[if (!mso)&(!IE)]><!-->
		                                        <div style="height: 100%; padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
		                                            <!--<![endif]-->

		                                            <table style="font-family:'. $font_mon .',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
		                                                <tbody>
		                                                    <tr>
		                                                        <td style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:'. $font_mon .',sans-serif;" align="left">

		                                                            <h1 style="margin: 0px; color: #ffffff; line-height: 140%; text-align: center; word-wrap: break-word; font-weight: normal; font-family: '. $font_mon .',sans-serif; font-size: 26px;font-weight: 600;">
		                                                                <div>
		                                                                    <div>eSIM DTAC</div>
		                                                                </div>
		                                                            </h1>

		                                                        </td>
		                                                    </tr>
		                                                </tbody>
		                                            </table>

		                                            <!--[if (!mso)&(!IE)]><!-->
		                                        </div>
		                                        <!--<![endif]-->
		                                    </div>
		                                </div>
		                                <!--[if (mso)|(IE)]></td><![endif]-->
		                                <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
		                            </div>
		                        </div>
		                    </div>



		                    <div class="u-row-container" style="padding: 0px;background-color: transparent">
		                        <div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 500px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;">
		                            <div style="border-collapse: collapse;display: table;width: 100%;height: 100%;background-color: transparent;">
		                                <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px;background-color: transparent;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:500px;"><tr style="background-color: transparent;"><![endif]-->

		                                <!--[if (mso)|(IE)]><td align="center" width="500" style="width: 500px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;" valign="top"><![endif]-->
		                                <div class="u-col u-col-100" style="max-width: 320px;min-width: 500px;display: table-cell;vertical-align: top;">
		                                    <div style="height: 100%;width: 100% !important;">
		                                        <!--[if (!mso)&(!IE)]><!-->
		                                        <div style="height: 100%; padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;">
		                                            <!--<![endif]-->

		                                            <table style="font-family:'. $font_mon .',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
		                                                <tbody>
		                                                    <tr>
		                                                        <td style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:'. $font_mon .',sans-serif;" align="left">

		                                                            <h1 style="margin: 0px; line-height: 140%; text-align: center; word-wrap: break-word; font-weight: normal; font-family: '. $font_mon .',sans-serif; font-size: 22px;">
		                                                                <div>Your Esim order has been '. $approval_text .'.</div>
		                                                            </h1>

		                                                        </td>
		                                                    </tr>
		                                                </tbody>
		                                            </table>';

		                                            if( $approval == "verified" ){
		                                            $body .= '<table style="font-family:'. $font_mon .',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
		                                                <tbody>
		                                                    <tr>
		                                                        <td style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:'. $font_mon .',sans-serif;" align="left">

		                                                            <table width="100%" cellpadding="0" cellspacing="0" border="0">
		                                                                <tr>
		                                                                    <td style="padding-right: 0px;padding-left: 0px;" align="center">

		                                                                        <img align="center" border="0" src="'.$qrcode_img.'" alt="" title="" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: inline-block !important;border: none;height: auto;float: none;width: 100%;max-width: 380px;"
		                                                                            width="480" />

		                                                                    </td>
		                                                                </tr>
		                                                            </table>

		                                                        </td>
		                                                    </tr>
		                                                </tbody>
		                                            </table>';
		                                       }
											
											   $body .= '<table style="font-family:'. $font_mon .',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
		                                                <tbody>
		                                                    <tr>
		                                                        <td style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:'. $font_mon .',sans-serif;" align="left">

																	<div style="line-height: 140%; text-align: center; word-wrap: break-word;">
		                                                                <p style="font-size: 14px; line-height: 140%;"><span style="font-size: 18px; line-height: 22.4px;">QR Code: <strong>'. $qr_code .'</strong></span></p>
		                                                            </div>
		                                                            <div style="line-height: 140%; text-align: center; word-wrap: break-word;">
		                                                                <p style="font-size: 14px; line-height: 140%;"><span style="font-size: 18px; line-height: 22.4px;">Order ID: <strong>'. $order_id .'</strong></span></p>
		                                                            </div>

		                                                        </td>
		                                                    </tr>		                                                   
		                                                </tbody>
		                                            </table>

 		                                            <!--[if (!mso)&(!IE)]><!-->
		                                        </div>
		                                        <!--<![endif]-->
		                                    </div>
		                                </div>
		                                <!--[if (mso)|(IE)]></td><![endif]-->
		                                <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
		                            </div>
		                        </div>
		                    </div>



		                    <div class="u-row-container" style="padding: 50px 0px 0px;background-color: transparent">
		                        <div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 500px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;">
		                            <div style="border-collapse: collapse;display: table;width: 100%;height: 100%;background-color: transparent;">
		                                <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 50px 0px 0px;background-color: transparent;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:500px;"><tr style="background-color: transparent;"><![endif]-->

		                                <!--[if (mso)|(IE)]><td align="center" width="500" style="background-color: #000000;width: 500px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;" valign="top"><![endif]-->
		                                <div class="u-col u-col-100" style="max-width: 320px;min-width: 500px;display: table-cell;vertical-align: top;">
		                                    <div style="background-color: #000000;height: 100%;width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
		                                        <!--[if (!mso)&(!IE)]><!-->
		                                        <div style="height: 100%; padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
		                                            <!--<![endif]-->

		                                            <table style="font-family:'. $font_mon .',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
		                                                <tbody>
		                                                    <tr>
		                                                        <td style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:'. $font_mon .',sans-serif;" align="left">

		                                                            <div class="menu" style="text-align:center">
		                                                                <!--[if (mso)|(IE)]><table role="presentation" border="0" cellpadding="0" cellspacing="0" align="center"><tr><![endif]-->

		                                                                <!--[if (mso)|(IE)]><td style="padding:5px 15px"><![endif]-->

		                                                                <a href="#" target="_blank" style="padding:5px 15px;display:inline-block;color:#ffffff;font-family:'. $font_mon .',sans-serif;font-size:16px;text-decoration:underline">Terms & Conditions</a>

		                                                                <!--[if (mso)|(IE)]></td><![endif]-->


		                                                                <!--[if (mso)|(IE)]><td style="padding:5px 15px"><![endif]-->

		                                                                <a href="#" target="_blank" style="padding:5px 15px;display:inline-block;color:#ffffff;font-family:'. $font_mon .',sans-serif;font-size:16px;text-decoration:underline">Contact Us</a>

		                                                                <!--[if (mso)|(IE)]></td><![endif]-->


		                                                                <!--[if (mso)|(IE)]><td style="padding:5px 15px"><![endif]-->

		                                                                <a href="#" target="_blank" style="padding:5px 15px;display:inline-block;color:#ffffff;font-family:'. $font_mon .',sans-serif;font-size:16px;text-decoration:underline">Support</a>

		                                                                <!--[if (mso)|(IE)]></td><![endif]-->


		                                                                <!--[if (mso)|(IE)]></tr></table><![endif]-->
		                                                            </div>

		                                                        </td>
		                                                    </tr>
		                                                </tbody>
		                                            </table>

		                                            <!--[if (!mso)&(!IE)]><!-->
		                                        </div>
		                                        <!--<![endif]-->
		                                    </div>
		                                </div>
		                                <!--[if (mso)|(IE)]></td><![endif]-->
		                                <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
		                            </div>
		                        </div>
		                    </div>


		                    <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
		                </td>
		            </tr>
		        </tbody>
		    </table>
		    <!--[if mso]></div><![endif]-->
		    <!--[if IE]></div><![endif]-->
		</body>' ;

		return $body;
}

/** this email is for item purchase */
function verification_email_template_smartfren( $order_id, $plan, $uid, $approval ){ 

	if( $approval == "verified"){
		$approval_text = 'approved';
	}else if( $approval == "rejected"){
		$approval_text = 'rejected';
	}else{
		$approval_text = 'waiting for verification';
	}

	$font_mon = "Montserrat";
    $font_bool = 'true';

		$body = '<body class="clean-body u_body" style="margin: 0;padding: 0;-webkit-text-size-adjust: 100%;background-color: #ffffff;color: #000000">
		    <!--[if IE]><div class="ie-container"><![endif]-->
		    <!--[if mso]><div class="mso-container"><![endif]-->
		    <table id="u_body" style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;min-width: 320px;Margin: 0 auto;background-color: #ffffff;width:100%" cellpadding="0" cellspacing="0">
		        <tbody>
		            <tr style="vertical-align: top">
		                <td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top">
		                    <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td align="center" style="background-color: #ffffff;"><![endif]-->


		                    <div class="u-row-container" style="padding: 0px 0px 30px;background-color: transparent">
		                        <div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 500px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;">
		                            <div style="border-collapse: collapse;display: table;width: 100%;height: 100%;background-color: transparent;">
		                                <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px 0px 30px;background-color: transparent;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:500px;"><tr style="background-color: transparent;"><![endif]-->

		                                <!--[if (mso)|(IE)]><td align="center" width="500" style="background-color: #3598db;width: 500px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;" valign="top"><![endif]-->
		                                <div class="u-col u-col-100" style="max-width: 320px;min-width: 500px;display: table-cell;vertical-align: top;">
		                                    <div style="background-color: #01AFEC;height: 100%;width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
		                                        <!--[if (!mso)&(!IE)]><!-->
		                                        <div style="height: 100%; padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
		                                            <!--<![endif]-->

		                                            <table style="font-family:'. $font_mon .',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
		                                                <tbody>
		                                                    <tr>
		                                                        <td style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:'. $font_mon .',sans-serif;" align="left">

		                                                            <h1 style="margin: 0px; color: #ffffff; line-height: 140%; text-align: center; word-wrap: break-word; font-weight: normal; font-family: '. $font_mon .',sans-serif; font-size: 26px;font-weight: 600;">
		                                                                <div>
		                                                                    <div>eSIM DTAC</div>
		                                                                </div>
		                                                            </h1>

		                                                        </td>
		                                                    </tr>
		                                                </tbody>
		                                            </table>

		                                            <!--[if (!mso)&(!IE)]><!-->
		                                        </div>
		                                        <!--<![endif]-->
		                                    </div>
		                                </div>
		                                <!--[if (mso)|(IE)]></td><![endif]-->
		                                <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
		                            </div>
		                        </div>
		                    </div>



		                    <div class="u-row-container" style="padding: 0px;background-color: transparent">
		                        <div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 500px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;">
		                            <div style="border-collapse: collapse;display: table;width: 100%;height: 100%;background-color: transparent;">
		                                <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px;background-color: transparent;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:500px;"><tr style="background-color: transparent;"><![endif]-->

		                                <!--[if (mso)|(IE)]><td align="center" width="500" style="width: 500px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;" valign="top"><![endif]-->
		                                <div class="u-col u-col-100" style="max-width: 320px;min-width: 500px;display: table-cell;vertical-align: top;">
		                                    <div style="height: 100%;width: 100% !important;">
		                                        <!--[if (!mso)&(!IE)]><!-->
		                                        <div style="height: 100%; padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;">
		                                            <!--<![endif]-->

		                                            <table style="font-family:'. $font_mon .',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
		                                                <tbody>
		                                                    <tr>
		                                                        <td style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:'. $font_mon .',sans-serif;" align="left">

		                                                            <h1 style="margin: 0px; line-height: 140%; text-align: center; word-wrap: break-word; font-weight: normal; font-family: '. $font_mon .',sans-serif; font-size: 22px;">
		                                                                <div>Thank you for your purchase!</div>
		                                                            </h1>

		                                                        </td>
		                                                    </tr>
		                                                </tbody>
		                                            </table>

		                                            <table style="font-family:'. $font_mon .',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
		                                                <tbody>
		                                                    <tr>
		                                                        <td style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:'. $font_mon .',sans-serif;" align="left">

		                                                            <div style="line-height: 140%; text-align: center; word-wrap: break-word;">
		                                                                <p style="font-size: 14px; line-height: 140%;"><span style="font-size: 18px; line-height: 22.4px;"><strong>Product: </strong>'. $plan .'</span></p>
		                                                            </div>

		                                                        </td>
		                                                    </tr>
		                                                </tbody>
		                                            </table>';

		                                       if( $approval == "verified"){
		                                            $body .= '<table style="font-family:'. $font_mon .',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
		                                                <tbody>
		                                                    <tr>
		                                                        <td style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:'. $font_mon .',sans-serif;" align="left">

		                                                            <table width="100%" cellpadding="0" cellspacing="0" border="0">
		                                                                <tr>
		                                                                    <td style="padding-right: 0px;padding-left: 0px;" align="center">

		                                                                        <img align="center" border="0" src="cid:'. $uid .'" alt="" title="" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: inline-block !important;border: none;height: auto;float: none;width: 100%;max-width: 480px;"
		                                                                            width="480" />

		                                                                    </td>
		                                                                </tr>
		                                                            </table>

		                                                        </td>
		                                                    </tr>
		                                                </tbody>
		                                            </table>';
		                                        }

		                                        	$body .= '<table style="font-family:'. $font_mon .',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
		                                                <tbody>
		                                                    <tr>
		                                                        <td style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:'. $font_mon .',sans-serif;" align="left">

		                                                            <div style="line-height: 140%; text-align: center; word-wrap: break-word;">
		                                                                <p style="font-size: 14px; line-height: 140%;"><span style="font-size: 18px; line-height: 22.4px;">Order ID: <strong>'. $order_id .'</strong></span></p>
		                                                            </div>

		                                                        </td>
		                                                    </tr>
		                                                </tbody>
		                                            </table>


		                                            <!--[if (!mso)&(!IE)]><!-->
		                                        </div>
		                                        <!--<![endif]-->
		                                    </div>
		                                </div>
		                                <!--[if (mso)|(IE)]></td><![endif]-->
		                                <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
		                            </div>
		                        </div>
		                    </div>



		                    <div class="u-row-container" style="padding: 50px 0px 0px;background-color: transparent">
		                        <div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 500px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;">
		                            <div style="border-collapse: collapse;display: table;width: 100%;height: 100%;background-color: transparent;">
		                                <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 50px 0px 0px;background-color: transparent;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:500px;"><tr style="background-color: transparent;"><![endif]-->

		                                <!--[if (mso)|(IE)]><td align="center" width="500" style="background-color: #000000;width: 500px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;" valign="top"><![endif]-->
		                                <div class="u-col u-col-100" style="max-width: 320px;min-width: 500px;display: table-cell;vertical-align: top;">
		                                    <div style="background-color: #000000;height: 100%;width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
		                                        <!--[if (!mso)&(!IE)]><!-->
		                                        <div style="height: 100%; padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
		                                            <!--<![endif]-->

		                                            <table style="font-family:'. $font_mon .',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
		                                                <tbody>
		                                                    <tr>
		                                                        <td style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:'. $font_mon .',sans-serif;" align="left">

		                                                            <div class="menu" style="text-align:center">
		                                                                <!--[if (mso)|(IE)]><table role="presentation" border="0" cellpadding="0" cellspacing="0" align="center"><tr><![endif]-->

		                                                                <!--[if (mso)|(IE)]><td style="padding:5px 15px"><![endif]-->

		                                                                <a href="#" target="_blank" style="padding:5px 15px;display:inline-block;color:#ffffff;font-family:'. $font_mon .',sans-serif;font-size:16px;text-decoration:underline">Terms & Conditions</a>

		                                                                <!--[if (mso)|(IE)]></td><![endif]-->


		                                                                <!--[if (mso)|(IE)]><td style="padding:5px 15px"><![endif]-->

		                                                                <a href="#" target="_blank" style="padding:5px 15px;display:inline-block;color:#ffffff;font-family:'. $font_mon .',sans-serif;font-size:16px;text-decoration:underline">Contact Us</a>

		                                                                <!--[if (mso)|(IE)]></td><![endif]-->


		                                                                <!--[if (mso)|(IE)]><td style="padding:5px 15px"><![endif]-->

		                                                                <a href="#" target="_blank" style="padding:5px 15px;display:inline-block;color:#ffffff;font-family:'. $font_mon .',sans-serif;font-size:16px;text-decoration:underline">Support</a>

		                                                                <!--[if (mso)|(IE)]></td><![endif]-->


		                                                                <!--[if (mso)|(IE)]></tr></table><![endif]-->
		                                                            </div>

		                                                        </td>
		                                                    </tr>
		                                                </tbody>
		                                            </table>

		                                            <!--[if (!mso)&(!IE)]><!-->
		                                        </div>
		                                        <!--<![endif]-->
		                                    </div>
		                                </div>
		                                <!--[if (mso)|(IE)]></td><![endif]-->
		                                <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
		                            </div>
		                        </div>
		                    </div>


		                    <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
		                </td>
		            </tr>
		        </tbody>
		    </table>
		    <!--[if mso]></div><![endif]-->
		    <!--[if IE]></div><![endif]-->
		</body>' ;

	return $body;
}