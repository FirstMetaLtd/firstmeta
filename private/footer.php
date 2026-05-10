<footer class="footer-area footer-bg">
    <div class="container">
        <div class="footer-top pt-100 pb-70">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="footer-widget">
                        <p>
                            FirstMeta Ltd (RC:1933162) is a Limited Liability Company registered in Nigeria.
                        </p>
                        <div class="footer-call-content">
                            <h3>Talk to Our Support</h3>
                            <span><a href="tel:+2347045031717">+234 704 503 1717<br> +234 703 241 1341</a></span>
                            <i class='bx bx-headphone'></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="footer-widget pl-2">
                        <h3>Services</h3>
                        <ul class="footer-list">
                            <?php foreach($gerservices as $ser):?>
                            <li>
                                <a href="<?=$baseurl;?>service/<?=$ser->slug;?>" >
                                    <i class='bx bx-chevron-right'></i> <?=$ser->title;?>
                                </a>
                            </li>
                            <?php endforeach;?>


                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="footer-widget pl-2">
                        <h3>Our Products</h3>
                        <ul class="footer-list">
                            <?php foreach($getproducts as $p):?>
                            <li>
                                <a href="<?=$baseurl;?>product/<?=$p->slug;?>">
                                    <i class='bx bx-chevron-right'></i> <?=$p->title;?>
                                </a>
                            </li>
                           <?php endforeach;?>

                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                        <div class="footer-widget pl-2">
                            <h3>Links</h3>
                            <ul class="footer-list">

                            <li>
                                    <a href="<?=$baseurl;?>about">
                                        <i class='bx bx-chevron-right'></i>About us
                                    </a>
                                </li>


                                <li>
                                    <a href="<?=$baseurl;?>team">
                                        <i class='bx bx-chevron-right'></i> Our Team
                                    </a>
                                </li>

                                <li>
                                    <a href="<?=$baseurl;?>career">
                                        <i class='bx bx-chevron-right'></i>Career
                                    </a>
                                </li>
                            
                                <li>
                                    <a href="<?=$baseurl;?>privacy-policy">
                                        <i class='bx bx-chevron-right'></i> Privacy Policy
                                    </a>
                                </li>
                                
                                <li>
                                  
                                
                                        <a href="<?=$set->facebook_url;?>" target="_blank">
                                            <i class='bx bxl-facebook'></i>
                                   
                                        <a href="<?=$set->twitter_url;?>" target="_blank">
                                            <i class='bx bxl-twitter'></i>
                                        </a>
                                    
                                        <a href="<?=$set->linkedin_url;?>" target="_blank">
                                            <i class='bx bxl-linkedin-square'></i>
                                        </a>
                                    
                                        <a href="<?=$set->instagram_url;?>" target="_blank">
                                            <i class='bx bxl-instagram'></i>
                                        </a>
                                    
                                
                                </li>

                                
                            </ul>
                        </div>
                    </div>

            </div>
        </div>
        <div class="copy-right-area">
            <div class="copy-right-text">
                <p>
                    Copyright <script>
                    document.write(new Date().getFullYear())
                    </script> © FirstMeta | All Rights Reserved
                </p>
            </div>
        </div>
    </div>
</footer>


<script src="<?=$baseurl;?>assets/js/jquery.min.js"></script>

<script src="<?=$baseurl;?>assets/js/bootstrap.bundle.min.js"></script>

<script src="<?=$baseurl;?>assets/js/owl.carousel.min.js"></script>

<script src="<?=$baseurl;?>assets/js/jquery.magnific-popup.min.js"></script>

<script src="<?=$baseurl;?>assets/js/jquery.nice-select.min.js"></script>

<script src="<?=$baseurl;?>assets/js/wow.min.js"></script>

<script src="<?=$baseurl;?>assets/js/meanmenu.js"></script>

<script src="<?=$baseurl;?>assets/js/jquery.ajaxchimp.min.js"></script>

<script src="<?=$baseurl;?>assets/js/form-validator.min.js"></script>

<script src="<?=$baseurl;?>assets/js/contact-form-script.js"></script>

<script src="<?=$baseurl;?>assets/js/custom.js"></script>
</body>


</html>