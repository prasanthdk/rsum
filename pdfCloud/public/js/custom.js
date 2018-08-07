
$(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
});
// alert(0);

function readURL(input) {
      if (input.files && input.files[0]) {

        var reader = new FileReader();

        reader.onload = function(e) {
          $('.image-upload-wrap').hide();

          $('.file-upload-image').attr('src', e.target.result);
          $('.file-upload-content').show();

          $('.file-upload').hide();
          $('.drive_upload').hide();
          $('.loader').show();

          $('.image-title').html(input.files[0].name);
        };
        reader.readAsDataURL(input.files[0]);

      } else {
        removeUpload();
      }
    }

    $('.image-upload-wrap').bind('dragover', function () {
            $('.image-upload-wrap').addClass('image-dropping');
        });
        $('.image-upload-wrap').bind('dragleave', function () {
            $('.image-upload-wrap').removeClass('image-dropping');
    });
/********File upload********/
$(document).ready(function() {

    /****** Open modal*******/
    $("#myBtn").click(function(){
        var file_id = localStorage.getItem('file_id');
        if(file_id){
            $('#myModal').modal({
                show: 'false'
            });
            window.location.href = APP_URL + "/" + file_id + '/edit';
        }else {

        }
        localStorage.setItem('file_id', "");
    });

    //--------------------------------------home bottom buttons
   $(".pdf_home_actions").on('click',function(e){

    var action = $(this).attr("data-action");

    var convert_into =$(this).attr("data-action-type");

    if(convert_into != '')
    {
        $("#pdf_cloud_Cto").val(convert_into);
    }

    $("#pdf_cloud_action").val(action);
   });
   //---------------------------------------------------------
    /*******File upload*****/
    $('#uploadForm').on('change', function () {

        var progress_bar_id = '#progress-wrp';
        var form = $('#uploadForm')[0];
        var formData = new FormData(form);

        $.ajax({
            url: APP_URL + '/store',
            type: "POST",
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            xhr: function () {
                //upload Progress
                var xhr = $.ajaxSettings.xhr();
                if (xhr.upload) {
                    xhr.upload.addEventListener('progress', function (event) {
                        var percent = 0;
                        var position = event.loaded || event.position;
                        var total = event.total;
                        if (event.lengthComputable) {
                            percent = Math.ceil(position / total * 100);
                        }
                        //update progressbar
                        $('.form-wrap').show();
                        $(progress_bar_id + " .progress-bar").css("width", +percent + "%");
                        $(progress_bar_id + " .status").text(percent + "%");
                    }, true);
                }
                return xhr;
            },
            mimeType: "multipart/form-data"
        }).done(function (res) {
            var data = JSON.parse(res);

            // if (data.message === 'Success') {
            //     localStorage.setItem('file_id', data.file_id);
            //     window.location.href = APP_URL + "/" + data.file_id + '/edit';
            // }
            if (data.status){
                if(data.action == 'edit') {

                    localStorage.setItem('file_id', data.file_id);
                    window.location.href = APP_URL + "/" + data.file_id + '/edit';

                }else if (!data.auth && data.action != 'edit') 
                {
                    swal({
                    title: "Success",
                    text: "Please login/signup to get your file.",
                    type: "success",
                    }).then(function() {
                       window.location.href = APP_URL + "/login";
                    });
                   
                }else if(data.auth){
                    window.location.href = APP_URL + "/png_to_pdf";
                }
            }else
            {
                swal({
                    title: "Oops!",
                    text: data.message,
                    type: "error",
                });
            }
            
        });
    });

    $('.save_image').on('click', function () {
        var options = {
        };
        var pdf = new jsPDF('p', 'pt', 'a4');
        pdf.addHTML($("#wPaint"), 15, 15, options, function() {
            pdf.save('pageContent.pdf');
        });
    });


    //-----------------------------------------registration

    $("#registerForm").submit(function(event){

        event.preventDefault();

        $.ajax({

                        type: 'POST',
                        url: APP_URL+'/register',
                        data: $(this).serialize(),
                        dataType: 'json',
                        success: function(data){
                            
                            if(data.status) {
                                swal({
                                  title: "Success!",
                                  text: data.message,
                                  icon: "success",
                                });
                            }else{

                                
                                    swal({
                                      title: "Oops!",
                                      text: data.message,
                                      icon: "error",
                                    });
                                
                            }

                        },
                        error: function(data){

                        }
                    });

    });

    //-----------------------------------------login

    $("#loginForm").submit(function(event){

        event.preventDefault();

        $.ajax({

                        type: 'POST',
                        url: APP_URL+'/login',
                        data: $(this).serialize(),
                        dataType: 'json',
                        success: function(data){
                            
                            if(data.status) {
                                
                                window.location.href = data.redirect_to;

                            }else{

                                
                                    swal({
                                      title: "Oops!",
                                      text: data.message,
                                      icon: "error",
                                    });
                                
                                
                            }

                        },
                        error: function(data){
                            alert('filed missing');
                        }
                    });

    });
    //------------------------------------------
});//mail doc end

