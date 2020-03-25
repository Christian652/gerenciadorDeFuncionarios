<?php 
class Conn
{
	public static $host = "localhost";
	public static $dbname = "innerjoin";
	public static $user = "root";
	public static $pass = "";
	private static $conn = null;

	private static function conectar()
	{
		if(self::$conn === null):
			try {
				self::$conn = new PDO('mysql:host='.self::$host.';dbname='.self::$dbname,self::$user,self::$pass);
			} catch (Exception $e) {
				header("Location: erro.php");
			}
		endif;
		
		return self::$conn;
	}

	public function getConn()
	{
		return self::conectar();
	}
}