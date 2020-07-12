$(document).ready(function(){

        //Category image
    $('#logo').on('change',function(){
        // Check file api supported browser
        if(window.File && window.FileReader && window.FileList && window.Blob){
            // Clear html of output element
            $('#logo-output').html('');

            // This file data
        var  data = $(this)[0].files;

            // Loop through each file
            $.each(data, function (index, file){
                // Check supported types
                if(/(\.|\/)(gif|jpe?g|png|jpg|bmp|svg)$/i.test(file.type)){
                    // Create new file reader
                    var fRead =  new FileReader();
                    // Trigger function on successful read
                    fRead.onload = (function(file){
                        return function(e){
                        // Create image element
                        var img = $('<img/>').addClass('thumb').attr('src',e.target.result);
                        // Append image to output element
                        $('#logo-output').append(img);

                        };
                    })(file);
                    // URL representing the files`s data
                    fRead.readAsDataURL(file);
                }
            });
        } else {
            // If file API absent
            alert('Your browser does not support File API')
        }
    });

        //Category image
    $('#icon').on('change',function(){
        // Check file api supported browser
        if(window.File && window.FileReader && window.FileList && window.Blob){
            // Clear html of output element
            $('#icon-output').html('');

            // This file data
        var  data = $(this)[0].files;

            // Loop through each file
            $.each(data, function (index, file){
                // Check supported types
                if(/(\.|\/)(gif|jpe?g|png|jpg|bmp|svg)$/i.test(file.type)){
                    // Create new file reader
                    var fRead =  new FileReader();
                    // Trigger function on successful read
                    fRead.onload = (function(file){
                        return function(e){
                        // Create image element
                        var img = $('<img/>').addClass('thumb').attr('src',e.target.result);
                        // Append image to output element
                        $('#icon-output').append(img);

                        };
                    })(file);
                    // URL representing the files`s data
                    fRead.readAsDataURL(file);
                }
            });
        } else {
            // If file API absent
            alert('Your browser does not support File API')
        }
    });



});


// Session flash message time
setTimeout(function() {
    $('.alert').fadeOut();
}, 3000);
