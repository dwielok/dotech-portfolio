<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreServiceRequest extends FormRequest
{
    public function authorize(): bool { return $this->user()->is_admin; }

    public function rules(): array
    {
        return [
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'icon'        => 'nullable|string|max:255',
            'color'       => 'nullable|string|max:20',
            'sort_order'  => 'integer|min:0',
            'is_active'   => 'boolean',
        ];
    }
}
