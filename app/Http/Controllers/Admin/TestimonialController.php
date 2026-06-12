<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTestimonialRequest;
use App\Http\Requests\UpdateTestimonialRequest;
use App\Models\Testimonial;
use App\Services\ImageUploadService;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function __construct(
        private readonly ImageUploadService $imageService
    ) {}

    public function index(Request $request)
    {
        $query = Testimonial::query();

        if ($search = $request->get('search')) {
            $query->where('client_name', 'like', "%{$search}%")
                ->orWhere('company_name', 'like', "%{$search}%")
                ->orWhere('position', 'like', "%{$search}%");
        }

        if ($request->filled('is_active')) {
            $query->where('is_active', $request->boolean('is_active'));
        }

        $testimonials = $query
            ->orderBy('sort_order', 'asc')
            ->orderByDesc('created_at')
            ->paginate(10)
            ->withQueryString();

        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        return view('admin.testimonials.create');
    }

    public function store(StoreTestimonialRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('photo')) {
            $data['photo'] = $this->imageService->upload(
                $request->file('photo'),
                'testimonials'
            );
        }

        $data['is_active'] = $request->boolean('is_active');

        Testimonial::create($data);

        // Using helper
        // NotificationHelper::send('message', [
        //     'name' => 'John Doe',
        //     'subject' => 'Info Produk'
        // ]);

        return redirect()
            ->route('admin.testimonials.index')
            ->with('success', 'Testimonial berhasil ditambahkan.');
    }

    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    public function update(
        UpdateTestimonialRequest $request,
        Testimonial $testimonial
    ) {
        $data = $request->validated();

        if ($request->hasFile('photo')) {
            $this->imageService->delete($testimonial->photo);

            $data['photo'] = $this->imageService->upload(
                $request->file('photo'),
                'testimonials'
            );
        }

        $data['is_active'] = $request->boolean('is_active');

        $testimonial->update($data);

        return redirect()
            ->route('admin.testimonials.index')
            ->with('success', 'Testimonial berhasil diperbarui.');
    }

    public function destroy(Testimonial $testimonial)
    {
        $this->imageService->delete($testimonial->photo);

        $testimonial->delete();

        return redirect()
            ->route('admin.testimonials.index')
            ->with('success', 'Testimonial berhasil dihapus.');
    }
}
