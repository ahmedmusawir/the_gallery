var getData = {

	init: function (conf) {
		// body...
		// console.log(conf.content);
		// console.log(conf.template);
		this.fetchData();
		this.setTemplate();
	},

	fetchData: function () {
		// body...
		return $.ajax({
			url: '_js/simple_data.json',
			type: 'GET',
			dataType: 'json',
		}).promise();
	
	},

	setTemplate: function () {		
		// body...
		this.fetchData().then(function (data) {
			console.log(data);
		});
	}
}