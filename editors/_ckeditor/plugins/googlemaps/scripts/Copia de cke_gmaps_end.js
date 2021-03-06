/* CK googlemapsEnd v3.2 */
"use strict";
function initLoader(e)
{
	if (e)
	{
		var obj = e.target || e.srcElement;
		if (obj) obj.onclick=null;
	}

	if (window.google)
	{
		if (window.google.maps)
		{
			initializeMaps();
			return;
		}
		if (window.google.load)
		{
			loadMaps();
			return;
		}
	}
	var script = document.createElement("script");
	var libraries="";
	if (window.gmapsGeometry) libraries="geometry";
	if (window.gmapsWeather) libraries+=( libraries=="" ? "" : ",") + "weather";
	if (libraries) libraries="&libraries=" + libraries;
	script.src = "//maps.googleapis.com/maps/api/js?sensor=false" + libraries + "&callback=initializeMaps";
	script.type = "text/javascript";
	document.getElementsByTagName("head")[0].appendChild(script);
}
function loadMaps()
{
	google.load("maps", "3", {"callback":initializeMaps,other_params:"sensor=false"});
}

function initializeMaps()
{
	InitializeLabels();
	for(var i=0; i<gmapsLoaders.length; i++)
		gmapsLoaders[i]();
}

function CKEMap(div, options)
{
	var allMapTypes = [google.maps.MapTypeId.ROADMAP, google.maps.MapTypeId.SATELLITE, google.maps.MapTypeId.HYBRID, google.maps.MapTypeId.TERRAIN];
	var myOptions = {
		zoom: options.zoom,
		center: new google.maps.LatLng(options.center[0], options.center[1]),
		mapTypeId: allMapTypes[ options.mapType ],
		scaleControl: options.scaleControl,
		overviewMapControl: options.overviewMapControl,
		overviewMapControlOptions: options.overviewMapControlOptions
	};
	switch (options.navigationControl)
	{
	case "None":
		myOptions.navigationControl = false;
		break;
	case "Default":
		myOptions.navigationControl = true;
		break;
	case "Small":
		myOptions.navigationControl = true;
		myOptions.navigationControlOptions = {style: google.maps.NavigationControlStyle.SMALL};
		break;
	case "Full":
		myOptions.navigationControl = true;
		myOptions.navigationControlOptions = {style: google.maps.NavigationControlStyle.ZOOM_PAN};
		break;
	}
	switch (options.mapsControl)
	{
	case "None":
		myOptions.mapTypeControl = false;
			break;
	case "Default":
		myOptions.mapTypeControl = true;
			break;
	case "Full":
		myOptions.mapTypeControl = true;
		myOptions.mapTypeControlOptions = {style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR};
			break;
	case "Menu":
		myOptions.mapTypeControl = true;
		myOptions.mapTypeControlOptions = {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU};
			break;
	}
	this.map = new google.maps.Map(div, myOptions);
	if (options.weather) {
		var weatherLayer = new google.maps.weather.WeatherLayer();
		weatherLayer.setMap( this.map );
	}
	if (options.traffic) {
		var trafficLayer = new google.maps.TrafficLayer();
		trafficLayer.setMap( this.map );
	}
	return this;
}
CKEMap.prototype.AddMarkers = function(aPoints)
{
	function createMarker(map, data) {
		var clickable=(data.text!=""),
			point=new google.maps.LatLng(data.lat, data.lon),
			marker = new google.maps.Marker( {position:point, map:map, title:data.title, icon: "//maps.gstatic.com/mapfiles/ms/micons/" + data.color + "-dot.png", clickable:clickable});
		if (data.title)
			new Label({ position:point, text:marker.title, map:map});
		if (clickable) google.maps.event.addListener(marker, "click", function() {
			if (!marker._infoWindow)
				marker._infoWindow =  new google.maps.InfoWindow({
			  content: "<div class=\"InfoContent\">" + data.text + "</div>",
					maxWidth:data.maxWidth
				});
			 marker._infoWindow.open(map, marker);
		});
	}
	for (var i=0; i<aPoints.length; i++)
		createMarker(this.map, aPoints[i]);
};
CKEMap.prototype.AddTexts = function(aPoints)
{
	for (var i=0; i<aPoints.length; i++)
	{
	var data=aPoints[i];
	var point=new google.maps.LatLng(data.lat, data.lon);
	if (data.title)
		new Label({ position:point, text: "<span>" + data.title + "</span>", map: this.map, className:data.className});
	}
};
CKEMap.prototype.AddLines = function( aLines )
{
	for (var i=0; i<aLines.length; i++)
	{
		var line = aLines[i];
		var clickable = (line.text!="");
		var l = new google.maps.Polyline( {map:this.map, path: google.maps.geometry.encoding.decodePath(line.points), strokeColor: line.color, strokeOpacity: line.opacity, strokeWeight: line.weight, clickable:clickable} );

	/*
			aScript.push('		if (clickable) google.maps.event.addListener(l, "click", function(latlng) {');
		aScript.push('			if (!l._infoWindow)');
		aScript.push('				l._infoWindow =  new google.maps.InfoWindow({');
		aScript.push('			  content: \'<div class="InfoContent">\' + line.text + \'</div>\',');
		aScript.push('					maxWidth:line.maxWidth');
		aScript.push('				});');
		aScript.push('			 l._infoWindow.setPosition(latlng);');
		aScript.push('			 l._infoWindow.open(theMap);');
			aScript.push('		});');
	*/

	}
};
CKEMap.prototype.AddAreas = function( aAreas )
{
	for (var i=0; i<aAreas.length; i++)
	{
		var area = aAreas[i];
		var line = area.polylines[0];
		var clickable = (area.text!="");
		var a = new google.maps.Polygon( {map:this.map, paths: google.maps.geometry.encoding.decodePath(line.points), strokeColor: line.color, strokeOpacity: line.opacity, strokeWeight: line.weight, fillColor:area.color, fillOpacity:area.opacity, clickable:clickable} );
//		aScript.push('		if (clickable) google.maps.Event.addListener(a, "click", function(latlng) {');
//		aScript.push('			map.openInfoWindowHtml(latlng, \'<div class="InfoContent">\' + area.text + \'</div>\', {maxWidth:area.maxWidth});');
//		aScript.push('		});');
	}
};
CKEMap.prototype.AddKml = function( url )
{
	new google.maps.KmlLayer(url, {map:this.map});
};

if (window.gmapsAutoload) {
	if (window.addEventListener) {
		window.addEventListener("load", initLoader, false);
	} else {
		window.attachEvent("onload", initLoader);
	}
}

// ELabel
// http://blog.mridey.com/2009/09/label-overlay-example-for-google-maps.html
function Label(b){this.setValues(b);var a=this.span_=document.createElement("span");a.style.cssText="white-space:nowrap; border:1px solid #999; padding:2px; background-color:white";if(b.className) a.className=b.className;var c=this.div_=document.createElement("div");c.appendChild(a); c.style.cssText="position: absolute; display: none"}function InitializeLabels(){Label.prototype=new google.maps.OverlayView;Label.prototype.onAdd=function(){var b=this.getPanes().overlayLayer;b.appendChild(this.div_)};Label.prototype.onRemove=function(){this.div_.parentNode.removeChild(this.div_);for(var b=0,a=this.listeners_.length;b<a;++b){google.maps.event.removeListener(this.listeners_[b])}};Label.prototype.draw=function(){var b=this.getProjection(),a=b.fromLatLngToDivPixel(this.get("position")),c=this.div_;c.style.left=a.x+"px";c.style.top=a.y+"px";c.style.display="block";this.span_.innerHTML=this.get("text").toString()}};
