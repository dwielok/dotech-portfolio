<div class="space-y-4">

    <div>
        <label class="form-label">Nama Klien *</label>
        <input type="text" name="client_name" value="{{ old('client_name', $testimonial->client_name ?? '') }}"
            class="form-input">
    </div>

    <div>
        <label class="form-label">Nama Perusahaan</label>
        <input type="text" name="company_name" value="{{ old('company_name', $testimonial->company_name ?? '') }}"
            class="form-input">
    </div>

    <div>
        <label class="form-label">Jabatan</label>
        <input type="text" name="position" value="{{ old('position', $testimonial->position ?? '') }}"
            class="form-input">
    </div>

    <div>
        <label class="form-label">Testimonial *</label>
        <textarea name="testimonial" rows="5" class="form-input">{{ old('testimonial', $testimonial->testimonial ?? '') }}</textarea>
    </div>

    <div class="grid grid-cols-2 gap-4">

        <div>
            <label class="form-label">Rating</label>

            <select name="rating" class="form-input">

                @for ($i = 1; $i <= 5; $i++)
                    <option value="{{ $i }}" @selected(old('rating', $testimonial->rating ?? 5) == $i)>
                        {{ $i }}
                    </option>
                @endfor

            </select>
        </div>

        <div>
            <label class="form-label">Sort Order</label>

            <input type="number" name="sort_order" value="{{ old('sort_order', $testimonial->sort_order ?? 0) }}"
                class="form-input">
        </div>

    </div>

    <div>
        <label class="form-label">Foto</label>
        <input type="file" name="photo" class="form-input">
    </div>

    <div>
        <label class="inline-flex items-center gap-2">
            <input type="checkbox" name="is_active" value="1" @checked(old('is_active', $testimonial->is_active ?? true))>
            <span>Aktif</span>
        </label>
    </div>

</div>
