<?php declare(strict_types=1);

namespace App\Mappings;

use App\Model\DTO\WatchDTO;

interface WatchDtoToArray
{

    public function toArray(WatchDTO $dto): array;

}