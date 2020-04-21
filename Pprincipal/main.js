function autoRefresh_presentacion() {
	$.ajax({
		url: "select_presentacion.php",
		success: function (result) {
			jugador_presentacion = JSON.parse(result);
			$("#imagen_jugador").attr("src", jugador_presentacion.foto);
			$("#nombre_apellido").html(jugador_presentacion.nombre + " " + jugador_presentacion.apellido);
			$("#altura").html(jugador_presentacion.altura);
			$("#peso").html(jugador_presentacion.peso + "lbs");
			$("#firma").html(jugador_presentacion.firma);
		}
	});
}

function autoRefresh_visitante() {
	$.ajax({
		url: "select_lateral.php?tabla=lineup_v",
		success: function (result) {
			$("#contrario").html(result);
		}
	});
}

function autoRefresh_casa() {
	$.ajax({
		url: "select_lateral.php?tabla=lineup",
		success: function (result) {
			$("#casa").html(result);
		}
	});
}

function autoRefresh_actuacion() {
	$.ajax({
		url: "../playbyplay/select.php",
		success: function (result) {
			$("#actuacion").html(result);
		}
	});
}

function autoRefresh_centro() {
	$.ajax({
		url: "select_centro.php",
		success: function (result) {
			jugador = JSON.parse(result);
			$("#foto_centro").attr("src", jugador.centro.foto);
			$("#nombre_centro").html(jugador.centro.numero + " " + jugador.centro.nombre + " " + jugador.centro.apellido + " " + jugador.centro.lineup_posicion);
			$("#VB_centro").html(jugador.centro.VB);
			$("#C_centro").html(jugador.centro.C);
			$("#CI_centro").html(jugador.centro.CI);
			$("#BB_centro").html(jugador.centro.BB);
			$("#HR_centro").html(jugador.centro.HR);

			$("#bolas_contador").html(jugador.contador.Balls);
			$("#strikes_contador").html(jugador.contador.Strikes);
			$("#outs_contador").html(jugador.contador.Outs);

			$("#estilo").html(jugador.estilo);

			$("#logo_equipo_casa").attr("src", jugador.img_casa);
			$("#logo_equipo_visita").attr("src", jugador.img_visita);
		}
	});
}

setInterval(
	function () {
		autoRefresh_actuacion();
		autoRefresh_casa();
		autoRefresh_visitante();
		autoRefresh_centro();
		autoRefresh_presentacion();
	}, 1000); // every 5 seconds

