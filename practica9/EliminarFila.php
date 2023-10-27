<?php

$id = $_REQUEST["id"];
$bd = $_REQUEST["bd"];

$bd->delete($id);