@foreach ($peoples as $cat)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $cat->name }}</td>

        <td>
            <a title="Click here to Edit" href="{{ url('admin/category/edit/' . $cat->main_cat_id) }}"
                class="btn btn-primary" style="margin-right:5px"><i class="fa fa-pen"></i></a>
            <button type="button" title="Click here to Delete" onclick="deleteCategory({{ $cat->main_cat_id }})"
                class="btn btn-danger mt-1   "><i class="fa fa-times"></i></button>
        </td>
    </tr>
@endforeach
<script>
    function deleteCategory($repairID) {
        $("#modal-default").modal("show");
        $("#deleteCategory").val($repairID);
    }
</script>
