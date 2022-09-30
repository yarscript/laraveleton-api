<?php


namespace Yarscript\User\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AcceptInvited extends FormRequest
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
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'password' => 'required|max:255'
        ];
    }
}
