<?php

/** Raise 404 error page when get an invalid URL **/
function raiseError404() {
    $error = error_get_last();

    // Fatal error, E_ERROR === 1
    if ($error != null and $error['type'] === E_ERROR) {
		http_response_code(404);
		if (DEVELOPMENT_ENVIRONMENT == false) {
			ob_end_clean();
		}
		$dispatch = new Error404Controller("Error404", "error404", "view");

    }
}
register_shutdown_function('raiseError404');

/** Check if environment is development and display errors **/
function setReporting() {
if (DEVELOPMENT_ENVIRONMENT == true) {
	error_reporting(E_ALL);
	ini_set('display_errors','On');
} else {
	error_reporting(E_ALL);
	ini_set('display_errors','Off');
	ini_set('log_errors', 'On');
	ini_set('error_log', ROOT.DS.'tmp'.DS.'logs'.DS.'error.log');
}
}

/** Check for Magic Quotes and remove them **/
function stripSlashesDeep($value) {
	$value = is_array($value) ? array_map('stripSlashesDeep', $value) : stripslashes($value);
	return $value;
}

/** Check register globals and remove them **/
function unregisterGlobals() {
    if (ini_get('register_globals')) {
        $array = array('_SESSION', '_POST', '_GET', '_COOKIE', '_REQUEST', '_SERVER', '_ENV', '_FILES');
        foreach ($array as $value) {
            foreach ($GLOBALS[$value] as $key => $var) {
                if ($var === $GLOBALS[$key]) {
                    unset($GLOBALS[$key]);
                }
            }
        }
    }
}

function callHook() {
	global $url;
	global $uri;

	/** Start a session **/
	session_start();
	error_reporting(0);

	/** Get path from URL **/
	$urlArray = explode("/",$url);
	
	/** Get query from URI **/
	$uri = parse_url($uri);
	$query = array();
	if (array_key_exists("query", $uri)) {
		$queryArray = explode("&", $uri["query"]);
		foreach ($queryArray as $q) {
			$query = array_merge($query, parse_ini_string($q));
		}	
	}

	/** Define homepage URL **/
	define('HOME', explode($url . 'suffix', $uri["path"] . 'suffix')[0]);

	/** Remove empty string at end of $urlArray **/
	if (end($urlArray) == "") {
		array_pop($urlArray);
	}

	/** Default value for controller and action **/
	$controller = count($urlArray) > 0 ? $urlArray[0] : "home";
	$action = count($urlArray) > 1 ? $urlArray[1] : "view";

	$controllerName = $controller;
	$model = ucwords($controller);
	$controller = $model . "Controller";

	$dispatch = new $controller($model, $controllerName, $action);

	call_user_func_array(array($dispatch,$action),$query);
}

/** Autoload any classes that are required **/

function autoloader($className) {
	if (file_exists(ROOT . DS . 'library' . DS . strtolower($className) . '.class.php')) {
		require_once(ROOT . DS . 'library' . DS . strtolower($className) . '.class.php');
	} else if (file_exists(ROOT . DS . 'application' . DS . 'controllers' . DS . strtolower($className) . '.php')) {
		require_once(ROOT . DS . 'application' . DS . 'controllers' . DS . strtolower($className) . '.php');
	} else if (file_exists(ROOT . DS . 'application' . DS . 'models' . DS . strtolower($className) . '.php')) {
		require_once(ROOT . DS . 'application' . DS . 'models' . DS . strtolower($className) . '.php');
	} else {
	}
}

spl_autoload_register('autoloader');

setReporting();
unregisterGlobals();
callHook();
