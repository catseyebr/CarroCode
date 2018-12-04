var _ROUTE_POLYLINE_;
function MyGmaps (holder, points, width, height) {
  this.circ = null;
  this.circPoint;
  this.route = null;
  this.routeToPoint;
  this.routeFromPoint;
  this.gmap;
  this.gdirections;
  this.holder = holder;
  this.points = points;
  this.map_size = new GSize(width, height);
  this.bounds = new GLatLngBounds(); 
  
  this.init = function () {
    this.clearInvalidPoints();
    if (this.points.length > 0) {
      for (var i = 0; i < this.points.length; i++) {
        this.setBounds(this.points[i].lat, this.points[i].lng);
      }
    }
  }
  
  this.setBounds = function (lat, lng) {
    this.bounds.extend(new GLatLng(lat, lng));
  }
  
  this.clearInvalidPoints = function () {
    for (var i = 0; i < this.points.length; i++) {
      var p = this.treatPoint(this.points[i]);
      if (p == null || typeof p == 'undefined') {
        this.points.splice(i, 1);
        i--;
      } else {
        this.points[i] = p;
      }
    }
  }
  
  this.treatPoint = function (point) {
    var p;
    if (
    typeof point.name != 'string'
    || typeof point.lat != 'number'
    || typeof point.lng != 'number'
    || typeof point.image != 'string'
    ) {
      p = null;
    } else {
      if (typeof point.shadowImage != 'string') {
        point.shadowImage = point.image.replace(/(\.png)/i, '_shadow$1');
      }
      if (typeof point.transpImage != 'string') {
        point.transpImage = point.image.replace(/(\.png)/i, '_trans$1');
      }
      if (typeof point.imageSize == 'object') {
        if (typeof point.imageSize.w == 'number' && typeof point.imageSize.h == 'number') {
          point.imageGSize = new GSize(point.imageSize.w, point.imageSize.h);
        }
      }
      if (typeof point.shadowSize == 'object') {
        if (typeof point.shadowSize.w == 'number' && typeof point.shadowSize.h == 'number') {
          point.shadowGSize = new GSize(point.shadowSize.w, point.shadowSize.h);
        }
      }
      if (typeof point.imagePos == 'object') {
        if (typeof point.imagePos.x == 'number' && typeof point.imagePos.y == 'number') {
          point.imageGPoint = new GPoint(point.imagePos.x, point.imagePos.y);
        }
      }
      if (typeof point.infoPos == 'object') {
        if (typeof point.infoPos.x == 'number' && typeof point.infoPos.y == 'number') {
          point.infoGPoint = new GPoint(point.infoPos.x, point.infoPos.y);
        }
      }
      if (typeof point.hasCirc == 'boolean' && typeof point.circRadius == 'number') {
        if (point.hasCirc) {
          point.circGPolygon = this.createCirc(point);
        }
      } else {
        point.hasCirc = false;
      }
      point.GMarker = this.createMarker(point);
      p = point;
    }
    
    return p;
  }
  
  this.show = function () {    
    this.gmap = new GMap2(this.holder, {size: this.map_size});
    this.gmap.setCenter(this.bounds.getCenter(), this.gmap.getBoundsZoomLevel(this.bounds));
    for (var i = 0; i < this.points.length; i++) {
      this.gmap.addOverlay(this.points[i].GMarker);
      if (this.points[i].hasCirc) {
        if (this.points[i].circGPolygon instanceof GPolygon) {
          this.gmap.addOverlay(this.points[i].circGPolygon);
        }
      }
    }
    this.gdirections = new GDirections();
    GEvent.bind(this.gdirections, 'load', this, this.onRouteLoad);
  }
  
  this.onRouteLoad = function () {
    this.route = this.gdirections.getPolyline();
    this.gmap.addOverlay(this.route);
  }
  
  this.createMarker = function (point) {
    var marker = new GMarker(
      new GLatLng(point.lat, point.lng),
      {
        icon: new MyIcon(point.image, point.shadowImage, point.imageGSize, point.shadowGSize, point.imageGPoint, point.infoGPoint, point.transpImage),
        title: point.name,
        clickable: true,
        draggable: false
      }
    );
    
    GEvent.addListener(marker,"click",function(){
      this.openInfoWindowHtml(point.infoHTML);
    });
    
    return marker;
  }
  
  this.createCirc = function (point) {
    var circ;
    var x;
    var y;
    var c = point.circRadius * 1;
    var R = point.circRadius * 1000;
    var circPoints = new Array();
    var val = new Array();
    
    for (var i = 0; (R - (c * i)) >= -R; i++) {
      x = R - (c * i);
      y = Math.sqrt(Math.pow(R,2) - Math.pow(x,2));
      circPoints[circPoints.length] = new GLatLng(
          point.lat + (y * 0.00000898315285),
          point.lng + (x * 0.0000099440000)
        );
      val[val.length] = {x: x, y: y};
    }
    for (var i = val.length - 2; i >= 0; i--) {
      circPoints[circPoints.length] = new GLatLng(
          point.lat + (-val[i].y * 0.00000898315285),
          point.lng + (val[i].x * 0.0000099440000)
        );
    }
    circ = new GPolygon(circPoints, "#f33f00", 5, 1, "#ff0000", 0.2);
    circ.getBounds().getSouthWest().lat();
    this.setBounds(circ.getBounds().getSouthWest().lat(), circ.getBounds().getSouthWest().lng());
    this.setBounds(circ.getBounds().getNorthEast().lat(), circ.getBounds().getNorthEast().lng());
    return circ;
  }
  
  this.setRouteTo = function (pointName) {
    if (typeof pointName == 'string') {
      this.routeToPoint = this.getPointByName(pointName);
    }
  }
  
  this.setRouteFrom = function (pointName) {
    if (typeof pointName == 'string') {
      this.routeFromPoint = this.getPointByName(pointName);
    }
  }
  
  this.showRoute = function () {
    this.gdirections.load('from: ' + this.routeToPoint.lat + ',' + this.routeToPoint.lng + ' to: ' + this.routeFromPoint.lat + ',' + this.routeFromPoint.lng, {locale: 'pt_BR', getPolyline: true, getSteps: true, preserveViewport: true});
  }
  
  this.showCircAreaOf = function(pointName, radius) {
    if (this.circ != null) {
      this.removeCircArea();
    }
    if (typeof pointName == 'string' && typeof radius == 'number') {
      this.circPoint = this.getPointByName(pointName);
      this.circPoint.hasCirc = true;
      this.circPoint.circRadius = radius;
      this.circ = this.createCirc(this.circPoint);
      this.gmap.setCenter(this.bounds.getCenter(), this.gmap.getBoundsZoomLevel(this.bounds));
      this.gmap.addOverlay(this.circ);
    }
  }
  
  this.removeCircArea = function () {
    this.gmap.removeOverlay(this.circ);
    this.circ = null;
  }
  
  this.removeRoute = function () {
    this.gmap.removeOverlay(this.route);
    this.route = null;
  }
  
  this.getPointByName = function (name) {
    var r;
    for (var i = 0; i < this.points.length; i++) {
      if (this.points[i].name == name) {
        r = this.points[i];
        break;
      }
    }
    return r;
  }
  
  
  this.init();
}

function MyIcon (image, shadow, iconSize, shadowSize, iconAnchor, infoWindowAnchor, transparent) {
  var std_icon = new GIcon(G_DEFAULT_ICON);
  this.image = std_icon.image;
  this.shadow = std_icon.shadow;
  this.iconSize = std_icon.iconSize;
  this.shadowSize = std_icon.shadowSize;
  this.iconAnchor = std_icon.iconAnchor;
  this.infoWindowAnchor = std_icon.infoWindowAnchor;
  this.printImage = std_icon.printImage;
  this.mozPrintImage = std_icon.mozPrintImage;
  this.printShadow = std_icon.printShadow;
  this.transparent = std_icon.transparent;
  this.imageMap = std_icon.imageMap;
  this.maxHeight = std_icon.maxHeight;
  this.dragCrossImage = std_icon.dragCrossImage;
  this.dragCrossSize = std_icon.dragCrossSize;
  this.dragCrossAnchor = std_icon.dragCrossAnchor;
  
  this.init = function (image, shadow, iconSize, shadowSize, iconAnchor, infoWindowAnchor, transparent) {
    this.setImage(image);
    this.setShadow(shadow);
    this.setIconSize(iconSize);
    this.setShadowSize(shadowSize);
    this.setIconAnchor(iconAnchor);
    this.setInfoWindowAnchor(infoWindowAnchor);
    this.setTransparent(transparent);
  }
  
  this.setImage = function (image) {
    if (typeof image == 'string') {
      this.image = image;
    }
  }
  
  this.setShadow = function (shadow) {
    if (typeof shadow == 'string') {
      this.shadow = shadow;
    }
  }
  
  this.setIconSize = function (iconSize) {
    if (iconSize instanceof GSize) {
      this.iconSize = iconSize;
    }
  }
  
  this.setShadowSize = function (shadowSize) {
    if (shadowSize instanceof GSize) {
      this.shadowSize = shadowSize;
    }
  }
  
  this.setIconAnchor = function (iconAnchor) {
    if (iconAnchor instanceof GPoint) {
      this.iconAnchor = iconAnchor;
    }
  }
  
  this.setInfoWindowAnchor  = function (infoWindowAnchor) {
    if (infoWindowAnchor instanceof GPoint) {
      this.infoWindowAnchor = infoWindowAnchor;
    }
  }
  
  this.setTransparent = function (transparent) {
    if (typeof transparent == 'string') {
      this.transparent = transparent;
    }
  }
  
  this.init(image, shadow, iconSize, shadowSize, iconAnchor, infoWindowAnchor, transparent);
}

/*
pontos = [
  {
    name: 'ponto1',
    lat: -25.442884,
    lng: -49.272858,
    image: 'http://webdesign/images/mm_20.png',
    infoHTML: '<div>Olá</div>',
    shadowImage: '',
    transpImage: '',
    imageSize: {w: 0, h: 0},
    shadowSize: {w: 0, h: 0},
    imagePos: {x: 0, y: 0},
    infoPos: {x: 0, y: 0},
    hasCirc: false,
    circRadius: 1,
  }
];
mapa = new MyGmaps($('#gmaps_mapa').get(0), pontos, 739, 525);
mapa.show();
mapa.showCircAreaOf('ponto1', 1);

mapa.setRouteTo('ponto1');
mapa.setRouteFrom('ponto2');
mapa.showRoute();
*/