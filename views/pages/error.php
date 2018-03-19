Public function reg($type='json'){	
$errors         = array();  	// array to hold validation errors
$data 			= array(); 		// array to pass back data
	
	if (empty($_POST["url"])) {
	
    foreach($_POST as $a){
	trim($a);}
		
			
			
			
		// Check if password has been entered
		if (empty($_POST['pw'])){
			$errors['pw'] =  'Please enter your password';
		}
		
		
	
		// Check if email has been entered and is valid
		if (empty($_POST['em']) || !$this->validateEmail($_POST['em'])) {
			$errors['em'] =  'Please enter a valid email address';
		}
		// Check if email has been entered and is valid
		else {$_POST['em'] = strtolower($_POST['em']); 	 if ($this->checkEmail($_POST['em']) == false) {
			$errors['em'] =  'Email Address Already In Use<br/><br/> <b><u>Please Log In or Use another Email Address</u></b>';
		}}
	
		
		// Check if name has been entered
		if (empty($_POST['fn'])) {
			$errors['fn'] = 'Please enter your first name';
		}
		
		
	
	}
	else {$errors['fn'] = 'Cmon that\'s bad';}
  
		
	
		
		// If there are no errors, send the email
if (empty($errors)) {	

$db = $this->pagination->connection('','set');

$c_hash = $this->encrypt(trim($_POST['em']));

// construct the email
$Email = new Email();
$Email->sender = 'Quotehood.Com <no-reply@quotehood.com>';
$Email->recipient = $_POST['fn'].' <'.$_POST['em'].'>';
$Email->subject = "Confirm Your Registration-Quotehood";
$Email->message_text = "Hello!

Thanks for registering on QuoteHood 

Please Kindly click on the link below to confirm your registration

http://quotehood.com/confirm.php?c=$c_hash
";

$Email->message_html = "<h1>Hello!</h1>
<p>
Thanks for registering on <a href=\"http://quotehood.com\">QuoteHood</a>
</p>
<p>
Please Kindly click on <a href=\"http://quotehood.com/confirm.php?c=$c_hash\">HERE</a>  to confirm your registration
</p><br/>";
 
 $pw = $_POST['pw'];