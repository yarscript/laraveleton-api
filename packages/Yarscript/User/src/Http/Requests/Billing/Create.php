<?php


namespace Yarscript\User\Http\Requests\Billing;


use Yarscript\Core\Http\Requests\BaseFormRequest;

/**
 * Class Create
 * @package Yarscript\User\Http\Requests\Billing
 */
class Create extends BaseFormRequest
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
