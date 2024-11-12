<footer id="footer" class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="full">
                    <div class="footer-widget">
                        <div class="footer-logo">
                            <a href="{{ url_for('home')}}"><img src="static/images/footer-logo.png" alt="#" /></a>
                        </div>
                        <p>Most of our events have hard and easy route choices as we are always keen to encourage new
                            riders.</p>
                        <ul class="social-icons style-4 pull-left">
                           <li><a class="google" href="https://www.google.com/search?q=live+cricket+score+today+match&client=firefox-b-d&sca_esv=b955b71599dc035d&sxsrf=ADLYWILfYC_qLHuwI-x4TmEwmH5cG0HzYw%3A1730876090764&ei=uhIrZ9GuLtCXnesP19nF6Qk&ved=0ahUKEwjR86j0j8eJAxXQS2cHHddsMZ0Q4dUDCA8&uact=5&oq=live+cricket+score+today+match&gs_lp=Egxnd3Mtd2l6LXNlcnAiHmxpdmUgY3JpY2tldCBzY29yZSB0b2RheSBtYXRjaDIKEAAYsAMY1gQYRzIKEAAYsAMY1gQYRzIKEAAYsAMY1gQYRzIKEAAYsAMY1gQYRzIKEAAYsAMY1gQYRzIKEAAYsAMY1gQYRzIKEAAYsAMY1gQYRzINEAAYgAQYsAMYQxiKBTINEAAYgAQYsAMYQxiKBTINEAAYgAQYsAMYQxiKBUi-BVAAWABwAXgBkAEAmAEAoAEAqgEAuAEDyAEAmAIBoAIOmAMAiAYBkAYKkgcBMaAHAA&sclient=gws-wiz-serp"><i class="fa fa-google"></i></a></li>
                            <li><a class="twitter" href="https://x.com/icclive"><i class="fa fa-twitter"></i></a></li>
                            <li><a class="youtube" href="https://www.youtube.com/results?search_query=live+cricket+match+today+"><i class="fa fa-youtube-play"></i></a></li>
                            <li><a class="pinterest" href="https://in.pinterest.com/crikmore/live-cricket-score/"><i class="fa fa-pinterest-p"></i></a></li>
                        </ul>
                        <ul class="footer-login">
                            <li class="login-modal">
                                <a href="{{ url_for('login') }}" class="login-link">Login</a>
                            </li>
                            <li>
                                <div class="cart-option">
                                   <a href="{{ url_for('register') }}" class="register-link">Register</a> 
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="full">
                    <div class="footer-widget">
                        <h3>Menu</h3>
                        <ul class="footer-menu">
                            <li><a href="{{ url_for('about')}}">About Us</a></li>
                            <li><a href="{{ url_for('team')}}">categories</a></li>
                            <li><a href="{{ url_for('news')}}">favorites</a></li>
                            <li><a href="{{ url_for('home')}}">gallery</a></li>
                            <li><a href="{{ url_for('contact')}}">contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="full">
                    <div class="footer-widget">
                        <h3>Contact us</h3>
                        <ul class="address-list">
                            <li><i class="fa fa-map-marker"></i> Lorem Ipsum is simply dummy text of the printing..</li>
                            <li><i class="fa fa-phone"></i> 123 456 7890</li>
                            <li><i style="font-size:20px;top:5px;" class="fa fa-envelope"></i>shankar</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- <div class="col-md-3">
                <div class="full">
                   <div class="contact-footer">
                      <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d120615.72236587871!2d73.07890527988283!3d19.140910987164396!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1527759905404" width="600" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
                   </div>
                </div>
             </div> -->
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <p>Copyright © 2024 wallpaper. All rights reserved.</p>
        </div>
    </div>
    <button id="backToTop" onclick="wallpaper()">
        <i class="fa fa-arrow-up"></i>
    </button>
</footer>
