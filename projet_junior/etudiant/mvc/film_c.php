<?php


class Film
{
    private $id = null;
    private $nom;
    private $annee;
    private $score;
	private $image;

	/**************	 getter et setter	 ****************/
	
    public function getNom()
    {
        return $this->nom;
    }

    public function getAnnee()
    {
        return $this->annee;
    }

    public function getScore()
    {
        return $this->score;
    }

    public function getId()
    {
        return $this->id;
    }
	
	public function getImage(){
		return $this->image;
	}

    public function setNom($nom)
    {
        if (strlen($nom) < 3 || strlen($nom) > 50)
            $nom = substr($nom, 0, 50);
        $this->nom = $nom;
        return $this;
    }

    public function setAnnee($annee)
    {
        if (intval($annee) < 1800 || intval($annee) > 2017)
            throw new Exception('Année du film incorrecte');
        $this->annee = $annee;
        return $this;
    }

    public function setScore($score)
    {
        if (floatval($score) < 0 || floatval($score) > 1000000)
            throw new Exception('Score du film incorrect');
        $this->score = $score;
        return $this;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }
	
	    public function setImage($monimage)
    {
        $this->image = $monimage;

        return $this;
    }
}

?>