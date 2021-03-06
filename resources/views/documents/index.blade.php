@extends("layout")

@section("content")
    <div class="page-content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route("documents.create") }}" class="btn btn-success">إضافة ملف جديد</a>
                    @include("documents_table")
                </div>
            </div>
        </div>
    </div>
@endsection

