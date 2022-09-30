<?php


namespace Yarscript\Organisation\Http\Requests;

use Yarscript\Core\Http\Requests\BaseFormRequest;

/**
 * Class Update
 * @package Yarscript\Organisation\Http\Requests
 */
class Update extends BaseFormRequest
{
    /**
     * @var bool
     */
    protected bool $authorize = true;

    /**
     * @var array|string[]
     */
    protected array $rules = [
        'name' => 'max:255',
        'type' => 'int'
    ];
}
