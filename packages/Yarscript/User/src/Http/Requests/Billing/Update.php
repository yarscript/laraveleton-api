<?php


namespace Yarscript\User\Http\Requests\Billing;


use Yarscript\Core\Http\Requests\BaseFormRequest;

/**
 * Class Update
 * @package Yarscript\User\Http\Requests\Billing
 */
class Update extends BaseFormRequest
{
    /**
     * @var bool
     */
    protected bool $authorize = true;

    /**
     * @var array
     */
    protected array $rules = [
        'data' => 'string|max:255'
    ];
}
