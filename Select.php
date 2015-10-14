<?php

namespace cf;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Select
 *
 * @author Juraj Puchký
 */
class Select {

    private $fieldName;
    private $dataModel = array();
    private $label;
    private $required = false;

    function __construct($fieldName, $label, $dataModel, $required = false) {
        $this->fieldName = $fieldName;
        $this->dataModel = $dataModel;
        $this->label = $label;
        $this->required = $required;
    }

    public function __toString() {
        $ret = "<tr>";
        $ret .= "<td class=\"formLabel\">";
        $ret .= "<label for=\"" . $this->fieldName . "\">" . $this->label . "</label>";

        $ret .= "</td>";
        $ret .= "<td class=\"formField\">";

        $ret .= "<select id=\"" . $this->fieldName . "\" name=\"" . $this->fieldName . "\" type=\"" . $this->fieldType . "\" " . ($this->required ? "required" : "") . ">";
        foreach($this->dataModel as $key=>$value) {
            $ret.="<option value=\"$key\">$value</option>";
        }
        $ret .= "</select>";
        $ret .= "</td>";
        $ret .= "</tr>";
        return $ret;
    }

}
