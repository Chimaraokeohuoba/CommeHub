<?php

require "../includes/datacontrol.php";

if(!isset($_SESSION['user'])){
  $_SESSION['requested-path'] = "../new_post";
  $_SESSION['login-prompt-msg'] = "Please Login first to continue!";
  header("Location:./login/login.php");
  exit();
}

if($_SERVER['REQUEST_METHOD']=='POST'){
 echo br.br.br.br.br.br.br.br.br.br.br;
  //var_dump($_POST["name"]);
  //var_dump($_FILES["post-image"]);
  $baseData = new database('thehub');
  $totalProducts = count($_POST["name"]);
  $post_id;
  $post_success = false;
  $error_message = null;
  if (isset($_POST["title"])){ 
    //check if the title of the post is set
    $hash = sha1($_SESSION['user']);
    $target_file = "target_file";
    $post_id = $baseData->insertPosts($_POST['title'], 0, $_SESSION['user'], $target_file, $_POST['category'], $_POST['pd'], $hash);
    $post_success = true;
    //echo "post added";
  }
  if ($post_success == true && $post_id != null){
    $product_success = false;
    //add products
    for ($x=0;$x<$totalProducts;$x++){
      //iterate through all posted products
      if (!empty($_FILES["post-image"]["name"][$x])){
        //exeute this condition if the user is uploading a product image from his/her device and not by adding an external image url
        $target_dir = "../uploads/";
        $target_file = $target_dir.rand(1000,999999).basename($_FILES["post-image"]["name"][$x]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        //Lets check if what the user uploaded is an actual image file or a fake image file
        $checkImageSize = getimagesize($_FILES['post-image']['tmp_name'][$x]);
        if($checkImageSize != false){
          // The file uploaded is a real image
          //echo "file is an image-".$checkImageSize['mime'];
          $uploadOk = 1;
        }else{
          //The file uploaded is not really an image
          $uploadOk = 0;
          $error_message = $error_message."Image for product $x+1 is not a real image and the product record was not added \n";
        }
  
        if(file_exists($target_file)){
          //The file uploaded is already existing!
         // echo "file is already existing";
          $uploadOk = 0;
          $error_message = $error_message."Image for product $x+1 already exists hence the product record was not added \n";
        }
  
        if($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'jpeg' && $imageFileType != 'gif'){
          //the file that the user uploaded doesn't have an accepted extension name
          //echo "<br>". $imageFileType. "<br>";
          $uploadOk = 0;
          $error_message = $error_message."Image file type for product $x+1 is not accepted hence the product record was not added \n";
        }
        if($uploadOk == 0){
          // there was an error uploading image
          $error_message = $error_message."Ther was an error uploading image for product $x+1 hence the product record was not added \n";
        }else{
          var_dump($_FILES['post-image']['tmp_name'][$x]);
          if(move_uploaded_file($_FILES['post-image']['tmp_name'][$x], $target_file)){
            //file has been uploaded
            $hash = sha1($_SESSION['user']);
            $baseData->insertItems($_POST['name'][$x], 0, $_POST['price'][$x], $target_file, $_SESSION['user'], $_POST['category'], $_POST['title'], $_POST['description'][$x], $post_id);
            $product_success = true;
            //product record added successfull for products with uploaded images
          }
        }
      }else if(isset($_POST['product_image_url'][$x])){
        $imageUrl = $_POST['product_image_url'][$x];
    
       #check if the image url is actually valid
       $jpg = strchr($imageUrl, ".jpg");
       $png = strchr($imageUrl, ".png");
       $jpeg = strchr($imageUrl, ".jpeg");
       $gif = strchr($imageUrl, ".gif");
       if(!empty($jpg) || !empty($jpeg) || !empty($png) || !empty($gif)){
         //if image url supplied is a valid image link
         //perform database operations and insert data into database
         $baseData->insertItems($_POST['name'][$x], 0,$_POST['price'][$x], $imageUrl, $_SESSION['user'], $_POST['category'], $_POST['title'], $_POST['description'][$x], $post_id);
         $product_success = true;
         //product record successfull added for products with external image urls
       }else{
         //image link is not valid;
         $error_message = $error_message . "Image Url added for product $x+1 is not valid thus the product recorded was not added \n";
       }
      }else{
        //echo "fuck!"; #don't just mind the naughty word, I was kinda frustrated debugging this part :))
        //also, dont mint this condition loop... 
      }
    }
    if ($product_success){
      header("Location: pingle/post-success.php");
    }
  }else{
    //there was an error creating post
    $error_message = "There was an error creating the Nomination, please try again";
  }
  
}



?>

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
        <form name="add_post" id="post_form" method="post" action="new_post" enctype="multipart/form-data">
        <div class="container">
          <ul class="nav nav-tabs">
          <li class="active"><a href="#">Post</a></li>
          <li><a href="#">Add Options</a></li>
          <li><a href="#">Submit</a></li>
          </ul>
          <br>
              <div class="form__field form__field_select_menu form__field--stacked form__field--required">
                <label for="post-category" class="form__label form__label--strong"><h4 class="text-muted">Which category would this post fall in?</h4></label>
                
                      <select class="form-control" id="post-category" name="category" label="Which category would this post fall in?" placeholder="Select a community">
                        <option value="">Select a category</option>
                        <option value="audiophile">Audiophile</option>
                        <option value="auto">Auto</option>
                        <option value="baking">Baking</option>
                        <option value="beauty">Beauty</option>
                        <option value="blades">Blades</option>
                        <option value="board games">Board Games</option>
                        <option value="cooking">Cooking</option>
                        <option value="diy tech">DIY Tech</option>
                        <option value="everyday carry">Everyday Carry</option>
                        <option value="flashlights">Flashlights</option>
                        <option value="hobby shop">Hobby Shop</option>
                        <option value="knitting">Knitting</option>
                        <option value="commehub made">CommeHub Made</option>
                        <option value="mechanical keyboards">Mechanical Keyboards</option>
                        <option value="men's accessories">Men's Accessories</option>
                        <option value="men's apparel">Men's Apparel</option>
                        <option value="outdoors">Outdoors</option>
                        <option value="pc gaming">PC Gaming</option>
                        <option value="photography">Photography</option>
                        <option value="quilting">Quilting</option>
                        <option value="tech">Tech</option>
                        <option value="trading card games">Trading Card Games</option>
                        <option value="ultralight">Ultralight</option>
                        <option value="watches">Watches</option>
                        <option value="writing">Writing</option>
                      </select>
                    
              </div>
            <!-- <li class="form__row"> -->
            <br>
            <div id="post">
            <label for="title">
              <h4 class="text-muted">What is the title of your post?</h4>
              </label>
              <input type="text" name="title" id="title" class="form-control"  placeholder="type here....." required>
              <br>
              <label for="title">
                <h4 class="text-muted">Post Description</h4>
              </label>
              <textarea name="pd" id="description" class="form-control" placeholder="A little description of your post here, not more than 100 words...."></textarea>
              <br>
              <div id="product_box">
              </div>
            </div><br>
            <button type="button" id="add_product" class="btn btn-success ">Add Product</button>
            
            <hr><hr>
            <div class="">
            <input type="submit" value="Create Nomination" id="submit_post" class="btn btn-success btn-lg disabled">
            <span id="submit-hint" class="text-muted"></span>
          </div>
            </div>
            </form>

            <!-- </li> -->
          <!-- </ul> -->
            <hr>

          </div>
      </div>

        </div>

        <br>
        <br>
        <!--submitted post ui-->
        <div class="modal-bg" id="modal-bg"></div>


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
    <script src="./pingle/js/new_product.js"></script>



  </body>
</html>
