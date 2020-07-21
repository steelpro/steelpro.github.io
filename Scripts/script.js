$(document).ready(function(){$(window).scroll(function(){$(".title").css("opacity",1-$(window).scrollTop()/1000)});var contentOffset=getOffset();function getOffset(){var topOffSet=$("nav").offset();return topOffSet.top}
$(window).resize(function(){contentOffset=getOffset()});$(window).scroll(function(){var windowTop=$(window).scrollTop();if(windowTop>contentOffset)
$(".to-top").css("opacity",".6");else $(".to-top").css("opacity","0")});$('.to-top').click(function(){$('body, html').animate({scrollTop:$("#site-nav").offset().top},800);return!1})});function ticketPriceChange(){var ticketType=document.getElementById('ticket-type');var ticketPrice=document.getElementById('ticket-price');if(ticketType.value=="Standard")
ticketPrice.value="$25.00";else if(ticketType.value=="VIP")
ticketPrice.value="$45.00"}
var editionArray={Classic:"(Classic)/Black.png",Modern:"(Modern)/Ash.png"};function editionChangeShirt(){var source=$('.item-shirt')[0].src;source=source.substring(0,source.indexOf('('));source+=editionArray[$(".edition-shirt")[0].value];$('.item-shirt')[0].src=source;var colorList=$('.color-shirt');switch($(".edition-shirt")[0].value){case "Classic":colorList.empty().append(''+'<option value="/Black.png">Black</option>'+'<option value="/Navy.png">Navy</option>');break;case "Modern":colorList.empty().append(''+'<option value="/Ash.png">Ash</option>'+'<option value="/White.png">White</option>'+'<option value="/Indigo Blue.png">Indigo Blue</option>');break}}
function colorChangeShirt(){var source=$('.item-shirt')[0].src;source=source.substring(0,source.indexOf(')')+')'.length);$('.item-shirt')[0].src=source+$(".color-shirt")[0].value}
function editionChangeHoodie(){var source=$('.item-hoodie')[0].src;source=source.substring(0,source.indexOf('('));source+=editionArray[$(".edition-hoodie")[0].value];$('.item-hoodie')[0].src=source;var colorList=$('.color-hoodie');switch($(".edition-hoodie")[0].value){case "Classic":colorList.empty().append(''+'<option value="/Black.png">Black</option>'+'<option value="/Navy.png">Navy</option>');break;case "Modern":colorList.empty().append(''+'<option value="/Ash.png">Ash</option>'+'<option value="/Charcoal Heather.png">Charcoal Heather</option>');break}}
function colorChangeHoodie(){var source=$('.item-hoodie')[0].src;source=source.substr(0,source.lastIndexOf("/"));$('.item-hoodie')[0].src=source+$(".color-hoodie")[0].value}
function colorChangeHat(){var source=$('.item-hat')[0].src;source=source.substr(0,source.lastIndexOf("/"));$('.item-hat')[0].src=source+$(".color-hat")[0].value}
function checkLogin(){var usernameInput=document.getElementById("username");var passwordInput=document.getElementById("password");var username=document.getElementById("username").value;var password=document.getElementById("password").value;if(password===""&&username===""){invalidTextColor(usernameInput);invalidTextColor(passwordInput);alert("Login fields are blank!");return!1}
else if(username===""){invalidTextColor(usernameInput);validTextColor(passwordInput);alert("Username field is blank!");return!1}
else if(password===""){invalidTextColor(passwordInput);validTextColor(usernameInput);alert("Password field is blank!");return!1}
else{validTextColor(usernameInput);validTextColor(passwordInput);return!0}}
function invalidTextColor(text){text.style.color="black";text.style.backgroundColor="rgba(255,0,0,.5)"}
function validTextColor(text){text.style.color="black";text.style.backgroundColor="rgb(255,255,255)"}
function checkSignup(){var invalid=!1;var ematch=!1;var psmatch=!1;var pslength=!1;var requiredFields=['firstname','lastname','sex','email','address','city','state','country','username','password','password-cf'];for(var i=0;i<requiredFields.length;i++){var txtFld=document.getElementById(requiredFields[i]);var txtVal=document.getElementById(requiredFields[i]).value;if(txtVal==""){invalidTextColor(txtFld)
invalid=!0}
else{validTextColor(txtFld)}}
var emailFormat=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;var email=document.getElementById("email").value;if(!email.match(emailFormat))
ematch=!1;else ematch=!0;var passOne=document.getElementById("password").value;var passTwo=document.getElementById("password-cf").value;if(passOne!=passTwo)
psmatch=!1;else psmatch=!0;if(psmatch){if(passOne.length>=6)
pslength=!0;else pslength=!1}
if(invalid&&!ematch&&!psmatch){alert("Form content is missing/email is invalid/passwords do not match!");return!1}
else if(!ematch&&!psmatch){alert("Email is invalid/passwords do not match!");invalidTextColor(document.getElementById("email"));invalidTextColor(document.getElementById("password"));invalidTextColor(document.getElementById("password-cf"));return!1}
else if(invalid){alert("Form content is missing! Please review.");return!1}
else if(!ematch){alert("Email is invalid!");invalidTextColor(document.getElementById("email"));return!1}
else if(!psmatch){alert("Passwords do not match!");invalidTextColor(document.getElementById("password"));invalidTextColor(document.getElementById("password-cf"));return!1}
else if(!pslength){alert("Password must be at least 6 characters in length!");invalidTextColor(document.getElementById("password"));invalidTextColor(document.getElementById("password-cf"));return!1}
if(confirm('Are you sure you want to submit this form?'))
return!0;else return!1}
function checkChangeInfo(){var invalid=!1;var ematch=!1;var requiredFields=['firstname','lastname','email','address','city','state','country'];for(var i=0;i<requiredFields.length;i++){var txtFld=document.getElementById(requiredFields[i]);var txtVal=document.getElementById(requiredFields[i]).value;if(txtVal==""){invalidTextColor(txtFld)
invalid=!0}
else{validTextColor(txtFld)}}
var emailFormat=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;var email=document.getElementById("email").value;if(!email.match(emailFormat))
ematch=!1;else ematch=!0;if(invalid){alert("Form content is missing! Please review.");return!1}
else if(invalid&&ematch){alert("Form content is missing/email is invalid/passwords do not match!");return!1}
else if(!ematch){alert("Email is invalid!");invalidTextColor(document.getElementById("email"));return!1}
if(confirm('Are you sure you want to submit these changes?'))
return!0;else return!1}
function checkChangePassword(){var invalid=!1;var psmatch=!1;var psoldmatch=!1;var pslength=!1;var requiredFields=['password-o','password-n','password-c'];for(var i=0;i<requiredFields.length;i++){var txtFld=document.getElementById(requiredFields[i]);var txtVal=document.getElementById(requiredFields[i]).value;if(txtVal==""){invalidTextColor(txtFld)
invalid=!0}
else{validTextColor(txtFld)}}
var passOld=document.getElementById("password-o").value;var passOne=document.getElementById("password-n").value;var passTwo=document.getElementById("password-c").value;if(passOld==passOne)
psoldmatch=!0;else psoldmatch=!1;if(passOne!=passTwo)
psmatch=!1;else psmatch=!0;if(psmatch){if(passOne.length>=6)
pslength=!0;else pslength=!1}
if(invalid){alert("Form content is missing! Please review.");return!1}
else if(!psmatch){alert("New passwords do not match!");invalidTextColor(document.getElementById("password-n"));invalidTextColor(document.getElementById("password-c"));return!1}
else if(!pslength){alert("New password must be at least 6 characters in length!");invalidTextColor(document.getElementById("password-n"));invalidTextColor(document.getElementById("password-c"));return!1}
else if(psoldmatch){alert("New password cannot be the same as old password!");invalidTextColor(document.getElementById("password-n"));invalidTextColor(document.getElementById("password-c"));return!1}}
$('.members').on("click","img",function(e){var $target=$(this).siblings(".member-desc");var targetIsActive=$target.hasClass('active');if(!targetIsActive){$target.addClass('active');$target.addClass('members-animate-on');$target.removeClass('members-animate-off')}
else{$target.removeClass('active');$target.removeClass('members-animate-on');$target.addClass('members-animate-off')}});var map;function initMap(){var options={zoom:10,center:{lat:39.6048,lng:-75.7452}}
map=new google.maps.Map(document.getElementById('tour-map'),options);var tours=document.querySelectorAll(".tour-dates ul li");var place=[];for(var i=1;i<tours.length;i+=3)
place.push(tours.item(i).innerText);var complex=[];for(var i=2;i<tours.length;i+=3)
complex.push(tours.item(i).innerText);var spot=[];for(var i=0;i<place.length;i++){spot.push(complex[i]+", "+place[i])}
for(var i=0;i<place.length;i++){var geocoder=new google.maps.Geocoder();geocoder.geocode({'address':spot[i]},function(results,status){if(status==='OK'){var city=results[0].address_components[2].short_name;var state=results[0].address_components[4].short_name;if(state.length>3){city=results[0].address_components[3].short_name;state=results[0].address_components[5].short_name}
var full=city+", "+state;var tours=document.querySelectorAll(".tour-dates ul li");var date;var c=1;for(var i=0;i<tours.length;i+=3){if(tours.item(c).innerText.toLowerCase()===full.toLowerCase()){date=tours.item(i).innerText}
c+=3}
var p=results[0].geometry.location;var marker=new google.maps.Marker({position:p,map:map});var infoWindow=new google.maps.InfoWindow({content:'<h1>'+city+", "+state+'</h1><h4>'+date+'</h4>'});marker.addListener('click',function(){infoWindow.open(map,marker)})}})}}
function getLocation(){if(navigator.geolocation){if(typeof navigator.geolocation.getCurrentPosition(calcCoords)!=="function")
alert("Geolocation may not supported by this browser!");else{navigator.geolocation.getCurrentPosition(calcCoords)}}
else{alert("Geolocation may not supported by this browser!")}}
function calcCoords(position){var lat=position.coords.latitude;var lng=position.coords.longitude;fillAddress(lat,lng)}
function fillAddress(lat,lng){var latlng=new google.maps.LatLng(lat,lng);var geocoder=geocoder=new google.maps.Geocoder();geocoder.geocode({'latLng':latlng},function(results,status){if(status==google.maps.GeocoderStatus.OK){if(results[1]){var city=results[1].address_components[2].short_name;var state=results[1].address_components[4].short_name;var country=results[1].address_components[5].short_name;var zip=results[1].address_components[6].short_name;document.getElementById("city").value=city;document.getElementById("state").value=state;document.getElementById("country").value=country}}})}
function checkDistance(){var city=document.getElementById("city").value;var state=document.getElementById("state").value;var country=document.getElementById("country").value;var start=city+", "+state+", "+country;if(city==""||state==""||country==""){alert("Please enter an address or use the autofill feature!");return}
var tours=document.querySelectorAll(".tour-dates ul li");var place=[];for(var i=1;i<tours.length;i+=4)
place.push(tours.item(i).innerText);var complex=[];for(var i=2;i<tours.length;i+=4)
complex.push(tours.item(i).innerText);var spot=[];for(var i=0;i<place.length;i++){spot.push(complex[i]+", "+place[i])}
directions(start,spot.length);function directions(start,count){if(count>0){var directionsService=new google.maps.DirectionsService();directionsService.route(calcDistConditions(start,spot[count-1]),function(response,status){if(status==google.maps.DirectionsStatus.OK){var distance=response.routes[0].legs[0].distance.value/1609.34;distance=parseFloat(Math.round(distance*100)/100).toFixed(2);if(distance<50){moveLocation(spot[count-1]);return}
return directions(start,count-1)}
else alert("Error finding events! Please try again later.")})}
else{alert("No nearby events found!");return count}}
function calcDistConditions(locationOne,locationTwo){var request={origin:locationOne,destination:locationTwo,travelMode:google.maps.DirectionsTravelMode.DRIVING,unitSystem:google.maps.UnitSystem.IMPERIAL,avoidHighways:!1,avoidTolls:!1};return request}
function moveLocation(address){var geocoder=new google.maps.Geocoder();geocoder.geocode({'address':address},function(results,status){if(status==google.maps.GeocoderStatus.OK){var lat=results[0].geometry.location.lat();var lng=results[0].geometry.location.lng();var center=new google.maps.LatLng(lat,lng);map.panTo(center)}})}}