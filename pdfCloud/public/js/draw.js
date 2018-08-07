
$(function() {
    $.ajaxSetup({
        headers: {
            'X-XSRF-Token': $('meta[name="_token"]').attr('content')
        }
    });
});

$(document).ready(function(){

    var file_id = localStorage.getItem('file_id');
    var canvas, ctx, flag = false,
        prevX = 0,
        currX = 0,
        prevY = 0,
        currY = 0,
        dot_flag = false;
    var	mouseClicked = false;
    var fillStyle = "black";
    var globalCompositeOperation = "source-over";
    var lineWidth = 2;

    var page_id ="";
    var cPushArray = new Array();
    var cStep = -1;

    $.ajax({
        url: APP_URL+'/pageArray',
        type: 'post',
        data: {'file_id': file_id},
        success: function( data, textStatus, jQxhr ){

            for(var i=0; i<data.length; i++ ){
                var c = document.getElementById("can_"+data[i]['id']);
                context = c.getContext("2d");
                var image = new Image();
                image.src = APP_URL+'/uploads/convert_file/'+data[i]['convert_file_name'];
                context.drawImage(image, 0, 0);
            }
        },
        error: function( jqXhr, textStatus, errorThrown ){
            console.log( errorThrown );
        }
    });
    page_id = $("canvas:first").attr('id');
    canvas = document.getElementById(page_id);
    ctx = canvas.getContext("2d");

    function init() {
        canvas.addEventListener("mousemove", handleMouseEvent);
        canvas.addEventListener("mousedown", handleMouseEvent);
        canvas.addEventListener("mouseup", handleMouseEvent);
        canvas.addEventListener("mouseout", handleMouseEvent);
    }
    $('.page_title').on('click',function () {

        page_id = 'can_'+$(this).attr("data-tab");
        canvas = document.getElementById(page_id);
        ctx = canvas.getContext("2d");
        fillStyle = '#000';
        lineWidth = 2;
        canvas.addEventListener("mousemove", handleMouseEvent);
        canvas.addEventListener("mousedown", handleMouseEvent);
        canvas.addEventListener("mouseup", handleMouseEvent);
        canvas.addEventListener("mouseout", handleMouseEvent);
    });

    /*****pencil******/
    $('.pencil').on('click',function () {
        init();
        lineWidth = 2;
        fillStyle = '#000';
        ctx.globalAlpha =1;
        ctx.shadowColor = "transparent";
        ctx.lineJoin = 'round';
        ctx.lineCap = 'round';

    });

    /*****highlight******/
    $('.highlight').on('click',function () {
        init();
        ctx.globalAlpha = 0.2;
        ctx.shadowColor = "transparent";
        lineWidth = 15;
        fillStyle = 'yellow';
        ctx.beginPath();
        ctx.moveTo(prevX, prevY);
        ctx.lineTo(prevX, prevY);
        ctx.stroke();
    });

    /*****blockout******/
    $('.blockout').on('click',function () {
        init();
        lineWidth = 12;
        fillStyle = '#000';
        ctx.globalAlpha =1;
        ctx.shadowBlur = 8;
        ctx.shadowColor = 'rgb(0, 0, 0)';
        ctx.beginPath();
        ctx.moveTo(prevX, prevY);
        ctx.lineTo(prevX, prevY);
        ctx.stroke();
    });

    function draw(dot) {
        ctx.beginPath();
        ctx.globalCompositeOperation = globalCompositeOperation;
        if(dot){
            ctx.fillStyle = fillStyle;
            ctx.fillRect(currX, currY, 2, 2);
        } else {
            ctx.beginPath();
            ctx.moveTo(prevX, prevY);
            ctx.lineTo(currX, currY);
            ctx.strokeStyle = fillStyle;
            ctx.lineWidth = lineWidth;
            ctx.stroke();
        }
        ctx.closePath();
    }
    $('.eraser').on('click',function () {
        init()
        fillStyle = '#ffffff';
        lineWidth = 14;
        ctx.globalAlpha =1;
    });


    function save() {
        canvas.style.border = "2px solid";
        canvasimg.width = canvas.width;
        canvasimg.height = canvas.height;
        var ctx2 = canvasimg.getContext("2d");
        // comment next line to save the draw only
        ctx2.drawImage(backgroundImage, 0, 0);
        ctx2.drawImage(canvas, 0, 0);
        finalImg.src = canvasimg.toDataURL();
        finalImg.style.display = "inline";
    }

    function handleMouseEvent(e) {
        if (e.type === 'mousedown') {
            prevX = currX;
            prevY = currY;
            currX = e.offsetX;
            currY = e.offsetY;
            mouseClicked = true;
            draw(true);
        }
        if (e.type === 'mouseup' || e.type === "mouseout") {

            if(e.type === 'mouseup') { cPush(); }
            mouseClicked = false;
        }
        if (e.type === 'mousemove') {
            if (mouseClicked) {
                prevX = currX;
                prevY = currY;
                currX = e.offsetX;
                currY = e.offsetY;
                draw();
            }
        }
    }

    /*****circle******/

    $('.circle').on('click',function () {
        var radius = 5;
        fillStyle = "transparent";
        var putPoint = function(e){
            prevX = currX;
            prevY = currY;
            currX = e.offsetX;
            currY = e.offsetY;
            ctx.beginPath();
            ctx.arc(currX,currY, radius, 0, Math.PI*2);
            ctx.lineWidth = 2;
            ctx.strokeStyle = "#000";
            ctx.stroke();

        };
        canvas.addEventListener('mousedown',putPoint);
    });
    /*****rectangle******/

    $('.rectangle').on('click',function () {
        canvas.removeEventListener("click", handleMouseEvent);
        var putPoint = function(e){
            prevX = currX;
            prevY = currY;
            currX = e.offsetX;
            currY = e.offsetY;
            ctx.beginPath();
            ctx.rect(currX, currY,10,10);
            ctx.lineWidth = 2;
            ctx.strokeStyle = "#000";
            ctx.stroke();
        };
        canvas.addEventListener('mousedown',putPoint);
    });
    /*****tick_mark******/

    $('.tick_mark').on('click',function () {


    });
    $('.text_box').on('click',function () {
        var font = '14px sans-serif',
            hasInput = false;
       var  onClick = function(e) {
            if (hasInput) return;
            prevX = currX;
            prevY = currY;
            currX = e.offsetX;
            currY = e.offsetY;
            addInput(currX, currY);
        };
        canvas.addEventListener("click", onClick, false);

        function addInput(x, y) {

            var input = document.createElement('input');

            input.type = 'text';
            input.style.position = 'fixed';
            input.style.left = x  + 'px';
            input.style.top = y + 'px';
            input.style.color = '#000';
            input.onkeydown = handleEnter;

            document.body.appendChild(input);

            input.focus();

            hasInput = true;
        }

        function handleEnter(e) {
            var keyCode = e.keyCode;
            if (keyCode === 13) {
                drawText(this.value, parseInt(this.style.left, 10), parseInt(this.style.top, 10));
                document.body.removeChild(this);
                hasInput = false;
            }
        }

        function drawText(txt, x, y) {
            ctx.textBaseline = 'top';
            ctx.textAlign = 'left';
            ctx.font = font;
            ctx.fillText(txt, x - 4, y - 4);
        }
    });

    /*****lineTool******/
    $('.lineTool').on('click',function () {

        var drawLine = false;
        var finalPos = {x:0, y:0};
        var startPos = {x:0, y:0};
        var canvasOffset = $('#'+page_id).offset();
        $('#'+page_id).mousemove(function(e) {
            if (drawLine === true) {
                finalPos = {x: e.pageX - canvasOffset.left, y:e.pageY - canvasOffset.top};
               // line(ctx);
            }
        });

        $('#'+page_id).mousedown(function(e) {

            drawLine = true;
            ctx.strokeStyle = '#000';
            ctx.lineWidth = 5;
            ctx.lineCap = 'round';
            ctx.beginPath();
            startPos = { x: e.pageX - canvasOffset.left, y: e.pageY - canvasOffset.top};

        });

        function line(cnvs) {
            cnvs.beginPath();
            cnvs.moveTo(startPos.x, startPos.y);
            cnvs.lineTo(finalPos.x, finalPos.y);
            cnvs.stroke();
        }
        function clearCanvas(){

            ctx.clearRect(startPos.x, finalPos  .y, canvas.width,canvas.height);
        }
        $(window).mouseup(function() {
           // clearCanvas()
            if(finalPos.x!=0 &&finalPos.y!=0) {
                line(ctx);
            }

            finalPos = {x:0, y:0};
            startPos = {x:0, y:0};
            drawLine = false;
        });
    });

    function cPush() {
        cStep++;
        if (cStep < cPushArray.length) { cPushArray.length = cStep; }
        cPushArray.push(document.getElementById(page_id).toDataURL());
    }

    $('.undo').on('click',function () {
        if (cStep > 0) {
            cStep--;
            //alert(cPushArray[cStep]);
            var canvasPic = new Image();
            canvasPic.src = cPushArray[cStep];
            canvasPic.onload = function () {
                ctx.clearRect(0,0,canvas.clientWidth,canvas.clientHeight)
                ctx.drawImage(canvasPic, 0, 0); }
        }
    });


    $('.redo').on('click',function () {
        if (cStep < cPushArray.length-1) {
            cStep++;
            var canvasPic = new Image();
            canvasPic.src = cPushArray[cStep];
            canvasPic.onload = function () {
                ctx.clearRect(0,0,canvas.clientWidth,canvas.clientHeight)
                ctx.drawImage(canvasPic, 0, 0);
            }
        }
    });



});


