<?php
/**
 * Created by PhpStorm.
 * User: drudge
 * Date: 9/5/16
 * Time: 10:33 AM
 */

namespace KerungRepo\Repository\Eloquent;


use Kerung\Models\Setting;
use KerungRepo\Repository\SettingRepositoryInterface;
use DB;

/**
 * Class SettingEloquentRepository
 * 
 * @package KerungRepo\Repository\Eloquent
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */
class SettingEloquentRepository extends BaseEloquentRepository implements SettingRepositoryInterface
{
    /**
     * SettingEloquentRepository constructor.
     * @param Setting $setting
     */
    public function __construct(Setting $setting)
    {
        $this->model = $setting;
    }


    /**
     * Update Settings Data
     *
     * @param $code
     * @param $data
     * @return bool
     */
    public function updateSettingByCode($code,$data)
    {
        $this->model->where('code','=',$code)->delete();
        foreach($data as $key=>$value) {
            if (substr($key, 0, strlen($code)) == $code) {
                if (!is_array($value)) {
                    DB::table('suv_settings')->insert(['code' => $code, 'key' => $key, 'value' => $value]);
                } else {
                    DB::table('suv_settings')->insert(['code' => $code, 'key' => $key, 'value' => json_encode($value),'serialized' =>1]);
                }
            }
        }
        return true;
    }


    /**
     * Get Setting By Code
     *
     * @param $code
     * @return array
     */
    public function getSettingByCode($code)
    {
        $settingData = [];
        $data = $this->model->where('code','=',$code)->get();
        foreach($data as $d){
            if(!$d['serialized']){
                $settingData[$d['key']] = $d->value;
            }
            else{
                $settingData[$d['key']] = json_decode($d->value,true);
            }
        }
        return $settingData;

    }

    /**
     * Get Settings By Code And Key
     *
     * @param $code
     * @param $key
     * @return mixed
     */
    public function getSettingByCodeAndKey($code,$key)
    {
       return $this->model->where('code','=',$code)->where('key','=',$key)->get();

    }

}