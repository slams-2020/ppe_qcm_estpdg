<?php
namespace models;
/**
 * @table("name"=>"examoption")
 */
class Examoption{
	/**
	 * @id()
	 * @column("name"=>"idExam","dbType"=>"int(11)")
	 * @validator("type"=>"id","constraints"=>["autoinc"=>true])
	 */
	private $idExam;

	/**
	 * @id()
	 * @column("name"=>"idOption","dbType"=>"int(11)")
	 * @validator("type"=>"id","constraints"=>["autoinc"=>true])
	 */
	private $idOption;

	/**
	 * @column("name"=>"value","nullable"=>true,"dbType"=>"varchar(42)")
	 * @validator("type"=>"length","constraints"=>["max"=>42])
	 */
	private $value;

	/**
	 * @manyToOne()
	 * @joinColumn("className"=>"models\\Exam","name"=>"idExam")
	 */
	private $exam;

	/**
	 * @manyToOne()
	 * @joinColumn("className"=>"models\\Option","name"=>"idOption")
	 */
	private $option;

	public function getIdExam(){
		return $this->idExam;
	}

	public function setIdExam($idExam){
		$this->idExam=$idExam;
	}

	public function getIdOption(){
		return $this->idOption;
	}

	public function setIdOption($idOption){
		$this->idOption=$idOption;
	}

	public function getValue(){
		return $this->value;
	}

	public function setValue($value){
		$this->value=$value;
	}

	public function getExam(){
		return $this->exam;
	}

	public function setExam($exam){
		$this->exam=$exam;
	}

	public function getOption(){
		return $this->option;
	}

	public function setOption($option){
		$this->option=$option;
	}

	 public function __toString(){
		return $this->idExam.'';
	}

}