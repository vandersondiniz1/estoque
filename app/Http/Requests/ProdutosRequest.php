<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutosRequest extends FormRequest
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
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
            'nome' => 'required|max:100',
            'descricao' => 'required|max:255',
            'valor' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O :attribute não pode ser vazio.',
            'descricao.required' => 'A :attribute não pode ser vazia.',
            'valor.required' => 'O :attribute não pode ser vazio.',
        ];
    }
}
