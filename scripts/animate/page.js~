$(function() {
	var pincha = false;

	// run the currently selected effect
	function runEffect() {
		// get effect type from
		var selectedEffect = "blind";
 
		// most effect types need no options passed by default
		var options = {};
		// some effects have required parameters
		if ( selectedEffect === "scale" ) {
			options = { percent: 100 };
		} else if ( selectedEffect === "size" ) {
			options = { to: { width: 280, height: 185 } };
		}

		// run the effect
		$( "#user_menu" ).show( selectedEffect, options, 500, callback );
	};

	//callback function to bring a hidden box back
	function callback() {
		/*setTimeout(function() {
			$( "#user_menu:visible" ).removeAttr( "style" ).fadeOut();
		}, 1000 );*/
	};

	// set effect from select menu value
	$( "#login" ).click(function() {
		//$( "#user_menu" ).stopPropagation();
		if (!pincha)
			runEffect();
		else 
			$( "#user_menu" ).hide();
		pincha = !pincha;
		return false;
	});
});
