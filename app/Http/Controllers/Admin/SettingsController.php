<?php


namespace App\Http\Controllers\Admin;


use App\Services\Admin\SettingsService;
use Illuminate\Http\Request;

class SettingsController extends BaseController
{

    public function __construct(SettingsService $settingsService)
    {
        $this->baseService = $settingsService;
    }

    public function index()
    {
        return view('admin.api-keys.index');
    }

    public function create()
    {
        return view('admin.api-keys.create');
    }

    public function store(Request $request)
    {
        $this->baseService->store($request->all());
    }

    public function edit($id)
    {
        return view('admin.api-keys.edit');
    }














































    

    public function update(Request $request, $id)
    {
        $this->baseService->update($id, $request->all());
    }

}
