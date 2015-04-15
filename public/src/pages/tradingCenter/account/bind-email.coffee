
Process = require "../../../common/process/process.coffee"
 
$(document).ready ()->
	console.log "hello"

	process = new Process({
		container: "#process",
		height: 6,
		width: 151,
		color: "#face00"
	}).show().active(1)