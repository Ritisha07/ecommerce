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
        <label for="name">Name of User:</label>
        <input type="text" id="name" name="name" required> 

        <label for="amount">Amount:</label>
        <input type="text" id="amount" name="amount" required> 
         

         <input type="hidden" name="user_id" value="123">
         <!-- <input type="hidden" name="name" value="ram"> -->
         <input type="hidden" name="email" value="ram@gmail.com">
         <!-- <input type="hidden" name="name" value="ram"> -->
         <!-- <input type="hidden" name="amount" value="5"> -->

        <br><button type="submit">Click for Payment</button>
    </form>
    </body>
</html>
  