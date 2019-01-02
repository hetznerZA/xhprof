<?php
if(empty($_GET['user']) && empty($_COOKIE['_user'])) {
  die('Please provide query-string parameter "user" with the unix user of the site you\'d like to analyse');
}

# super nasty, i know - but this lib is written in such a way that makes this hard
global $_xhprof;
$_xhprof['dbtable'] = !empty($_GET['user']) ? $_GET['user'] : $_COOKIE['_user'];
setcookie('_user', $_xhprof['dbtable']);
