@extends("layout")

@section("content")
    <div class="page-content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route("types.store") }}" method="post">
                    @csrf

                    <!-- Name -->
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">اسم الفئة: </label>
                            <div class="col-sm-10">
                                <input class="form-control @error("name") is-invalid @enderror" type="text" id="name" name="name" value="{{ old("name") }}">
                                @error("name")
                                <span class="error">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <input type="submit" value="إضافة" class="btn btn-outline-success">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
