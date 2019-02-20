function sitechooser(form) {
	// var location = document.SiteChooser.site.value;
	
	var id = document.getElementById("Chooser").site.value;
	var route = document.getElementById("Chooser").route.value;
	var base = document.getElementsByTagName('base');

	if (id != '') {
		if (base && base[0] && base[0].href) {
			window.location.assign(base[0].href + route + id);
		} else {
			window.location.assign(route + id);			
		}

	}

}