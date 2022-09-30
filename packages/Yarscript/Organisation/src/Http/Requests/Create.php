<?php


namespace Yarscript\Organisation\Http\Requests;

use Yarscript\Core\Http\Requests\BaseFormRequest;

/**
 * Class CreateOrganisation
 * @package Yarscript\Organisation\Http\Requests
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
        'name' => 'required|max:255',
//        'type' => 'int'
    ];
}
