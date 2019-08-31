			<?php
					$action=$_REQUEST['action'];
					if ($action=="") 
					{
					?>
					 <!-- display the contact form -->
					
					<form  action="" method="POST" enctype="multipart/form-data">
					<input type="hidden" name="action" value="submit">
						<input type="text" class="col-md-6 col-xs-12 name" name='name' value="" placeholder='Name *'/>
						<input type="text" class="col-md-6 col-xs-12 Email" name='Email' value="" placeholder='Email *'/>
						<input type="text" class="col-md-12 col-xs-12 Subject" name='Subject' value="" placeholder='Subject'/>
						<textarea type="text" class="col-md-12 col-xs-12 Message" name='Message' value="" placeholder='Message *'></textarea>
						<input type="submit" value="Send email"/>
					</form>
					
					
					<?php
					}
					
					else                /* send the submitted data */
					{
							$name=$_REQUEST['name'];
							$email=$_REQUEST['Email'];
							
							$message=$_REQUEST['Message'];
						
						if (($name=="")||($email=="")||($message==""))
							{
							echo "All fields are required, please fill <a href=\"\">the form</a> again.";
							}
						
						else{        
							$from="From: $name<$email>\r\nReturn-path: $email";
							$subject="Message sent using your contact form! Subjet: ".$_REQUEST['Subject']; 
							mail("shavindimasha@gmail.com", $subject, $message, $from);
							alert ("Email sent!");
							}
					}  
					?>