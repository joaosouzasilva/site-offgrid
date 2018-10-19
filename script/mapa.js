function initMap() {
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 15,
        center: {lat: -34.397, lng: 150.644}
    });
    var geocoder = new google.maps.Geocoder();
    
    geocodeAddress(geocoder, map);

}

function geocodeAddress(geocoder, resultsMap) {
    var address = document.querySelector(".endereco_desc").innerHTML;
    console.log(address);
    geocoder.geocode({'address': address}, function(results, status) {
        if (status === 'OK') {
            resultsMap.setCenter(results[0].geometry.location);
            var marker = new google.maps.Marker({
                map: resultsMap,
                position: results[0].geometry.location
            });
        } else {
            console.log('Geocode falhou: ' + status);
        }
    });
}

$(':radio').change(function() {
  console.log('New star rating: ' + this.value);
});