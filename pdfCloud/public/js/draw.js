
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

        var canvas, ctx, flag = false,
        prevX = 0,
        currX = 0,
        prevY = 0,
        currY = 0,
        dot_flag = false;
        var page_id ="";

        var x = "black",
        y = 2;

        $('.page_title').on('click',function () {
            page_id = 'can_'+$(this).attr("data-tab");
            canvas = document.getElementById(page_id);
            ctx = canvas.getContext("2d");
            y = 2;
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
        });

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


        $('.pencil').on('click',function () {
            y = 2;
            x = '#000';
            ctx.shadowColor = "transparent";
            ctx.beginPath();
            ctx.moveTo(prevX, prevY);
            ctx.stroke();
        });

        $('.blockout').on('click',function () {

            y = 12;
            x = '#000';
            ctx.shadowBlur = 8;
            ctx.lineJoin = ctx.lineCap = 'square';
            ctx.shadowColor = 'rgb(0, 0, 0)';
            ctx.beginPath();
            ctx.moveTo(prevX, prevY);
            ctx.lineTo(prevX, prevY);
            ctx.stroke();
        });
        $('.eraser').on('click',function () {
            x = '#ffffff';
            y = 14;
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
});

