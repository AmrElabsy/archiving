@extends("layout")

@section("content")
    <div class="page-content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route("categories.create") }}" class="btn btn-success">إضافة معيار جديدة</a>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                           style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>اسم المعيار</th>
                            <th>التحكم</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach( $categories as $i => $category )
                            <tr>
                                <td>{{ $i + 1 }}</td>
                                <td><a style="color: inherit"
                                       href="{{ route("categories.show", $category->id) }}">{{ $category->category }}</a></td>
                                <td>
                                    <a class="btn btn-primary"
                                       href="{{ route("categories.edit", $category->id ) }}">تعديل</a>
                                    <form method="post" action="{{ route("categories.destroy", $category->id) }}"
                                          style="display: inline">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">حذف</button>
                                    </form>
                                </td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section("scripts")
    <script src="{{ asset("assets/js/pages/datatables.init.js") }}"></script>
@endsection
