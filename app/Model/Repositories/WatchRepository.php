<?php declare(strict_types=1);

namespace App\Model\Repositories;

use App\Exceptions\WatchNotFoundException;
use App\Model\DTO\WatchDTO;

interface WatchRepository
{
    /**
     * @param int $id
     * @return WatchDTO
     *
     * @throws WatchNotFoundException Is thrown when the watch could
     * not be found, eg. watch with the associated id does not exist.
     */
    public function getWatchById(int $id): WatchDTO;

}