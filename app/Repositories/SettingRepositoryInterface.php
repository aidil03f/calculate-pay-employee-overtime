<?php

namespace App\Repositories;

interface SettingRepositoryInterface
{
    public function checkKeyReference(string $key);
    public function updateSettingByValue(array $attributes);
    public function updateValueByCode(array $attributes);
}