function select_jugador_presentacion() {
	$.ajax({
		url: "select_jugadores_presentacion.php",
		success: function (result) {
			$("#select_jugadores").html(result);
		}
	});
}

function update_jugador_presentacion(obj) {
	$.ajax({
		url: "update_jugador_presentacion.php?ij=" + obj.options[obj.selectedIndex].value,
		success: function (result) {
		}
	});
}

function select_estado() {
	$.ajax({
		url: "select_estado_presentacion.php",
		success: function (result) {
			$("#estado").html(result);
		}
	});
}

function update_estado(obj) {
	$.ajax({
		url: "update_estado_presentacion.php?estado=" + obj.getAttribute('id'),
		success: function (result) {
			$("#estado").html(result);
		}
	});
}

document.addEventListener("loadend", select_jugador_presentacion())
document.addEventListener("loadend", select_estado())