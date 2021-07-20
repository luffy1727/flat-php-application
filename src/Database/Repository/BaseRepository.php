<?php

namespace Boozt\Database\Repository;


abstract class BaseRepository implements RepositoryInterface
{
    protected $db = null;

    public function __construct($db)
    {
        $this->db = $db;
    }

    /**
     */
    abstract public function findAll();

    /**
     */
    abstract public function findCount();
}
