<!DOCTYPE html>
<html>
<head>
	<title>Contact us</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style1.css">
	<link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0">
</head>
<body>
	<div class="container">
		<div class="contact-box">
			<div class="left"></div>
			<div class="right">
				<h2>Contact Us</h2>
                <form method="post" action="">
				<label class="label" for="your_Fname">FirstName</label>
                <input type="text" class="field" name="your_Fname" placeholder="Your firstname"/>
                <label class="label"  for="your_Lname">LastName</label>
                <input type="text" class="field" name="your_Lname" placeholder="Your lastname"/>
				<label class="label"  for="your_email">Email</label>
                <input type="text" class="field" name="your_email" placeholder="Your email"/>
				<label class="label"  for="your_comments">Comments</label>
                <textarea placeholder="Message"  name="your_comments" class="form-control"></textarea>
				<input class="btn" type="submit" value="Send your information" name="example_form_submit" />
                </form>
			</div>
		</div>
	</div>
</body>
</html>