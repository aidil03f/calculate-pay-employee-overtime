<?php

namespace App\Repositories\Eloquent;

use App\Models\{Setting,Reference};
use App\Repositories\SettingRepositoryInterface;

class SettingRepository implements SettingRepositoryInterface
{
    private $modelSetting,$modelReference;

    public function __construct(Setting $setting,Reference $reference)
    {
        $this->modelSetting = $setting;
        $this->modelReference = $reference;
    }

    public function checkKeyReference(string $key)
    {
        $query = $this->modelReference->where('code',$key)->count() > 0 ? true : false;
        return $query;
    }

    public function updateValueByCode(array $attributes)
    {
        $query = $this->modelSetting->create($attributes);
        return $query;
    }

    public function updateSettingByValue(array $attributes)
    {
        $data = $this->modelSetting->where('key',$attributes['key'])->first();
        $data->update(['value' => $attributes['value']]);
        return $data;
    }
}