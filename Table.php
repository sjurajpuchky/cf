<?php

namespace cf;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Table
 *
 * @author Juraj Puchký
 */
class Table {

    private $dataModel;
    private $class;
    private $head;

    function __construct($dataModel, $head, $class = "table") {
        $this->dataModel = $dataModel;
        $this->class = $class;
        $this->head = $head;
    }

    public function __toString() {
        $ret = "<table class=\"$this->class\">";
        $ret .= "<tr class=\"$this->class\">";
        foreach ($this->head as $h) {
            $ret .= "<td class=\"$this->class\">$h</td>";
        }
        $ret .= "</tr>";
        foreach ($this->dataModel as $row) {
            $ret .= "<tr class=\"$this->class\">";
            foreach ($row as $column) {
                $ret .= "<td class=\"$this->class\">$column</td>";
            }
            $ret .= "</tr>";
        }
        $ret .= "</table>";
        return $ret;
    }

}
