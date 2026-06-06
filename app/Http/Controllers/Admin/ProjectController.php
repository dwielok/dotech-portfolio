<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use App\Models\ProjectImage;
use App\Services\ImageUploadService;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function __construct(
        private readonly ImageUploadService $imageService
    ) {}

    public function index(Request $request)
    {
        $query = Project::query();

        if ($search = $request->get('search')) {
            $query->where('title', 'like', "%{$search}%")
                  ->orWhere('client_name', 'like', "%{$search}%");
        }

        if ($status = $request->get('status')) {
            $query->where('status', $status);
        }

        $sort      = $request->get('sort', 'created_at');
        $direction = $request->get('direction', 'desc');
        $projects  = $query->orderBy($sort, $direction)->paginate(10)->withQueryString();

        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(StoreProjectRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('featured_image')) {
            $data['featured_image'] = $this->imageService->upload(
                $request->file('featured_image'), 'projects'
            );
        }

        $project = Project::create($data);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $image) {
                $path = $this->imageService->upload($image, 'projects/gallery');
                ProjectImage::create([
                    'project_id' => $project->id,
                    'image'      => $path,
                    'sort_order' => $index,
                ]);
            }
        }

        return redirect()->route('admin.projects.index')
            ->with('success', 'Proyek berhasil ditambahkan.');
    }

    public function edit(Project $project)
    {
        $project->load('images');
        return view('admin.projects.edit', compact('project'));
    }

    public function update(UpdateProjectRequest $request, Project $project)
    {
        $data = $request->validated();

        if ($request->hasFile('featured_image')) {
            $this->imageService->delete($project->featured_image);
            $data['featured_image'] = $this->imageService->upload(
                $request->file('featured_image'), 'projects'
            );
        }

        $project->update($data);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $image) {
                $path = $this->imageService->upload($image, 'projects/gallery');
                ProjectImage::create([
                    'project_id' => $project->id,
                    'image'      => $path,
                    'sort_order' => $project->images()->count() + $index,
                ]);
            }
        }

        return redirect()->route('admin.projects.index')
            ->with('success', 'Proyek berhasil diperbarui.');
    }

    public function destroy(Project $project)
    {
        $this->imageService->delete($project->featured_image);
        foreach ($project->images as $image) {
            $this->imageService->delete($image->image);
        }
        $project->delete();

        return redirect()->route('admin.projects.index')
            ->with('success', 'Proyek berhasil dihapus.');
    }

    public function destroyImage(Project $project, ProjectImage $image)
    {
        $this->imageService->delete($image->image);
        $image->delete();

        return back()->with('success', 'Gambar berhasil dihapus.');
    }
}
