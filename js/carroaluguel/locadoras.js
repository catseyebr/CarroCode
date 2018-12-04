function replaceAll(str,from,to){
var idx=str.indexOf(from)
while(idx>-1){
str=str.replace(from,to)
idx=str.indexOf(from)}
return str}
function showHideMarkersByIcon(iconType,exby,targetMap){
for(var i=0;i<gshowHideMarkersByIcon.length;i++){
if(gshowHideMarkersByIcon[i].type==iconType){
if(exby.checked==0){
targetMap.removeOverlay(gshowHideMarkersByIcon[i])
}else{
targetMap.addOverlay(gshowHideMarkersByIcon[i])}}}}
function getMarkerById(airportId){
for(var i=0;i<gshowHideMarkersByIcon.length;i++){
if(gshowHideMarkersByIcon[i].id==airportId){
return gshowHideMarkersByIcon[i]}}
return null}
function centerHtmlMarker(airportId,targetMap){
myMarker=getMarkerById(airportId)
if(null !=myMarker){
targetMap.panTo(myMarker.getPoint())
GEvent.trigger(myMarker,"click")}}
function getIconFromStringId(iconType){
if(iconType=="default" || iconType=="thisAirport"){
var icon=new GIcon(G_DEFAULT_ICON)
return icon
}else if(iconType.substring(0,3)=='pal'){
splitValues=iconType.split("-")
var icon=new GIcon(basePalIcon,
"http://maps.google.com/mapfiles/kml/"+splitValues[0]+"/icon"+splitValues[1]+".png",
null,
"http://maps.google.com/mapfiles/kml/"+splitValues[0]+"/icon"+splitValues[1]+"s.png")
return icon
}else{
var icon=new GIcon(baseMiniIcon)
icon.image="http://www.carroaluguel.com/maps/icons/mm_20_"+iconType+".png"
return icon}}
function createIconFromStringId(iconType){
var CheckedIconType
if((typeof(iconType)=="undefined")||(iconType=="undefined")||(iconType==null)){
CheckedIconType="default"
}else{
CheckedIconType=iconType}
if(!icons[iconType]){
var icon=getIconFromStringId(CheckedIconType)
icons[iconType]=icon}
return icons[iconType]}
function createMarker(theMap,point,html,codeAirport,nameAirport,canDrag,iconStr){
var icon=createIconFromStringId(iconStr)
var marker=new GMarker(point,{icon: icon,draggable: canDrag,title: nameAirport})
marker.type=iconStr
marker.id=codeAirport
GEvent.addListener(marker,"click",function(){
marker.openInfoWindowHtml(html,{suppressMapPan:false})
})
GEvent.addListener(marker,"dragstart",function(){
theMap.closeInfoWindow()
})
GEvent.addListener(marker,"dragend",function(){
var centreLat=marker.getPoint().lat()
var centreLong=marker.getPoint().lng()
var fillinCode=document.getElementById("airport-code")
fillinCode.value=codeAirport
var fillinLat=document.getElementById("LatitudeDecimal")
fillinLat.value=centreLat
var fillinLot=document.getElementById("LongitudeDecimal")
fillinLot.value=centreLong
})
gshowHideMarkersByIcon.push(marker)
htmls[markerCounter]=html
markerCounter++
return marker}
function CreateMap(theMap,AirpDB,boundDB,routeDB,side_bar_html,side_bar,maxZoom){
if(GBrowserIsCompatible()){
GEvent.addListener(theMap, 'click', function(overlay,point){theMap.enableScrollWheelZoom()}); 
GEvent.addListener(theMap, 'mouseout', function(){theMap.disableScrollWheelZoom()}); 
theMap.enableDoubleClickZoom()
theMap.enableContinuousZoom()
var bounds=new GLatLngBounds
if(boundDB.length>0){
for(var i=0;i<boundDB.length;i++){
bounds.extend(boundDB[i])}
delete boundDB}
else{
for(var i=0;i<AirpDB.length;i++){
bounds.extend(new GLatLng(AirpDB[i].getLatitude,AirpDB[i].getLongitude))}
for(var i=0;i<routeDB.length;i++){
bounds.extend(routeDB[i].getFromAir)
bounds.extend(routeDB[i].getToAir)}}
theMap.addControl(new GLargeMapControl())
theMap.addControl(new GMapTypeControl())
var zoom
if(maxZoom>0)
{zoom=Math.min(maxZoom,theMap.getBoundsZoomLevel(bounds));}
else
{zoom=theMap.getBoundsZoomLevel(bounds)+maxZoom;}
theMap.setCenter(bounds.getCenter(),zoom)
theMap.addControl(new GScaleControl())
for(var i=0;i<AirpDB.length;i++){
var name=AirpDB[i].getName
var link=AirpDB[i].getLink
var marker=createMarker(theMap
,new GLatLng(AirpDB[i].getLatitude,
AirpDB[i].getLongitude,
AirpDB[i].getIsDraggable),
AirpDB[i].getMapPopUp,
AirpDB[i].getCode,
AirpDB[i].getName,
AirpDB[i].getIsDraggable,
AirpDB[i].getIcon
)
theMap.addOverlay(marker)}
if(side_bar_html !=''){
document.getElementById(side_bar).innerHTML=side_bar_html}
for(var i=0;i<routeDB.length;i=i+1){
theMap.addOverlay(new GPolyline(new Array(routeDB[i].getFromAir,routeDB[i].getToAir),
routeDB[i].getColor,
routeDB[i].getWeight,
routeDB[i].getOpacity))}}}
function Locadora(theCode,theName,theLink,mapPopUp,Latitude,longitude,isDraggable,iconNumber){
this.getCode=theCode
this.getName=theName
this.getLink=theLink
this.getMapPopUp=mapPopUp
this.getLatitude=Latitude
this.getLongitude=longitude
this.getIsDraggable=isDraggable
this.getIcon=iconNumber}
function Route(fromAirport,toAirport,theColor,theWeight,theOpacity){
this.getFromAir=fromAirport
this.getToAir=toAirport
this.getColor=theColor
this.getWeight=theWeight
this.getOpacity=theOpacity}
var gshowHideMarkersByIcon=[]
var htmls=[]
var icons=[]
var markerCounter=0
var baseMiniIcon=new GIcon()
baseMiniIcon.image="http://www.carroaluguel.com/maps/icons/mm_20_red.png"
baseMiniIcon.shadow="http://www.carroaluguel.com/maps/icons/mm_20_shadow.png"
baseMiniIcon.iconSize=new GSize(12,20)
baseMiniIcon.shadowSize=new GSize(22,20)
baseMiniIcon.iconAnchor=new GPoint(6,20)
baseMiniIcon.infoWindowAnchor=new GPoint(5,1)
baseMiniIcon.transparent="mapIcons/mm_20_transparent.png"
var basePalIcon=new GIcon()
basePalIcon.iconSize=new GSize(32,32)
basePalIcon.shadowSize=new GSize(56,32)
basePalIcon.iconAnchor=new GPoint(16,32)
basePalIcon.infoWindowAnchor=new GPoint(16,0)
