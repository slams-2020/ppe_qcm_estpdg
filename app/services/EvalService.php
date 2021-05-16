<?php


namespace services;


use Ajax\php\ubiquity\JsUtils;
use models\Exam;
use Ubiquity\orm\DAO;

class EvalService
{
    protected $jquery;
    protected $semantic;
    public function __construct(JsUtils $jq) {
        $this->jquery = $jq;
        $this->semantic = $jq->semantic ();
    }

    public function EvalForm() {
        $frm = $this->jquery->semantic ()->dataForm ( 'form', new Exam() );
        $frm->setFields ( [
            'dated',
            'datef',
            'submit'
        ] );
        $frm->fieldAsInput ( 'dated', [
            'inputType' => 'datetime-local'
        ] );
        $frm->fieldAsInput ( 'datef', [
            'inputType' => 'datetime-local'
        ] );
        return $frm;
    }
    public function EvalAjoutForm($Eval) {
        $dernierExam = DAO::getById ( Exam::class, $Eval->getId() );
        $frm = $this->jquery->semantic ()->dataElement ( "form", $dernierExam );
        $frm->setFields ( [
            'dated',
            'datef'
        ] );
        $frm->setCaptions ( [
            'Date de Début',
            'Date de Fin'
        ] );
        return $frm;
    }

    public function EvalListe() {
        $groups = DAO::getAll ( Exam::class );
        $table = $this->jquery->semantic ()->dataTable( "tableE", Exam::class,$groups );
        $table->setFields(['dated','datef',"satus","idGroup"]);
        $table->setCaptions( [
            "Date de Début",
            "Date de Fin",
            "Status",
            "Groupe Assigné"
        ] );
        $table->setIdentifierFunction('getId');
        $table->addDeleteButton(false);
        $table->addEditButton(false);
        return  $table;
    }

}