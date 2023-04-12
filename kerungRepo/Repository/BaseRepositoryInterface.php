<?php

/**
 * Created by PhpStorm.
 * User: drudge
 * Date: 8/24/16
 * Time: 8:19 AM
 */
namespace KerungRepo\Repository;

/**
 * Interface BaseRepositoryInterface
 * @package KerungRepo\Repository
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */
interface BaseRepositoryInterface
{
    /**
     * @param $data
     * @return mixed
     */
    public function create($data);

    /**
     * @param $data
     * @param $id
     * @return mixed
     */
    public function update($id, $data);

    /**
     * @param $id
     * @return mixed
     */
    public function findById($id);

    /**
     * @return mixed
     */
    public function getAll();


    /**
     * @param array $id
     * @return mixed
     */
    public function destroy(array $id);

    /**
     * @param $slug
     * @return mixed
     */
    public function findBySlug($slug);

    /**
     * @return mixed
     */
    public function getAllEnable();

    /**
     * @param $id
     * @param $param
     * @return mixed
     */
    public function hasChild($param, $id);
}