<?php


namespace services;


use Ajax\php\ubiquity\JsUtils;

class EvalService
{
    protected $jquery;
    protected $semantic;
    public function __construct(JsUtils $jq) {
        $this->jquery = $jq;
        $this->semantic = $jq->semantic ();
    }

}