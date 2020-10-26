<?
require_once 'server/requests.php';
require_once 'server/render.php';

session_start();

function debug($var = '')
{
    global $_SESSION;
    global $requests;

    if ($var == '') {
        echo "<pre>";
        print_r($requests);
        echo "Path __DIR__: " . __DIR__ . "\n";
        echo "SESSION: ";
        var_dump($_SESSION);
        echo "</pre>";
    }else{
        echo "<pre>";
        print_r($var);
        echo "</pre>";
    }
}
debug();

$requests = new requests;
// $render = new render;

$page = $requests->request;
$get = $requests->get;

print_r($requests);

if ($get != '') {
    render::dynamic_paint($page, $get);
}else{
    render::paint($page);
}
