<?php

namespace App\Controllers;

use App\Core\Controller;

class ProjectsController extends Controller
{
    public function index(): void
    {
        $this->json(projects());
    }

    public function show(int $id): void
    {
        $projects = projects();
        $project = $projects[$id - 1] ?? null;

        if (!$project) {
            $this->json(['error' => 'Projeto não encontrado'], 404);
            return;
        }

        $this->json($project);
    }
}
