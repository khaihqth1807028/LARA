<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<?php
session_start();
$total= 0;
if (isset($_SESSION['Card']) && $_SESSION['Card']!= null){
    foreach ($_SESSION['Card'] as $item) {
      $total += $item['quantity'];
    }
}
?>
<h1> Card:<a href="/ViewCard"> <?php echo $total?></a></h1>

@foreach($list as $item)
    <p>Id: {{$item['id']}}</p>
    <p>Name: {{$item['name']}} </p>
    <p>Price: {{$item['price']}}</p>
    <a href="{{route('product.show',[$item->id])}}">Mua hàng</a>
    <p>__________________________________________________________________________________________________</p>
    @endforeach

</body>
</html>