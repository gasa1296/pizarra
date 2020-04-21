function select_jugadores() {
	equipo = document.getElementById("equipo")
	equipo = equipo.options[equipo.selectedIndex].value;
	let xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("jugadores").innerHTML=this.responseText;
		}
	};
	xmlhttp.open("GET", "select.php" + "?ie=" + equipo, false);
	xmlhttp.send();
}
