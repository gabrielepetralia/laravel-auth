@extends('layouts.admin')

@section('title')
  | Projects | {{ $project->name }}
@endsection

@section('content')
<div class="container mb-4">
  <h2 class="fs-4 my-4">Project: {{ $project->name }}</h2>

  <div class="table-wrapper rounded-3 overflow-hidden mb-4">

    <table class="table table-dark m-0 table-show">
      <tbody>
        <tr>
          <td class="fw-semibold w-25">Name :</td>
          <td>{{ $project->name }}</td>
        </tr>
        <tr>
          <td class="fw-semibold w-25">Image :</td>
          <td><img class="w-50" src="" alt="{{ $project->name }}" onerror=" this.src = '/img/noimage.png' "></td>
        </tr>
        <tr>
          <td class="fw-semibold w-25">Description :</td>
          <td>{{ $project->description }}</td>
        </tr>
        <tr>
          <td class="fw-semibold">Used Technologies :</td>
          <td>
            @foreach ($technologies as $technology)
              <img class="tech-logo" src="{{ '/img/tech_logos/' . $technology . '.png' }}" alt="{{ $technology }}">
            @endforeach
          </td>
        </tr>
        <tr>
          <td class="fw-semibold">Is Finished :</td>
          <td class="fs-5 {{ $project->is_finished ? 'text-success' : 'text-danger' }}">
            {!! $project->is_finished ? '<i class="fa-solid fa-check"></i>' : '<i class="fa-solid fa-xmark"></i>' !!}
          </td>
        </tr>

        @php
          $start_date = date_create($project->start_date);
          if(!empty($project->end_date)) $end_date = date_create($project->end_date);
        @endphp
        <tr>
          <td class="fw-semibold">Start Date :</td>
          <td>{{ date_format($start_date,"d/m/Y") }}</td>
        </tr>
        <tr>
          <td class="fw-semibold">End Date :</td>
           <td class="{{ $project->end_date ? '' : 'text-danger' }}" >
            {{ $project->end_date ? date_format($end_date,"d/m/Y") : 'Not Finished' }}
          </td>
        </tr>
      </tbody>
    </table>
  </div>


  <div class="d-flex justify-content-between">
    <a href="{{ route('admin.projects.index')}}" title="Go back" class="btn btn-primary text-white"><i class="fa-solid fa-left-long"></i></a>

    <div>
      <a href="#" title="Edit" class="btn btn-warning text-white"><i class="fa-solid fa-pencil"></i></a>
      <a href="#" title="Edit" class="btn btn-danger text-white"><i class="fa-solid fa-trash"></i></a>
    </div>
  </div>

</div>
@endsection
