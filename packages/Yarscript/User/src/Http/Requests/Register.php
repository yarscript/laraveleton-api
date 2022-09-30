<?php


namespace Yarscript\User\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class Register
 * @package Yarscript\User\Http\Requests
 */
class Register extends FormRequest
{
    /**
     * Determine if user is authorized to make this request
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get validation rules that apply to the request
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'first_name' => 'string|required',
            'last_name' => 'string|required',
            'email' => 'email|required|unique:users,email',
            'password' => 'min:6|required',
        ];
    }
}
