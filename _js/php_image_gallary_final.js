var GetData = {

	init: function (conf) {
		this.content = conf.content;
		this.template = conf.template;
		this.picBox = conf.picBox;
		this.theFirst = conf.theFirst;
		this.theSelect = conf.theSelect;

		this.bindEvents();
		this.setTemplate();
	},

	bindEvents: function () {
		this.content.on('click', 'li', this.displayBig );
		this.theSelect.on('change', this.setTemplate);
	},

	displayBig: function (event) {
		var self = GetData;
		event.preventDefault();
		var url = $(this).children('a').attr('href');
			self.picBox.html("<img src='"+url+"'>");
			self.picBox.children('img').hide();
			self.picBox.children('img').slideDown(1000);

	},

	fetchData: function (folder) {

		return $.ajax({
			url: 'snippets/_php/php_image_gallary_final.php',
			type: 'POST',
			dataType: 'json',
			data: {"folder_name": folder}
		}).promise();

	},

	setTemplate: function () {		

		var self = GetData;
		var select = self.theSelect.val();
		console.log("From setTemplate" + select);

		self.fetchData(select).then(function (response) {
			var temp = Handlebars.compile(self.template);
			var display = temp(response);
			self.content.empty();
			self.content.append(display);
			self.picBox.html("<img src='"+response.img1.img_url+"'>");
			self.picBox.children('img').hide();
			self.picBox.children('img').fadeIn(2000);
	});

  }
}