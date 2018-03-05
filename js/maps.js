// Placeholder locations for results_sample.html
var resultsSampleLocations = [
  [{lat: -20.363, lng: 131.044}, '<a href="individual_sample.html">Union Market</a> <br> <p>A wonderful cafe</p> <p>rating: 5</p>'],
  [{lat: -25.363, lng: 131.044}, '<a href="individual_sample.html">Starbucks</a> <br> <p>A wonderful cafe</p> <p>rating: 5</p>'],
  [{lat: -30.363, lng: 131.044}, '<a href="individual_sample.html">Coffee Time</a> <br> <p>A wonderful cafe</p> <p>rating: 5</p>'],
  [{lat: -25.363, lng: 136.044}, '<a href="individual_sample.html">Dairy Queen</a> <br> <p>A wonderful cafe</p> <p>rating: 5</p>']
];

// Placeholder locations for individual_sample.html
var individualSampleLocations = [
  [{lat: -25.363, lng: 136.044}, '<a href="individual_sample.html">Tea Hut</a>']
];

//initilizes the map with the specificied location and the marker content
function initMap(locations) {
  //options for how the map will be in its initial state
  var myOptions = {
    //where the map will be centered initially
    center: locations[0][0],
    //the zoom level of the initial map
    zoom: 4
    };
  //creating a variable to hold the newly created map and its respective <div>
  var map = new google.maps.Map(document.getElementById("map"), myOptions);

  //function to set the markers on the map for the inputted locations
  setMarkers(map, locations)
}

//function to set markers on the map
function setMarkers(map, locations){
  //iterates over all locations to set each marker, its content and the click event to open up a content window
  for (i = 0; i < locations.length; i++){
    //setting a marker for the current location and its posisiton on the map
    var marker = new google.maps.Marker({
      map: map, position: locations[i][0]
    });

    //setting a variable to hold the content from the locations list
    var content = locations[i][1];
    //making a variable for the infowindow for when the marker is clicked
    var infowindow = new google.maps.InfoWindow()

    //creating an event listener for when the marker is clicked to open an infowindow with the content from the locations list
    google.maps.event.addListener(marker,'click', (function(marker,content,infowindow){
      return function() {
        //setting content of infowindow
         infowindow.setContent(content);
         //opening the infowindow when the event is triggered
         infowindow.open(map, marker);
       };
     })(marker,content,infowindow));
   }
}
