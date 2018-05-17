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
    public function getSettingValue($key): ?string
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

        return false;
    }
}
