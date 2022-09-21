<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\Storage;

class JsonStorable implements Storable
{
    private string $storageName;
    private string $storageDirectory;

    public function __construct(string $storageDirectory, string $storageName)
    {
        $this->storageDirectory = $storageDirectory;
        $this->storageName = $storageName;
    }

    public function getContent(): array
    {
        $file = sprintf('%s/%s.json', $this->storageDirectory, $this->storageName);
        if (!is_file($file)) {
            touch($file);
        }

        $content = file_get_contents($file);

        return json_decode($content ?: '[]', true);
    }

    public function store(array $data): array
    {
        $storage = $this->getContent();

        $storage[] = $data;

        $this->save($storage);

        return $storage;
    }

    public function save(array $storage): bool
    {
        return !!file_put_contents(
            sprintf('%s/%s.json', $this->storageDirectory, $this->storageName),
            json_encode($storage)
        );
    }
}
