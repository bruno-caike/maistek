<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Contacts extends FormRequest
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
            'name' => 'required',
            'tel' => 'required',
            'email' => 'required',
            'sector' => 'required',
            'message' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Por favor preencha este campo',
            'tel.required' => 'Por favor preencha este campo',
            'email.required' => 'Por favor preencha este campo',
            'sector.required' => 'Por favor preencha este campo',
            'message.required' => 'Por favor preencha este campo',
        ];
    }

    protected function sanitize() {
        $data = isset($this->active) ? $this->all() : $this->all() + ['active' => 0];
        $this->replace($data);
    }
}
