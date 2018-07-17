
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
jQuery(document).ready(function( $ ) {



    /*selected template and load template*/
    $resume = localStorage.getItem('_Rname');
    $.ajax({
        type:'POST',
        url: APP_URL+'/resume/'+$resume,
        success:function(data){
            $("._RESUME").html(data);

            $('.fname').html(localStorage.getItem('fname'));
            $('.lname').html(localStorage.getItem('lname'));
            $('.saddress').html(localStorage.getItem('saddress'));
            $('.city').html(localStorage.getItem('city'));
            $('.state').html(localStorage.getItem('state'));
            $('.zcode').html(localStorage.getItem('zcode'));
            $('.phone').html(localStorage.getItem('phone'));
            $('.email').html(localStorage.getItem('email'));

        }
    });

    /*Get and set recent stored */
    $( "input[name='fname']" ).val(localStorage.getItem('fname'));
    $( "input[name='lname']" ).val(localStorage.getItem('lname'));
    $( "input[name='saddress']" ).val(localStorage.getItem('saddress'));
    $( "input[name='city']" ).val(localStorage.getItem('city'));
    $( "input[name='state']" ).val(localStorage.getItem('state'));
    $( "input[name='zcode']" ).val(localStorage.getItem('zcode'));
    $( "input[name='phone']" ).val(localStorage.getItem('phone'));
    $( "input[name='email']" ).val(localStorage.getItem('email'));

    /*Type and store values*/
    $( "input[name='fname']" ).on('keyup',function(){
        $value = $(this).val();
        localStorage.setItem('fname', $value);
        $('.fname').html($value);
    });
    $( "input[name='lname']" ).on('keyup',function(){
        $value = $(this).val();
        localStorage.setItem('lname', $value);
        $('.lname').html($value);
    });
    $( "input[name='saddress']" ).on('keyup',function(){
        $value = $(this).val();
        localStorage.setItem('saddress', $value);
        $('.saddress').html($value);
    });
    $( "input[name='city']" ).on('keyup',function(){
        $value = $(this).val();
        localStorage.setItem('city', $value);
        $('.city').html($value);
    });
    $( "input[name='state']" ).on('keyup',function(){
        $value = $(this).val();
        localStorage.setItem('state', $value);
        $('.state').html($value);
    });
    $( "input[name='zcode']" ).on('keyup',function(){
        $value = $(this).val();
        localStorage.setItem('zcode', $value);
        $('.zcode').html($value);
    });
    $( "input[name='phone']" ).on('keyup',function(){
        $value = $(this).val();
        localStorage.setItem('phone', $value);
        $('.phone').html($value);
    });
    $( "input[name='email']" ).on('keyup',function(){
        $value = $(this).val();
        localStorage.setItem('email', $value);
        $('.email').html($value);
    });
});
