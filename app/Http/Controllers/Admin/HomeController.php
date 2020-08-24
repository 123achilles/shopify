<?php


namespace App\Http\Controllers\Admin;


class HomeController extends BaseController
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.layouts.app');
    }
}
