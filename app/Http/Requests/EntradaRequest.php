<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EntradaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
       switch($this->method()){
        case 'POST':
            return[
                'placa' => 'required|unique:entradas|max:70',
                'fecha' => ' ',
            ];
        case 'PUT':
        case 'PATCH':
            {
                return [
                    'placa' => 'required|unique:entregas|max:70',$this->get('id').'|max:70',
                    'fecha' => 'max:70',
                ];
            }
            default:
                # code...
                break;
       }
    }
}
