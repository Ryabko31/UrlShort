<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLinkRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'link' => 'required|url',
            'limit_request'=> 'required',
            'life_time_in_minute'=>'integer|max:1440'
        ];
    }


    public function messages()
    {
        return [
            'link.required' => 'Поле "URL" обовязкове до заповнення',
            'link.url' => 'Поле "URL" має бути в форматі https://example.com',


            'limit_request.required'=>'Поле "Ліміт переходів" обовязкове до заповнення',

            'life_time_in_minute.max:1440'=>'Поле "Час дії посилання" максимальне значення 1440',
        ];
    }
}
