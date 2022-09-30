<?php


namespace Yarscript\Core\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserInvite extends FormRequest
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
            'email' => 'required|max:255',
            'invite_type' => 'required|int', //TODO['invite'] Edit invite_type to direction_type
            'invite_direction_id' => 'required|int'
        ];
    }
}
