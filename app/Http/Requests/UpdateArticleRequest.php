<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateArticleRequest extends FormRequest
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
        $method = $this->method();

        if ($method === 'PUT') {
            return [
                'title' => 'required|string|max:255',
                'body' => 'required|string',
                'type' => 'required|string DEFAULT article',
                'img' => 'required|string',
            ];
        }else {
            return [
                'title' => 'string|max:255',
                'body' => 'string',
                'type' => 'string DEFAULT article',
                'img' => 'string',
            ];
        }

    }
 
        
    
}
