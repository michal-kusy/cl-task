<?php declare(strict_types=1);

namespace App\Mappings;

use App\Exceptions\InvalidXmlInputArrayException;
use App\Model\DTO\WatchDTO;

class XmlArrayToWatchDto implements ArrayToWatchDto
{

    public function toDto(array $data): WatchDTO
    {
        if (!$this->isValid($data)) {
            throw new InvalidXmlInputArrayException('Expected different format, check the docs!');
        }

        return new WatchDTO(
            $data['id'],
            $data['title'],
            $data['price'],
            $data['desc']
        );
    }

    private function isValid(array $data): bool
    {
        return isset($data['id'],$data['title'],$data['price'],$data['desc']) &&
            is_int($data['id']) && is_int($data['price']) &&
            is_string($data['title']) && is_string($data['desc']);
    }
}