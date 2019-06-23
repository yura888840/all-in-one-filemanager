<?php

namespace App\CommunicationBundle\KeyValueObject;

use League\Flysystem\Filesystem;

class ListList extends OperationContainer
{
    public function __invoke()
    {
        /** @var \ArrayAccess $connectors */
        $connectors = $this->connectorResolver->resolve();

        $files = [];

        /** @var Filesystem $connector */
        foreach ($connectors as $connector) {
            $files[] = $this->transform($connector->listContents('/'));
        }
        return [
            'success' => true,
            'errorMsg' => null,
            'error' => null,
            'data' => $files,
        ];
    }

    private function transform(array $data)
    {
        $transformed = [];

        foreach ($data as $item) {
            $transformedItem = [
                'name' => $item['basename'],
                'type' => $item['type'],
                'createdAt' => 0,
                'updatedAt' => 0,
            ];

            if ($item['type'] === 'file') {
                $transformedItem['size'] = $item['size'];
                $transformedItem['createdAt'] = $item['timestamp'];
                $transformedItem['updatedAt'] = $item['timestamp'];
            }

            $transformed[] = $transformedItem;
        }

        return $transformed;
    }
}
