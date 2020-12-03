<?php
namespace models;
/**
 * @table('group')
*/
class Group{
	/**
	 * @id
	 * @column("name"=>"id","nullable"=>false,"dbType"=>"int(11)")
	 * @validator("id","constraints"=>array("autoinc"=>true))
	*/
	private $id;

	/**
	 * @column("name"=>"name","nullable"=>true,"dbType"=>"varchar(42)")
	 * @validator("length","constraints"=>array("max"=>42))
	*/
	private $name;

	/**
	 * @column("name"=>"description","nullable"=>true,"dbType"=>"text")
	*/
	private $description;

	/**
	 * @oneToMany("mappedBy"=>"group","className"=>"models\\Exam")
	*/
	private $exams;

	/**
	 * @manyToOne
	 * @joinColumn("className"=>"models\\User","name"=>"idUser","nullable"=>false)
	*/
	private $user;

	/**
	 * @manyToMany("targetEntity"=>"models\\User","inversedBy"=>"groups")
	 * @joinTable("name"=>"usergroup")
	*/
	private $users;

	 public function getId(){
		return $this->id;
	}

	 public function setId($id){
		$this->id=$id;
	}

	 public function getName(){
		return $this->name;
	}

	 public function setName($name){
		$this->name=$name;
	}

	 public function getDescription(){
		return $this->description;
	}

	 public function setDescription($description){
		$this->description=$description;
	}

	 public function getExams(){
		return $this->exams;
	}

	 public function setExams($exams){
		$this->exams=$exams;
	}

	 public function addExam($exam){
		$this->exams[]=$exam;
	}

	 public function getUser(){
		return $this->user;
	}

	 public function setUser($user){
		$this->user=$user;
	}

	 public function getUsers(){
		return $this->users;
	}

	 public function setUsers($users){
		$this->users=$users;
	}

	 public function addUser($user){
		$this->users[]=$user;
	}

	 public function __toString(){
		return $this->id.'';
	}

}