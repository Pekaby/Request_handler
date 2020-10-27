<?
/**
 * Requests
 */

require_once 'cfg.php';
require_once 'server/abstract/server.php';
class requests extends server
{
    public $request;
    public $get;

    function __construct()
    {
        $this->request = $this->hook();
        $this->check();
    }

    public function hook()
    {
        global $_SERVER;
        $q = explode('?', $_SERVER['REQUEST_URI']);
        if (isset($q[1])) {
           $this->get = $q[1];
           $get = explode('=', $q[1]);
           $_SESSION['get_val'] = $art_id[1];
           $_SESSION['get'] = $this->get;
        }
        $this->check();
        return $q[0];
    }
    public function get()
    {
        return $this->get;
    }
    private function check()
    {
        if ($this->get == 'id=0') {
            self::redirect('/');
        }
    }
}
