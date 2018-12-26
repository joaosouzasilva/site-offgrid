/*var oficinas = document.querySelectorAll(".oficina_item");
console.log(oficinas);
oficinas.forEach(function(oficina) {
    oficina.addEventListener("click", function(event){
        event.preventDefault();
        address = this.querySelector(".endereco_js").innerHTML;
        initMap(address);
    });
});*/

function initMap(address) {
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 15,
        center: {lat: -8.281, lng: -35.974}
    });
    var geocoder = new google.maps.Geocoder();
    
    geocodeAddress(geocoder, map, address);

}

function geocodeAddress(geocoder, resultsMap, address) {
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