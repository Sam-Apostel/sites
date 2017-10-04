function navSelect(id){
	navitems = document.getElementsByTagName("nav")[0].getElementsByTagName("ul")[0].childNodes;
	for(i = 0; i < navitems.length; i++){
	navitems[i].className = "";
	}
	document.getElementById(id).classname = "selected";
	
	sections = getElementsByClassName("sectionPane");
	for(i = 0; i<sections.length();i++){
		sections[i].className = "sectionPane";
	}
	document.getElementById(id.split("NavItem")[1].toLower()).className = "sectionPane selected";
	
}