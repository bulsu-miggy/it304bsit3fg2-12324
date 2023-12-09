
<!-- PHP INCLUDES -->

<?php

    include "connect.php";
    include "Includes/templates/header.php";
    include "Includes/templates/navbar.php";

?>

    <!-- HOME SECTION -->

    <section class="home-section" id="home-section">
    <div class="home-section-content">
        <img class="d-block w-100" src="Design/images/mainpage.jpg" alt="Title Shop">
        <div class="text-center" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
            <a href="appointment.php" class="default_btn">Make Appointment</a>
        </div>
    </div>
</section>



    <!-- ABOUT SECTION -->

    <section id="about" class="about_section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="about_content" style="text-align: center;">

                        <h2>The Ambassador<br>
                            Barbershop Salon & Tattoo<br>
                            Since 1953</h2>
                        <img src="Design/images/about-logo.png" alt="logo">
                        <p style="color: #777">
                        The Ambassador Classic Barbershop And Tattoo Co. is a vintage-themed
                         barber shop, salon, tattoo parlor, and antique store rolled into one.
                        Being the first Classic Barber, Salon and Tattoo shop in the Philippines,
                         this vintage-themed lifestyle hub offers traditional barbershop,
                          salon and tattoo services but also offers products like t-shirts, bike plates, and art canvases.
                        </p>
                    </div>
                </div>
                <div class="col-md-6  d-none d-md-block">
                    <div class="about_img" style = "overflow:hidden">
                        <img class="about_img_1" src="Design/images/about-1.jpg" alt="about-1">
                        <img class="about_img_2" src="Design/images/about-2.jpg" alt="about-2">
                        <img class="about_img_3" src="Design/images/about-3.jpg" alt="about-3">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SERVICES SECTION -->

    <section class="services_section" id="services">
    <div class="container">
        <div class="section_heading">
            <h2>Quality Services We Provide</h2>
            <div class="heading-line"></div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 padd_col_res">
                <div class="service_item">
                    <h4 class="service_title">Haircut</h4>
                    <p class="service_description">Get a stylish haircut from our experienced stylists.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 padd_col_res">
                <div class="service_item">
                    <h4 class="service_title">Hair Treatments</h4>
                    <p class="service_description">Our Expert stylists can rejuvenate and transform your looks 
                        with deep conditioning, botanical masks, keratin infusion, split end rehab, 
                        color-enhancing options, scalp renewal, and a customizable hair spa experience. </p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 padd_col_res">
                <div class="service_item">
                    <h4 class="service_title">Manicure and Pedicure</h4>
                    <p class="service_description">Pamper your hands and feet with our professional manicure services.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 padd_col_res">
                <div class="service_item">
                    <h4 class="service_title">Tattoo</h4>
                    <p class="service_description">Express yourself with unique and artistic tattoo designs.</p>
                </div>
            </div>
        </div>
    </div>
</section>


    <!-- MAKE APPOINTMENT SECTION -->
    <section class="book_section" id="booking">
    <div class="book_bg"></div>
    <div class="map_pattern"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-6">
                <form action="appointment.php" method="post" id="appointment_form" class="form-horizontal appointment_form">
                    <div class="book_content">
                        <h2 style="color: white;">Make an appointment</h2>
                        <p style="color: #999;">
                            Barber is a person whose occupation is mainly to cut dress groom
                            <br>style and shave men's and boys hair.
                        </p>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6 padding-10">
                            <label for="appointment_date" style="color: white;">Select Date:</label>
                            <input type="date" class="form-control" id="appointment_date" required>
                        </div>
                        <div class="col-md-6 padding-10">
                            <label for="appointment_time" style="color: white;">Select Time:</label>
                            <input type="time" class="form-control" id="appointment_time" required>
                        </div>
                    </div>

                    <!-- SUBMIT BUTTON -->

                    <button id="app_submit" class="default_btn" type="submit">
                        Make Appointment
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

    <!-- PRICING SECTION  -->

    <section class="pricing_section" id="pricing">

        <!-- START GET CATEGORIES  PRICES FROM DATABASE -->

            <?php

                $stmt = $con->prepare("Select * from service_categories");
                $stmt->execute();
                $categories = $stmt->fetchAll();

            ?>

        <!-- END -->

        <div class="container">
            <div class="section_heading">
                <h2>Our Services Pricing</h2>
                <div class="heading-line"></div>
            </div>
            <div class="row">
                <?php

                    foreach($categories as $category)
                    {
                        $stmt = $con->prepare("Select * from services where category_id = ?");
                        $stmt->execute(array($category['category_id']));
                        $totalServices =  $stmt->rowCount();
                        $services = $stmt->fetchAll();

                        if($totalServices > 0)
                        {
                        ?>

                            <div class="col-lg-4 col-md-6 sm-padding">
                                <div class="price_wrap">
                                    <h3><?php echo $category['category_name'] ?></h3>
                                    <ul class="price_list">
                                        
                                        <?php

                                            foreach($services as $service)
                                            {
                                                ?>

                                                    <li>
                                                        <h4><?php echo $service['service_name'] ?></h4>
                                                        <p><?php echo $service['service_description'] ?></p>
                                                        <span class="price"><?php echo $service['service_price'] ?></span>
                                                    </li>

                                                <?php
                                            }

                                        ?>
                                        
                                    </ul>
                                </div>
                            </div>

                        <?php
                        }
                    }

                ?>
                
            </div>
        </div>
    </section>

    <!-- CONTACT SECTION -->

    <section class="contact-section" id="contact-us">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 sm-padding">
                    <div class="contact-info">
                        <h2>
                            Get in touch with us & send us message!
                        </h2>
                        <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                            Aut assumenda quibusdam officia ratione blanditiis at aperiam? 
                            Necessitatibus dolorem perspiciatis soluta unde quas fugit, nostrum 
                            velit sequi? Vel tempore recusandae sed.
                        </p>
                        <h3>
                        Villares, Calumpit, Pio Cruzcosa, Bulacan.
                        </h3>
                        <h4>
                            <span style = "font-weight: bold">Email:</span> 
                            ambrsalonmanagement@gmail.com
                            <br> 
                            <span style = "font-weight: bold">Phone:</span> 
                            +63 09123456789
                            <br> 
                        </h4>
                    </div>
                </div>
                <div class="col-lg-6 sm-padding">
                    <div class="contact-form">
                        <div id="contact_ajax_form" class="contactForm">
                            <div class="form-group colum-row row">
                                <div class="col-sm-6">
                                    <input type="text" id="contact_name" name="name" class="form-control" placeholder="Name">
                                </div>
                                <div class="col-sm-6">
                                    <input type="email" id="contact_email" name="email" class="form-control" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <input type="text" id="contact_subject" name="subject" class="form-control" placeholder="Subject">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <textarea id="contact_message" name="message" cols="30" rows="5" class="form-control message" placeholder="Message"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <button id="contact_send" class="default_btn">Send Message</button>
                                </div>
                            </div>
                            <img src="Design/images/ajax_loader_gif.gif" id = "contact_ajax_loader" style="display: none">
                            <div id="contact_status_message"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- WIDGET SECTION / FOOTER -->

    <section class="widget_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                     <div class="footer_widget">
                        <h3>Location</h3>
                        <p>
                        Villares, Calumpit, Pio Cruzcosa, Bulacan
                        </p>
                        <p>
                        ambrsalonmanagement@gmail.com
                            <br>
                            (+63) 09123456789   
                        </p>
                     </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer_widget">
                        <h3>
                            Opening Hours
                        </h3>
                        <ul class="opening_time">
                            <li>Monday - Friday 7:00am - 8:00pm</li>
                            <li>Saturday - Sunday 7:00am - 9:00pm</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER  -->

    <?php include "Includes/templates/footer.php"; ?>