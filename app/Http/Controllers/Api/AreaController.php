<?php

namespace App\Http\Controllers\Api;

use App\Models\Area;
use Illuminate\Http\Request;
use App\Http\Traits\ApiResponser;
use App\Http\Requests\AreaRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\AreaResource;
use App\Http\Requests\UpdateAreaRequest;

class AreaController extends Controller
{
    use ApiResponser;

    public function index()
    {
        $areas  = AreaResource::collection(Area::all());
        return $this->success($areas);
    }

    public function store(AreaRequest $request)
    {
        $area = AreaResource::make(Area::create($request->validated()));
        return $this->success($area, 'Area Created Successfully');
    }

    public function show(Area $area)
    {
        return $this->success(new AreaResource(Area::find($area)));
    }

    public function update(Area $area, UpdateAreaRequest $request)
    {
        $area->update($request->validated());
        return $this->success(AreaResource::make($area), 'Area Updated Successfully');
    }


    public function destroy(Area $area)
    {
        $area->delete();
        return $this->success(new AreaResource($area), 'Data Deleted Successfully');
    }
}
