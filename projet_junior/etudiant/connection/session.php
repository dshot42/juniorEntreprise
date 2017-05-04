<!DOCTYPE html>

<html>

    <head>

        <meta charset="utf-8" />

        <title>Page de connection</title>

    </head>

    <body>
	
	<div> saisissez vos identifiant </div>
	<form action="session.php" method="POST">
	<input type="text"  name="pseudo" placeholder ="pseudo " autofocus /><br>
	<input type="pwd" name="pwd"  placeholder ="mot de passe "/><br>
	<input type="submit" value="se connecter " />
	</form>
	<a href="./inscription.php"> Inscrivez- vous !</a>
	<br><button onclick ="deconnection()"> se deconnecter </button>  
	
	
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
	

		// si l'utilisateur existe et que le mot de passe est bon ;
		if (isset($data) && $data[0]== 1 )	{
			session_start();	
			$_SESSION['pseudo'] = $pseudo;
			echo "content de vous revoir ".$_SESSION['pseudo'] ; 
		// il faut vérifier si pseudo identique et définit				
			echo '  <a href="../index.php"> retourner a l\'acceuil </a>   ';
		}
		
	
	function deconnection(){		
			session_destroy();
		}

	/*	var_dump($data);
		var_dump(isset($data));
		var_dump(isset($data) && $data[0]== 1);
		var_dump(isset($date) && $data[0] == 0) ;
		var_dump($_SESSION['pseudo']);   */

		?> <br />
    </body>

</html>