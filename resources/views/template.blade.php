<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <style>
    * {
        margin: 0;
        padding: 0;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    body {
        background-color: #eaeaea;
    }
    .container {
        width:100%;
        height: 700px;
        margin : 0 auto;
        overflow: hidden;
    }
    .header{
        width: 100%;
        height:50px;
        background-color: rgb(172, 170, 170);
    }
    .header p {
        float: right;
        margin-right: 40px;
        margin-top: 12px;
        margin-left: 5px;
    }
    .head img {
        float: right;
        width: 30px;
        border-radius: 100%;
        margin-top: 10px;
        background-color: white;
    }
    .leftbar{
        width: 20%;
        height: 650px;
        float: left;
        background-color: lightskyblue;
    }
    .leftbar ul {
        margin-left: 50px;
        margin-top: 20px;
        line-height: 25px;
        list-style: none;
        font-size: 16px;
    }
    .leftbar ul li a {
        color: #636363;
        text-decoration: none;
    }
    .content{
        width: 80%;
        height: 600px;
        background-color: white;
        float: right;
    }
    .footer{
        width:80%;
        height:50px;
        background-color: rgb(187, 186, 186);
        float:right;
    }
    .footer p{
        text-align: center;
        margin-top: 10px;
    }

    </style>
</head>
<body>
    <div class="container">
    <div class="header">
    <p>Satria</p>
    <img src="img/me.png" alt="">
    </div>
    <div class="leftbar">
        <ul class="menu">
            <li><a href="/home">Home</a></li>
            <li><a href="/product">Product</a></li>
            <li><a href="/detail-product">Detail Product</a></li>
            <li><a href="/cart">Cart</a></li>
            <li><a href="/checkout">Checkout</a></li>
            <li><a href="/checkout-success">Checkout Success</a></li>
        </ul>
    </div>
    <div class="content">
        @yield('content')
    </div>
    <div class="footer">
    <p>Copyright &copy; by Satria 2021</p>
    </div>
    </div>
</body>
</html>