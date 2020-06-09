@extends('layouts.final')
@section('content')
        <main class="main">
            <div class="page-header page-header-bg" style="background-image: url('/demo/assets/images/page-header-bg.jpg');">
                <div class="container">
                    <h1><span>ABOUT US</span>
                        OUR COMPANY</h1>
                   
                </div><!-- End .container -->
            </div><!-- End .page-header -->

            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb mt-0">
                        <li class="breadcrumb-item"><a href="/"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">About Us</li>
                    </ol>
                </div><!-- End .container -->
            </nav>

            <div class="about-section">
                <div class="container">
                    <h2 class="subtitle">OUR STORY</h2>
                    <p>DELVIER’S mission is to make it easy to do business anywhere around the world. We do this by providing suppliers with the tools necessary to reach a global audience for their products, as well as helping the buyers to find products and suppliers quickly and efficiently.

The company aims to build the future infrastructure of commerce. It envisions that its customers will meet, work, and have a life at DELVIER.
</p>
                    <p>One –stop Sourcing
DELVIER brings you various products in different major categories including consumer electronics, machinery, fashion, and apparel.
Buyers and suppliers located different countries and regions exchanging millions of messages each day.
</p>

                    <p class="lead">“As a platform, we continue to develop services to help businesses do more and discover new opportunities.
Whether it is sourcing from your mobile phone or contacting suppliers in their local languages, turn to DELVIER for all your global business needs.
”</p>
                </div><!-- End .container -->
            </div><!-- End .about-section -->

            <div class="features-section">
                <div class="container">
                    <h2 class="subtitle">WHY CHOOSE US</h2>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="feature-box">
                                <i class="icon-shipped"></i>

                                <div class="feature-box-content">
                                    <h3>Free Shipping</h3>
                                    <p></p>
                                </div><!-- End .feature-box-content -->
                            </div><!-- End .feature-box -->
                        </div><!-- End .col-lg-4 -->
                        
                        <div class="col-lg-4">
                            <div class="feature-box">
                                <i class="icon-us-dollar"></i>

                                <div class="feature-box-content">
                                    <h3>100% Money Back Guarantee</h3>
                                    <p></p>
                                </div><!-- End .feature-box-content -->
                            </div><!-- End .feature-box -->
                        </div><!-- End .col-lg-4 -->

                        <div class="col-lg-4">
                            <div class="feature-box">
                                <i class="icon-online-support"></i>

                                <div class="feature-box-content">
                                    <h3>Online Support 24/7</h3>
                                    <p></p>
                                </div><!-- End .feature-box-content -->
                            </div><!-- End .feature-box -->
                        </div><!-- End .col-lg-4 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .features-section -->

           

            <div class="counters-section">
                <div class="container">
                    <div class="row">
                        <div class="col-6 col-md-4 count-container">
                            <div class="count-wrapper">
                                <span class="count" data-from="0" data-to="200" data-speed="2000" data-refresh-interval="50">200</span>+
                            </div><!-- End .count-wrapper -->
                            <h4 class="count-title">MILLION CUSTOMERS</h4>
                        </div><!-- End .col-md-4 -->

                        <div class="col-6 col-md-4 count-container">
                            <div class="count-wrapper">
                                <span class="count" data-from="0" data-to="1800" data-speed="2000" data-refresh-interval="50">1800</span>+
                            </div><!-- End .count-wrapper -->
                            <h4 class="count-title">TEAM MEMBERS</h4>
                        </div><!-- End .col-md-4 -->

                        <div class="col-6 col-md-4 count-container">
                            <div class="count-wrapper">
                                <span class="count" data-from="0" data-to="24" data-speed="2000" data-refresh-interval="50">24</span><span>HR</span>
                            </div><!-- End .count-wrapper -->
                            <h4 class="count-title">SUPPORT AVAILABLE</h4>
                        </div><!-- End .col-md-4 -->

                        <div class="col-6 col-md-4 count-container">
                            <div class="count-wrapper">
                                <span class="count" data-from="0" data-to="265" data-speed="2000" data-refresh-interval="50">265</span>+
                            </div><!-- End .count-wrapper -->
                            <h4 class="count-title">SUPPORT AVAILABLE</h4>
                        </div><!-- End .col-md-4 -->

                        <div class="col-6 col-md-4 count-container">
                            <div class="count-wrapper">
                                <span class="count" data-from="0" data-to="99" data-speed="2000" data-refresh-interval="50">99</span><span>%</span>
                            </div><!-- End .count-wrapper -->
                            <h4 class="count-title">SUPPORT AVAILABLE</h4>
                        </div><!-- End .col-md-4 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .counters-section -->
        </main><!-- End .main -->

@endsection