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

		

		
	
}


?>