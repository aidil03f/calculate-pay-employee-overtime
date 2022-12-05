<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\SettingRequest;
use App\Repositories\SettingRepositoryInterface;

class SettingController extends Controller
{
    private $repositorySetting;

    public function __construct(SettingRepositoryInterface $setting)
    {
        $this->repositorySetting = $setting;
    }
    /**
     * @OA\Patch(
     *      path="/api/settings",
     *      description="Update the specified settings.",
     *      tags={"Setting"},
     *      @OA\Parameter(name="key", in="path", description="Reference code", required=true),
     *      @OA\RequestBody(@OA\JsonContent(ref="#components/schemas/Setting")),
     *      @OA\Response(response=202, description="OK", @OA\JSONContent(ref="#components/schemas/Setting")),
     * )
     *
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Setting       $setting
     * @return \Illuminate\Http\Response
     */
    public function update(SettingRequest $request)
    {
        if(!$this->repositorySetting->checkKeyReference($request->key)){
            return response()->json(['status' => 'error'],404);
        } else {
            $this->repositorySetting->updateSettingByValue($request->all());
            return response()->json(['status' => 'updated']);
        }
    }
}
