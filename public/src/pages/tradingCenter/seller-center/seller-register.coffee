Checkbox = require('../../../common/checkbox/checkbox.coffee');

$(document).ready ()->

	checkbox = (new Checkbox({
	  selector: '.agree-wrapper'
	})).init();
