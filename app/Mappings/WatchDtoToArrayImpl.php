<?php declare(strict_types=1);

namespace App\Mappings;

use App\Model\DTO\WatchDTO;

class WatchDtoToArrayImpl implements WatchDtoToArray
{

    public function toArray(WatchDTO $dto): array
    {
        return [
          'identification' => $dto->id,
          'title' => $dto->title,
          'price' => $dto->price,
          'description' => $dto->description,
        ];
    }
}