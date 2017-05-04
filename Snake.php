<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Snake</title>
    <style type="text/css">
        body {text-align:center;}
        canvas { border:5px dotted #ccc; }
        h1 { font-size:50px; text-align: center; margin: 0; padding-bottom: 25px;}
    </style>
    <script type="text/javascript">
        function game()
        {
            var level = 160; // Game level, by decreasing will speed up
            var width = 45; // Width
            var height = 30; // Height
            var inc_score = 50; // Score
            var snake_color = "#006699"; // Snake Color
            var ctx; // Canvas attributes
            var tn = []; // temp directions storage
            var xdir = [-1, 0, 1, 0]; // position adjustments
            var ydir = [0, -1, 0, 1]; // position adjustments
            var queue = [];
            var frog = 1; // default food
            var map = [];
            var MR = Math.random;
            var X = 5 + (MR() * (width - 10))|0; // Calculate positions
            var Y = 5 + (MR() * (height - 10))|0; // Calculate positions
            var direction = MR() * 3 | 0;
            var interval = 0;
            var score = 0;
            var sum = 0, easy = 0;
            var i, dir;
// getting play area
            var c = document.getElementById('playingArea');
            ctx = c.getContext('2d');
// Map positions
            for (i = 0; i < width; i++)
            {
                map[i] = [];
            }
// random placement of snake food
            function rand_frog()
            {
                var x, y;
                do
                {
                    x = MR() * width|0;
                    y = MR() * height|0;
                }
                while (map[x][y]);
                map[x][y] = 1;
                ctx.fillStyle = snake_color;
                ctx.strokeRect(x * 10+1, y * 10+1, 8, 8);
            }
// Default somewhere placement
            rand_frog();
            function set_game_speed()
            {
                if (easy)
                {
                    X = (X+width)%width;
                    Y = (Y+height)%height;
                }
                --inc_score;
                if (tn.length)
                {
                    dir = tn.pop();
                    if ((dir % 2) !== (direction % 2))
                    {
                        direction = dir;
                    }
                }
                if ((easy || (0 <= X && 0 <= Y && X < width && Y < height)) && 2 !== map[X][Y])
                {
                    if (1 === map[X][Y])
                    {
                        score+= Math.max(5, inc_score);
                        inc_score = 50;
                        rand_frog();
                        frog++;
                    }
//ctx.fillStyle("#ffffff");
                    ctx.fillRect(X * 10, Y * 10, 9, 9);
                    map[X][Y] = 2;
                    queue.unshift([X, Y]);
                    X+= xdir[direction];
                    Y+= ydir[direction];
                    if (frog < queue.length)
                    {
                        dir = queue.pop();
                        map[dir[0]][dir[1]] = 0;
                        ctx.clearRect(dir[0] * 10, dir[1] * 10, 10, 10);
                    }
                }
                else if (!tn.length)
                {
                    var msg_score = document.getElementById("msg");
                    msg_score.innerHTML = "Thank you for playing game.<br /> Your Score : <b>"+score+"</b><br /><br /><input type='button' value='Play Again' onclick='window.location.reload();' />";
                    document.getElementById("playArea").style.display = 'none';
                    window.clearInterval(interval);
                }
            }
            interval = window.setInterval(set_game_speed, level);
            document.onkeydown = function(e) {
                var code = e.keyCode - 37;
                if (0 <= code && code < 4 && code !== tn[0])
                {
                    tn.unshift(code);
                }
                else if (-5 == code)
                {
                    if (interval)
                    {
                        window.clearInterval(interval);
                        interval = 0;
                    }
                    else
                    {
                        interval = window.setInterval(set_game_speed, 60);
                    }
                }
                else
                {
                    dir = sum + code;
                    if (dir == 44||dir==94||dir==126||dir==171) {
                        sum+= code
                    } else if (dir === 218) easy = 1;
                }
            }
        }
    </script>
</head>
<body onload="game()" style><br /><br/>
<h1 style="font-family: AppleGothic; font-size: 30px; ">LET'S PLAY!</h1><br/>
<div id="msg"></div>
<canvas id="playingArea" width="450" height="300">Sorry your browser does not support this game</canvas>
</body>
</html>