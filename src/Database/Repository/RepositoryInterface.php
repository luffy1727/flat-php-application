<?php

namespace Boozt\Database\Repository;

interface RepositoryInterface
{
    /**
     * @return int
     */
    public function findCount();

    /**
     * @return bool | array
     */
    public function findAll();
}
