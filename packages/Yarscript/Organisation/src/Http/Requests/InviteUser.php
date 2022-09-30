<?php


namespace Yarscript\Organisation\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class InviteUser
 * @package Yarscript\Organisation\Http\Requests
 */
class InviteUser extends FormRequest
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
            'email'        => 'required|email',
            'organisation_uuid' => 'required|max:255'
        ];
    }
}
