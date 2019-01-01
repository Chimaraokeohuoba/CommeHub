var supportAdvancedUpload = function(){
    //check if the browser supports drag and drop upload 
    var div = document.createElement('div');
    return (('draggable' in div) || ('ondragstart' in div && 'ondrop' in div)) && 'FormData' in window && 'FileReader' in window;
}
$(document).ready(function(){

    if(supportAdvancedUpload){

    }
    
    $("#upload_post_image_button").click(function(){
        $("#image_input_box").removeClass("hide"); //select the
        $("#image_input_box").addClass("display");
        $("#post_image_url").addClass("hide");
        $("#upload_post_image_box").addClass("hide");
      });


    
});
