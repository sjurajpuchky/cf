<?php
namespace cf;

class Db {

    private $link;
    public $table_prefix;

    function __construct($server = DB_HOST, $username = DB_USER, $password = DB_PASSWORD, $database_name = DB_NAME, $table_prefix = DB_TABLE_PREFIX) {
        $this->link = mysql_connect($server, $username, $password, true);
        if (!$this->link) {
            die("Cannot connect to DB");
        }
        if (!mysql_select_db($database_name, $this->link)) {
            die("Cannot select db");
        }
        $this->table_prefix = $table_prefix;
    }

    public function getResults($sql, $type = MYSQL_ASSOC, $debug = false) {
        if ($debug) {
            echo $sql;
        }
        $res = mysql_query($sql, $this->link);
        $result = array();
        if ($res) {
            while ($row = mysql_fetch_array($res, $type)) {
                $result[] = $row;
            }
        }
        return $result;
    }

    public function query($sql) {
        return mysql_query($sql, $this->link);
    }

    public function insert($table, $assoc) {
        $cols = "";
        $values = "";
        foreach ($assoc as $key => $value) {
            $cols .= "$key,";
            if ($value == "NOW()") {
                $values .= addslashes($value). ",";
            } else {
                $values .= "'" . addslashes($value) . "',";
            }
        }
        $cols = trim($cols, ",");
        $values = trim($values, ",");
        $sql = "INSERT INTO $table($cols) VALUES($values);";
        //echo $sql;
        return mysql_query($sql, $this->link);
    }

    public function update($table, $assoc, $condition, $debug = false) {
        $sets = "";
        foreach ($assoc as $key => $value) {
            $sets .= " $key='" . addslashes($value) . "',";
        }
        $sets = trim($sets, ",");
        $sql = "UPDATE $table SET $sets WHERE $condition;";
        if ($debug) {
            echo $sql;
        }
        return mysql_query($sql, $this->link);
    }

    /**
     * Convert meta table to associative array
     * @param Array $metas
     * @param string $metakey
     */
    function metaAsArray($metas, $metakey = "metakey", $metavalue = "metavalue") {
        $ret = array();
        foreach ($metas as $meta) {
            $ret[$meta[$metakey]] = $meta[$metavalue];
        }
        return $ret;
    }

    /**
     * Last inserted id
     * @return number
     */
    public function getLastId() {
        return mysql_insert_id($this->link);
    }

    function __destruct() {
        mysql_close($this->link);
        unset($this->link);
    }

    public function getLastError() {
        return mysql_error($this->link);
    }

    function getLink() {
        return $this->link;
    }

    function getTable_prefix() {
        return $this->table_prefix;
    }

    function setLink($link) {
        $this->link = $link;
    }

    function setTable_prefix($table_prefix) {
        $this->table_prefix = $table_prefix;
    }

}
