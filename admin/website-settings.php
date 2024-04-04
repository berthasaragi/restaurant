<?php
    ob_start();
	session_start();

	$pageTitle = 'Website Settings';

	if(isset($_SESSION['username_restaurant_qRewacvAqzA']) && isset($_SESSION['password_restaurant_qRewacvAqzA']))
	{
		include 'connect.php';
  		include 'Includes/functions/functions.php'; 
		include 'Includes/templates/header.php';
		include 'Includes/templates/navbar.php';

		$stmt = $con->prepare("SELECT * FROM website_settings");
        $stmt->execute();
        $options = $stmt->fetchAll();


		/*** FOOTER BOTTON ***/

        include 'Includes/templates/footer.php';
    }
    else
    {
        header('Location: index.php');
        exit();
    }
?>