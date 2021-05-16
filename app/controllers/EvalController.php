<?php
namespace controllers;

use services\EvalService;
use Ubiquity\orm\DAO;
use Ubiquity\utils\http\URequest;
use models\Exam;

/**
 * Controller EvalController
 *
 * @property \Ajax\php\ubiquity\JsUtils $jquery
 * @route("/Eval","inherited"=>true,"automated"=>true)
 */
class EvalController extends ControllerBase
{
    private $EvalService;
    public function initialize() {
        parent::initialize ();
        $this->EvalService = new EvalService( $this->jquery );
    }

    public function index() {
        $frm = $this->EvalService->EvalListe ();
        $this->jquery->getOnClick('._delete', 'EvalController/suppEval','#main-container',['attr'=>'data-ajax']);
        $this->jquery->getOnClick('._edit', 'EvalController/afficherEval','#main-container',['attr'=>'data-ajax']);
        $this->jquery->renderView ( "EvalController/index.html" );
    }

    public function menu() {
        $frm = $this->EvalService->EvalForm ();
        $frm->fieldAsSubmit ( 'submit', 'blue', 'EvalController/submit', '#response', [
            'ajax' => [
                'hasLoader' => 'internal'
            ]
        ] );
        $this->jquery->renderView ( "EvalController/menu.html" );
    }

    public function submit() {
        $Eval = new Exam ();
        URequest::setValuesToObject ( $Eval );
        DAO::insert ( $Eval );
        $frm = $this->EvalService->EvalAjoutForm ( $Eval );
        $this->jquery->doJQuery ( '#form', 'html', "" );
        $this->jquery->renderView ( "EvalController/menu.html" );
    }

    public function suppEval($id){
        DAO::delete(Exam::class, $id);
        $frm = $this->EvalService->EvalListe();
        $this->index();
    }
}