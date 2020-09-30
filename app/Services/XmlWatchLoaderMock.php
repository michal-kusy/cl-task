<?php declare(strict_types=1);

namespace App\Services;


class XmlWatchLoaderMock implements XmlWatchLoader
{
    public function loadByIdFromXml(string $watchIdentification): ?array
    {
        return [
            'id' => (int)$watchIdentification,
            'title' => 'Title 2',
            'price' => 50,
            'desc' => 'Title',
        ];
    }
}