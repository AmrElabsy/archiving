<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead>
    <tr>
        <th>#</th>
        <th>الفئة</th>
        <th>اسم الملف</th>
        <th>المعايير</th>
        <th>المصدر</th>
        <th>محول إلى</th>
        <th>Manage</th>
    </tr>
    </thead>

    <tbody>
    @foreach( $documents as $i => $document )
        <tr>
            <td>{{ $i + 1 }}</td>
            <td>{{ $document->type->type }}</td>
            <td>{{ $document->document }}</td>
            <td>{{ $document->categories }}</td>
            <td>{{ $document->source->department }}</td>
            <td>{{ $document->going_to }}</td>
            <td>
                <a href="{{ asset("_documents/" . $document->link ) }}" download="{{ $document->name }}" class="btn btn-brown waves-effect waves-l">تحميل</a>
                <a class="btn btn-primary" href="{{ route("documents.edit", $document->id ) }}">تعديل</a>
                <form method="post" action="{{ route("documents.destroy", $document->id) }}" style="display: inline">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">حذف</button>
                </form>
            </td>
        </tr>

    @endforeach
    </tbody>
</table>


@section("scripts")
    <script src="{{ asset("assets/js/pages/datatables.init.js") }}"></script>
@endsection