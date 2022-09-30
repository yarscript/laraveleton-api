<?php


namespace Yarscript\User\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class Invite
 * @package Yarscript\User\Http\Requests
 */
class Invite extends FormRequest
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
//            'invite_type' => 'required|max:255',
//            'invite_direction_id' => 'required|int',
            'company_uuid' => 'required|uuid'
        ];
    }
}
