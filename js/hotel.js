/** função a ser chamada no $(document).ready para hotel **/
function loadHotel (pontos) {
	mapa = new MyGmaps($('#gmaps_mapa').get(0), pontos, 739, 525);
	mapa.show();
	mapa.showCircAreaOf(pontos[0].name, 1);
}