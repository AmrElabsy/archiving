@extends("layout")

@section("styles")
    <link href="{{ asset("assets/libs/select2/css/select2.min.css") }}" rel="stylesheet" type="text/css"/>
@endsection
@section("content")
    <div class="page-content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route("documents.update", $document->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                        @method("PUT")

                        <!-- Name -->
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">اسم الملف: </label>
                            <div class="col-sm-10">
                                <input class="form-control @error("name") is-invalid @enderror" type="text" id="name"
                                       name="name" value="{{ old("name", $document->document) }}">
                                @error("name")
                                <span class="error">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Type -->
                        <div class="form-group row">
                            <label for="type" class="col-sm-2 col-form-label">الفئة: </label>
                            <div class="col-sm-10">
                                <select name="type" class="form-control" id="type">
                                    @foreach( $types as $type )
                                        <option value="{{ $type->id }}"
                                            @if( $type->id == $document->type_id )
                                                selected
                                            @endif>
                                            {{ $type->type }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Source -->
                        <div class="form-group row">
                            <label for="source" class="col-sm-2 col-form-label">المصدر: </label>
                            <div class="col-sm-10">
                                <select name="source" class="form-control" id="source">
                                    @foreach( $departments as $department )
                                        <option value="{{ $department->id }}"
                                                @if( $department->id == $document->department_id )
                                                selected
                                                @endif>
                                            {{ $department->department }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Categories -->
                        <div class="form-group row">
                            <label for="categories" class="col-sm-2 col-form-label">المعايير: </label>
                            <div class="col-sm-10">
                                <select name="categories[]" id="categories" class="select2 form-control select2-multiple"
                                        multiple="multiple">
                                    @foreach( $categories as $category )
                                        <option value="{{ $category->id }}"
                                                @if( in_array( $category->id, $document->categories_array ) )
                                                    selected
                                                @endif
                                        >
                                            {{ $category->category }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Going To -->
                        <div class="form-group row">
                            <label for="goingTo" class="col-sm-2 col-form-label">محول إلى: </label>
                            <div class="col-sm-10">
                                <select name="goingTo[]" id="goingTo" class="select2 form-control select2-multiple"
                                        multiple="multiple">
                                    @foreach( $departments as $department )
                                        <option value="{{ $department->id }}"
                                                @if( in_array( $department->id, $document->going_to_array ) )
                                                selected
                                                @endif
                                        >
                                            {{ $department->department }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Document -->
                        <div class="form-group row">
                            <label for="document" class="col-sm-2 col-form-label">الملف: </label>
                            <div class="col-sm-10">
                                <input type="file" class="filestyle" id="document" name="document" data-buttonname="btn-secondary">
                            </div>
                        </div>

                        <div class="form-group row">
                            <input type="submit" class="btn btn-outline-success">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section("scripts")
    <script src="{{ asset("assets/libs/admin-resources/bootstrap-filestyle/bootstrap-filestyle.min.js") }}"></script>
    <script src="{{ asset("assets/libs/select2/js/select2.min.js") }}"></script>
    <script src="{{ asset("assets/js/pages/form-advanced.init.js") }}"></script>
@endsection