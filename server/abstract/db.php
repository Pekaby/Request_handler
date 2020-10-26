<?
/**
 * Database
 */
abstract class db
{
    function __construct()
    {
        self::connect();
    }
    private static function connect()
    {
        $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        $host = 'localhost';
        $user = 'root';
        $password = 'toor';
        $database = 'qq';
        $charset = 'utf8';

        $dsn = "mysql:host=$host;dbname=$database;charset=$charset";

        $connect = new PDO($dsn, $user, $password, $opt);
        return $connect;

    }

    protected static function execute($sql)
    {
        $connect = self::connect();
        $stmt = $connect->prepare($sql);
        $stmt->execute();
        return $stmt;
    }
    protected static function exist($id)
    {
        $connect = self::connect();
        $stmt = self::execute("SELECT `id` FROM `questions` WHERE `id` = '$id'");
        return $stmt->rowCount();
    }
    protected static function query($sql)
    {
        $c = self::connect();
        $stmt = $c->query($sql);
        return $stmt;
    }
}