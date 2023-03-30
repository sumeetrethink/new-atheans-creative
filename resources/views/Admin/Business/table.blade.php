@foreach ($Businesses as $item)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $item->email}}</td>
        <td>{{ $item->contact }}</td>
        <td>{{ $item->address }}</td>

        <td>
            <a title="Click here to Edit" href="{{ url('admin/business/view/?item=' . $item->id) }}" class="btn btn-primary"
                style="margin-right:5px"><i class="fa fa-pen"></i></a>
            <button type="button" title="Click here to Delete" onclick="openModal({{ $item->id }})"
                class="btn btn-danger mt-1   "><i class="fa fa-times"></i></button>
        </td>
    </tr>
@endforeach
<script>
    function openModal(id) {
        $("#modal-default").modal("show");
        $("#deleteId").val(id);
    }
</script>
