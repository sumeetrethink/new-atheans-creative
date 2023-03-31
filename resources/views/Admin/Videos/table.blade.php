@foreach ($videos as $index => $item)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>
            <div class="embed-responsive embed-responsive-16by9">
                <video width="320" height="240" controls poster="{{ asset('Data/Thumbnail/' . $item->thumbnail) }}">
                    <source src="{{ asset('Data/Video/' . $item->file_name) }}" type="video/mp4">

                </video>
            </div>
        </td>
        <td>{{ $item->video_title }}</td>
        <td>{{ $item->first_name . ' ' . $item->last_name }}</td>

        <td>
            <a title="Click here to show likes" href="{{ url('admin/video/likes/?item=' . $item->video_id) }}"
                class="btn btn-primary" style="margin-right:5px"><i class="fa fa-heart pr-1"></i>Likes</a>
            <button type="button" title="Click here to changes status"
                onclick="changeVideoStatus({{ $item->video_id }},{{ $index }})"
                class="btn {{ $item->is_approved == 'Yes' ? 'btn-success' : 'btn-primary' }} admin-video-status-{{ $index }}">{{ $item->is_approved == 'Yes' ? 'Published' : 'Unpublished' }}</button>
            <button type="button" title="Click here to Delete" onclick="openModal({{ $item->video_id }})"
                class="btn btn-danger    "><i class="fa fa-trash pr-1"></i></button>
        </td>
    </tr>
@endforeach
<script>
    function openModal(id) {
        $("#modal-default").modal("show");
        $("#deleteId").val(id);
    }

    function changeVideoStatus(id, index, currentStatus) {
        $.ajax({
            url: BASE_URL + "/admin/video/change-status?id=" + id,
            success: function(data) {

                if (data == "Yes") {
                    $(`.admin-video-status-${index}`).removeClass().addClass(
                        `btn btn-success admin-video-status-${index}`);
                    $(`.admin-video-status-${index}`).html("Published")
                } else {
                    $(`.admin-video-status-${index}`).removeClass().addClass(
                        `btn btn-danger admin-video-status-${index}`);
                    $(`.admin-video-status-${index}`).html("Unpublished")
                }
            }
        });
    }
</script>
