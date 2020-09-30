<?php declare(strict_types=1);

namespace App\Mappings;

use App\Exceptions\InvalidInputArrayForMappingException;
use App\Model\DTO\WatchDTO;

interface ArrayToWatchDto
{
    /**
     * @param mixed[] $data
     * @return WatchDTO
     * @throws InvalidInputArrayForMappingException Thrown when mapping is not supported for input array
     */
    public function toDto(array $data): WatchDTO ;

}