<?php

namespace Sp\Http\Requests;

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
        return [
            'title' => 'required|min:50|max:80',
            'description' => 'required|min:80|max:130',
            'body' => 'required',
        ];
    }
}
