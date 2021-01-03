<?php
 class config {
    private static $instance = NULL;

    public static function getConnexion() {
      if (!isset(self::$instance)) {
		try{
        self::$instance = new PDO('mysql:host=localhost;dbname=narjes', 'root', '');
		self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}catch(Exception $e){
            die('Erreur: '.$e->getMessage());
		}
      }
      return self::$instance;
    }
  }
class  CategorieC {
	
		    function stats(){

		$sql="SELECT count(prix) as nbr , c.nom FROM `maison` e INNER JOIN categorie c WHERE e.id_categorie=c.id_categorie group by c.nom";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}

	function ajoutercategorie($categorie)
	{

 	$sql="INSERT INTO `categorie`( `nom`) VALUES (:nom)";
 	$db = config::getConnexion();
 		try{
		$req=$db->prepare($sql);		
		$nom=$categorie->getnom();
		echo $categorie->getnom();
		 
		$req->bindValue(':nom',$nom);
            $req->execute();
        }
        catch (Exception $e){

            echo 'Erreur: '.$e->getMessage();
        }
	}
		    function afficherlist_categorie(){

		$sql="SElECT * From categorie";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
			function recuperercategorie($id){
		$sql="SELECT * FROM `categorie` WHERE  id_categorie=:id ";
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
function modifiercategorie($categorie,$id)
	{
 	$db = config::getConnexion();
 	$sql="UPDATE `categorie` SET `nom`=:nom WHERE `id_categorie`=:id";
 		try{

        $req=$db->prepare($sql);		
       	$nom=$categorie->getnom();  
		$req->bindValue(':id',$id);
			$req->bindValue(':nom',$nom);
		
		
			

            $req->execute();
        }
        catch (Exception $e){

            echo 'Erreur: '.$e->getMessage();
        }
	}




        function Supprimercategorie($id){
		$sql="DELETE  from categorie where  id_categorie=:id ";
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

		

		
	
}


?>