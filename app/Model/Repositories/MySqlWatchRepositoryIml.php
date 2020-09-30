<?php declare(strict_types=1);

namespace App\Model\Repositories;

use App\Model\DTO\WatchDTO;
use Nette\NotImplementedException;

class MySqlWatchRepositoryIml implements MySqlWatchRepository
{

    public function getWatchById(int $id): WatchDTO
    {
        throw new NotImplementedException();
    }
}