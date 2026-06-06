<?php

namespace App\Http\Controllers;

use App\Contracts\ProjectRepositoryInterface;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function __construct(
        private readonly ProjectRepositoryInterface $projects
    ) {}

    public function index(Request $request)
    {
        $term     = $request->get('q');
        $projects = $term
            ? $this->projects->search($term)
            : $this->projects->getAllPublished(12);

        return view('projects.index', compact('projects', 'term'));
    }

    public function show(string $slug)
    {
        $project  = $this->projects->findBySlug($slug);
        $related  = \App\Models\Project::published()
            ->where('id', '!=', $project->id)
            ->where('category', $project->category)
            ->limit(3)->get();

        return view('projects.show', compact('project', 'related'));
    }
}
