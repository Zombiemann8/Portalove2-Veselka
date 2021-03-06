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
        //$sql = "SELECT img_path, nazov, popis, datum, adresa, mesto, kontakt FROM `prispevok` WHERE datum > CURRENT_DATE";
        $sql = "SELECT img_path, nazov, popis, datum, adresa, mesto, kontakt FROM `prispevok`";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function  getMojePrispevky($id)
    {
        $sql = "SELECT idprispevok as id, img_path, nazov, popis, datum, adresa, mesto, kontakt FROM `prispevok` WHERE user_iduser='" . $id . "'";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function deletePrispevok($id_prispevku)
    {

        $sql = "DELETE FROM prispevok WHERE idprispevok='" . $id_prispevku . "'";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();

    }

    public function getEditovanyPrispevok($id_prispevku)
    {
        $sql = "SELECT * FROM prispevok WHERE idprispevok='" . $id_prispevku . "'";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function addPrispevok($nazov,$popis,$datum,$adresa,$id,$kontakt,$img_path,$mesto)
    {
        $stmt = $this->prepare('INSERT INTO prispevok (idprispevok, nazov, popis, datum, adresa, user_iduser, m, kontakt, img_path, mesto) VALUES (NULL, ?, ?, ?, ?, ?, \'1\', ?, ?, ?)');
        $stmt->bind_param("ssssisss", $nazov, $popis, $datum, $adresa, $id, $kontakt,$img_path,$mesto);
        $stmt->execute();
    }
    public function editPrispevok($nazov,$popis,$datum,$adresa,$id,$kontakt,$img_path,$mesto)
    {
        $stmt = $this->prepare('UPDATE prispevok SET nazov = ?, popis = ?, datum = ?, adresa = ?, kontakt = ?, img_path = ?, mesto = ? WHERE id = ?');
        $stmt->execute([$nazov, $popis, $datum, $adresa, $kontakt, $img_path,$mesto, $id]);
    }
}