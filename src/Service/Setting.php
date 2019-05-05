<?php

namespace App\Service;

use App\Repository\SettingRepository;

class Setting
{
    protected $settingRepository;

    protected $settingObjectCollection = null;

    public function __construct(SettingRepository $settingRepository)
    {
        $this->settingRepository = $settingRepository;
    }

    /**
     * Get setting value
     *
     * @param string $key
     * @return string
     */
    public function getSettingValue($key, $default = ""): ?string
    {
        if (is_null($this->settingObjectCollection))
        {
            $this->settingObjectCollection = $this->settingRepository->findBy([
                'is_secure' => false
            ]);
        }

        foreach($this->settingObjectCollection as $settingObject)
        {
            if ($settingObject->getKey() == $key)
            {
                return $settingObject->getValue();
            }
        }

        return $default;
    }

    /**
     * Search setting by key
     *
     * @param string $key
     * @return string
     */
    public function searchSettingByKey($key): array
    {
        if (is_null($this->settingObjectCollection))
        {
            $this->settingObjectCollection = $this->settingRepository->findBy([
                'is_secure' => false
            ]);
        }

        $settings_arr = [];
        foreach($this->settingObjectCollection as $settingObject)
        {
            if (strpos($settingObject->getKey(), $key) !== false)
            {
                $settings_arr[$settingObject->getKey()] = $settingObject->getValue();
            }
        }

        return $settings_arr;
    }
}
