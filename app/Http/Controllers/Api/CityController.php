<?php

namespace App\Http\Controllers\Api;

use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Traits\ApiResponser;
use App\Http\Requests\CityRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\CityResource;
use App\Http\Requests\UpdateCityRequest;

class CityController extends Controller
{
    use ApiResponser;

    public function index()
    {
        $cities = CityResource::collection(City::with('areas')->get());
        return $this->success($cities);
    }

    public function store(CityRequest $request)
    {
        $city = City::create($request->validated());
        return $this->success(CityResource::make($city), 'City Created Successfully');
    }

    public function show(City $city)
    {
        return $this->success(new CityResource($city));
    }

    public function update(City $city, UpdateCityRequest $request)
    {
        $city->update($request->validated());
        return $this->success(CityResource::make($city), 'City Updated Successfully');
    }


    public function destroy(City $city)
    {
        $city->delete();
        return $this->success(new CityResource($city), 'Data Deleted Successfully');
    }
}
