<?php
/**
 * Created by PhpStorm.
 * User: drudge
 * Date: 8/24/16
 * Time: 8:42 AM
 */

namespace KerungRepo\Repository\Eloquent;

use Illuminate\Database\Eloquent\Model;
use KerungRepo\Repository\BaseRepositoryInterface;

/**
 * Class BaseEloquentRepository
 * @package KerungRepo\Eloquent
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */
abstract class BaseEloquentRepository implements BaseRepositoryInterface
{

    /**
     * Model Object
     * @var object
     */
    protected $model;

    /**
     * BaseEloquentRepository constructor.
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @param $data
     * @return static
     */
    public function create($data)
    {
        return $this->model->create($data);
    }

    /**
     * @param $id
     * @param $data
     * @return mixed
     */
    public function update($id,$data)
    {
        return $this->model->find($id)->update($data);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function findById($id)
    {
        return $this->model->find($id);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAll()
    {
        return $this->model->all();
    }

    /**
     * @param array $id
     * @return int
     */
    public function destroy(array $id)
    {
        return $this->model->destroy($id);
    }

    /**
     * @return mixed
     */
    public function getAllEnable()
    {
        return $this->model->where('status','=',1)->get();
    }

    /**
     * @param $slug
     * @return mixed
     */
    public function findBySlug($slug)
    {
        return $this->model->where('slug','=',$slug)->first();
    }

    /**
     * @param $param
     * @param $id
     * @return mixed
     */
    public function hasChild($param, $id)
    {
        return $this->model->where($param,'=',$id)->first();
    }
}