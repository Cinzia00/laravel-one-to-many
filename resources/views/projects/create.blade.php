@extends ('layouts.app')

@section ('content')
<div class="container">
    <h2 class="py-5">Crea nuovo progetto</h2>
    <form action="{{route('projects.store') }}"  method="POST">
    @csrf
        <table class="table table-inverse table-responsive">
            <thead class="table-primary table-striped">
              <tr>
                <th>Titolo</th>
                <th>Slug</th>
                <th>Descrizione</th>
                <th>Immagine</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}">
                        @error('title')
                        {{-- <div class="alert alert-danger">{{ $message }}</div> --}}
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                         @enderror
                    </td>
                    <td>
                        <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug') }}">
                        @error('slug')
                        {{-- <div class="alert alert-danger">{{ $message }}</div> --}}
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                         @enderror
                    </td>
                    <td>
                        <input type="text" class="form-control" id="description" name="description" value="{{ old('description') }}">
                    </td>
                    <td>
                        <input type="text" class="form-control" id="project_image" name="project_image" value="{{ old('project_image') }}">
                    </td>
                </tr>  
            </tbody>
        </table>
        <button type="submit" class="btn btn-primary">Salva</button>
    </form>
</div>
@endsection