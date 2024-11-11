<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>E-commerce</title>
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
        <h1> Welcome to our ecommerce website</h1>
    <!-- @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif -->

    <form action="{{ route('payment.proceed') }}" method="POST">
        @csrf
        <lable> Enter user_id</label>
        <input type="text" name="user_id" placeholder="enter id" ><br>
        <lable> Enter Name</label>
        <input type="text" name="name" placeholder="Enter Name"><br>
        <lable> Enter Email</label>
        <input type="email" name="email" placeholder="Enter email"><br>
        <lable> Enter Amount</label>
        <input type="number" name="amount" placeholder="Enter Amount"><br>
            
        <br><button type="submit">Click for Payment</button>
    </form>
    </body>
</html>
  