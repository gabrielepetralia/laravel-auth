<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectRequest;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Helpers\CustomHelper;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $direction = 'desc';
      $projects = Project::paginate(10);

      return view('admin.projects.index', compact('projects', 'direction'));
    }

    public function orderBy($direction)
    {
      $projects = Project::orderBy('id', $direction)->paginate(10);
      $direction = $direction === 'asc' ? 'desc' : 'asc';

      return view('admin.projects.index', compact('projects','direction'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectRequest $request)
    {
      $form_data = $request->all();

      if (!isset($form_data['is_finished'])) $form_data['is_finished'] = 0;

      $form_data['slug'] = CustomHelper::generateUniqueSlug($form_data['name'], new Project());

      if (array_key_exists('img', $form_data)) {
        $form_data['img_path'] = Storage::put('uploads', $form_data['img']);
        $form_data['img_original_name'] = $request->file('img')->getClientOriginalName();
      }

      $new_project = new Project();

      $new_project->fill($form_data);

      $new_project->save();

      return redirect()->route('admin.projects.show', $new_project);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
      $technologies = explode("|", $project->used_technologies);
      return view('admin.projects.show', compact('project', 'technologies'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
