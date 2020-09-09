<?php


namespace App\Http\Controllers\Admin;


use App\Services\Admin\SettingsService;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Array_;

class SettingsController extends BaseController
{

    public function __construct(SettingsService $settingsService)
    {
        $this->baseService = $settingsService;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $items = $this->baseService->index();
        return view('admin.api-keys.index', compact('items'));
    }

    public function create()
    {
        return view('admin.api-keys.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'type' => 'required',
            'api_key' => 'required',
            'password' => 'required',
            'shared_secret' => 'required',
        ]);
        $api_key = $this->baseService->store($request->all());
        if (!$api_key){
            return redirect()->back();
        }
        return redirect()->route('admin.api-keys');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function edit($id)
    {
        $item = $this->baseService->edit($id);
        if (!$item){
            return redirect()->back()->withErrors(['editError' => 'item not found']);
        }
        return view('admin.api-keys.edit', compact('item'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'type' => 'required',
            'api_key' => 'required',
            'password' => 'required',
            'shared_secret' => 'required',
        ]);
        $updated = $this->baseService->update($id, $request->all());

        if (!$updated){
            return redirect()->back()->withErrors(['updateError' => 'note updated']);
        }
        return redirect()->route('admin.api-keys');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function delete($id)
    {
        $deleted = $this->baseService->delete($id);
        if (!$deleted){
            return redirect()->back()->withErrors(['deleteError' => 'item not delete']);
        }
        return redirect()->back();
    }

}
