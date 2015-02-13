<pre class="prettyprint">
<xmp>
#################################
HANDLEBAR TEMPLATE ON INDEX PAGE
#################################
<div class="col-md-2 col-sm-2 col-lg-2">
  <ul class="content">

    <script type="text/x-handlebars-template" id="temp">
     {{#each this}} 
     <li class="thumbnail"><a href='{{img_url}}'><img class="img-responsive" src='{{img_url}}'></a></li>
     {{/each}} 
    </script>
  </ul>
</div>      

###########################
SCRIPT ON INDEX PAGE
###########################
<script src="_js/jquery-2.0.3.min.js"></script>
<script src="_js/handlebars-v1.1.2.js"></script>
<script src="_js/php_image_gallary_final.js"></script>
<script type="text/javascript">
(function () {

  GetData.init({
    content: $('.content'),
    template: $('#temp').html(),
    picBox: $('#picture_box'),
    theFirst: '_img/skydive',
    theSelect: $('#choice')
  });

})();

</script>

#####################################################
SCRIPT ON EXTERNAL PAGE [php_image_gallary_final.js]
#####################################################
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

####################################
PHP FOR AJAX [php_image_gallary.php]
####################################

$folder = $_POST["folder_name"];

$jsonData = '[';

$dir = $folder . '/';

$dir_handler = opendir($dir);

$i = 0;
while ($file = readdir($dir_handler)) {

  if (!is_dir($file) && strpos($file, '.jpg')) {
    $i++;
    $newDir = substr($dir , 3);
    // echo $newDir;
    $src = $newDir.$file;
    // echo $src;
    $jsonData .= '{"id":"'.$i.'"},{"img_url":"'.$src.'"},{"name":"'.$file.'"},';
  }
}
closedir($dir_handler);

$jsonData = chop($jsonData, ',');
$jsonData .= ']';

echo $jsonData;

</xmp>
</pre>