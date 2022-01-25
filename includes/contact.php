<!DOCTYPE html>
<html>
<head>
	<title>Contact us</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style1.css">
	<link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0">
</head>
<body>
	<div hidden>
		<?php 
			// Background color
			$madefree_bg_color = get_option('madefree_settings_bg_color_field');
			// button size 
			$madefree_btn_size = get_option('madefree_settings_btn_size_field'); 
			// button color
			$madefree_txt_font = get_option('madefree_settings_txt_font_field'); 
			// font type
			$madefree_btn_color = get_option('madefree_settings_btn_color_field');
			// button txt color
			$madefree_btn_txt_color = get_option('madefree_settings_btn_txt_color_field');
			// redirect url
			$madefree_redirect = get_option('madefree_settings_redirect_field');
		
		?>
		
	</div>
   
	<div class="container" >
		<div class="contact-box" style="font-family: <?php echo isset($madefree_txt_font) ? esc_attr( $madefree_txt_font ) : ''; ?> !important; " >
			<div class="left"></div>
			<div class="right" style="background-color: <?php echo isset($madefree_bg_color) ? esc_attr( $madefree_bg_color ) : ''; ?>;">
				
				<h2>Contact Us</h2>
                <form method="post" action="<?php echo isset($madefree_redirect) ? esc_attr( $madefree_redirect ) : ''; ?>">
				<label class="label" for="your_Fname">FirstName</label>
                <input type="text" class="field" name="your_Fname" placeholder="Your firstname"/>
                <label class="label"  for="your_Lname">LastName</label>
                <input type="text" class="field" name="your_Lname" placeholder="Your lastname"/>
				<label class="label"  for="your_email">Email</label>
                <input type="text" class="field" name="your_email" placeholder="Your email"/>
				<label class="label"  for="your_comments">Comments</label>
                <textarea placeholder="Message"  name="your_comments" class="form-control"></textarea>
				<input style=" color: <?php echo isset($madefree_btn_txt_color) ? esc_attr( $madefree_btn_txt_color ) : ''; ?>; background-color: <?php echo isset($madefree_btn_color) ? esc_attr( $madefree_btn_color ) : ''; ?>;" class="btn <?php echo isset($madefree_btn_size) ? esc_attr( $madefree_btn_size ) : ''; ?>" type="submit" value="Send" name="example_form_submit" />
                </form>
			</div>
		</div>
	</div>
</body>
</html>