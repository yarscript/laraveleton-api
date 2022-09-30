<?php

namespace Yarscript\User\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class DemoRequest
 * @package Yarscript\User\Http\Requests
 */
class DemoRequest extends FormRequest
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
     * @param Request $request
     * @return array|string[]
     */
    public function rules(Request $request): array
    {
        $rules = [
            'title' => 'required|string|unique:games,title',
            'description' => '',
            'complexity' => 'required|min:1|max:10',
            'minPlayers' => 'required|min:1|max:10',
            'maxPlayers' => 'required|min:1|max:10',
            'isActive' => 'required|boolean'
        ];

        switch ($this->getMethod())
        {
            case 'POST':
                return $rules;
            case 'PUT':
                return [
                        'game_id' => 'required|integer|exists:games,id', //должен существовать. Можно вот так: unique:games,id,' . $this->route('game'),
                        'title' => [
                            'required',
                            Rule::unique('games')->ignore($this->title, 'title') //должен быть уникальным, за исключением себя же
                        ]
                    ] + $rules; // и берем все остальные правила
            // case 'PATCH':
            case 'DELETE':
                return [
                    'game_id' => 'required|integer|exists:games,id'
                ];
        }

        return $rules;
    }
}
