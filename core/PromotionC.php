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

class  PromotionC{
	


	function ajouterpromotion($promotion)
	{


 	$sql="INSERT INTO `promation`(`val_promation`, `id_Maison`) VALUES (:val_promation,:id_Maison)";
 	$db = config::getConnexion();
 		try{
		$req=$db->prepare($sql);		
		$val_promation=$promotion->getval_promation();
		$id_Maison=$promotion->getid_Maison();

		$req->bindValue(':val_promation',$val_promation);
		$req->bindValue(':id_Maison',$id_Maison);
	
            $req->execute();
        }
        catch (Exception $e){

            echo 'Erreur: '.$e->getMessage();
        }
	}


	    function afficherlist_promation(){

		$sql="SELECT p.id,m.id as id_Maison , `Nom_maison`, `Image`, `prix`, `localisation`,val_promation, `status`, `promotion`, nom FROM `maison` m INNER JOIN categorie c   INNER JOIN promation p WHERE (m.id = p.id_Maison) and (c.id_categorie = m.id_categorie)";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
function modifierpromotion($promotion,$id)
	{
 	$db = config::getConnexion();
 	$sql="UPDATE `promation` SET `val_promation`=:val_promation WHERE `id`=:id";
 		try{

        $req=$db->prepare($sql);		
	$val_promation=$promotion->getval_promation();

echo $val_promation;

		$req->bindValue(':val_promation',$val_promation);
		$req->bindValue(':id',$id);		
        $req->execute();
        }
        catch (Exception $e){

            echo 'Erreur: '.$e->getMessage();
        }
	}

        function Supprimerpromation($id){
		$sql="DELETE  from promation where  id=:id ";
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
	        function Supprimerpromation_Maison($id){
		$sql="DELETE  from promation where  id_Maison=:id ";
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
	
		function recupererMaison_promotion($id_Maison){
		$sql="SELECT * FROM `promation` WHERE  id_Maison=:id_Maison ";
		$db = config::getConnexion();
		try{
		$req=$db->prepare($sql);
		$req->bindValue(':id_Maison',$id_Maison);
 	    $req->execute();
 		$hotel= $req->fetchALL(PDO::FETCH_OBJ);
		return $hotel;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
		function recuperer_promotion($id){
		$sql="SELECT * FROM `promation` WHERE  id=:id ";
		$db = config::getConnexion();
		try{
		$req=$db->prepare($sql);
		$req->bindValue(':id',$id);
 	    $req->execute();
 		$hotel= $req->fetchALL(PDO::FETCH_OBJ);
		return $hotel;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
	

		
	
}


?>