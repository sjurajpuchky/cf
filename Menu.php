<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace cf;

/**
 * Description of Menu
 *
 * @author Zdena Puchká
 */
class Menu {

    private $menuItems = array();
    private $name;
    private $controler;

    function __construct($name,$baseDir) {
        $this->name = $name;
        $this->controler = new ContentControler($baseDir);
    }

    public function addMenuItem($menuId, $label) {
        $this->menuItems[] = new MenuItem($menuId, $label);
        $this->controler->addControl($menuId, "$menuId.php");
    }

    public function __toString() {

        $ret = "<div id=\"$this->name\">";
        foreach ($this->menuItems as $menuItem) {
            if ($menuItem instanceof MenuItem) {
                $ret .= $menuItem;
            }
        }
        $ret .= "</div>";
        return $ret;
    }

    function getMenuItems() {
        return $this->menuItems;
    }

    function getName() {
        return $this->name;
    }

    function setMenuItems($menuItems) {
        $this->menuItems = $menuItems;
    }

    function setName($name) {
        $this->name = $name;
    }
    
    function getControl($menuId) {
        $this->controler->getContent($menuId);
    }

}
