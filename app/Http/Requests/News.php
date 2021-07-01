<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class News extends FormRequest
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
        $this->sanitize();
        return [
            'title' => 'required',
            'link' => 'required',
            'contents' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Por favor preencha este campo',
            'contents.required' => 'Por favor preencha este campo',
            'link.required' => 'Por favor preencha este campo',
        ];
    }

    protected function sanitize() {
        $data = isset($this->active) ? $this->all() : $this->all() + ['active' => 0];
        $this->replace($data);
    }
}
