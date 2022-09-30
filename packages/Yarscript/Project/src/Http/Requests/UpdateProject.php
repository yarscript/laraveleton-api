<?php


namespace Yarscript\Project\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UpdateProject
 * @package Yarscript\Project\Http\Requests
 */
class UpdateProject extends FormRequest
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
