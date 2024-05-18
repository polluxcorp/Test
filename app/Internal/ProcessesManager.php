<?php

namespace App\Internal;

class ProcessesManager
{
    public  const SETTINGS_FILE_NAME = 'processes.json';

    public function getStoragePath(): string
    {
        return storage_path(self::SETTINGS_FILE_NAME);
    }

    /**
     * @return array<string, array{name: string, units: string, price: float, notes: string}>
     */
    public function defaultSettings(): array
    {
        $result = [];

        $contents = (string) file_get_contents($this->getStoragePath());
        if ('' === $contents) {
            throw new \Exception(sprintf('Cannot read file %s', self::SETTINGS_FILE_NAME));
        }
        $data = json_decode($contents, associative: true, flags: JSON_THROW_ON_ERROR);
        if (! is_array($data)) {
            throw new \Exception(sprintf('Invalid structure on file %s', self::SETTINGS_FILE_NAME));
        }
        foreach ($data as $key => $values) {
            if (! is_string($key)) {
                throw new \Exception(sprintf('Invalid structure on file %s index %s', self::SETTINGS_FILE_NAME, $key));
            }
            if (! is_array($values)) {
                throw new \Exception(sprintf('Invalid structure on file %s index %s, invalid content', self::SETTINGS_FILE_NAME, $key));
            }
            $result[$key] = $values;
        }
        return $result;
    }

    /**
     * @param array<string, float>
     * @return array<string, array{name: string, units: string, price: float, notes: string}>
     */
    public function settingsWithValues(array $values): array
    {
        $settings = $this->defaultSettings();
        foreach ($settings as $key => $setting) {
            $settings[$key]['price'] = floatval($values[$key] ?? $setting[$key]['price']);
        }
        return $settings;
    }

    /**
     * @param array<string, array{name: string, units: string, price: float, notes: string}> $updatedSettings
     * @return void
     */
    public function store(array $updatedSettings): void
    {
        file_put_contents(
            $this->getStoragePath(),
            json_encode($updatedSettings, JSON_PRETTY_PRINT)
        );
    }
}
