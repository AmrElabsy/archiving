@extends("layout")

@section("content")
    <div class="page-content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <p>
                        <strong>اسم الفئة: </strong> {{ $type->type }}
                    </p>

                    @include("documents_table")

                    <a class="btn btn-primary" href="{{ route("types.edit", $type->id) }}">Edit</a>
                </div>
            </div>
        </div>
    </div>
@endsection
