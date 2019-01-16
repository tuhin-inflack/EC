<?php

namespace Modules\PMS\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\PMS\Services\ProjectResearchTaskService;

class TaskController extends Controller
{
    private $projectResearchTaskService;

    public function __construct(ProjectResearchTaskService $projectResearchTaskService)
    {
        $this->projectResearchTaskService = $projectResearchTaskService;
    }

    public function index($projectId)
    {
        $tasks = $this->projectResearchTaskService->getTasks($projectId);
        $project = $this->projectResearchTaskService->findOrFail($projectId)->project;

        return view('pms::task.index', compact('tasks', 'project'));
    }

    public function create()
    {
        return view('pms::task.create');
    }

    public function store(Request $request)
    {
    }

    public function show()
    {
        return view('pms::show');
    }

    public function edit()
    {
        return view('pms::edit');
    }

    public function update(Request $request)
    {
    }

    public function destroy()
    {
    }
}
