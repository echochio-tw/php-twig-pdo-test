<?php
function getAll($table){
    global $mypdo;
    $a = "select * from ".$table;
    $stmt = $mypdo->prepare($a);
    $stmt->execute();
    $result  = $stmt->fetchALL(PDO::FETCH_ASSOC);
    return $result;
}

function get_info($table,$info_id){
    global $mypdo;
    $a = 'select * from '.$table.' where '.$table.'_id = :xyz';
    $stmt = $mypdo->prepare($a);
    $stmt->execute(array(":xyz" => $info_id));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row;
}
?>
