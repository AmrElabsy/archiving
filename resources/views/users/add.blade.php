@extends("layout")

@section("content")
    <div class="page-content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route("departments.store") }}" method="post">
                    @csrf

                    <!-- Name -->
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Name: </label>
                            <div class="col-sm-10">
                                <input class="form-control @error("name") is-invalid @enderror" type="text" id="name" name="name" value="{{ old("name") }}">
                                @error("name")
                                <span class="error">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>

                        @admin
                        <!-- Faculty -->
                        <div class="form-group row">
                            <label for="faculty" class="col-sm-2 col-form-label">Faculty: </label>
                            <div class="col-sm-10">
                                <select class="form-control" id="faculty" name="faculty">
                                    @foreach( $faculties as $faculty )
                                        <option value="{{ $faculty->id }}"
                                                @if( $faculty->id == old("faculty") )
                                                selected
                                                @endif>
                                            {{ $faculty->faculty }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        @endadmin

                        <div class="form-group row">
                            <input type="submit" class="btn btn-outline-success">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
