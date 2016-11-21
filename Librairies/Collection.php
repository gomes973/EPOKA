<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Collection{
	
	private $colObjet;
	
	public function __construct(){
		$this->colObjet=array();
	}
	
	public function add($unobj){
		$this->colObjet[]=$unobj;
	}
	
	public function getAll(){
		return $this->colObjet;
	}
}
?>

