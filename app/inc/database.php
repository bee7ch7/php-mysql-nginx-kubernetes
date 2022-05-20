<?php
include('func.php');

class mysqldb {
  private $pdo = null;
  private $stmt = null;

	private $username = getenv("MYSQL_USER");
	private $password = getenv("MYSQL_PASSWORD");
	private $dbname = getenv("DB_NAME");
	private $pg_ip = "mysql";

  function __construct($ip = null){

      // $username = getenv("MYSQL_USER");
      // $password = getenv("MYSQL_PASSWORD");
      // $dbname = getenv("DB_NAME");
      // $pg_ip = "mysql";


	   if ($ip !== null){
            $this->pg_ip = $ip;
        }

    try {
      $this->pdo = new PDO(
        "mysql:host=". $pg_ip .";dbname=".$dbname, $username, $password,
         [
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
          PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
          PDO::ATTR_EMULATE_PREPARES => false,
        ]
      );
    } catch (Exception $ex) { die($ex->getMessage()); }
  }

  function __destruct(){
    if ($this->stmt!==null) { $this->stmt = null; }
    if ($this->pdo!==null) { $this->pdo = null; }
  }

  function select($sql, $cond=null){
    $result = false;
    try {
      $this->stmt = $this->pdo->prepare($sql);
      $this->stmt->execute($cond);
      $result = $this->stmt->fetchAll();
    } catch (Exception $ex) { die($ex->getMessage()); }
    $this->stmt = null;
    return $result;
  }

  function insert($sql, $cond=null){
    $result = false;
    try {
      $this->stmt = $this->pdo->prepare($sql);
      $this->stmt->execute($cond);
      $result = $this->stmt->fetchAll();
    } catch (Exception $ex) { die($ex->getMessage()); }
    $this->stmt = null;
    return $result;
  }

  function update($sql, $cond=null){
    $result = false;
    try {
      $this->stmt = $this->pdo->prepare($sql);
      $res2 = $this->stmt->execute($cond);
      $result = $this->stmt->fetchAll();
    } catch (Exception $ex) { die($ex->getMessage()); }
    $this->stmt = null;
    return $res2;
  }

  function delete($sql, $cond=null){
    $result = false;
    try {
      $this->stmt = $this->pdo->prepare($sql);
      $this->stmt->execute($cond);
      $result = $this->stmt->fetchAll();
    } catch (Exception $ex) { die($ex->getMessage()); }
    $this->stmt = null;
    return $result;
  }

}

?>