<?php


namespace Yarscript\Core\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

abstract class BaseFormRequest extends FormRequest
{
    /**
     * @var bool
     */
    protected bool $authorize;

    /**
     * @var array
     */
    protected array $rules = [];

    /**
     * Determine if user is authorized to make this request
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return $this->authorize;
    }

    /**
     * Get validation rules that apply to the request
     *
     * @return array
     */
    public function rules(): array
    {
        return $this->rules;
    }
}
