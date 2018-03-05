// Find current position
function getLocation() {
  //if the access to the location is available, get the location
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    // else print a message to the console
    } else {
        console.log("Geolocation is not supported by this browser.");
    }
}

//for later to do something with the location
function showPosition(position) {
  //logging the latitude and longitude in the consolee
  console.log(position.coords.latitude, position.coords.longitude);
}

getLocation();
