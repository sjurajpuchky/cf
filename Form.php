<?php

namespace cf;

class Form {

    private $fields = array();
    private $name;
    private $action;
    private $method = "GET";

    function __construct($name) {
        $this->name = $name;
    }

    public function addEmail($fieldName, $label, $required = false, $default = "") {
        $this->fields[] = new FormField($fieldName, "email", $label, $required, $default);
    }

    public function addText($fieldName, $label, $required = false, $default = "") {
        $this->fields[] = new FormField($fieldName, "text", $label, $required, $default);
    }

    public function addPassword($fieldName, $label, $required = false, $default = "") {
        $this->fields[] = new FormField($fieldName, "password", $label, $required, $default);
    }

    public function addUrl($fieldName, $label, $required = false, $default = "") {
        $this->fields[] = new FormField($fieldName, "url", $label, $required, $default);
    }

    public function addSubmit($fieldName, $label) {
        $this->fields[] = new FormField($fieldName, "submit", $label);
    }

    public function addSelect($fieldName, $label, $dataModel, $required = false, $default = "") {
        $this->fields[] = new Select($fieldName, $label, $dataModel, $required, $default);
    }

    public function AddFile($fieldName, $label, $required = false) {
        $this->fields[] = new FormField($fieldName, "file", $label, $required);
    }

    public function AddHidden($fieldName, $default) {
        $this->fields[] = new Hidden($fieldName, $default);
    }

    public function __toString() {
        $ret = "<table id=\"$this->name\"><form method=\"$this->method\" action=\"$this->action\" enctype=\"multipart/form-data\">";
        foreach ($this->fields as $field) {

            $ret .= $field->__toString();
        }
        $ret .= "</form></table>";
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
