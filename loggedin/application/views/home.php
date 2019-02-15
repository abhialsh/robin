<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LOGGEDIN</title>
    <link rel="shortcut icon" href="https://loggedinapp.com/home/images/favicon_1.ico">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://loggedinapp.com/home/css/navbar.css">
    <link rel="stylesheet" type="text/css" href="https://loggedinapp.com/home/css/style.css">
</head>
<body>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">
                    <img src="https://loggedinapp.com/home/images/logo.png" height="70">
                </a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right text-center">

                    <li><a href="">
                            <h4>HOME</h4>
                        </a></li>


                    <li><a href="#featurse">
                            <h4>FEATURES</h4>
                        </a></li>

                    <li><a href="#screens">
                            <h4>SCREENS</h4>
                        </a></li>

                    <li><a href="#fees">
                            <h4>FEES</h4>
                        </a></li>

                    <li><a href="<?php echo site_url('admin/dashboard/login');?>">
                            <h4>SIGN IN &nbsp;<i class="fa fa-long-arrow-right"></i></h4>
                        </a></li>



                </ul>
            </div>
        </div>
    </nav> <!-- navbar section close -->

    <div class="container-fluid slider-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-lg-6">
                    <div class="row">
                        <div class="col-lg-11 col-lg-offset-1 col-md-11 col-md-offset-1">
                            <h1 class="slider-heading text-center">MANAGE YOUR ALL STUFF USING ONE APP</h1>
                        </div>

                        <div class="col-lg-5 b1 col-lg-offset-2 col-md-5 col-md-offset-2 col-sm-5 col-sm-offset-1">

                            <a href="#"><img src="https://loggedinapp.com/home/images/buttons/appstore-new.png" class="img-responsive"></a>
                            <!-- <a href="#"><img src="images/buttons/appstore.png" class="img-responsive"></a> -->
                        </div>

                        <div class="xs-mt col-lg-5 b1 col-md-5 col-sm-5">

                            <a href="https://play.google.com/store/apps/details?id=com.loggedincorp.loggedinuserapp"><img src="https://loggedinapp.com/home/images/buttons/playstore.png" class="img-responsive"></a>
                            <!-- <a href="https://play.google.com/store/apps/details?id=com.mmf.loggedinuserapp"><img src="images/buttons/google.png" class="img-responsive"></a> -->

                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="row">
                        <div class="col-lg-10 col-lg-offset-2 col-md-10 col-md-offset-2">
                            <p class="text-center">
                                <a href="<?php echo site_url('admin/dashboard/login');?>" class="btn btn-default list-btn">
                                    <b>LIST YOUR BUSINESS NOW!</b></a>
                            </p>
                        </div>
                    </div>
                </div> <!-- col-md-6 section close -->

                <div class="col-md-6 col-sm-5  col-lg-6">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3 col-sm-10 col-sm-offset-2 ">
                            <div class="slider-img sm-pd-top md-mt"></div>
                            <img src="https://loggedinapp.com/home/images/mobiles/1.png" class="img-responsive">
                            <br>
                        </div>
                    </div>
                </div> <!-- col-md-6 section close -->
            </div>
        </div>
    </div><!-- top section close -->


    <!-- do anithing section start -->
    <div class="container" id="featurse"><br><br>
        <h1 class="text-center do-anything" style="padding-bottom: 1%;">Check out all you can do in Loggedin</h1>
        <br>
        <br><br>
        <div class="row">
            <div class="col-md-4 col-lg-4 col-sm-4">
                <div class="row">
                    <div class="col-md-7 col-md-offset-3">
                        <p class="text-center"><img src="https://loggedinapp.com/home/images/icons/fav_merchants.png"></p>
                    </div>

                    <div class="col-md-7 col-md-offset-3">
                        <br>
                        <p class="text-center text-muted">Favourite merchants</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-lg-4 col-sm-4 xs-mt">
                <div class="row">
                    <div class="col-md-7 col-md-offset-3">
                        <p class="text-center"><img src="https://loggedinapp.com/home/images/icons/wishlist.png"></p>
                    </div>
                    <div class="col-md-7 col-md-offset-3"><br>
                        <p class="text-center text-muted">Universal wishlist<br> for all your stores</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-lg-4 col-sm-4 xs-mt">
                <div class="row">
                    <div class="col-md-7 col-md-offset-3">
                        <p class="text-center"><img src="https://loggedinapp.com/home/images/icons/pay.png"></p>
                    </div>
                    <div class="col-md-7 col-md-offset-3"><br>
                        <p class="text-center text-muted">Pay with one<br> tap for everything</p>
                    </div>
                </div>
            </div>

        </div> <!-- row1 close -->
        <br>
        <br>
        <div class="row">
            <div class="col-md-4 col-lg-4 col-sm-4">
                <div class="row">
                    <div class="col-md-7 col-md-offset-3">
                        <p class="text-center"><img src="https://loggedinapp.com/home/images/icons/location.png"></p>
                    </div>
                    <div class="col-md-7 col-md-offset-3"><br>
                        <p class="text-center text-muted">Location based<br> booking</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-lg-4 col-sm-4 xs-mt">
                <div class="row">
                    <div class="col-md-7 col-md-offset-3">
                        <p class="text-center"><img src="https://loggedinapp.com/home/images/icons/invoices.png"></p>
                    </div>
                    <div class="col-md-7 col-md-offset-3"><br>
                        <p class="text-center text-muted">Instantly pay <br> invoices</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-lg-4 col-sm-4 xs-mt">
                <div class="row">
                    <div class="col-md-7 col-md-offset-3">
                        <p class="text-center"><img src="https://loggedinapp.com/home/images/icons/chat.png"></p>
                    </div>
                    <div class="col-md-7 col-md-offset-3"><br>
                        <p class="text-center text-muted">Live chat with <br> any merchant</p>
                    </div>
                </div>
            </div>

        </div> <!-- row2 close -->
        <br>
        <br>
        <div class="row">
            <div class="col-md-4 col-lg-4 col-sm-4">
                <div class="row">
                    <div class="col-md-7 col-md-offset-3">
                        <p class="text-center"><img src="https://loggedinapp.com/home/images/icons/reorder.png"></p>
                    </div>
                    <div class="col-md-7 col-md-offset-3"><br>
                        <p class="text-center text-muted">Quick Re-ordering</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-lg-4 col-sm-4 xs-mt">
                <div class="row">
                    <div class="col-md-7 col-md-offset-3">
                        <p class="text-center"><img src="https://loggedinapp.com/home/images/icons/security.png"></p>
                    </div>
                    <div class="col-md-7 col-md-offset-3"><br>
                        <p class="text-center text-muted">Security</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-lg-4 col-sm-4 xs-mt">
                <div class="row">
                    <div class="col-md-7 col-md-offset-3">
                        <p class="text-center"><img src="https://loggedinapp.com/home/images/icons/share.png"></p>
                    </div>
                    <div class="col-md-7 col-md-offset-3"><br>
                        <p class="text-center text-muted">Share profile <br> of your favourite<br>merchant</p>
                    </div>
                </div>
            </div>

        </div> <!-- row3 close -->

    </div><br><br>
    <!-- do anithing section close -->
    <hr>
    <br>
    <div class="container" id="screens">
        <div class="row">
            <div class="col-md-5 col-lg-5 col-sm-5">
                <div class="mt-top"></div><br><br>
                <h1 class="eccomerce">BOOKING</h1>
                <br>
                <p class="text-muted text-right text-justify">
                    Let your customers book appointments or services with your own app profile. LoggedIn provides user to book unlimited appointments, book classes. Customers can choose from different staff members, can book according to the preferred locations. LoggedIn allows you to accept credit cards or cash. You can also sync google calendar and manage all your bookings from a single dashboard.You get benefits to send user confirmation & reminder emails.Customers can share your profile using the deep-linking. For better communication between you and your customers, LoggedIn provides an integrated chat system.
                </p>
            </div>

            <div class="col-lg-4 col-lg-offset-2 col-md-5 col-md-offset-2 col-sm-6 col-sm-offset-1">
                <div class="row">
                    <div class="col-md-11 col-lg-12 col-sm-12">
                        <div class="mt-top"></div>
                        <img src="https://loggedinapp.com/home/images/mobiles/booking.png" class="img-responsive">
                    </div>
                </div>
            </div>

        </div>
    </div>
    <br>
    <hr>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-5 col-sm-6">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 col-sm-9">
                        <div class="visible-xs">
                            <h1 class="eccomerce text-right">ECOMMERCE</h1>
                            <br>
                            <p class="text-muted text-right text-justify">Build your own e-commerce app or integrate your existing website.
                                You can import all your products from your current websites like Magento, Shopify, BigCommerce, Wordpress, 3Dcart, Xcart, Opencart. Please email us if you would like to add another cart.
                                Sell products alongside your booking app or as a stand-alone app. Integrate with Postmates for local delivery. Display pre-shopping delivery-options & availability based on customers pre-entered address.
                            </p>
                        </div>
                        <div class="mt-top"></div>
                        <img src="https://loggedinapp.com/home/images/mobiles/ecommerce1.png" class="img-responsive">
                    </div>
                </div>
            </div>

            <div class="col-lg-5 col-lg-offset-2 col-md-5 col-md-offset-2 col-sm-5 hidden-xs">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="mt-top md-mt pd-top"></div>
                        <h1 class="eccomerce text-right">ECOMMERCE</h1>
                        <br>
                        <p class="text-muted text-right text-justify">Build your own e-commerce app or integrate your existing website.
                            You can import all your products from your current websites like Magento, Shopify, BigCommerce, Wordpress, 3Dcart, Xcart, Opencart. Please email us if you would like to add another cart.
                            Sell products alongside your booking app or as a stand-alone app. Integrate with Postmates for local delivery. Display pre-shopping delivery-options & availability based on customers pre-entered address.
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <br>
    <br>
    <div class="container">
        <h1 class="text-center">Integrate with your current website</h1>
        <br><br>
        <div class="row">
            <div class="  col-lg-2 col-md-2 col-sm-2  xs-mt">
                <img src="https://loggedinapp.com/home/images/logos/logo1.png" class="img-responsive b1">
            </div>

            <div class="col-md-2 col-sm-2 col-lg-2 xs-mt">
                <img src="https://loggedinapp.com/home/images/logos/logo2.png" class="img-responsive b1">
            </div>

            <div class="col-md-2 col-sm-2 col-lg-2 xs-mt">
                <img src="https://loggedinapp.com/home/images/logos/logo3.png" class="img-responsive b1">
            </div>

            <div class="col-md-2 col-sm-2 col-lg-2 xs-mt">
                <img src="https://loggedinapp.com/home/images/logos/logo4.png" class="img-responsive b1">
            </div>

            <div class="col-md-2 col-sm-2 col-lg-2 xs-mt">
                <img src="https://loggedinapp.com/home/images/logos/logo5.png" class="img-responsive b1">
            </div>

            <div class="col-md-2 col-sm-2 col-lg-2 xs-mt">
                <img src="https://loggedinapp.com/home/images/logos/logo6.png" class="img-responsive b1">
            </div>

        </div>
    </div>
    <br>
    <hr>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-lg-5 col-sm-5">
                <div class="mt-top"></div><br><br>
                <h1 class="eccomerce">RESTAURANTS</h1>
                <br>
                <p class="text-muted text-right text-justify">Accept food orders online with your own personalized restaurant app profile. Offer long range delivery within your city with postmates. LoggedIn provide's fast ordering so that customer can add items to cart without having to leave the menu page. Update your menu and pictures as often as you like in your admin section. Easy menu setup with "Choices & Addons" grouping. Customize your delivery hours different than your store hours. Display pre-shopping delivery-options & availability based off customers pre-entered address.
                </p>
            </div>

            <div class="col-lg-4 col-lg-offset-2 col-md-5 col-md-offset-2 col-sm-6 col-sm-offset-1">
                <div class="row">
                    <div class="col-md-10 col-md-offset-2 col-lg-12 col-sm-12">
                        <div class="mt-top"></div>
                        <img src="https://loggedinapp.com/home/images/mobiles/restaurant.png" class="img-responsive">
                    </div>
                </div>
            </div>

        </div>
    </div>
    <br>
    <hr>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-5 col-sm-5">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="visible-xs">
                            <br>
                            <h1 class="eccomerce text-center">APARTMENT RENTALS</h1>
                            <p class="text-muted text-right text-justify">List your apartment or B&B rental and can showcase multiple listings. You can manage all your bookings from a single dashboard. List your images, amenities, available dates, and policies. Charge for cleaning and service fees separately.
                            </p>

                        </div>
                        <div class="mt-top"></div>
                        <img src="https://loggedinapp.com/home/images/mobiles/Untitled-1.png" class="img-responsive">
                    </div>
                </div>
            </div>

            <div class="col-lg-5 col-lg-offset-2 col-md-5 col-md-offset-2 col-sm-6 col-sm-offset-1 hidden-xs">
                <div class="mt-top pd-top"></div><br><br>
                <h1 class="eccomerce text-center pull-right">APARTMENT RENTALS</h1>
                <div class="row">
                    <div class="col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-2">
                        <br>
                        <p class="text-muted text-right text-justify">List your apartment or B&B rental and can showcase multiple listings. You can manage all your bookings from a single dashboard. List your images, amenities, available dates, and policies. Charge for cleaning and service fees separately.
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <br>

    <br>
    <hr>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-lg-5  col-md-5 col-sm-5">
                <div class="mt-top"></div><br><br>
                <h1 class="eccomerce">CONSULTANT</h1>
                <div class="row">
                    <div class="col-md-10 col-md-offset-">
                        <br>
                        <p class="text-muted  text-justify">
                            Charge per minute for your time on the phone without the hassle of invoicing. Client gets connected with a single click. You can view the client's details that called. LoggedIn provides call masking so your clients dont see your real number. Dedicated deep-linking to your profile to easily share with your clients. You can set your own rate per minute. Call history will provide the complete history of your call with a client. Calls are automatically billed after the call ends. Client needs a valid card on file to place a call. You can know who's calling with preloaded caller IDs via the app.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-lg-offset-2 col-md-5 col-sm-5 col-sm-offset-2">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="mt-top"></div>
                        <img src="https://loggedinapp.com/home/images/mobiles/consultant.png" class="img-responsive">
                    </div>
                </div>
            </div>

        </div>
    </div>
    <br>
    <br>
    <hr id="featurse">
    <br>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-5 col-sm-5">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">

                        <div class="visible-xs">
                            <h1 class="eccomerce text-right">EXTENSIONS</h1>
                            <br>
                            <p class="text-muted text-right text-justify">
                                Create a visual IVR with unlimited extensions for your call center. Display a call tree with unlimited departments and extensions. LoggedIn allows your customers to call any extension directly from the app using a regular phone to phone calls.
                            </p>
                        </div>
                        <div class="mt-top"></div>
                        <img src="https://loggedinapp.com/home/images/mobiles/extensions.png" class="img-responsive">
                    </div>
                </div>
            </div>

            <div class="col-lg-5 col-lg-offset-2 col-md-5 col-md-offset-2 col-sm-5 col-sm-offset-2 hidden-xs">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="mt-top pd-top"></div><br><br><br>

                        <h1 class="eccomerce text-right">EXTENSIONS</h1>
                        <br>
                        <p class="text-muted text-right text-justify">
                            Create a visual IVR with unlimited extensions for your call center. Display a call tree with unlimited departments and extensions. LoggedIn allows your customers to call any extension directly from the app using a regular phone to phone calls.
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <br>
    <br>
    <hr>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-lg-5  col-md-5 col-sm-5">
                <div class="mt-top"></div><br><br>
                <h1 class="eccomerce">FORMS</h1>
                <div class="row">
                    <div class="col-md-10 col-md-offset-">
                        <br>
                        <p class="text-muted  text-justify">
                            You can create unlimited forms with our easy drag and drop form builder. Keep forms simple and short. LoggedIn instantly shares customer's name, email and phone number so you don't have to ask for it. Dropdowns, Radio Buttons, File Upload, Option Toggle, Star Ratings, Checkboxes, Help Text, Required Fields etc. You can list multiple forms and can allow or limit future edits or more than one entry per customer. Get a proper signature from your customer.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-lg-offset-2 col-md-5 col-sm-5 col-sm-offset-2">
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <div class="mt-top"></div>
                        <img src="https://loggedinapp.com/home/images/mobiles/forms.png" class="img-responsive">
                    </div>
                </div>
            </div>

        </div>
    </div>
    <br>
    <br>
    <hr>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-sm-5">
                <div class="row">
                    <div class=" col-lg-12">
                        <div class="mt-top"></div>
                        <div class="visible-xs">
                            <h1 class="eccomerce text-right">CHATS</h1>
                            <br>
                            <p class="text-muted text-right text-justify">
                                Live chat with your customers inside the app. Real-time notifications. Chat allows Image and document sharing. Chat with your customers from a desktop computer or your cell phone. Instantly see your customer appear in your chat when an order or booking is placed.
                            </p>
                        </div>
                        <div class="mt-top"></div>
                        <img src="https://loggedinapp.com/home/images/mobiles/chat.png" class="img-responsive">
                    </div>
                </div>
            </div>

            <div class="col-lg-5 col-lg-offset-2 col-sm-5 col-sm-offset-2 hidden-xs">
                <div class="row">
                    <div class="col-md-10 col-md-offset-2">
                        <div class="mt-top pd-top"></div><br><br><br>
                        <h1 class="eccomerce text-right">CHATS</h1>
                        <br>
                        <p class="text-muted text-right text-justify">
                            Live chat with your customers inside the app. Real-time notifications. Chat allows Image and document sharing. Chat with your customers from a desktop computer or your cell phone. Instantly see your customer appear in your chat when an order or booking is placed.
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <br id="fees">
    <br>
    <br>
    <hr><br>
    <!-- fees section -->
    <div class="container-fluid">
        <div class="container">
            <h1 class="text-center fees">FEES</h1><br>
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <p class="text-center"><img src="https://loggedinapp.com/home/images/icons/fees/fees1.png"></p>
                    <p class="text-center">No monthly<br>fees.</p>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-3">
                    <p class="text-center"><img src="https://loggedinapp.com/home/images/icons/fees/fees2.png"></p>
                    <p class="text-center">No sign-up<br>fees.</p>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-3">
                    <p class="text-center"><img src="https://loggedinapp.com/home/images/icons/fees/fees3.png"></p>
                    <p class="text-center">No credit card<br>needed.</p>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-3">
                    <p class="text-center"><img src="https://loggedinapp.com/home/images/icons/fees/fees4.png"></p>
                    <p class="text-center">Cancel<br>anytime.</p>
                </div>

            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <!-- fees section -->






    <!-- xs-screen-hidden-section only visiable in xs start-->
    <div class="container visible-xs">
        <h1 class="text-center fees">LoggedIn Fees Per Transaction*</h1><br>
        <div class="row">
            <div class="col-xs-3"></div>
            <div class="col-xs-9"></div>
        </div>
        <br>
        <div class="row">
            <div class="col-xs-9">
                <span class="transection">Booking, Shopping & Invoices</span>
            </div>
            <div class="col-xs-3">
                <p class="transection">$0.50</p>
            </div>
        </div>
        <hr>
        <br>
        <div class="row">
            <div class="col-xs-9">
                <span class="transection">Apartment Rentals</span>
            </div>
            <div class="col-xs-3">
                <p class="transection">3%</p>
                
            </div>
        </div>
        <hr>
        <br>
        <div class="row">
            <div class="col-xs-9">
                <span class="transection">Restaurants</span>
            </div>
            <div class="col-xs-3">
                <p class="transection">5%</p>
            </div>
        </div>
        <hr>
        <br>
        <div class="row">
            <div class="col-xs-6">
                <span class="transection">Consultants</span>
            </div>
            <div class="col-xs-6">
                <p class="transection">3% (+$0.022 per minute calling charges)</p>
            </div>
        </div>
        <hr>
        <br>
        <div class="row">
            <div class="col-xs-6">
                <span class="transection">Booking (pay in person or cash)</span>
            </div>
            <div class="col-xs-6">
                <p class="transection">Free (Promotional)</p>
                
            </div>
        </div>
        <hr>
        <br>
         <div class="row">
            <div class="col-xs-6">
                <span class="transection">Forms</span>
            </div>
            <div class="col-xs-6">
                <p class="transection">Free</p>
                
            </div>
        </div>
        <br>
        <hr>
         <div class="row">
            <div class="col-xs-6">
                <span class="transection">Extensions</span>
            </div>
            <div class="col-xs-6">
                <p class="transection">Free</p>
                
            </div>
        </div>
        <hr>
        <br>
        <div class="row">
            <div class="col-lg-11 col-lg-offset-1 col-md-11 col-md-offset-1 col-sm-12">
                <p class=" text-muted" style="font-size: 18px;margin: 5% 0% 5% 0%;">*In addition to standard Stripe credit card fees of 2 9% + $0.30 per transaction </p>
            </div>
        </div>
        <br>
    </div>
    <!-- xs-screen-hidden-section only visiable in xs close -->


    <!-- loggdein fees par transsfer -->
    <div class="container hidden-xs">
        <h1 class="text-center fees">LoggedIn Fees Per Transaction*</h1><br>

        <div class="row">
            <div class="col-lg-4 col-lg-offset-1 col-md-4 col-md-offset-1 col-sm-6 col-xs-9">

                <span>
                    <img src="https://loggedinapp.com/home/images/icons/fees/bullet.png"></span>&nbsp;&nbsp;<span class="transection">Booking, Shopping & Invoices</span>
            </div> <!-- col-lg-4 -->

            <div class="col-lg-3 col-md-2  col-sm-1">

                <p class=" text-center"><img src="https://loggedinapp.com/home/images/icons/fees/arrow.png"></p>
            </div>


            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-3">
                <p class="transection">$0.50</p>
            </div>

        </div>
        <br>
        <div class="row">
            <div class="col-lg-4 col-lg-offset-1 col-md-4 col-md-offset-1 col-sm-6 co-xs-4">

                <span><img src="https://loggedinapp.com/home/images/icons/fees/bullet.png"></span>&nbsp;&nbsp;<span class="transection">Apartment Rentals</span>
            </div> <!-- col-lg-4 -->

            <div class="col-lg-3 col-md-2  col-sm-1">

                <p class=" text-center"><img src="https://loggedinapp.com/home/images/icons/fees/arrow.png"></p>

            </div>


            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-3">
                <p class="transection">3%</p>
            </div>

        </div>
        <br>
        <div class="row">
            <div class="col-lg-4 col-lg-offset-1 col-md-4 col-md-offset-1 col-sm-6">
                <span><img src="https://loggedinapp.com/home/images/icons/fees/bullet.png"></span>&nbsp;&nbsp;<span class="transection">Restaurants</span>
            </div> <!-- col-lg-4 -->

            <div class="col-lg-3 col-md-2  col-sm-1">

                <p class=" text-center"><img src="https://loggedinapp.com/home/images/icons/fees/arrow.png"></p>

            </div>


            <div class="col-lg-4 col-md-4 col-sm-4">
                <p class="transection">5%</p>
            </div>

        </div>

        <br>
        <div class="row">
            <div class="col-lg-4 col-lg-offset-1 col-md-4 col-md-offset-1 col-sm-6">
                <span><img src="https://loggedinapp.com/home/images/icons/fees/bullet.png"></span>&nbsp;&nbsp;<span class="transection">Consultants</span>
            </div> <!-- col-lg-4 -->

            <div class="col-lg-3 col-md-2  col-sm-1">

                <p class=" text-center"><img src="https://loggedinapp.com/home/images/icons/fees/arrow.png"></p>

            </div>


            <div class="col-lg-4 col-md-5 col-sm-5">
                <p class="transection">3% (+$0.022 per minute calling charges)</p>
            </div>

        </div>

        <br>
        <div class="row">
            <div class="col-lg-4 col-lg-offset-1 col-md-4 col-md-offset-1 col-sm-6">
                <span><img src="https://loggedinapp.com/home/images/icons/fees/bullet.png"></span>&nbsp;&nbsp;<span class="transection">Booking (pay in person or cash)</span>
            </div> <!-- col-lg-4 -->

            <div class="col-lg-3 col-md-2  col-sm-1">

                <p class=" text-center"><img src="https://loggedinapp.com/home/images/icons/fees/arrow.png"></p>

            </div>


            <div class="col-lg-4 col-md-4 col-sm-4">
                <p class="transection">Free (Promotional)</p>
            </div>

        </div>
        <br>
        <div class="row">
            <div class="col-lg-4 col-lg-offset-1 col-md-4 col-md-offset-1 col-sm-6">
                <span><img src="https://loggedinapp.com/home/images/icons/fees/bullet.png"></span>&nbsp;&nbsp;<span class="transection">Forms</span>
            </div> <!-- col-lg-4 -->

            <div class="col-lg-3 col-md-2  col-sm-1">

                <p class=" text-center"><img src="https://loggedinapp.com/home/images/icons/fees/arrow.png"></p>

            </div>


            <div class="col-lg-4 col-md-4 col-sm-4">
                <p class="transection">Free</p>
            </div>

        </div>
        <br>
        <div class="row">
            <div class="col-lg-4 col-lg-offset-1 col-md-4 col-md-offset-1 col-sm-6">
                <span><img src="https://loggedinapp.com/home/images/icons/fees/bullet.png"></span>&nbsp;&nbsp;<span class="transection">Extensions</span>
            </div> <!-- col-lg-4 -->

            <div class="col-lg-3 col-md-2  col-sm-1">

                <p class=" text-center"><img src="https://loggedinapp.com/home/images/icons/fees/arrow.png"></p>

            </div>

            <div class="col-lg-4 col-md-4 col-sm-4">
                <p class="transection center">Free</p>
            </div>

        </div>
        <br>
        <br>
        <div class="row">
            <div class="col-lg-11 col-lg-offset-1 col-md-11 col-md-offset-1 col-sm-12">
                <p class=" text-muted" style="font-size: 18px;margin: 5% 0% 5% 0%;">*In addition to standard Stripe credit card fees of 2 9% + $0.30 per transaction </p>
            </div>
        </div>



    </div>
    <!-- loggdein fees par transsfer -->




    <div class="container-fluid slider-bg">
        <br>
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center download">Download the app now!</h1>
            </div>

            <div class="col-lg-4 col-lg-offset-4 col-sm-9 col-sm-offset-3 col-md-4 col-md-offset-4">
                <br>
                <div class="row">
                    <div class="col-lg-5 b1 col-lg-offset-1 col-md-5 col-md-offset-2 col-sm-4">

                        <a href="#"><img src="https://loggedinapp.com/home/images/buttons/appstore-new.png" class="img-responsive"></a>

                    </div>

                    <div class="xs-mt col-lg-5 b1 col-md-5 col-sm-4">

                        <a href="https://play.google.com/store/apps/details?id=com.mmf.loggedinuserapp">
                            <img src="https://loggedinapp.com/home/images/buttons/playstore.png" class="img-responsive"></a>

                    </div>
                </div>


            </div>

        </div>
        <br>
        <h5 class="white-text text-center">All Rights Reserved.Loggedin Corp.</h5>
    </div>


    <script>
        // smooth scrolling code
        function scrollNav() {
            $('.nav a').click(function() {
                $('html, body').stop().animate({
                    scrollTop: $($(this).attr('href')).offset().top
                }, 1300);
                return false;
            });
            $('.scrollTop a').scrollTop();
        }
        scrollNav();
        // smooth scrolling code



        // navbar under line code
        $(document).ready(function() {
            $('ul.nav > li > a').click(function(e) {
                e.preventDefault();
                $('ul.nav > li > a').removeClass('active');
                $(this).addClass('active');
            });
        });
        // navbar under line code

    </script>


</body>

</html>
