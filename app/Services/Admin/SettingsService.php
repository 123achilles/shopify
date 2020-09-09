<?php


namespace App\Services\Admin;


use App\Models\Setting;
use Illuminate\Http\Request;

class SettingsService extends BaseService
{
    /**
     * SettingsService constructor.
     * @param Setting $setting
     */
    public function __construct(Setting $setting)
    {
        $this->set_model($setting);
    }

    public function index()
    {
        $api_keys = $this->baseModel->paginate(15);
        return $api_keys;
    }

    /**
     * @param $data
     * @return bool
     */
    public function store($data)
    {
        $api_key = $this->baseModel->create($data);

        if (empty($api_key)){
            return false;
        }
        return $api_key;
    }

    public function edit($id)
    {
        $item = $this->baseModel->find($id);
        return $item;
    }

    public function update($id, $data)
    {
        $item = $this->baseModel->find($id);
        $updated = $item->update($data);
        return $updated;
    }

    public function delete($id)
    {
        $item = $this->baseModel->find($id,['id']);
        if (!$item){
            return false;
        }
        $deleted = $this->baseModel->delete($id);
        return $deleted;
    }
}
