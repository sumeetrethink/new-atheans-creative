function openModal(id) {
    $(`#${id}`).modal('show');
}
function managelike(videoId,index)
{
    $.ajax({
        url: BASE_URL + "/manageLikes?videoId=" + videoId,
        success: function (data) {
           
            if(data["status"]=="unlike")
            {
                
                $(`.like-icon-${index}`).removeClass().addClass(`like-icon-${index} fa fa-thumbs-o-up`);
                // $('.like-icon').removeClass(' fa-thumbs-up ')
                // $('.like-icon').addClass('  ')
            }
            else if(data["status"]=="liked")
            {
                $(`.like-icon-${index}`).removeClass().addClass(`like-icon-${index} fa fa-thumbs-up`);
            }
            $(`.like-count-${index}`).html(data["count"]);
            
        },
      });
}
function handleVoting(videoId,index)
{
    $.ajax({
        url: BASE_URL + "/manageVotes?videoId=" + videoId,
        success: function (data) {
            if(data.status=='selected')
            {
                const newTab = window.open('/ballot', "_blank");

            }

        },
      });
}
// edit profile toggle function
function openEditProfile()
{
    $('.toogle-profile').toggle()
}


            