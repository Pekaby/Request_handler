<?
/**
 * Rendering pages
 */
require_once 'cfg.php';
require_once 'server/abstract/server.php';
class render extends server
{
    private static $path = 'temp/viewer/';

    public static function paint($page)
    {
        global $cfg;
        $found = false;
        foreach ($cfg as $key => $value) {
            if ($key == $page) {
                $found = true;
                break;
            }
        }
        if ($found == true) {
            include self::$path.$cfg[$page];
        }else{
            include self::$path.'404.php';
        }
    }
    public static function dynamic_paint($page, $get)
    {
        global $cfg;
        $found = false;
        foreach ($cfg as $key => $value) {
            if ($key == $page) {
                $id = explode('=', $get);
                var_dump($id[1]);
                $count = self::exist($id[1]);
                if ($count > 0) {
                    $found = true;
                    break;
                }else{
                    $found = false;
                }
            }
        }
        if ($found == false) {
            include self::$path.'404.php';
        }
        if ($found == true) {
            include self::$path.$cfg[$page];
            var_dump($count);
        }

    }
}
