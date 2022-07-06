
//Table of content
//1. Global Variables
//2. Setup leaflet map
//3. Function to build popups on map
//4. Build clinic list
//5. Calculate Geo Distance
//6. Initialize On Load
//7. Event tracker


//1. Global Variables
// This setup the leafmap object by linking the map() method to the map id (in <div> html element)
var map
var test=0;
var clinicIcon;
var distance;
var distanceArray = [];
var redIcon = L.icon({
    
    iconSize:     [50, 50], // size of the icon
    iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
    popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
});
var clinicIcon = L.icon({
    iconUrl: "Picture1.png",
    iconSize:     [30, 30], // size of the icon
    iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
    popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
});

//2. Setup leaflet map
function buildMap(){

  // alert("Start to build map")
    map = L.map('map', {
      center: [4.6433122994612415, 102.31279681938376],
      minZoom: zoom - 3,
  maxZoom: zoom + 3,
    });

    map.locate({setView: true})
    .on('locationfound',function(e){
      // console.log(e)
      test=e.latlng
     // console.log(e.latlng)
      // TODO
      buildClinicList(data, test)
    })
    .on('locationerror', function(e){
        // TODO
        buildClinicListNoData(data, test)
    });

    // Control 1: This add the OpenStreetMap background tile
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
	attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    // Control 2: This add a scale to the map
    

    L.control.scale().addTo(map);

    //L.control.locate().addTo(map);

    var lc = L.control.locate({
      position: 'topleft',
      strings: {
          title: "Show me where I am"
      }
  }).addTo(map);

    // Control 3: This add a Search bar
    var searchControl = new L.esri.Controls.Geosearch().addTo(map);

    var results = new L.LayerGroup().addTo(map);
     //var latlongSearch = 0;

    searchControl.on('results', function(response){
      results.clearLayers();
      // latlongSearch = response;
      // console.log(response.latlng)
      buildClinicList(data, response.latlng)
      // UpdateClinicsDistance(response.latlng)
      for (var i = response.results.length - 1; i >= 0; i--) {
        results.addLayer(L.marker(response.results[i].latlng, {icon: redIcon}));
      }
    });

      bindPopupMarkers(data)
    }

   
    
   

//3. Function to build popups on map
function bindPopupMarkers(data){
data.forEach((clinic)=>{
  // console.log(clinic)
  // console.log(clinic.clinic_coordinates, clinic.clinic_name, clinic.clinic_street)
  // console.log(latlongSearch)
  var marker = L.marker([clinic.latitude, clinic.longitude],{icon: clinicIcon}).addTo(map);
  marker.bindPopup(`
  <div class= 'popupmarker-text'>
    <b>${clinic.ppv_name}
    
    <div class ='clinic-street-text'> <br> ${clinic.state} </div>
    
  </div>
  `)

})
}

//4. Build clinic list
function buildClinicList(data, userlatlon){

    // alert("Start to build clinic list")
    //Sort By User Distance
    var distance = 0;
    data.forEach(function(item,i){

    if(userlatlon != 0){
      var temp_userSearchlatlong = [userlatlon.lat, userlatlon.lng]
      var temp_cliniclatlong = [item.latitude, item.longitude]
      distance = haversineDistance(temp_userSearchlatlong, temp_cliniclatlong)
      item.distance=distance
      }
    })
    data.sort(function(a, b){
      return a.distance - b.distance
    });
    // Sorting ascendingly
    // distanceArray = distanceArray.sort(function(a, b) {
    //   return a.distance - b.distance;
    // });

    //Build the HTML string
    var html=""
    for (let i = 0; i < data.length; i++) {
      // console.log(document.getElementById("sidebar").innerHTML)
      html+=`<div class="sidebar-item">
                
                <div class="sidebar-item-text">
                    <h2 class= "sidebar-clinic-text">${data[i].ppv_name}</h2>
                    <div class= "sidebar-distance-text">
                      &nbspDistance ${data[i].distance}KM
                      
                    </div>
                    <div class= "sidebar-street-text">Vaccine Type: ${data[i].vac_type}</div>
                    <div class= "sidebar-street-text">${data[i].state}</div>
                    <div class= "sidebar-location-button">
                      <button type="button" class="btn-clinic-link" onclick="trackEventMap('getDirectionButton')"> <a class= sidebar-directions-link href=${data[i].clinic_link} target= "_blank"> Get Directions </a>  </button>
                    </div>
                    <div class= "sidebar-booking-button">
                    <button type="button" class="btn-booking-link" onclick="trackEventMap('getDirectionButton')"> <a class= sidebar-booking-link href=${data[i].booking_link} target= "_blank" href="book-appoint.php"> Book now </a>  </button>
                      </button>
                      </div>
                </div>
          </div>`
    }
    document.getElementById("sidebar").innerHTML = html

  };


  function buildClinicListNoData(data, userlatlon){

    // alert("Start to build clinic list")
    //Sort By User Distance
    var distance = 0;
    data.forEach(function(item,i){

    if(userlatlon != 0){
      var temp_userSearchlatlong = [userlatlon.lat, userlatlon.lng]
      var temp_cliniclatlong = [item.latitude, item.longitude]
      distance = haversineDistance(temp_userSearchlatlong, temp_cliniclatlong)
      item.distance=distance
      }
    })
    data.sort(function(a, b){
      return a.distance - b.distance
    });
    // Sorting ascendingly
    // distanceArray = distanceArray.sort(function(a, b) {
    //   return a.distance - b.distance;
    // });

    //Build the HTML string
    var html=""
    for (let i = 0; i < data.length; i++) {
      // console.log(document.getElementById("sidebar").innerHTML)
      html+=`<div class="sidebar-item">
                
                <div class="sidebar-item-text">
                    <h2 class= "sidebar-clinic-text">${data[i].ppv_name}</h2>
                    <div class= "sidebar-street-text">${data[i].state}</div>
                    <div class= "sidebar-location-button">
                      <button type="button" class="btn-clinic-link" onclick="trackEventMap('getDirectionButton')"> <a class= "sidebar-directions-link" href=${data[i].clinic_link} target= "_blank"> Get Directions </a>  </button>
                    </div>
                    <div class= "sidebar-booking-button">
                      <button  type="button" class="btn-clinic-booking-link" onclick="trackEventMap('bookNowButton')"> </button>
                      </button>
                      </div>
                </div>
          </div>`
    }
    document.getElementById("sidebar").innerHTML = html

  };

//5. Calculate Geo Distance
function haversineDistance(pos1, pos2, isMiles = false){
  const toRadian = angle => (Math.PI / 180) * angle;
  const distance = (a, b) => (Math.PI / 180) * (a - b);
  const RADIUS_OF_EARTH_IN_KM = 6371;

  const dLat = distance(pos2[0], pos1[0]);
  const dLon = distance(pos2[1], pos1[1]);

  var lat1 = toRadian(pos1[0]);
  var lat2 = toRadian(pos2[0]);

  // Haversine Formula
  const a =
      Math.pow(Math.sin(dLat / 2), 2) +
      Math.pow(Math.sin(dLon / 2), 2) * Math.cos(lat1) * Math.cos(lat2);
  const c = 2 * Math.asin(Math.sqrt(a));

  let finalDistance = RADIUS_OF_EARTH_IN_KM * c;

  // From KM to Mile
  if (isMiles) {
      finalDistance /= 1.60934;
  }

  return finalDistance.toFixed(2);
};

//6. Initialize On Load
window.addEventListener('DOMContentLoaded', (event) => {
    // console.log('DOM fully loaded and parsed');
    // alert("Hello There!")
    buildMap()
    // setTimeout(() => {
    //   buildClinicList(data, test)
    // }, 1000);
    // buildClinicList(data, test)
});

// addEventListener('popupopen', function () {
//   console.log('here')
// })

//7.Event tracker
//Google Analytics Events Tracker self executing function
//This is google event code, pls do not remove

(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
ga('create', 'UA-80312661-1', 'auto');
ga('require', 'displayfeatures');

function trackEventMap(event){
ga('send', 'event', "EngMedicineTrack", event, 'Vaccination Clinics Map');
}
//filter by vaccine
function myFunction() {
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById("vac_type");
    filter = input.value.toUpperCase();
    ul = document.getElementById("vac_type");
    li = ul.getElementsByTagName("vac_type");
    for (i = 0; i < li.length; i++) {
        a = (data[i].vac_type).getElementsByTagName("a")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}