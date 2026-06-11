<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreServiceRequest;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $services = Service::orderBy('sort_order')
            ->when($request->search, fn($q) => $q->where('title', 'like', "%{$request->search}%"))
            ->when($request->has('is_active') && $request->is_active !== '', function ($q) use ($request) {
                $q->where('is_active', $request->is_active);
            })
            ->paginate(10);


        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(StoreServiceRequest $request)
    {
        Service::create($request->validated());
        return redirect()->route('admin.services.index')
            ->with('success', 'Layanan berhasil ditambahkan.');
    }

    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    public function update(StoreServiceRequest $request, Service $service)
    {
        $service->update($request->validated());
        return redirect()->route('admin.services.index')
            ->with('success', 'Layanan berhasil diperbarui.');
    }

    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('admin.services.index')
            ->with('success', 'Layanan berhasil dihapus.');
    }

    /**
     * Memindahkan urutan layanan ke atas (sort_order lebih kecil).
     */
    public function moveUp(Service $service)
    {
        // Cari layanan yang urutannya tepat di atas layanan saat ini
        $previousService = Service::where('sort_order', '<', $service->sort_order)
            ->orderBy('sort_order', 'desc')
            ->first();

        if ($previousService) {
            // Simpan nilai sort_order saat ini ke variabel sementara
            $currentOrder = $service->sort_order;

            // Tukar nilai sort_order
            $service->update(['sort_order' => $previousService->sort_order]);
            $previousService->update(['sort_order' => $currentOrder]);
        }

        return redirect()->back()->with('success', 'Urutan layanan berhasil dinaikkan.');
    }

    /**
     * Memindahkan urutan layanan ke bawah (sort_order lebih besar).
     */
    public function moveDown(Service $service)
    {
        // Cari layanan yang urutannya tepat di bawah layanan saat ini
        $nextService = Service::where('sort_order', '>', $service->sort_order)
            ->orderBy('sort_order', 'asc')
            ->first();

        if ($nextService) {
            // Simpan nilai sort_order saat ini ke variabel sementara
            $currentOrder = $service->sort_order;

            // Tukar nilai sort_order
            $service->update(['sort_order' => $nextService->sort_order]);
            $nextService->update(['sort_order' => $currentOrder]);
        }

        return redirect()->back()->with('success', 'Urutan layanan berhasil diturunkan.');
    }
}
