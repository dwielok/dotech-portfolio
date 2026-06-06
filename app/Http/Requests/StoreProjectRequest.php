<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
{
    public function authorize(): bool { return $this->user()->is_admin; }

    public function rules(): array
    {
        return [
            'title'             => 'required|string|max:255',
            'short_description' => 'required|string|max:500',
            'full_description'  => 'nullable|string',
            'client_name'       => 'nullable|string|max:255',
            'project_date'      => 'nullable|date',
            'project_url'       => 'nullable|url|max:255',
            'featured_image'    => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'category'          => 'nullable|string|max:100',
            'technologies'      => 'nullable|array',
            'technologies.*'    => 'string|max:50',
            'status'            => 'required|in:draft,published',
            'is_featured'       => 'boolean',
            'meta_title'        => 'nullable|string|max:60',
            'meta_description'  => 'nullable|string|max:160',
            'meta_keywords'     => 'nullable|string|max:255',
            'images.*'          => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ];
    }
}
