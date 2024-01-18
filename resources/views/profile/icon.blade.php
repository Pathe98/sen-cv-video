<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            background: rgb(236, 235, 235)
        }
        .social-icon ul{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            display: flex;
        }

        .social-icon ul li{
            list-style: none;
            margin: 0 15px;
        }

        .social-icon ul li .fab{
            font-size: 35px;
            line-height: 60px;
            transition: .3s;
            color: #000;
        }
        .social-icon ul li a:hover{
            color: #fff;
        }

        .social-icon ul li a{
            position: relative;
            display: block;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background-color: rgb(245, 243, 243);
            text-align: center;
            box-shadow: 0 4px 8px 0 rgba(0,0,0.2);
            transition: .6s;
        }

        .social-icon ul li a:hover{
            transform: translate(0,-10%);
        }

        .social-icon ul li:nth-child(1) a:hover{
            background-color: rgb(60, 132, 240);
        }
        .social-icon ul li:nth-child(2) a:hover{
            background-color: rgb(247, 17, 208);
        }.social-icon ul li:nth-child(3) a:hover{
            background-color: rgb(72, 255, 0);
        }
        .social-icon ul li:nth-child(4) a:hover{
            background-color: rgb(0, 102, 255);
        }
        .social-icon ul li:nth-child(5) a:hover{
            background-color: rgb(0, 0, 0);
        }
    </style>
</head>
<body>
    
        <div class="social-icon">
                <ul>
                    <li><a href="#" target="_blank"><i class="fab fa-facebook"></i></a></li>
                    <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
                    <li><a href="#" target="_blank"><i class="fab fa-whatsapp"></i></a></li>
                    <li><a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                    <li><a href="#" target="_blank"><i class="fab fa-github"></i></a></li>
                </ul>
        </div>
        
        <script src="https://kit.fontawesome.com/ae61999827.js" crossorigin="anonymous"></script>

</body>
</html>