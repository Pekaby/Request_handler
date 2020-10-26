<?
/**
 * Server
 */
require_once 'server/abstract/db.php';
abstract class server extends db
{
    protected static function redirect($page)
    {
        header("Location: $page");
    }
}