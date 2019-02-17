var TotalProducts = 0;
var canSubmit = false;
//var NewProductHtmlStr ='<fieldset class="col-md-6"><legend><h4 class="text-muted">Product '+TotalProducts+'</h4></legend><label for="title"><h4 class="text-muted">Product Name</h4></label><input type="text" name="title" id="title" class="form-control"  placeholder="option title here..." required><br><label for="title"><h4 class="text-muted">Product Description</h4></label><textarea name="description" id="description" class="form-control" placeholder="A little description of your post here, not more than 100 words...."></textarea><br><label for="ex1"><h4 class="text-muted">Choose an Image</h4></label><div class="row"><div class="col-sm-4" id="post_image_url"><input class="form-control" id="ex1" type="text" placeholder="Paste Image url here"></div><div class="col-sm-2" id="upload_post_image_box"><button type="button" class="btn btn-primary btn-md" id="upload_post_image_button">Or click here to Upload</button></div><div class="col-sm-3 hide" id="image_input_box"><input type="file" name="post-image" id="post-image" placeholder="Choose image here"></div></div><p></p></fieldset><div class="clearfix"></div>';
var productBox = $("#product_box");
var addProductBtn = $("#add_product");
var PostSubmitBtn = $("#submit_post");
var form = $("#post_form");
var submitHint = document.getElementById("submit-hint");

//console.log(productBox);
//console.log(addProductBtn);
$(document).ready(function(){
    submitHint.innerHTML = "You must add atleast 1 product to continue";
    addProductBtn.click(function(event){
        event.preventDefault();
        TotalProducts++;
        var NewProductHtmlStr ='<fieldset class="col-md-6"><legend><h4 class="text-muted">Product '+TotalProducts+'</h4></legend><label for="title"><h4 class="text-muted">Product Name</h4></label><input type="text" name="name[]" id="productname'+TotalProducts+'" class="form-control"  placeholder="Product name here..." required><br><label for="description"><h4 class="text-muted">Product Description</h4></label><textarea name="description[]" id="productdescription'+TotalProducts+'" class="form-control" placeholder="A little description of your product here, not more than 100 words...."></textarea><br><label for="description"><h4 class="text-muted">Product Price</h4></label><br><div class="input-group"><span class="input-group-addon">$</span><input id="msg" type="number" class="form-control" name="price[]" placeholder="0.00" style="width:30%"></div><br><label for="ex1"><h4 class="text-muted">Choose an Image</h4></label><div class="row"><div class="col-sm-4" id="post_image_url_box'+TotalProducts+'"><input class="form-control" name="product_image_url[]" id="product_image_url'+TotalProducts+'" type="text" placeholder="Paste Image url here"></div><div class="col-sm-2" id="upload_post_image_box"><button type="button" class="btn btn-primary btn-md" id="upload_post_image_button'+TotalProducts+'">Or click here to Upload</button></div><div class="col-sm-3 hide" id="image_input_box'+TotalProducts+'"><input type="file" name="post-image[]" id="post-image'+TotalProducts+'" placeholder="Choose image here"></div></div><p></p></fieldset><div class="clearfix"></div>';
        productBox.append(NewProductHtmlStr);
        productBox.append("<br>");
        console.log(TotalProducts);
        productBox.on('click','#upload_post_image_button'+TotalProducts, function(){
            $("#post_image_url_box"+TotalProducts).addClass("hide");
            $("#upload_post_image_button"+TotalProducts).addClass("hide")
            $("#image_input_box"+TotalProducts).removeClass("hide");
            $("#image_input_box"+TotalProducts).addClass("display");
            console.log("attempted to hide url box");
        });
        canSubmit = ((TotalProducts > 0) ? true : false); //make sure the total product is at least on, in order to enable the submit button
        if(canSubmit){
            PostSubmitBtn.removeClass('disabled'); //enable the submit button
            submitHint.innerHTML = "You have added " + TotalProducts + ((TotalProducts > 1) ? " products" : " product");
        }
    });
    
    productBox.on('click','#upload_post_image_button'+TotalProducts, function(){
        $("#post_image_url_box"+TotalProducts).addClass("hide");
        console.log("attempted to hide url box");
    })


    PostSubmitBtn.click(function(event){
        //event.preventDefault();
        if(canSubmit){
            console.log(form);
            console.log(new FormData(form));
        }
    })
    
})




