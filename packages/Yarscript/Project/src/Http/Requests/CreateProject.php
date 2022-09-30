<?php


namespace Yarscript\Project\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProject extends FormRequest
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
            'name' => 'required|string|max:255'
        ];
    }
}
