<?php	

/** Log from any PHP file to console **/
function console_log($output, $with_script_tags = true) {
    $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . ');';
    if ($with_script_tags) {
        $js_code = '<script>' . $js_code . '</script>';
    }
    echo $js_code;
}

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(dirname(__FILE__)));

/** Define path of URL and URI **/
$url = array_key_exists("url", $_GET) ? $_GET['url'] : "";
$uri = urldecode($_SERVER['REQUEST_URI']);

require_once (ROOT . DS . 'library' . DS . 'bootstrap.php');

ob_start();  // Used for clear screen in future
