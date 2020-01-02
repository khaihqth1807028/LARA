<h1>View Card</h1>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<?php
session_start();
echo "<pre>";
$totalPrice = 0;
if(isset($_SESSION['Card']) && $_SESSION['Card']!= null){
    foreach ($_SESSION['Card'] as $item){
        $totalPrice += $item['price']* $item['quantity'];
    }
    $_SESSION['CheckCard']['TotalPrice']=$totalPrice;
}

?>
<h1><?php echo $totalPrice ?></h1>
<br>
    @if (isset($_SESSION['Card']) && $_SESSION['Card']!= null)

        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Total</th>
            </tr>
            </thead>
            <form action="{{route('updatecart')}}" method="post">
                @csrf
            @foreach($_SESSION['Card'] as $list)

                <tbody>
                <tr>
                    <th scope="row">{{$list['id']}}</th>
                    <td>{{$list['name']}}</td>
                    <td>{{$list['price']}}</td>
                    <td><button type="submit" name="update">+</button><input name="quantity" type="number" value={{$list['quantity']}}><a href="/UpdateCart?{{$list['id']}}" name="update-">-</a></td>
                    <td> {{$list['quantity'] * $list['price']}}
                    </td>
                </tr>
                </tbody>

            @endforeach
                <button type="submit">Update</button>
            </form>
        </table>
    @endif



@if(isset($_SESSION['CheckCard']) && $_SESSION['CheckCard']!= null)
<a href="{{route('checkout')}}"> <h1 style="color: red">  Đặt hàng   </h1></a>
    @endif