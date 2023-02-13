


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    @include('layouts.head')
</head>

<body>

    <div class="wrapper">

        <!--=================================
 preloader -->

        <div id="pre-loader">
            <img src="assets/images/pre-loader/loader-01.svg" alt="">
        </div>

        <!--=================================
 preloader -->

        @include('layouts.main-header')

      

        <!--=================================
 Main content -->
        <!-- main-content -->
<div class="content-wrapper">
    <!-- Hero-area -->
    <div class="hero-area section">
      <div class="container">
        <div class="row">
         <div class="col-md-10 col-md-offset-1 text-center">
            <ul class="hero-area-tree">
                <li><a href="index.html"></a></li>
                <li>Sign Up</li>
            </ul>
          <!-- login form -->
           
            <div class="contact-form">
            <h4>Sign Up</h4>
           
            
            <form method="POST" action="{{ url('/register')}}">
                @csrf
                <div>
                <input class="input" type="text" name="name" placeholder="Name">
                </div>
                <div>
                <input class="input" type="email" name="email" placeholder="Email">
                </div> 
                <div>
                <input class="input" type="password" name="password" placeholder="Password">
                </div>
                 <div>
                <input class="input" type="password" name="password_confirmation" placeholder="Confirm Password">
                </div>
                <div>
                <button type="submit" class="main-button icon-button pull-right">Sign Up</button>
                </div>
            </form>
            </div>
            
    <!-- /login form -->

      </div>
<!-- /row -->

    </div>
    </div>
</div>

<!-- /Hero-area -->


    @include('layouts.footer-scripts')

</body>

</html>


