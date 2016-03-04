<?php
class CharactersManager
{
	private $_db;

	public function __construct ($db)
	{
		//assigner directement l'objet PDO a notre objet
		$this->setDb($db);
	}

	public function save (Characters $perso)
	{
		//enregister le Characters dans la bdd
		$q = $this->_db->prepare('INSERT INTO Characters SET nom = :nom');
		$q->bindValue(':nom', $perso->nom());
		$q->execute();
		    
		$perso->hydrate([
		      'id' => $this->_db->lastInsertId(),
		      'degat' => 0,
		      'experience' => 0,
		      'niveau' => 1,
		      'puissance' => 1,
		      'coup' => 0,
		      'date_coup' => '',
		      'date_connection' => date('Y-m-d H:i:s', time()),
		    ]);
	}

	public function modify (Characters $perso)
	{
		//modifier un Characters depuis la bdd
		
		$q = $this->_db->prepare('UPDATE Characters SET degat = :degat, experience = :experience, niveau = :niveau, puissance = :puissance, coup = :coup WHERE id = :id');
    
    $q->bindValue(':degat', $perso->degat(), PDO::PARAM_INT);
    $q->bindValue(':id', $perso->id(), PDO::PARAM_INT);
    $q->bindValue(':experience', $perso->experience(), PDO::PARAM_INT);
    $q->bindValue(':niveau', $perso->niveau(), PDO::PARAM_INT);
    $q->bindValue(':puissance', $perso->puissance(), PDO::PARAM_INT);
    $q->bindValue(':coup', $perso->coup(), PDO::PARAM_INT);
    $q->execute();
	}

	public function saveTime (Characters $perso)
	{
		$this->_db->exec('UPDATE Characters SET date_coup = NOW() WHERE id = '.$perso->id());
	}

	public function saveTimeConnection (Characters $perso)
	{
		$this->_db->exec('UPDATE Characters SET date_connection = NOW() WHERE id = '.$perso->id());
	}

	public function delete (Characters $perso)
	{
		//supprimer un Characters en utilisant son id
		$this->_db->exec('DELETE FROM Characters WHERE id = '.$perso->id());
	}

	public function select ($info)
	{
		//selectioner un Characters en utilisant son id
		if (is_int($info))
    {
      $q = $this->_db->query('SELECT id, nom, degat, experience, niveau, puissance, coup, UNIX_TIMESTAMP(date_coup) AS date_coup, date_connection FROM Characters WHERE id = '.$info);
      //$donnees = $q->fetch(PDO::FETCH_ASSOC);
      
      return new Characters($q->fetch(PDO::FETCH_ASSOC));
    }
    //sinon selectioner un Characters en utilisant son nom
    else
    {
      $q = $this->_db->prepare('SELECT id, nom, degat, experience, niveau, puissance, coup, UNIX_TIMESTAMP(date_coup) AS date_coup, date_connection FROM Characters WHERE nom = :nom');
      $q->execute([':nom' => $info]);
      return new Characters($q->fetch(PDO::FETCH_ASSOC));
    }
	}

	public function count ()
	{
		//compte le nombre de Characters dans la bdd
		return $this->_db->query('SELECT COUNT(*) FROM Characters')->fetchColumn();
	}

	public function getList ()
	{
		//selectioner tout les Characters dans la bdd sauf celui dont le nom est passer en paramétre
		$persos = [];
    
    $q = $this->_db->query('SELECT * FROM Characters');
    //$q->execute([':nom' => $nom]);
    
    while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
    {
      $persos[] = new Characters($donnees);
    }
    
    return $persos;
	}

	public function verifiy ($info)
	{
		//vérifie si un Characters existe ou non dans la bdd
		if (is_int($info)) // On veut voir si tel Characters ayant pour id $info existe.
    {
      return (bool) $this->_db->query('SELECT COUNT(*) FROM Characters WHERE id = '.$info)->fetchColumn();
    }
    
    // Sinon, c'est qu'on veut vérifier que le nom existe ou pas.
    
    $q = $this->_db->prepare('SELECT COUNT(*) FROM Characters WHERE nom = :nom');
    $q->execute([':nom' => $info]);
    
    return (bool) $q->fetchColumn();
	}
	
	public function setDb (PDO $db)
	{
		$this->_db = $db;
	}
}