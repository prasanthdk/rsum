
$(function() {
    $.ajaxSetup({
        headers: {
            'X-XSRF-Token': $('meta[name="_token"]').attr('content')
        }
    });
});

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
                        $(progress_bar_id + " .progress-bar").css("width", +percent + "%");
                        $(progress_bar_id + " .status").text(percent + "%");
                    }, true);
                }
                return xhr;
            },
            mimeType: "multipart/form-data"
        }).done(function (res) {
            var data = JSON.parse(res);

            if(data.message =='Success'){
                window.location.href=APP_URL+"/edit/";
            }
            /*$(my_form_id)[0].reset(); //reset form
            $(result_output).html(res); //output response from server
            submit_btn.val("Upload").prop("disabled", false); //enable submit button once ajax is done*/
        });
    });
});

