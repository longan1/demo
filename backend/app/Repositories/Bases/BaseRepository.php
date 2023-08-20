<?php

namespace App\Repositories\Bases;

use App\Repositories\Bases\Repository;
use LogicException;

class BaseRepository extends Repository
{
    public function model(): string
    {
        // we throw error in change for abstract function.
        throw new LogicException('No Direct Call From Parent Repository. You must define this function in child class !');
    }

}
