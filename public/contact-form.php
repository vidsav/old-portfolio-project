
<html>
    <head>
        <title>Contact</title>
        <link rel="stylesheet" href="css/contact.css" />
    </head>

    <body>


<div class="content">

			<div class="article">
				<?php
					
					$name = $email = $subject = $msg = $nameErr = $emailErr = $subjectErr = $msgErr = "";
					
					
					if ($_SERVER["REQUEST_METHOD"] == "POST")
					{
						$name = $_POST["name"];
						$email = test_input($_POST["email"]);
						$subject = test_input($_POST["subject"]);
						$msg = test_input($_POST["msg"]);
					}
					
				
					function test_input($data)
					{
						$data = trim($data);
						$data = stripslashes($data);
						$data = htmlspecialchars($data);
						return $data;
					}
					
					
					$msg = wordwrap($msg, 70, "\r\n");
					
					// Additional headers
					$headers = 'MIME-Version: 1.0' . "\r\n";
					$headers .= 'Content-type: text/plain; charset=utf-8' . "\r\n";
					$headers .= 'From: ' . $name . ' <' . $email . '>';
					
					
					function is_valid_email($email) {
						return preg_match('#^[a-z0-9.!\#$%&\'*+-/=?^_`{|}~]+@([0-9.]+|([^\s]+\.+[a-z]{2,6}))$#si', $email);
					}
					
					
					if(!$name) {
						$nameErr = 'Name&nbsp;is&nbsp;required!';
					}
					
					if(!$subject) {
						$subjectErr = 'Subject&nbsp;is&nbsp;required.';
					}
					
					if(!$msg) {
						$msgErr = 'Message&nbsp;is&nbsp;required.';
					}

					if(!is_valid_email($email)) {
						$emailErr = 'Valid&nbsp;e-mail&nbsp;required.';
					}

				?>
				<p>    
                <div class="main-button"><a href="index.html">Back to site</a></div>
                <h2>Thank you for contacting me, feel free to send another mail if you need to.</h2>
				<div class="content-wraper">
				<form method="post" action="contact-form.php">
				<div>
					<label for="name">Name:</label>
					<input type="text" class="oneLineForm" size="39" name="name" required><span class="error"> * <?php echo $nameErr;?></span>
				</div>
				<div>
					<label for="mail">E-mail:</label>
					<input type="email" class="oneLineForm" size="39" name="email" required><span class="error"> * <?php echo $emailErr;?></span>
				</div>
				<div>
					<label for="subject">Subject:</label>
					<input type="text" class="oneLineForm" size="39" name="subject" required><span class="error"> * <?php echo $subjectErr;?></span>
				</div>
				<div>
					<label for="msg">Message:</label>
					<textarea class="message" cols="30" rows="8" name="msg" required></textarea><span class="error"> * <?php echo $msgErr;?></span>
				</div>
				<div class="formButton">
					<input type="submit" value="Send" class="formButton">
				</div>
				</form>
				<?php
					if (is_valid_email($email) && $name && $subject && $msg) {
							
						
						$to = 'savnikvid5@gmail.com';
						mail($to, $subject, $msg, $headers);
						
						
						echo '<p class="mailSent">Dear ' . $name . ', your mail has been sent. I will answer it as soon as possible.</p>';
					}
				?>
			</div>
					
		</div>
      </div>  
    </body>
</html>