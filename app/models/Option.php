<?php
namespace models;
/**
 * @table("name"=>"option")
 */
class Option{
	/**
	 * @id()
	 * @column("name"=>"id","dbType"=>"int(11)")
	 * @validator("type"=>"id","constraints"=>["autoinc"=>true])
	 */
	private $id;

	/**
	 * @column("name"=>"key","nullable"=>true,"dbType"=>"varchar(42)")
	 * @validator("type"=>"length","constraints"=>["max"=>42])
	 */
	private $key;

	/**
	 * @column("name"=>"description","nullable"=>true,"dbType"=>"text")
	 */
	private $description;

	/**
	 * @oneToMany("mappedBy"=>"option","className"=>"models\\Examoption")
	 */
	private $examoptions;

	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id=$id;
	}

	public function getKey(){
		return $this->key;
	}

	public function setKey($key){
		$this->key=$key;
	}

	public function getDescription(){
		return $this->description;
	}

	public function setDescription($description){
		$this->description=$description;
	}

	public function getExamoptions(){
		return $this->examoptions;
	}

	public function setExamoptions($examoptions){
		$this->examoptions=$examoptions;
	}

	 public function addExamoption($examoption){
		$this->examoptions[]=$examoption;
	}

	 public function __toString(){
		return $this->id.'';
	}

}