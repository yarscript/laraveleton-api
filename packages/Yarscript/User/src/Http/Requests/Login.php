<?php


namespace Yarscript\User\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class Login
 * @package Yarscript\User\Http\Requests
 */
class Login extends FormRequest
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
            'email' => 'required|email',
            'password' => 'required',
        ];
    }
}
