<?php

namespace classes;

class DB
{
    /**
     * @var string
     */
    private $host = "localhost";
    /**
     * @var string
     */
    private $username = "root";
    /**
     * @var string
     */
    private $password = "";
    /**
     * @var string
     */
    private $dbName = "";
    /**
     * @var int
     */
    private $port;
    /**
     * @var \PDO
     */
    private $connection;

    /**
     * DB constructor.
     * @param $host
     * @param $username
     * @param $password
     * @param $dbName
     * @param int $port
     */
    public function __construct($host, $username, $password, $dbName, $port = 3306)
    {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->dbName = $dbName;
        $this->port = $port;

        try {
            $connection = new \PDO("mysql:host=".$this->host.";dbname=".$this->dbName.";port=".$this->port, $this->username, $this->password);
            $connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $this->connection = $connection;
        } catch (\PDOException $exception) {
            echo "Error while database connect " . $exception->getMessage();
        }
    }

    /**
     * @return \PDO
     */
    public function getConnection()
    {
        return $this->connection;
    }

    /**
     * @param $connectio
     */
    public function setConnection($connectio)
    {
        if($connectio instanceof \PDO) {
            $this->connection = $connectio;
        }
    }

    /**
     * @return array
     */
    public function getPrispevky()
    {
        $sql = "SELECT prispevok.img_path as img_path, prispevok.nazov as nazov, prispevok.popis as popis,prispevok.datum as datum,prispevok.adresa as adresa,
              mesto.nazov as mesto,prispevok.kontakt as kontakt FROM `prispevok` INNER JOIN mesto on mesto_idmesto=mesto.idmesto order by prispevok.datum ";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}