<?php
	if (isset($_POST["submit"])) {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$message = $_POST['message'];
		$human = intval($_POST['human']);
		$from = 'Tu as reçu un message sur ton site !';
		$to = 'gillet.maxence.isart@gmail.com';
		$subject = 'Tu as un message sur ton site !';

		$body ="From: $name\n E-Mail: $email\n Message:\n $message";
		// Check if name has been entered
		if (!$_POST['name']) {
			$errName = 'Veuillez entrer s\'il vous plait votre nom et prenom';
		}

		// Check if email has been entered and is valid
		if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			$errEmail = 'Veuillez entrer s\'il vous plait une adresse valide';
		}

		//Check if message has been entered
		if (!$_POST['message']) {
			$errMessage = 'Veuillez entrer s\'il vous plait votre message';
		}
		//Check if simple anti-bot test is correct
		if ($human !== 5) {
			$errHuman = 'Le résultat est faux';
		}
// If there are no errors, send the email
if (!$errName && !$errEmail && !$errMessage && !$errHuman) {
	if (mail ($to, $subject, $body, $from)) {
		$result='<div class="alert alert-success">Merci beaucoup ! Je vous contacterai prochainement.</div>';
	} else {
		$result='<div class="alert alert-danger">Désolé, il y a eu une erreur en envoyant ce message.</div>';
	}
}
	}
?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Portfolio | Marie Adeline</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Yellowtail' rel='stylesheet' type='text/css'>
    <link href="css/stylecontact.css" rel="stylesheet">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">



    <!--<link href='https://fonts.googleapis.com/css?family=Yellowtail' rel='stylesheet' type='text/css'> HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

    <div class="container">
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand"><img src="TitreMaAde.png" alt="MarieLogo">
            </a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li><a href="index.html">Home</a></li>
              <li><a href="projet.html">Projets</a></li>
              <li><a href="contact.php">Contact</a></li>
              </ul>
              <ul class="nav navbar-nav navbar-right">
              <li><a href="#">Mon CV</a></li>
            </ul>
          </div>
          <!--/.nav-collapse -->
        </div>
        <!--/.container-fluid -->
      </nav>
    </div>

    <div class="container">
    		<div class="row">
    			<div class="col-md-6 col-md-offset-3">
    				<h1 class="page-header text-center">Contactez-moi !</h1>
  				<form class="form-horizontal" role="form" method="post" action="contact.php">
            <h3 class="page-header text-center h3">Nom</h3>
          	<div class="form-group">
  							<input type="text" class="form-control" id="name" name="name" placeholder="Nom et Prenom" value="<?php echo htmlspecialchars($_POST['name']); ?>">
  							<?php echo "<p class='text-danger'>$errName</p>";?>
  					</div>
            <h3 class="page-header text-center h3">Email</h3>
  					<div class="form-group">
  						<input type="email" class="form-control" id="email" name="email" placeholder="example@domain.com" value="<?php echo htmlspecialchars($_POST['email']); ?>">
  							<?php echo "<p class='text-danger'>$errEmail</p>";?>
  					</div>
              <h3 class="page-header text-center h3">Message</h3>
  					<div class="form-group">
  						<textarea class="form-control" rows="4" name="message"><?php echo htmlspecialchars($_POST['message']);?></textarea>
  							<?php echo "<p class='text-danger'>$errMessage</p>";?>
  					</div>
            <h3 class="page-header text-center h3">2 + 3 = ?</h3>
  					<div class="form-group">
  							<input type="text" class="form-control" id="human" name="human" placeholder="Votre réponse">
  							<?php echo "<p class='text-danger'>$errHuman</p>";?>
  					</div>
  					<center><div class="form-group">
  							<input id="submit" name="submit" type="submit" value="Envoyez" class="btn btn-primary">
  					</div></center>
  					<div class="form-group">
  							<?php echo $result; ?>
  					</div>
  				</form>
  			</div>
  		</div>
  	</div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
