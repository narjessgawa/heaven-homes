<?php 
/**
 * 
 */

class promation 
{

	private $id;
	private $val_promation;
	private $id_Maison;


	
	function __construct($id,$val_promation,$id_Maison)
	{
		$this->id=$id;
		$this->val_promation=$val_promation;
		$this->id_Maison=$id_Maison;
		
	}
	
	function getid(){return $this->id;}
		function getval_promation(){return $this->val_promation;}
	function getid_Maison(){return $this->id_Maison;}

	public function set_id($id)
		{
			$this->id = $id;
		}
			public function set_val_promation($val_promation)
		{
			$this->val_promation = $val_promation;
		}
public function set_id_Maison($id_Maison)
		{
			$this->id_Maison = $id_Maison;
		}
		
}
 ?>
