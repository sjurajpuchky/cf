<?php

namespace cf;

class ContentControler {

    private $baseDir = __DIR__;
    private $controls = array();

    function __construct($baseDir = __DIR__) {
        $this->baseDir = $baseDir;
    }

    public function addControl($controlId, $fragment) {
        $this->controls[$controlId] = $this->baseDir . "/" . $fragment;
    }

    function getContent($control) {
        //var_dump($this->controls[$control]);
        if (file_exists($this->controls[$control])) {
            include $this->controls[$control];
        }
    }

    function getControls() {
        return $this->controls;
    }

    function setControls($controls) {
        $this->controls = $controls;
    }

}
