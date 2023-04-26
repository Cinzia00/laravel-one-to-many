<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();

        $data = [
            'projects' => $projects
        ];
        return view('projects.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'unique:projects,title|max:150|required',
            'description' => 'string|nullable',
            'slug' => 'string|required',
            'project_image' => 'string|nullable',
        ]);
        $new_project = new Project();
        $new_project->title = $data['title'];
        $new_project->description = $data['description'];
        $new_project->slug = $data['slug'];
        $new_project->project_image = $data['project_image'];
        $new_project->save();
        $result = [
            'project' => $new_project
        ];

        return view('projects.show', $result);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
         $data = $request->all();
         $project->title = $data['title'];
         $project->slug = $data['slug'];
         $project->description = $data['description'];
         $project->project_image = $data['project_image'];
         $project->save();
         return to_route('projects.index', $project);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return to_route('projects.index');
    }
}
