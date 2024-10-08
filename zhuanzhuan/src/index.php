<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <meta name="keywords" content="html5,本地存储" />
    <meta name="description">
    <title>转转转</title>
    <link rel="stylesheet" type="text/css" href="../css/main.css" />
    <style type="text/css">
    .demo {
        width: 417px;
        height: 417px;
        position: relative;
        margin: 50px auto
    }

    #disk {
        width: 417px;
        height: 417px;
        background: url(disk.jpg) no-repeat;
    }

    #start {
        width: 163px;
        height: 320px;
        position: absolute;
        top: 80px;
        left: 80px;
    }

    #start img {
        cursor: pointer
    }

    #text1 {
        position: absolute;
        top: 330px;
        left: 110px;
    }
    </style>
    <h1 id="text">领域展开，坐杀博徒！！</h1>
    <h2 id="text">在小小的转盘里面抽呀抽呀抽~~</h2>
    <script type="text/javascript" src="jquery.min.js"></script>
    <script type="text/javascript" src="jQueryRotate.2.2.js"></script>
    <script type="text/javascript" src="jquery.easing.min.js"></script>
    <script type="text/javascript">
    $(function() {
        $("#startbtn").click(function() {
            lottery();
        });
    });

    function lottery() {
        $.ajax({
            type: 'POST',
            url: 'data.php',
            dataType: 'json',
            cache: false,
            error: function() {
                alert('哒咩！');
                return false;
            },
            success: function(json) {
                $("#startbtn").unbind('click').css("cursor", "default");
                var a = json.angle; //角度
                var p = json.prize; //奖项
                var flag = json.flag;
                $("#startbtn").rotate({
                    duration: 3000, //转动时间
                    angle: 0,
                    animateTo: 1800 + a, //转动角度
                    easing: $.easing.easeOutSine,
                    callback: function() {
                        if (p == '谢谢参与') {
                            var con = confirm('jiangsir告诉你!\n' + '你的flag是：' + flag + '\n再来一回吧?');
                        } else {
                            var con = confirm('jiangsir告诉你' + p + '!\n' + '你的flag是：' + flag +
                                '\n再来一回吧?');
                        }
                        if (con) {
                            lottery();
                        } else {
                            return false;
                        }
                    }
                });
            }
        });
    }
    $(function() {
        $("#returnbutton").click(function() {
            var con = confirm('jiangsir告诉你你真的快了!');
            if (con) {
                window.location.href = "https://www.xp0int.top/challenges";
            }
        });
    });
    </script>
</head>

<body>
    <div id="header">
        <div id="logo">
            <h1></h1>
        </div>
    </div>

    <div id="main">
        <h2 class="top_title"></h2>
        <div class="msg"></div>
        <div class="demo">
            <div id="disk"></div>
            <div id="start"><img src="start.png" id="startbtn"></div>
            <div id="text1">
                <h3 id="returnbutton">本题呼吁禁止赌博！</h3>
            </div>
        </div>
        <div class="ad_demo">
            <script src="/js/ad_js/ad_demo.js" type="text/javascript"></script>
        </div><br />
    </div>


</body>

</html>
