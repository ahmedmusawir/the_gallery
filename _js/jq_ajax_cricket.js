var getData = {

	init: function (conf) {
		// body...
		// console.log(conf.content);
		// console.log(conf.template);
		// this.url = conf.url;
		this.url = '_php/jq_ajax_cricket.php';
		this.content = conf.content;
		this.template = conf.template;
		this.fetchData();
		this.setTemplate();
	},

	fetchData: function () {
		// body...
		return $.ajax({
			url: this.url,
			type: 'GET',
			dataType: 'json',
		}).promise();
	
	},

	setTemplate: function () {		
		


		// body...
		// var self = this;
		// console.log(this);
		this.fetchData().then(function (response) {
			console.log(response);
			// console.log(self.template);
			// console.log(self.content);
			// var temp = Handlebars.compile(self.template);
			// var display = temp(response);
			// console.log(display);
			// self.content.append(display);
		
		});

	}
}