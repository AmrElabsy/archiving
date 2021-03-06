@extends("layout")

@section("content")
    <div class="page-content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <p>
                        <strong>Name: </strong> {{ $department->department }}
                    </p>

                    @include("documents_table")

                    <a class="btn btn-primary" href="{{ route("departments.edit", $department->id) }}">Edit</a>

                </div>
            </div>
        </div>
    </div>
@endsection
