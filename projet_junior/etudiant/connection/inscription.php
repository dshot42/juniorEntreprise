<html>

    <head>

        <meta charset="utf-8" />

        <title>inscription</title>

    </head>

    <body>
	
	<form action="inscription.php" method="POST">
	<input type="text"  name="pseudo" placeholder ="pseudo " autofocus /><br>
	<input type="pwd" name="pwd"  placeholder ="mot de passe "/><br>
	<input type="submit" value="se connecter " />
	
	
<?php
require_once('../connection.php');
$bdd = connectDb();

// de cette façon je peux avoir 2 utilisateurs avec le meme pseudo, du temps que le mot de passe est différents

// on interoge la base pour savoir si un utilisateur existe deja
	if (isset($_POST['pseudo'])&& isset($_POST['pwd'])){
			$pseudo = $_POST['pseudo'];
			$pwd =$_POST['pwd'];
			$query=$bdd->prepare('select count(*)  from users where pseudo=? and pwd= ?');
			$query->execute(array($pseudo,$pwd)); 
			$data = $query->fetch() ;
			$query->closeCursor();
			
	}
	
	else echo "<br>veuillez vous connecter ";
	// il peut y avoir plusieurs utilisateur avec le meme pseudo du temps que le mot de passe est différent
 	if (isset($data) && $data[0] == 1 ) echo ' utilisateur deja définit !';
	
		// si l'utilisateur n'existe pas encore , on l'ajoute en base 
		 // true + 0 
		if (isset($data) && $data[0] == 0 ) {
			$query =$bdd->prepare( 'insert into users(id_user, pseudo, pwd) values (NULL,?,? )' );  
			$query ->execute(array($pseudo, $pwd));
		    echo "bienvenue sur film stream ".$_POST['pseudo']." !"; 
			session_start();	
			$_SESSION['pseudo'] = $pseudo;
			$query->closeCursor();
		} 

	/*	var_dump($data);
		var_dump(isset($data));
		var_dump(isset($data) && $data[0]== 1);
		var_dump(isset($date) && $data[0] == 0) ;
		var_dump($_SESSION['pseudo']);   */


		?> <br />
		

       <a href="./index.php"> retourner a l'acceuil </a>

    </body>

</html>