<?php
namespace models;
/**
 * @table("name"=>"typeq")
 */
class Typeq{
	/**
	 * @id()
	 * @column("name"=>"id","dbType"=>"int(11)")
	 * @validator("type"=>"id","constraints"=>["autoinc"=>true])
	 */
	private $id;

	/**
	 * @column("name"=>"caption","dbType"=>"varchar(100)")
	 * @validator("type"=>"length","constraints"=>["max"=>100,"notNull"=>true])
	 */
	private $caption;

	/**
	 * @oneToMany("mappedBy"=>"typeq","className"=>"models\\Question")
	 */
	private $questions;

	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id=$id;
	}

	public function getCaption(){
		return $this->caption;
	}

	public function setCaption($caption){
		$this->caption=$caption;
	}

	public function getQuestions(){
		return $this->questions;
	}

	public function setQuestions($questions){
		$this->questions=$questions;
	}

	 public function addQuestion($question){
		$this->questions[]=$question;
	}

	 public function __toString(){
		return ($this->caption??'no value').'';
	}

}