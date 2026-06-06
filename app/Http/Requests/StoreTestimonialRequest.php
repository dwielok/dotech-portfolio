<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTestimonialRequest extends FormRequest
{
    public function authorize(): bool { return $this->user()->is_admin; }

    public function rules(): array
    {
        return [
            'client_name'  => 'required|string|max:100',
            'company_name' => 'nullable|string|max:100',
            'position'     => 'nullable|string|max:100',
            'testimonial'  => 'required|string|min:10',
            'photo'        => 'nullable|image|mimes:jpg,jpeg,png,webp|max:1024',
            'rating'       => 'required|integer|min:1|max:5',
            'is_active'    => 'boolean',
            'sort_order'   => 'integer|min:0',
        ];
    }
}
