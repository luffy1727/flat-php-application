<?php

namespace Boozt\Database\Repository;

use PDO;
use PDOException;

class OrderRepository extends BaseRepository
{
    public function __construct($db)
    {
        parent::__construct($db);
    }

    public function findAll()
    {
        $statement = "
            SELECT 
                id, purchase_date, country, device
            FROM
                `order`
                ";

        try {
            $statement = $this->db->query($statement);
            $result = $statement->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function findCount()
    {
        $statement = "
            SELECT 
                count(id) as orderCount
            FROM
                `order`;
        ";

        try {
            $statement = $this->db->query($statement);
            $result = $statement->fetchAll(\PDO::FETCH_ASSOC);

            return $result[0]['orderCount'];
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function findBetweenTimeFrames($from, $to)
    {
        $statement = "
            SELECT 
                id, purchase_date, country, device
            FROM
                `order`
            WHERE
                order.purchase_date >= :from AND order.purchase_date <= :to";

        try {
            $stmt = $this->db->prepare($statement);
            $stmt->bindValue(':from', $from->format('Y-m-d'), PDO::PARAM_STR);
            $stmt->bindValue(':to', $to->format('Y-m-d'), PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
}
