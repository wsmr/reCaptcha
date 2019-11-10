<?php

	/* Author: Joshua Herbison of Idea Pro LLC, IdeaPro.com */
	/* The code below is only for an example and testing purposes.*/
	/* With API keys, this is a fully functional and working form, but it does not send the information
		anywhere. This code is "Use at your own risk". Idea Pro LLC and/or Joshua Herbison is not responsible
		for any developer's misuse of any code we provide in Tutorials. By using this code you agree to those terms.*/ 

	$public_key = ""; /* Your reCaptcha public key */
	$private_key = ""; /* Enter your reCaptcha private key */
	$url = "https://www.google.com/recaptcha/api/siteverify"; /* Default end-point, please verify this before using it */

	/* Check if the form has been submitted */
	if(array_key_exists('submit_form',$_POST))
	{
		/* The response given by the form being submitted */
		$response_key = $_POST['g-recaptcha-response'];
		/* Send the data to the API for a response */
		$response = file_get_contents($url.'?secret='.$private_key.'&response='.$response_key.'&remoteip='.$_SERVER['REMOTE_ADDR']);
		/* json decode the response to an object */
		$response = json_decode($response);

		/* if success */
		if($response->success == 1)
		{
			echo "You passed validation!";
		}
		else
		{
			echo "You are a robot and we don't like robots.";
		}
	}
	
?>
<form method="post" action="">
<input type="text" name="your_name" placeholder="Your Name" /><br /><br />
<input type="text" name="email" placeholder="Your Email Address" /><br /><br />
<div class="g-recaptcha" data-sitekey="<?php print $public_key; ?>"></div>
<input type="submit" name="submit_form" value="Submit Your Information" />
</form>	
<script src='https://www.google.com/recaptcha/api.js'></script>