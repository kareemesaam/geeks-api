<?php

namespace App\Http\Controllers\Api;

use App\Models\Country;
use App\Http\Traits\ApiResponser;
use App\Http\Controllers\Controller;
use App\Http\Requests\CountryRequest;
use App\Http\Resources\CountryResource;
use App\Http\Requests\UpdateCountryRequest;

class CountryController extends Controller
{
    use ApiResponser;

    public function index()
    {
        $countries  = CountryResource::collection(Country::with('cities')->get());
        return $this->success($countries);
    }

    public function store(CountryRequest $request)
    {
        $country = CountryResource::make(Country::create($request->validated()));
        return $this->success($country, 'Country Created Successfully');
    }

    public function show(Country $country)
    {
        return $this->success(new CountryResource($country));
    }

    public function update(Country $country, UpdateCountryRequest $request)
    {
        $country->update($request->validated());
        return $this->success(CountryResource::make($country), 'Country Updated Successfully');
    }


    public function destroy(Country $country)
    {
        $country->delete();
        return $this->success(new CountryResource($country), 'Country Deleted Successfully');
    }
}
