<?php

$con = new mysqli("localhost","root","!1APOnion0*dm");

function Ssql($select = NULL, $from = NULL, $where = NULL) {

  $sql = "SELECT $select FROM $from";

  if ($where != NULL) {

    $sql .= "WHERE $where";

  }

}

?>
