
$(function() {
    $.ajaxSetup({
        headers: {
            'X-XSRF-Token': $('meta[name="_token"]').attr('content')
        }
    });
});
/*
init();
    var canvas, ctx, flag = false,
        prevX = 0,
        currX = 0,
        prevY = 0,
        currY = 0,
        dot_flag = false;

    var x = "black",
        y = 2;

    function init() {

        canvas = document.getElementById('can');
        ctx = canvas.getContext("2d");
        w = canvas.width;
        h = canvas.height+200;

        canvas.addEventListener("mousemove", function (e) {
            findxy('move', e)
        }, false);
        canvas.addEventListener("mousedown", function (e) {
            findxy('down', e)
        }, false);
        canvas.addEventListener("mouseup", function (e) {
            findxy('up', e)
        }, false);
        canvas.addEventListener("mouseout", function (e) {
            findxy('out', e)
        }, false);
       // document.getElementById('save_image').addEventListener('click', savePDF, false);

    }
    function savePDF(){
        try {
            canvas.getContext('2d');
            var imgData = canvas.toDataURL("image/jpeg", 1.0);
            var pdf = new jsPDF('p', 'mm', [297, 210]);
            pdf.addImage(imgData, 'JPEG', 5, 5);
            var namefile = prompt("insert name of file");
            pdf.save(namefile + ".pdf");
        } catch(e) {
            alert("Error description: " + e.message);
        }

    }
    function color() {
        x = $('#color').val();
        y = 2;
    }
    function erase(val) {
            x = val;
            y = 14;

    }

    function draw() {
        ctx.beginPath();
        ctx.moveTo(prevX, prevY);
        ctx.lineTo(currX, currY);
        ctx.strokeStyle = x;
        ctx.lineWidth = y;
        ctx.stroke();
        ctx.closePath();
    }
    function text(){

        $('#can').TextOver({}, function() {
            var  textover_api = this;
            drawText(textover_api);
        });
    }
    function drawLine(){

        ctx.beginPath();
        ctx.moveTo(prevX, prevY);
        ctx.lineTo(prevX+50, prevY+50);
        ctx.stroke();
    }
    function reset() {
        var m = confirm("Want to clear");
        if (m) {
            ctx.clearRect(0, 0, w, h);
            document.getElementById("canvasimg").style.display = "none";
        }
    }

    function save() {
        document.getElementById("canvasimg").style.border = "2px solid";
        var dataURL = canvas.toDataURL();
        document.getElementById("canvasimg").src = dataURL;
        document.getElementById("canvasimg").style.display = "inline";
    }

    function findxy(res, e) {
        if (res == 'down') {
            prevX = currX;
            prevY = currY;
            currX = e.clientX - canvas.offsetLeft;
            currY = e.clientY - canvas.offsetTop;

            flag = true;
            dot_flag = true;
            if (dot_flag) {
                ctx.beginPath();
                ctx.fillStyle = x;
                ctx.fillRect(currX, currY, 2, 2);
                ctx.closePath();
                dot_flag = false;
            }
        }
        if (res == 'up' || res == "out") {
            flag = false;
        }
        if (res == 'move') {
            if (flag) {
                prevX = currX;
                prevY = currY;
                currX = e.clientX - canvas.offsetLeft;
                currY = e.clientY - canvas.offsetTop;
                draw();
            }
        }
    }
*/
$(document).ready(function(){

    $.ajax({
        type: "POST",
        url: APP_URL+'pageArray',
        data: data,
        success: success,
        dataType: dataType
    });
        var canvas, ctx, flag = false,
        prevX = 0,
        currX = 0,
        prevY = 0,
        currY = 0,
        dot_flag = false;
        var page_id ="";
        var cPushArray = new Array();
        var cStep = -1;
        var x = "black",
        y = 3;


    $('.page_title').on('click',function () {

        x = "black",
        y = 3;
        page_id = 'can_'+$(this).attr("data-tab");
        canvas = document.getElementById(page_id);
        ctx = canvas.getContext("2d");

        canvas.addEventListener("mousemove", function (e) {
            findxy('move', e)
        }, false);
        canvas.addEventListener("mousedown", function (e) {
            findxy('down', e)
        }, false);
        canvas.addEventListener("mouseup", function (e) {
            findxy('up', e)
        }, false);
        canvas.addEventListener("mouseout", function (e) {
            findxy('out', e)
        }, false);
            canvas.width = $("#parent").width();
            canvas.height = $("#parent").height();

    });
        function init() {
            page_id = $("canvas:first").attr('id');
            canvas = document.getElementById(page_id);
            ctx = canvas.getContext("2d");

            canvas.addEventListener("mousemove", function (e) {
                findxy('move', e)
            }, false);
            canvas.addEventListener("mousedown", function (e) {
                findxy('down', e)
            }, false);

            canvas.addEventListener("mouseup", function (e) {
                findxy('up', e)
            }, false);
            canvas.addEventListener("mouseout", function (e) {
                findxy('out', e)
            }, false);
            canvas.width = $("#parent").width();
            canvas.height = $("#parent").height();
        }

        /*****pencil******/
        $('.pencil').on('click',function () {

            init();
            y = 3;
            x = '#000000';
            ctx.globalAlpha =1;
            ctx.shadowColor = "transparent";
            ctx.lineJoin = 'round';
            ctx.lineCap = 'round';
            ctx.beginPath();
            ctx.moveTo(prevX, prevY);
            ctx.stroke();
        });

        /*****blockout******/
        $('.blockout').on('click',function () {
            init();
            y = 12;
            x = '#000';
            ctx.globalAlpha =1;
            ctx.shadowBlur = 8;
            ctx.shadowColor = 'rgb(0, 0, 0)';
            ctx.beginPath();
            ctx.moveTo(prevX, prevY);
            ctx.lineTo(prevX, prevY);
            ctx.stroke();
        });

        $('.eraser').on('click',function () {
            x = '#ffffff';
            y = 14;
            ctx.globalAlpha =1;
        });

        $('.hightlight').on('click',function () {
            ctx.globalAlpha = 0.2;
            ctx.shadowColor = "transparent";
            y = 15;
            x = 'yellow';
            ctx.beginPath();
            ctx.moveTo(prevX, prevY);
            ctx.lineTo(prevX, prevY);
            ctx.stroke();
        });



        $('.circle').on('click',function () {
            var radius=8;
            x = "transparent";

            var putPoint = function(e){

                ctx.beginPath();
                ctx.arc(e.clientX, e.clientY, radius, 0, Math.PI*2);
                ctx.lineWidth = 1;
                ctx.strokeStyle = "#000";
                ctx.stroke();
            }
            canvas.addEventListener('mousedown',putPoint);
        });
        $('.rectangle').on('click',function () {

            x = "transparent";
            var putPoint = function(e){
                ctx.beginPath();
                ctx.rect(e.clientX, e.clientY,10,10);
                ctx.lineWidth = 1;
                ctx.strokeStyle = "#000";
                ctx.stroke();
            }
            canvas.addEventListener('mousedown',putPoint);
        });
        $('.reset').on('click',function () {
            ctx.clearRect(0, 0, canvas.width, canvas.height);

        });

    function findxy(res, e) {
        if (res == 'down') {
            prevX = currX;
            prevY = currY;
            currX = e.clientX - canvas.offsetLeft;
            currY = e.clientY - canvas.offsetTop;

            flag = true;
            dot_flag = true;
            if (dot_flag) {
                ctx.beginPath();
                ctx.fillStyle = x;
                ctx.fillRect(currX, currY, 2, 2);
                ctx.closePath();
                dot_flag = false;
            }
        }
        if (res == 'up' || res == "out") {
            if (res == 'up'){ cPush(); }
            flag = false;
        }
        if (res == 'move') {
            if (flag) {
                prevX = currX;
                prevY = currY;
                currX = e.clientX - canvas.offsetLeft;
                currY = e.clientY - canvas.offsetTop;
                draw();
            }
        }
    }


    function draw() {
        ctx.beginPath();
        ctx.moveTo(prevX, prevY);
        ctx.lineTo(currX, currY);
        ctx.strokeStyle = x;
        ctx.lineWidth = y;
        ctx.stroke();
        ctx.closePath();
    }

    $('.lineTool').on('click',function () {
        var mouse = {x: 0, y: 0};
        var last_mouse = {x: 0, y: 0};

        /* Mouse Capturing Work */
        canvas.addEventListener('mousemove', function(e) {
            last_mouse.x = mouse.x;
            last_mouse.y = mouse.y;

            mouse.x = e.pageX - this.offsetLeft;
            mouse.y = e.pageY - this.offsetTop;
        }, false);
        var onPaint = function() {
            ctx.beginPath();
            ctx.moveTo(last_mouse.x, last_mouse.y);
            ctx.lineTo(mouse.x, mouse.y);
            ctx.closePath();
            ctx.stroke();
        };
    });
    function cPush() {
        cStep++;
        if (cStep < cPushArray.length) { cPushArray.length = cStep; }
        cPushArray.push(document.getElementById(page_id).toDataURL());
        alert(cPushArray.length);
    }

    $('.undo').on('click',function () {
        alert(JSON.stringify(cPushArray));
        if (cStep > 0) {
            cStep--;
            var canvasPic = new Image();
            canvasPic.src = cPushArray[cStep];
            canvasPic.onload = function () { ctx.drawImage(canvasPic, 0, 0); }
        }
    });


    $('.redo').on('click',function () {        if (cStep < cPushArray.length-1) {
            cStep++;
            var canvasPic = new Image();
            canvasPic.src = cPushArray[cStep];
            canvasPic.onload = function () {ctx.drawImage(canvasPic, 0, 0); }
        }
    });


});


