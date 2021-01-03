<?php
class maison
{
  private $_id;
  private $_image;
  private $_nom;
  private $_prix;
  private $_localisation;
  private $_status;
  private $_id_cat;
    private $promotion;
  

  public function __construct($image,$nom,$prix,$localisation,$status,$id_cat,$promotion)
  {

    $this->_image=$image;
    $this->_nom=$nom;
    $this->_prix=$prix;
    $this->_localisation=$localisation;
    $this->_status=$status;
    $this->_id_cat=$id_cat;
    $this->promotion=$promotion;

  }
  public function getpromotion()
  {
    return $this->promotion;
  }
  public function getid()
  {
    return $this->_id;
  }
  public function getimage()
  {
    return $this->_image;
  }
   public function getnom()
  {
    return $this->_nom;
  }
    public function getprix()
  {
    return $this->_prix;
  }
   public function getlocalisation()
  {
    return $this->_localisation;
  }
  public function getstatus()
  {
    return $this->_status;
  }
  public function getid_cat()
  {
    return $this->_id_cat;
  }

  
}
class  MaisonC {
	


	function ajouterMaison($Maison)
	{

 	$sql="INSERT INTO `maison`( `Nom_maison`, `Image`, `prix`, `localisation`, `status`, `promotion`, `id_categorie`) VALUES (:Nom_maison,:Image,:prix,:localisation,:status,:promotion,:id_categorie)";
 	$db = config::getConnexion();
 		try{
		$req=$db->prepare($sql);	
		$Nom_maison=$Maison->getnom();
		$Image=$Maison->getimage();
		$prix=$Maison->getprix();
		$localisation=$Maison->getlocalisation();
		$status=$Maison->getstatus();
		$promotion=$Maison->getpromotion();
		$id_categorie=$Maison->getid_cat();
		$req->bindValue(':Nom_maison',$Nom_maison);
		$req->bindValue(':Image',$Image);
		$req->bindValue(':prix',$prix);
		$req->bindValue(':localisation',$localisation);
		$req->bindValue(':status',$status);
		$req->bindValue(':promotion',$promotion);
		$req->bindValue(':id_categorie',$id_categorie);
            $req->execute();
        }
        catch (Exception $e){

            echo 'Erreur: '.$e->getMessage();
        }
	}
		    function afficherlist_maison(){

		$sql="SELECT `id`, `Nom_maison`, `Image`, `prix`, `localisation`, `status`, `promotion`,nom  FROM `maison` m INNER JOIN categorie c WHERE m.id_categorie=c.id_categorie";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}




          function recuperermaison_with_cat($id){
    $sql="SELECT `id`, `Nom_maison`, `Image`, `prix`, `localisation`, `status`, `promotion`,nom FROM `maison` m INNER JOIN categorie c WHERE m.id_categorie=c.id_categorie and m.id=:id ";
    $db = config::getConnexion();
    try{
    $req=$db->prepare($sql);
    $req->bindValue(':id',$id);
      $req->execute();
    $event= $req->fetchALL(PDO::FETCH_OBJ);
    return $event;
    }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }


  
			function recuperermaison($id){
		$sql="SELECT * FROM `maison` WHERE  id=:id ";
		$db = config::getConnexion();
		try{
		$req=$db->prepare($sql);
		$req->bindValue(':id',$id);
 	    $req->execute();
 		$event= $req->fetchALL(PDO::FETCH_OBJ);
		return $event;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
function modifierMaison($Maison,$id)
  {
  $db = config::getConnexion();
  $sql="UPDATE `maison` SET `Nom_maison`=:Nom_maison,`Image`=:Image,`prix`=:prix,`localisation`=:localisation,`status`=:status,`promotion`=:promotion,`id_categorie`=:id_categorie WHERE `id`=:id";
    try{

        $req=$db->prepare($sql);    
     

        $Nom_maison=$Maison->getnom();
    $Image=$Maison->getimage();
    $prix=$Maison->getprix();
    $localisation=$Maison->getlocalisation();
    $status=$Maison->getstatus();
    $promotion=$Maison->getpromotion();
    $id_categorie=$Maison->getid_cat();
    $req->bindValue(':Nom_maison',$Nom_maison);
    $req->bindValue(':Image',$Image);
    $req->bindValue(':prix',$prix);
    $req->bindValue(':localisation',$localisation);
    $req->bindValue(':status',$status);
    $req->bindValue(':promotion',$promotion);
    $req->bindValue(':id_categorie',$id_categorie);
    
        $req->bindValue(':id',$id);
      

            $req->execute();
        }
        catch (Exception $e){

            echo 'Erreur: '.$e->getMessage();
        }
  }



        function SupprimerMaison($id){
		$sql="DELETE  from maison where  id=:id ";
		$db = config::getConnexion();
		try{
		$req=$db->prepare($sql);
			$req->bindValue(':id',$id);
 	    $req->execute();
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
function promoterMaison($id){
    $sql="SELECT * FROM `maison` WHERE  id=:id ";
    $db = config::getConnexion();
    try{
    $req=$db->prepare($sql);
    $req->bindValue(':id',$id);
      $req->execute();
    $maison= $req->fetchALL(PDO::FETCH_OBJ);


$mais=$maison[0];

$newmaison = new maison($mais->Image,$mais->Nom_maison,$mais->prix,$mais->localisation,$mais->status,$mais->id_categorie ,1);

$this->modifierMaison($newmaison,$id);


    return $newmaison;
    }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    
  function deletepromotermaison($id){
    $sql="SELECT * FROM `maison` WHERE  id=:id ";
    $db = config::getConnexion();
    try{
    $req=$db->prepare($sql);
    $req->bindValue(':id',$id);
      $req->execute();
   $maison= $req->fetchALL(PDO::FETCH_OBJ);


$mais=$maison[0];

$newmaison = new maison($mais->Image,$mais->Nom_maison,$mais->prix,$mais->localisation,$mais->status,$mais->id_categorie ,0);

$this->modifierMaison($newmaison,$id);


    return $newmaison;
    }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
		

		
	
}
}


?>