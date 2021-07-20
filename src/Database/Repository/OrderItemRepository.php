<?php

namespace Boozt\Database\Repository;

class OrderItemRepository extends BaseRepository
{
    public function __construct($db)
    {
        parent::__construct($db);
    }

    public function findAll()
    {
        $statement = "
            SELECT 
                quantity, price
            FROM
                order_items;
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
                (id)
            FROM
                order_items;
        ";

        try {
            $statement = $this->db->query($statement);
            $result = $statement->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }
}
