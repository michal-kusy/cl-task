<?php declare(strict_types=1);

namespace App\Model\Decorators;

use App\Model\DTO\WatchDTO;
use App\Model\Repositories\WatchRepository;
use Nette\Caching\Cache;

class CachedWatchRepository implements WatchRepository
{
    /** @var WatchRepository */
    private $repository;

    /** @var Cache */
    private $cache;

    public function __construct(WatchRepository $repository, Cache $cache)
    {
        $this->repository = $repository;
        $this->cache = $cache;
    }


    public function getWatchById(int $id): WatchDTO
    {
        $watch = $this->cache->load($id, function () use ($id) {
            return $this->repository->getWatchById($id);
        });

        return $watch;
    }
}