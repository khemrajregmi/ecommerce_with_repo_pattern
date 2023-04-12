<?php
/**
 * Created by PhpStorm.
 * User: drudge
 * Date: 8/24/16
 * Time: 8:29 AM
 */

namespace KerungRepo\Services;

use KerungRepo\Repository\BaseRepositoryInterface;

/**
 * Class BaseService
 * @package KerungRepo\Repository
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */
abstract class BaseService
{
    /**
     * Repo
     * @var String
     */
    protected $repo;

    /**
     * BaseService constructor.
     * @param BaseRepositoryInterface $repositoryInterface
     */
    public function __construct(BaseRepositoryInterface $repositoryInterface)
    {
        $this->repo =  $repositoryInterface;
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function store(array $data)
    {
        return $this->repo->create($data);
    }

    /**
     * @param $id
     * @param array $data
     * @return mixed
     */
    public function update($id,array $data)
    {
        return $this->repo->update($id,$data);
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        return $this->repo->getAll();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getById($id)
    {
        return $this->repo->findById($id);
    }


    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        $id = explode(',',$id);
       return  $this->repo->destroy($id);
    }

    /**
     * @return mixed
     */
    public function getAllEnable()
    {
        return $this->repo->getAllEnable();
    }

    /**
     * @param $slug
     * @return mixed
     */
    public function getBySlug($slug)
    {
        return $this->repo->findBySlug($slug);
    }

    /**
     * @param $id
     * @param $param
     * @return mixed
     */
    public function hasChild($param, $id)
    {
        return $this->repo->hasChild($param,$id);
    }
}