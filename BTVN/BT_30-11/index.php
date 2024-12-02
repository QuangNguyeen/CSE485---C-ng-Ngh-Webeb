<?php
$controllerName = ucfirst(strtolower($_REQUEST['controller'] ?? 'Welcome')) . 'Controller';
$actionName     = strtolower($_REQUEST['action'] ?? 'index');
require 'controllers/' . $controllerName . '.php';
echo $controllerName;
$controllerObject = new $controllerName;
$controllerObject -> $actionName();