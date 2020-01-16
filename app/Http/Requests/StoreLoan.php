<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLoan extends FormRequest
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
            'client' => 'required|max:255',
            'estimated_on' => 'required|date_format:Y-m-d',
            'loaned_on' => 'required|date_format:Y-m-d',
            'book_id' => 'required|integer',
            'returned_on' => 'date_format:Y-m-d',
        ];
    }
}
