var getData = {

	init: function (conf) {
		// Check FirePHP Console for output
		this.content = conf.content;
		this.template = conf.template;

		this.fetchData();
		this.setTemplate();
	},

	fetchData: function () {
		// body...
		return $.ajax({
			url: '_php/php_image_gallary.php',
			type: 'POST',
			dataType: 'json',
			data: {"folder_name": "../_img/atlanta"}
		}).promise();


		// .done(function (data) {
		// 	console.log(data);
		// }).fail(function (data) {
		// 	console.log('failed to get json');
		// });
		
		
	},

	setTemplate: function () {		

		var self = this;
		// console.log(this);
		this.fetchData().then(function (response) {
			console.log(response);
			console.log(self.template);
			// console.log(self.content);
			var temp = Handlebars.compile(self.template);
			var display = temp(response);
			console.log(display);
			self.content.append(display);
		});
	}
}