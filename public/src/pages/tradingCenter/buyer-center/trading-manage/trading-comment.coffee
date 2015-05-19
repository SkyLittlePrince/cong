Score = require './../../../../common/score/score.coffee'

score = new Score({
	selector: '.buyer-score'
	data: [
		{id: 'seller-score', starNumber: 6},
		{id: 'buyer-score', starNumber: 5}
	]
})
