<?php
/**
 * Use SendGrid third-party SMTP relay to send all of WordPress' email - Way more reliable than using the server's sendmail() function
 * You may want to add a conditional so that this only runs on production / staging servers
 * 
 * @param		object		$phpmailer	Instance of the the PHPMailer class that WordPress uses
 * @see			https://github.com/PHPMailer/PHPMailer
 * @see			https://sendgrid.com/docs/for-developers/sending-email/getting-started-smtp/
 * @author		gantsta
 */
function ajg_phpmailer_settings($phpmailer){
	// Required settings
	$phpmailer->isSMTP();
	$phpmailer->SMTPDebug = 0;										// Set to 1 or 2 to debug email issues.
	$phpmailer->Host = 'smtp.sendgrid.net';
	$phpmailer->SMTPAuth = true;									// Force PHPMailer to use Username and Password to authenticate
	$phpmailer->Port = 465;
	$phpmailer->Username = 'apikey';
	$phpmailer->Password = '';										// Enter your SendGrid API key here

	// Additional settings
	$phpmailer->SMTPSecure = "ssl";									// Choose ssl or tls
	$phpmailer->From = "user@domain.com";
	$phpmailer->FromName = "Human-readable Name";
}
add_action( 'phpmailer_init', 'ajg_phpmailer_settings' );
