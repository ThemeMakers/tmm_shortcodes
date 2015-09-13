jQuery(document).ready(function() {
	jQuery(".toggle-container").hide(); //Hide (Collapse) the toggle containers on load
	jQuery(".box-toggle").on("click", ".trigger", function(e) {
		var self = jQuery(e.target);
		self.toggleClass("active").next().stop(true, true).slideToggle("slow");
		jQuery.fn.autoload();
		e.preventDefault();
	});
});