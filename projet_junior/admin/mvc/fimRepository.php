
<?php

require_once(__DIR__.'/connection.php');
require_once(__DIR__.'/film_c.php');

 class FilmRepository
{
    private $pdo;
	
    public function __construct()
    {
        $this->pdo = connectDb();
    }
	
    public function getAll()
    {
        $stmt = $this->pdo->prepare(
            'SELECT * FROM film;');
        $stmt->execute();
		$collection = [];
		
		foreach($stmt->fetchAll() as $data)
		{		
			$film = new Film;
			$film
				->setNom($data['nom'])
				->setAnnee($data['annee'])
				->setScore($data['score'])
				->setId($data['id_film'])
				->setImage($data['monimage']);
			// syntaxe "ajouter au tableau"
			$collection[] = $film;
		}
		// var_dump($film);
		return $collection;
	}

		
		
    // Stub
    public function persist(Film $film)
    {
        // Si le film a un ID il faut faire un UPDATE
        // Sinon il faut faire un INSERT INTO
        // (puis setter son ID pour se rappeler que maintenant, il existe)
        // hint: lastInsertId() de PDO
    }


	
	public function nb_film(){
		 $stmt = $this->pdo->prepare('select count(*) from film where nom=? or annee=?'); // on veux savoir combien il y en a 
		$stmt -> execute(array($_GET['nom'],$_GET['annee']));
		$data = $stmt ->fetch();   // recupere le resultat 
		$stmt->closeCursor();	
			//var_dump($data[0]);
		return $data[0];
	}
	
	
	
	// tableau de criteres : 'colonne' => 'valeur'
	 public  function rechercher() { 

		if ($this->nb_film() !=0 ) {	
			// var_dump($this->nb_film() !=0 );
			
					$query = $this->pdo->prepare(' select * from film where nom = ? or  annee =? ' ); // requête SQL
					$query->execute(array($_GET['nom'],  $_GET['annee'])); // paramètres et exécution
					$collection = [];
					
					// var_dump($_GET['nom']);

					foreach($query->fetchAll() as $data)
					{
						// var_dump($data);
						$film = new Film;
						$film
							->setNom($data['nom'])
							->setAnnee($data['annee'])
							->setScore($data['score'])
							->setId($data['id_film'])
							->setImage($data['monimage']);

						// syntaxe "ajouter au tableau"
						$collection []= $film ;
						// var_dump($film);
		
					}	
				return $collection;
		}


} // fin fonction

}  // fin de classe 
