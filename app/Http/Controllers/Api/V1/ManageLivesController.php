<?php

namespace App\Http\Controllers\Api\V1;

use App\ManageLive;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreManageLivesRequest;
use App\Http\Requests\Admin\UpdateManageLivesRequest;

class ManageLivesController extends Controller
{
    public function index()
    {
        return ManageLive::all();
    }

    public function show($id)
    {
        return ManageLive::findOrFail($id);
    }

    public function update(UpdateManageLivesRequest $request, $id)
    {
        $manage_live = ManageLive::findOrFail($id);
        $manage_live->update($request->all());
        

        return $manage_live;
    }

    public function store(StoreManageLivesRequest $request)
    {
        $manage_live = ManageLive::create($request->all());
        

        return $manage_live;
    }

    public function destroy($id)
    {
        $manage_live = ManageLive::findOrFail($id);
        $manage_live->delete();
        return '';
    }
}
