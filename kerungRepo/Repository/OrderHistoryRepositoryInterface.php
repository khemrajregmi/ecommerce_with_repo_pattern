<?php
/**
 * Created by sublime.
 * User: khem
 * Date: 12/12/16
 * Time: 11:01 AM
 */

namespace KerungRepo\Repository;

/**
 * Interface OrderHistoryRepositoryInterface
 * @package KerungRepo\Repository
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */
interface OrderHistoryRepositoryInterface
{

    /**
     * @param $data
     * @param $order
     * @param $comment
     * @return mixed
     */
    public function storeOrderedHistory($data,$order,$comment);

    /**
     * @param $id
     * @return mixed
     */
   public function getByOrderID($id);

}