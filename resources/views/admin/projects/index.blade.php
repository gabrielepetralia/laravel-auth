@extends('layouts.admin')

@section('title')
  | Projects
@endsection

@section('content')
<div class="container">
  <h2 class="fs-4 my-4">Projects</h2>

  <div class="table-wrapper rounded-3 overflow-hidden mb-4">

    <table class="table table-dark table-striped table-hover text-center m-0">
      <thead>
        <tr class="">
          <th scope="col" class="py-3">
            <a class="text-white" href="{{ route('admin.orderby', ['direction' => $direction ]) }}">ID
              @if($direction === 'asc')
                <i class="fa-solid fa-arrow-down"></i>
              @else
                <i class="fa-solid fa-arrow-up"></i>
              @endif
            </a>
          </th>
          <th scope="col" class="text-start w-25 py-3">Name</th>
          <th scope="col" class="py-3">Is Finished</th>
          <th scope="col" class="py-3">Start Date</th>
          <th scope="col" class="py-3">End Date</th>
          <th scope="col" class="py-3">Actions</th>
        </tr>
      </thead>
      <tbody>

        @foreach ($projects as $project)
        <tr>
          <th scope="row">{{ $project->id }}</th>
          <td class="text-start">{{ $project->name }}</td>

          <td class="fs-5 {{ $project->is_finished ? 'text-success' : 'text-danger' }}">
            {!! $project->is_finished ? '<i class="fa-solid fa-check"></i>' : '<i class="fa-solid fa-xmark"></i>' !!}
          </td>

          @php
            $start_date = date_create($project->start_date);
            if(!empty($project->end_date)) $end_date = date_create($project->end_date);
          @endphp
          <td>{{ date_format($start_date,"d/m/Y") }}</td>
          <td class="{{ $project->end_date ? '' : 'text-danger' }}" >
            {{ $project->end_date ? date_format($end_date,"d/m/Y") : 'Not Finished' }}
          </td>

          <td>
            <a href="#" title="Show" class="btn btn-primary"><i class="fa-solid fa-eye"></i></a>
            <a href="#" title="Edit" class="btn btn-warning text-white"><i class="fa-solid fa-pencil"></i></a>
            <a href="#" title="Edit" class="btn btn-danger text-white"><i class="fa-solid fa-trash"></i></a>
          </td>
        </tr>
        @endforeach

      </tbody>
    </table>

  </div>


  <div>
    {{ $projects->links() }}
  </div>

</div>
@endsection
