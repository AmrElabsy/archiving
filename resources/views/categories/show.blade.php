@extends("layout")

@section("content")
    <div class="page-content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <p>
                        <strong>اسم المعيار: </strong> {{ $category->category }}
                    </p>

                    @include("documents_table")

                    <a class="btn btn-primary" href="{{ route("categories.edit", $category->id) }}">تعديل</a>
                </div>
            </div>
        </div>
    </div>
@endsection
