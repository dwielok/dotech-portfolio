<?php

namespace App\Repositories;

use App\Contracts\ProjectRepositoryInterface;
use App\Models\Project;
use Illuminate\Pagination\LengthAwarePaginator;

class ProjectRepository implements ProjectRepositoryInterface
{
    public function getAllPublished(int $perPage = 12): LengthAwarePaginator
    {
        return Project::published()
            ->with('images')
            ->latest('project_date')
            ->paginate($perPage);
    }

    public function getFeatured(int $limit = 6): \Illuminate\Database\Eloquent\Collection
    {
        return Project::published()
            ->featured()
            ->with('images')
            ->latest('project_date')
            ->limit($limit)
            ->get();
    }

    public function findBySlug(string $slug): Project
    {
        return Project::published()
            ->with('images')
            ->where('slug', $slug)
            ->firstOrFail();
    }

    public function create(array $data): Project
    {
        return Project::create($data);
    }

    public function update(Project $project, array $data): Project
    {
        $project->update($data);
        return $project->fresh();
    }

    public function delete(Project $project): bool
    {
        return $project->delete();
    }

    public function search(string $term, int $perPage = 12): LengthAwarePaginator
    {
        return Project::published()
            ->where(function ($q) use ($term) {
                $q->where('title', 'like', "%{$term}%")
                  ->orWhere('short_description', 'like', "%{$term}%")
                  ->orWhere('client_name', 'like', "%{$term}%")
                  ->orWhere('category', 'like', "%{$term}%");
            })
            ->paginate($perPage);
    }
}
