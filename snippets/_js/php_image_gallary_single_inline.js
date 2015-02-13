var GetData = {

	init: function (conf) {
		// Check FirePHP Console for output
		this.content = conf.content;
		this.template = conf.template;
		this.picBox = conf.picBox;
		// console.log(this.picBox);

		this.bindEvents();
		this.fetchData();
		this.setTemplate();
	},

	bindEvents: function () {
		this.content.on('click', 'li', this.displayBig );
	},

	displayBig: function (event) {
		var self = GetData;
		event.preventDefault();
		// alert(self.picBox);
		// console.log(self.content.children('li a'));
		var url = $(this).children('a').attr('href');
      	// console.log("displayBig: " + url);
			self.picBox.html("<img src='"+url+"'>");
			// self.picBox.find('img').hide();
			// self.picBox.find('img').fadeIn(1000);
			// self.picBox.find('img').slideDown(1000);
			// self.picBox.hide();
			// self.picBox.slideDown(1000);
			self.picBox.find('img').animate(
			{
				'width': '600px',
				'height': '402px'
			},
				1000, function() {
				/* stuff to do after animation is complete */
			});
	},

	fetchData: function () {
		// body...
		return $.ajax({
			url: '_php/php_image_gallary_single.php',
			type: 'POST',
			dataType: 'json',
			data: {"folder_name": "../_img/the_new_pony"}
		}).promise();

	},

	setTemplate: function () {		

		var self = this;
		// console.log(this);
		this.fetchData().then(function (response) {
			// console.log(response);
			// console.log(self.template);
			// console.log(self.content);
			var temp = Handlebars.compile(self.template);
			var display = temp(response);
			// console.log(display);
			self.content.append(display);
			self.picBox.html("<img src='"+response.img1.img_url+"'>");
			// self.picBox.children('img').hide();
			// self.picBox.find('img').hide();
			// self.picBox.find('img').fadeIn(2000);
			// self.picBox.children('img').fadeIn(2000);

			// console.log(response.img1.img_url);
			self.picBox.find('img').animate(
			{
				'width': '600px',
				'height': '402px'
			},
				1000, function() {
				/* stuff to do after animation is complete */
			});

	});

  }
}