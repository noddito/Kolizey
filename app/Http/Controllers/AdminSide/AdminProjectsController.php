<?php
declare(strict_types=1);

namespace App\Http\Controllers\AdminSide;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\User;
use DB;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Validator;

class AdminProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $projects = Project::orderBy('created_at', 'desc')->get();
        return view('admin.projects.index', [
            'projects' => $projects
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $customersArray = User::query()->get();

        return view('admin.projects.create', [
            'all_customers' => $customersArray
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $project = new Project();

        $validator = Validator::make($request->all(), $project->rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $project->name = $request->name;
        $project->description = $request->description;
        $project->end_date = $request->end_date;
        $project->status = $request->status;
        $project->customer_id = $request->customer_id;
        $project->save();
        $project->saveProjectPhotos($request, $project->id);

        return redirect()
            ->route('projects.index')
            ->with('success', 'Проект успешно создан');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $curennt_customer = Project::where('id', $project->id)->get();
        $customersArray = User::query()->get();

        return view('admin.projects.edit', [
            'project' => $project,
            'curennt_customer' => $curennt_customer[0],
            'all_customers' => $customersArray
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project): RedirectResponse
    {
        $validator = Validator::make($request->all(), $project->rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $project = Project::where(['id' => $project->id])->first();
        $project->name = $request->name;
        $project->description = $request->description;
        $project->status = $request->status;
        $project->customer_id = $request->customer_id;
        $project->end_date = $request->end_date;

        $project->save();

        $project->saveProjectPhotos($request, $project->id);

        return redirect()
            ->route('projects.index')
            ->with('success', 'Проект успешно изменен');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project): RedirectResponse
    {
        $project->delete();

        return redirect()
            ->route('projects.index')
            ->with('success', 'Проект успешно удален');
    }
}
