<?php
/**
 * Created by PhpStorm.
 * User: shomrat
 * Date: 10/30/18
 * Time: 6:19 PM
 */

namespace Modules\Accounts\Constants;


class AccountConstant
{
    const PARENT = 0; // Parent Head won't have any parent

    const HEAD_TYPE_ASSER = 1;
    const HEAD_TYPE_LIABILITY = 2;
    const HEAD_TYPE_INCOME = 3;
    const HEAD_TYPE_EXPENSE = 4;
}