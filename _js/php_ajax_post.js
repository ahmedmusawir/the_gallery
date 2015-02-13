var getData = {

	init: function (conf) {
		// Check FirePHP Console for output
		this.fetchData();
		this.setTemplate();
	},

	fetchData: function () {
		// body...
		return $.ajax({
			url: '_php/jq_post.php',
			type: 'POST',
			dataType: 'json',
			data: {param1: 'value1', param2: 'value2'},
		}).promise();
		
		
	},

	setTemplate: function () {		
		// body...
		this.fetchData().then(function (data) {
			console.log(data);
		});
	}
}