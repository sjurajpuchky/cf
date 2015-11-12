<?php

namespace cf;

class Form {

    private $fields = array();
    private $name;
    private $action;
    private $method = "GET";
    private $onSubmit;

    function __construct($name,$onSubmit="") {
        $this->name = $name;
        $this->onSubmit = $onSubmit;
    }

    public function addEmail($fieldName, $label, $required = false, $default = "", $attrs=array()) {
        $this->fields[] = new FormField($fieldName, "email", $label, $required, $default,$attrs);
    }

    public function addText($fieldName, $label, $required = false, $default = "", $attrs=array()) {
        $this->fields[] = new FormField($fieldName, "text", $label, $required, $default,$attrs);
    }

    public function addPassword($fieldName, $label, $required = false, $default = "", $attrs=array()) {
        $this->fields[] = new FormField($fieldName, "password", $label, $required, $default,$attrs);
    }

    public function addUrl($fieldName, $label, $required = false, $default = "", $attrs=array()) {
        $this->fields[] = new FormField($fieldName, "url", $label, $required, $default,$attrs);
    }

    public function addSubmit($fieldName, $label) {
        $this->fields[] = new FormField($fieldName, "submit", $label);
    }

    public function addSelect($fieldName, $label, $dataModel, $required = false, $default = "", $attrs=array()) {
        $this->fields[] = new Select($fieldName, $label, $dataModel, $required, $default,$attrs);
    }

    public function AddFile($fieldName, $label, $required = false, $attrs=array()) {
        $this->fields[] = new FormField($fieldName, "file", $label, $required,$attrs);
    }

    public function AddHidden($fieldName, $default) {
        $this->fields[] = new Hidden($fieldName, $default);
    }

    public function __toString() {
        $ret = "<form name=\"$this->name\" method=\"$this->method\" action=\"$this->action\" enctype=\"multipart/form-data\" ";
        if($this->onSubmit == "") {
            $ret .= "><table id=\"$this->name\">";
        } else {
            $ret .="onsubmit=\"$this->onSubmit\"><table id=\"$this->name\">";
        }
        foreach ($this->fields as $field) {

            $ret .= $field->__toString();
        }
        $ret .= "</table></form>";
        return $ret;
    }

    function getFields() {
        return $this->fields;
    }

    function getName() {
        return $this->name;
    }

    function getAction() {
        return $this->action;
    }

    function setFields($fields) {
        $this->fields = $fields;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setAction($action) {
        $this->action = $action;
    }

    function getMethod() {
        return $this->method;
    }

    function setMethod($method) {
        $this->method = $method;
    }

}
