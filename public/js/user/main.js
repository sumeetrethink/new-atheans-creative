function getCityDetailsFromPincode(pincode) {
    return new Promise(function(resolve, reject) {
      var geocoder = new google.maps.Geocoder();
      geocoder.geocode({ 'address': pincode }, function(results, status) {
        if (status === google.maps.GeocoderStatus.OK) {
          for (var i = 0; i < results[0].address_components.length; i++) {
            var addressType = results[0].address_components[i].types[0];
            if (addressType === "locality") {
              var lat = results[0].geometry.location.lat();
              var lng = results[0].geometry.location.lng();
              var cityDetails = { lat: lat, lng: lng };
              resolve(cityDetails);
            }
          }
          reject("City not found");
        } else {
          reject("Geocoder failed due to: " + status);
        }
      });
    });
}

function openModal(id) {
    if(id)
    {
        $(`#${id}`).modal('show');
    }
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
                const newTab = window.open(`${BASE_URL}/ballot`, "_blank");
            }
        },
    });


}
// edit profile toggle function
function openEditProfile()
{
    $('.toogle-profile').toggle()
}


            