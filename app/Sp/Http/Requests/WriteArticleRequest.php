<?php

namespace Sp\Http\Requests;

use Sp\Models\Settings;
use App\Http\Requests\Request;


class WriteArticleRequest extends Request
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
     * @return array
     */
    public function rules()
    {
        $settings = Settings::first();

        return [
            'title' => 'required|min:25|max:75',
            'description' => 'required|min:80|max:130',
            'body' => 'required|min:' . $settings->article_minlength . '|max:' . $settings->article_maxlength,
        ];
    }

    public function messages()
    {
        return [
            'title.min' => 'Il titolo deve essere di minimo :min caratteri!',
            'title.max' => 'Il titolo deve contenere al massimo ::max caratteri!',

            'description.min' => 'Il sottotitolo deve essere di minimo :min caratteri!',
            'description.max' => 'Il sottotitolo deve contenere al massimo ::max caratteri!',

            'body.min' => 'Il corpo dell\'articolo deve contenere almeno :min caratteri!',
            'body.max' => 'Il corpo dell\'articolo deve contenere al massimo :max caratteri!',
        ];
    }
}
