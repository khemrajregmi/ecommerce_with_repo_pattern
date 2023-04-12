<?php
/**
 * Created by PhpStorm.
 * User: drudge
 * Date: 9/2/16
 * Time: 9:07 AM
 */

namespace KerungRepo\Repository\Eloquent;


use Kerung\Models\WeightClass;
use KerungRepo\Repository\WeightClassRepositoryInterface;

/**
 * Class WeightClassEloquentRepository
 * @package KerungRepo\Repository\Eloquent
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */
class WeightClassEloquentRepository extends BaseEloquentRepository implements WeightClassRepositoryInterface
{
    /**
     * WeightClassEloquentRepository constructor.
     * @param WeightClass $weightClass
     */
    public function __construct(WeightClass $weightClass)
    {
        $this->model = $weightClass;
    }

}