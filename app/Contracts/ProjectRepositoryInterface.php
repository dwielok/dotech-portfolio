<?php

namespace App\Contracts;

use App\Models\Project;
use Illuminate\Pagination\LengthAwarePaginator;

interface ProjectRepositoryInterface
{
    public function getAllPublished(int $perPage = 12): LengthAwarePaginator;
    public function getFeatured(int $limit = 6): \Illuminate\Database\Eloquent\Collection;
    public function findBySlug(string $slug): Project;
    public function create(array $data): Project;
    public function update(Project $project, array $data): Project;
    public function delete(Project $project): bool;
    public function search(string $term, int $perPage = 12): LengthAwarePaginator;
}
