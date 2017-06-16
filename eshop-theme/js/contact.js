
var conmap = new google.maps.LatLng(eshop_map.map_location_first, eshop_map.map_location_seccend);
function initialize()
{
var mapProp = {
center:conmap,
zoom:parseInt(eshop_map.map_zoom),
scrollwheel: (eshop_map.map_scrollwheel == 'yes') ? true : false,
styles: [
    {
        "stylers": [
            {
                'Hue':  eshop_map.map_color
            },
            {
                "lightness": eshop_map.map_lightness
            }
        ]
    }
    ],
mapTypeId:google.maps.MapTypeId.ROADMAP
};

var map = new google.maps.Map(document.getElementById("gmap"),mapProp);

var marker = new google.maps.Marker({
position:conmap,
});
marker.setMap(map);
}

google.maps.event.addDomListener(window, 'load', initialize);