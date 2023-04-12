<?php
/**
 * Created by PhpStorm.
 * User: drudge
 * Date: 9/1/16
 * Time: 11:26 AM
 */

namespace KerungRepo\Repository\Eloquent;


use Kerung\Models\LengthClass;
use KerungRepo\Repository\LengthClassRepositoryInterface;

/**
 * Class LengthClassEloquentRepository
 * @package KerungRepo\Repository\Eloquent
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */
class LengthClassEloquentRepository extends BaseEloquentRepository implements LengthClassRepositoryInterface
{

    /**
     * LengthClassEloquentRepository constructor.
     * @param LengthClass $lengthClass
     */
    public function __construct(LengthClass $lengthClass)
    {
        $this->model = $lengthClass;
    }

}