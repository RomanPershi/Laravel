var map, marker;
var url = "https://suggestions.dadata.ru/suggestions/api/4_1/rs/geolocate/address";
var token = "96eee978fcef5b9fce40472a12d3ffbf0f1ce75a";
var last_adress;
var lat;
var lng;

function Pickup(el) {
    $('#map').css('display', 'none');
    $('.address').css('display', 'none');
    $('#delivery').css('color', '#ff0099');
    $(el).css('color', '#fff');
    $('#alert_pickup').css('display', 'block');
    $('.inputs').css('display', 'none');
}

function decorateDelivery(el) {
    $('.inputs').css('display', 'block');
    $('#alert_pickup').css('display', 'none');
    $('.address').css('display', 'block');
    $('#pickup').css('color', '#ff0099');
    $(el).css('color', '#fff');
}

function Delivery(el) {
    decorateDelivery(el);
    if (document.getElementById('map') == null) {
        Onmap(undefined, undefined,10,true);
    } else {
        $('#map').css('display', 'block');
    }
}

function Onmap(local_lat, local_lng,zoom, able_set) {
    if (local_lat == undefined && local_lng == undefined) {
        local_lat = 54.322;
        local_lng = 48.388;
    }
    $('.map_block').append('<div id="map"></div>');
    DG.then(function () {
        map = DG.map('map', {
            center: [local_lat, local_lng],
            zoom: zoom
        });
        marker = DG.marker([local_lat, local_lng]).addTo(map);
        if (able_set) {
            map.on('click', function (e) {
                lat = e['latlng']['lat'];
                lng = e['latlng']['lng'];
                if (marker != undefined) {
                    marker.removeFrom(map);
                }
                marker = DG.marker([lat, lng]).addTo(map);
                var options = getOption(lat,lng);
                fetch(url, options)
                    .then(response => response.json())
                    .then(result => $('.address').html(result['suggestions'][0]['data']['street_with_type']))
                    .catch(error => console.log("error", error));
            });
        }
        else{
            var options = getOption(local_lat,local_lng);
            fetch(url, options)
                .then(response => response.json())
                .then(result => $('.address').html(result['suggestions'][0]['data']['street_with_type']))
                .catch(error => console.log("error", error));
        }
    });
}
function getOption(lat,lng)
{
    var options = {
        method: "POST",
        mode: "cors",
        headers: {
            "Content-Type": "application/json",
            "Accept": "application/json",
            "Authorization": "Token " + token
        },
        body: JSON.stringify({lat: lat, lon: lng,})
    }
    return options;
}
