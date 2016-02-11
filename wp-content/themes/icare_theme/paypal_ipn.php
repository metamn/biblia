<?php

// Load WordPress
include "../../../wp-config.php";

$paypal_host_url = '';
$paypal_url = '';

if (core_option('core_paypal_sandbox_mode') == '1') :
	
	$paypal_host_url = "Host: www.sandbox.paypal.com\r\n";
	$paypal_url = 'ssl://www.sandbox.paypal.com';
	
else:
	
	$paypal_host_url = "Host: www.paypal.com\r\n";
	$paypal_url = 'ssl://www.paypal.com';
	
endif;

$req = 'cmd=_notify-validate';
foreach($_POST as $key => $value) :
  $value = urlencode(stripslashes($value));
  $req .= "&$key=$value";
endforeach;
 
$header .= "POST /cgi-bin/webscr HTTP/1.0\r\n";
$header .= $paypal_host_url;
$header .= "Content-Type: application/x-www-form-urlencoded\r\n";
$header .= "Content-Length: " . strlen($req) . "\r\n\r\n";
$fp = fsockopen ($paypal_url, 443, $errno, $errstr, 30);
//$fp = wp_remote_get( 'ssl://www.sandbox.paypal.com') );
 
if(!$fp) :
// HTTP ERROR
else :
    fputs ($fp, $header . $req);
    while(!feof($fp)) :
     
        $res = fgets ($fp, 1024);
         
        $fh = fopen('result.txt', 'w');
            fwrite($fh, $res);
            fclose($fh);
         
        if (strcmp ($res, "VERIFIED") == 0) :
         
            // Make sure we have access to WP functions namely WPDB
            //include_once($_SERVER['DOCUMENT_ROOT'].'/wp-load.php');
             
            // assign posted variables to local variables
        	$item_name        = $_POST['item_name'];
        	$item_number      = $_POST['item_number'];
        	$payment_status   = $_POST['payment_status'];
        	$payment_amount   = $_POST['mc_gross'];
        	$payment_currency = $_POST['mc_currency'];
        	$txn_id           = $_POST['txn_id'];
        	$project_id       = $_POST['custom'];
        	$receiver_email   = $_POST['receiver_email'];
        	$payer_email      = $_POST['payer_email'];
            
            $paypal_email = core_option('core_paypal_email');
            $custom_paypal_email = rwmb_meta('core_cause_paypal');
            
            // If not empty cause specific paypal email then use it instead
			if ( !empty($custom_paypal_email) ) :
				
					$paypal_email = $custom_paypal_email;
				
			endif;
             
            
            // Check if email is the same
        	if ( $receiver_email == $paypal_email  && $payment_status == 'Completed' ) :
            
              //$headers = 'From: IPN New <esmethsandbox@gmail.com>' . "\r\n";
              //$subject = 'Subject test' . "\r\n";
              //$message = 'Just a test stuff.';
              //mail('marcc3d@gmail.com', $subject, $message, $headers );
        			
        			// get current donations amount
        			$current_donations   = get_post_meta( $project_id, 'core_cause_collected', true );
        	
        			// update DB
        			update_post_meta($project_id, 'core_cause_collected', ( (float)$current_donations + (float)$payment_amount ) );
        		
            endif;
            
         
        elseif(strcmp ($res, "INVALID") == 0) :
             
            // You may prefer to store the transaction even if failed for further investigation.
             
        endif;
         
    endwhile;
fclose ($fp);
endif;
?>