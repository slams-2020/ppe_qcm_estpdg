<?php
namespace controllers;

/**
 * Controller EvalController
 *
 * @property \Ajax\php\ubiquity\JsUtils $jquery
 * @route("/Eval","inherited"=>true,"automated"=>true)
 */
class EvalController
{
    public function index() {
        $this->jquery->renderView ( "EvalController/index.html" );
    }
}