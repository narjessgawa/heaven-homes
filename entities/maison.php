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
 ?>
