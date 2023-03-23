function openModal(id) {
    $(`#${id}`).modal('show');
}
function managelike(videoId)
{
    $.ajax({
        url: BASE_URL + "/manageLikes?videoId=" + videoId,
        success: function (data) {
            console.log(data["status"])
            if(data["status"]=="unlike")
            {
                
                $('.like-icon').removeClass().addClass('like-icon fa fa-thumbs-o-up');
                // $('.like-icon').removeClass(' fa-thumbs-up ')
                // $('.like-icon').addClass('  ')
            }
            else if(data["status"]=="liked")
            {
                $('.like-icon').removeClass().addClass('like-icon fa fa-thumbs-up');
            }
            
            $('.likes-count').html(data["count"]);

        },
      });
}