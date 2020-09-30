<?php declare(strict_types=1);

namespace App\Model\Repositories;

use App\Exceptions\InvalidInputArrayForMappingException;
use App\Exceptions\XmlLoaderException;
use App\Exceptions\XmlRepositoryException;
use App\Exceptions\XmlWatchNotFoundException;
use App\Mappings\ArrayToWatchDto;
use App\Model\DTO\WatchDTO;
use App\Services\XmlWatchLoader;

class XmlWatchRepository implements WatchRepository
{
    /** @var XmlWatchLoader  */
    private $loader;

    /** @var ArrayToWatchDto */
    private $mapper;

    public function __construct(XmlWatchLoader $loader, ArrayToWatchDto $mapper)
    {
        $this->loader = $loader;
        $this->mapper = $mapper;
    }

    public function getWatchById(int $id): WatchDTO
    {
        try {
            $foundXmlWatch = $this->loader->loadByIdFromXml((string) $id);
            if ($foundXmlWatch === null) {
                throw new XmlWatchNotFoundException(sprintf('Watch with id:%d was not found', $id));
            }

            return $this->mapper->toDto($foundXmlWatch);
        } catch (XmlLoaderException | InvalidInputArrayForMappingException $e) {
            throw new XmlRepositoryException($e->getMessage(), 0, $e);
        }
    }
}