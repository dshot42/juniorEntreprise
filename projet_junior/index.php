
 <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0//EN">
<HTML>

 <HEAD>
 <title> Junior Entreprise </title>
 <link href="bootstrap-3.3.6-dist/css/bootstrap.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="feuillestyle.css">
  <link rel="stylesheet" type="text/css" href="cercle.css">

 <meta charset="UTF-8">
 </HEAD>
 <body>
 <div class="container">
		<header  class="header row">
		<div><img src="logo_junior.png" id="logo"></div>
		
		 <?php
 		function se_connecter(){			
				session_start(); 
				 if (isset($_SESSION['pseudo']) && $_SESSION['pseudo'] != NULL){
						echo "<a href =\"session.php\" id=\"session\" class=\"btn btn-succes\"><button>".$_SESSION['pseudo']."</button></a>" ;}
				 else echo "<a href =\"./identification/session.php\" id=\"session\"  class=\"btn btn-warning\"><button> Connectez-vous !</button></a>";
		 }
		 se_connecter();
?>

		</header>
 




		<section class=" main row  ">
 <!--   menu  -->
  <!--   CERCLE  -->
 <div id="cercle">
		 <div  class="profil " id="entreprise" ><img src="1.png" id="image1"></a></div>
		 <div  class="profil " id="etudiant"  ><img src="2.png" id="image2"></a> </div>
		 <div  class="profil " id="assotiation"  ><img src="3.png" id="image3"></a></div>
 </div>
		</section>
 </div>
   <!--   FOOTER  -->
 
</BODY>
</HTML>