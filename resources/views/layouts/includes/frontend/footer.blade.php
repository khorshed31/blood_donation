<footer id="footer">

    <div class="container">

        <div class="row">
            <div class="col-md-5">
                <div class="footer-widget">
                    <div class="footer-logo">
                        <a href="index-2.html" class="logo"><img src="img/logo.png" alt=""></a>
                    </div>
                    <ul class="footer-nav">
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Advertisement</a></li>
                    </ul>
                    <div class="footer-copyright">
<span>&copy;
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://khorshed31.github.io/portfolio/" target="_blank">Khorshed Alom</a>
</span>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-6">
                        <div class="footer-widget">
                            <h3 class="footer-title" style="color: white">About Us</h3>
                            <ul class="footer-links">
                                <li><a href="about.html">About Us</a></li>
                                <li><a href="#">Join Us</a></li>
                                <li><a href="contact.html">Contacts</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="footer-widget">
                            <h3 class="footer-title" style="color: white">Catagories</h3>
                            <ul class="footer-links">
                                <li><a href="category.html">Web Design</a></li>
                                <li><a href="category.html">JavaScript</a></li>
                                <li><a href="category.html">Css</a></li>
                                <li><a href="category.html">Jquery</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="footer-widget">
                    <h3 class="footer-title" style="color: white">Join our Newsletter</h3>
                    <div class="footer-newsletter">
                        <form method="post" id="validateForm">
                            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                            <input class="input" type="email" name="email" id="subscribe-email"
                                   placeholder="Enter your email" validate="email" required>
                            <button type="submit" class="newsletter-btn subscribe-submit" ><i class="fa fa-paper-plane"></i></button>
                        </form>
                    </div>
                    <ul class="footer-social">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>

    </div>

</footer>
