<?php 
class categorie
{
  private $_id;
  private $_nom;

  public function __construct($_id,$nom)
  {
    $this->_id=$_id;
    $this->_nom=$nom;


  }

  public function getid()
  {
    return $this->_id;
  }
   public function getnom()
  {
    return $this->_nom;
  }
 
}
 ?>
