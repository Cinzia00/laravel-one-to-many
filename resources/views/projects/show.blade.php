@extends ('layouts.app')

@section ('content')
<div class="container text-center">
  <h1 class="py-4">{{ $project->title }}</h1>
  <div class="row row-cols-3">
    <div class="col">{{ $project->title }}</div>
    <div class="col">{{ $project->description }}</div>
    <div class="col">{{ $project->project_image }}</div>
  </div>
</div>
@endsection