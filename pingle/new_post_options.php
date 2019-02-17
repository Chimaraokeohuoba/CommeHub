<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./pingle/pingle_css.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="./pingle/js/image_upload.js"></script>
    <meta charset="utf-8">
    <title>New Post</title>
  </head>
  <body style="background-color:white !important;">
    <nav class="navbar navbar-default navbar-fixed-top full_opacity">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <a class="navbar-brand head" id = "brand" href="landing_page.html">CommeHub</a>
        </div>

          <ul class="nav navbar-nav navbar-right" id="search">
            <li><div id="big_search "class="input-group" style="width:40vw;margin-top:10px;">
              <input type="text" class="form-control" placeholder="Search for anything...">
              <span class="input-group-btn">
                <button class="btn btn-success" type="button" style="padding:8px;"><img src=" project_images\search-magnifier-interface-symbol (1).png" alt=""></button>
              </span>
            </div>

            <!-- <div id="small_search" style="border-bottom:none;">
              <img role="button" src=" project_images\search-magnifier-interface-symbol.png" alt="">
            </div> -->
          </li>
            <li><a href="flash_deals.html">Flash Deals</a></li>
            <li><a href="Active_votes.html">Active Votes</a></li>
            <li><a href="#" id="notif_no_border_bottom"><img src="project_images\notifications-button (1).png" alt=""></a></li>
            <li class="dropdown">
              <a href="#" id="no_border_bottom" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img src="project_images\1021873-dark-angel-wallpapers-1920x1080-ios.jpg" alt="avatar" class="avatar"></a>
              <ul class="dropdown-menu">
                <li><a id="profile" href="profile.html">Profile</a></li>
                <li><a id="profile" href="#">Saved</a></li>
                <li><a id="profile" href="#">Transactions</a></li>
                <li role="separator" class="divider"></li>
                <li><a id="profile" href="#">Settings</a></li>
                <li><a id="profile" href="help_center.html">Help Center</a></li>
                <li><a id="profile" href="#">Careers</a></li>
                <li role="separator" class="divider"></li>
                <li><a id="profile" href="#">Logout</a></li>
              </ul>
            </li>
          </ul>
      </div>
    </nav>

    <br>
    <br>
    <br>




    <div class="container">
      <div class="">
        <h2 class="page__heading">Create a new Post</h2>
        <div class="text-muted">Search before creating a cartegory as it may already be existing.</div>
        <hr>
      <div class="form-group">
        <form name="add_post" id="add_post" method="post" action="new_post" enctype="multipart/form-data">
        <div class="container">
          <ul class="nav nav-tabs">
          <li><a href="#">Post</a></li>
          <li class="active"><a href="#">Add Options</a></li>
          <li><a href="#">Submit</a></li>
          </ul>
          <br>
          
              
            <!-- <li class="form__row"> -->
            </div>
            </form>

            <!-- </li> -->
          <!-- </ul> -->
          <div>
              <div class="">
              <fieldset class="col-md-6">    	
					<legend><h4 class="text-muted">Option1</h4></legend>
					
          <label for="title">
              <h4 class="text-muted">Option title</h4>
              </label>
              <input type="text" name="title" id="title" class="form-control"  placeholder="option title here..." required>
              <br>
              <label for="title">
                <h4 class="text-muted">Post Description</h4>
              </label>
              <textarea name="description" id="description" class="form-control" placeholder="A little description of your post here, not more than 100 words...."></textarea>
              <br>
              <label for="ex1">
              <h4 class="text-muted">Choose an Image</h4>
              </label><div class="row">
              <div class="col-sm-4" id="post_image_url">
              <input class="form-control" id="ex1" type="text" placeholder="Paste Image url here">
              </div>
              <div class="col-sm-2" id="upload_post_image_box">
              <button type="button" class="btn btn-primary btn-md" id="upload_post_image_button">Or click here to Upload</button>
              </div>
              <div class="col-sm-3 hide" id="image_input_box">
              <input type="file" name="post-image" id="post-image" placeholder="Choose image here">
              </div>
              </div>
							<p></p>
					
					
				</fieldset>				
				
				<div class="clearfix"></div>
                  <div class="">
                    <button type="button" class="btn btn-default btn-lg">Add an option</button>
                  </div>
                </div>
              </div>
            </div>
            <hr>

          <div class="">
            <button type="button" class="btn btn-success disabled">Create</button>
            <span class="text-muted">You must add atleast 3 Options to continue</span>
          </div>

          </div>
      </div>

        </div>

        <br>
        <br>


          <footer>
            <div class="container">
              <div class="row" style="text-align:center;font-weight:bolder;color:white;padding:auto;">
                <div class="col-lg-4 col-md-4 col-sm-4">
                  <br>
                  <a href="about.html" style="color:white;text-decoration:none;"><h4 >Meet the team!</h4></a>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                  <br>
                  <a href="help_center.html" style="color:white;text-decoration:none;"><h4>Help center</h4></a>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                  <br>
                  <h4>we are hiring!</h4>
                </div>
              </div>
            </div>
            <hr>
            <div class="container">
              <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                  <img src="project_images/facebook-logo-in-circular-button-outlined-social-symbol.png" alt="">
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                  <img src="project_images/twitter-circular-button.png" alt="">
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                  <img src="project_images/instagram.png" alt="">
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                  <img src="project_images/social-linkedin-circular-button.png" alt="">
                </div>

              </div>
              <a href=".navbar" class="back-to-top"><img class="img-responsive" src="project_images/arrow-right-circle (3).png" alt=""></a>
            </div>
            <br>
          </footer>
          <footer
          id="all_rights_reserved"><h5>© 2018 CommeHub All rights reserved.</h5>
          </footer>

    <script>
      $(document).ready(function(){
        $("#post-category").change(function(){
          //alert("you have selected " + $(this).find("option:selected").val());
          $("#post-title").append(
            '<label for="title"><h4 class="text-muted">What is the title of your post?</h4></label><input type="text" name="title" id="title" class="form-control"  placeholder="type here....." required><br>'+
            '<label for="title"><h4 class="text-muted">Post Description</h4></label><textarea name="description" id="description" class="form-control" placeholder="A little description of your post here, not more than 100 words...."></textarea><br>'+
            '');
        });
        
        $("#post-title").on("focusin", "#title", function(){
          //alert("focus lost");
          $("#post-title").on("focusout", "#title", function(){
          //a$("#post-description").
        });
        });

        
      });
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="http://code.jquery.com/jquery-3.1.1.js" integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA=" crossorigin="anonymous"></script>  <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <script src="transparent_to_solid_navbar.js"></script>
    <script src="animated_arrow.js"></script>
    <script src="back_to_top.js"></script>



  </body>
</html>