<?php

namespace Boozt\Database\Repository;

use PDO;
use PDOException;

class CustomerRepository extends BaseRepository
{
    public function __construct($db)
    {
        parent::__construct($db);
    }

    public function findAll()
    {
        $statement = "
            SELECT 
                id, first_name, last_name, email
            FROM
                customer;
        ";

        try {
            $statement = $this->db->query($statement);
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function findCount()
    {
        $statement = "
            SELECT 
                count(id) as customerCount
            FROM
                customer;
        ";

        try {
            $statement = $this->db->query($statement);
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);

            return $result[0]['customerCount'];
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function findBetweenTimeFrames($from, $to)
    {
        $statement = "
            SELECT 
                id, first_name, last_name, email, created_at
            FROM
                customer
            WHERE
                customer.created_at >= :from AND customer.created_at =< :to";

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
