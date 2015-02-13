<!DOCTYPE html>
<html lang="eng">
  <head>
    <?php include('common_head.php'); ?>
    <link rel="stylesheet" href="style.css"/>
    <style type="text/css">
      img {
        /*padding-right: 1.5em;*/
        /*padding-bottom: .5em;*/
      }
    </style>
  </head>

  <body>
    <section class="text-center">

        <?php //include('jq_top_nav.php'); ?>
        <?php include('jq_header.php'); ?>
    </section>

     <section class="container code_view">
                  <div class="row">

                    <button type="button" class="btn  btn-block btn-default" data-toggle="collapse" data-target="#run_code_1">View Code</button>

                    <article id="run_code_1" class="collapse">

                      <div class="thumbnail"> 

                      <?php include('code_view/cv1.php'); ?>

                      </div>
                    </article>

                  </div> <!-- row -->
      </section> <!-- content -->
      <hr>
      <!-- CONTAINER STARTS HERE -->
    <section class="container">
      <div class="row">
        <article class="col-md-12 choice_form">
          <form action="#" id="choice_form">
          
            <div class="form-group">
              <select type="text" class="form-control" id="choice" name="folder_name">
                <option value="../_img/the_new_pony">Choose an Image Folder ...</option>
                <option value="../_img/atlanta">Atlanta City</option>
                <option value="../_img/chicago">The City of Chicago</option>
                <option value="../_img/just_another_day">An Ordinary Day</option>
                <option value="../_img/photoshop">Thanx to Photoshop</option>
                <option value="../_img/the_new_pony">The New Pony</option>
                <option value="../_img/tennessee">Smokey Mountains</option>
                <option value="../_img/skydive">The Sky Dive</option>
              </select>
            </div>
          
          </form>
        </article>
      </div>
      <div class="col-md-2 col-sm-2 col-lg-2 thumbnail-bar">
        <ul class="content">

          <script type="text/x-handlebars-template" id="temp">
           {{#each this}} 
           <li class="thumbnail"><a href='{{img_url}}'><img class="img-responsive" src='{{img_url}}'></a></li>
           {{/each}} 
          </script>
        </ul>
      </div>      

      <div class="col-md-10 col-sm-10 col-lg-9 hidden-xs picture_box text-center" id="picture_box"></div>
        
    </section>
    <!-- CONTAINER ENDS HERE -->
    <script src="_js/jquery-2.0.3.min.js"></script>
    <script src="_js/handlebars-v1.1.2.js"></script>
    <script src="_js/php_image_gallary_final.js"></script>
    <script type="text/javascript">
    (function () {

      GetData.init({
        content: $('.content'),
        template: $('#temp').html(),
        picBox: $('#picture_box'),
        theFirst: '_img/the_new_pony',
        theSelect: $('#choice')
      });

    })();

    </script>

        
    </section> <!-- END MAIN container -->

    <hr>
    <section class="row">
    <?php include('jq_footer.php'); ?>
    </section>

  </body>
</html>
