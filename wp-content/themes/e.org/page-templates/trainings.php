<?php // Template Name: Trainings ?>
<?php
get_header();

// remove_filter('the_content', 'wpautop');
// remove_filter('the_content', 'wpautop', 12);
global $wp;
$current_url = home_url(add_query_arg(array(),$wp->request));
?>
<?php if (!empty($_GET['training_id'])) : ?>

    <div class="container">
        <div class="row">
            <br> <br> 
            <div class="col-xs-8">
                
                <?php
                echo do_shortcode('[contact-form-7 id="' . $_GET['training_id'] .  '" title="Register"]');
                ?>

            </div>
            <div class="col-xs-4">
                <?php get_template_part( 'element', 'content-sidebar' ); ?>
            </div>
        </div>
    </div>

<?php else: ?>

    <div class="blue-color-wrapper training">
        <div class="container">
            <div class="row">
                <div class="col-xs-7">
                    <h2>Trainings for the community</h2>
                    <p>
                        <span class="larger-text">
                            We offer a packaged yearly support service that includes installation, training, immediate patch resolutions and features not necessarily published on the community version at extremely affordable prices. With the help of our global partners, we also provide customisation and consulting services.
                        </span>
                    </p>
                    <p>
                        <strong>The income generated from these services is what keeps this project alive. We re-invest %100 into the project and we have no intention to become yet another GRC company.</strong>
                    </p>
                </div>
                <div class="col-xs-5 static">
                    <p><img class="training-img alignnone" src="<?php echo do_shortcode('[img]'); ?>blackboard.png" alt=""></p>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <h4 class="margin-top-30"><strong>Schedule of trainings</strong></h4>
        <table class="table table-padded margin-bottom-20">
            <thead>
                <tr class="info">
                    <th>
                        Course
                    </th>
                    <th>
                        Description
                    </th>
                    <th>
                        Date
                    </th>
                    <th>
                        Price
                    </th>
                    <th>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr class="active">
                    <td>
                        XSS Filters for some of our fields
                    </td>
                    <td>
                        Lorem ipsum dolor sit amet, mesu nis aliquam.
                    </td>
                    <td>
                        7/7/2016
                    </td>
                    <td>
                        <strong>189 &euro;</strong>
                    </td>
                    <td>
                        <a href="<?php echo $current_url; ?>?training_id=1" class="btn btn-primary btn-wide">Register</a>
                    </td>
                </tr>
                <tr class="active">
                    <td>
                        XSS Filters for some of our fields
                    </td>
                    <td>
                        Lorem ipsum dolor sit amet, mesu nis aliquam.
                    </td>
                    <td>
                        7/7/2016
                    </td>
                    <td>
                        <strong>189 &euro;</strong>
                    </td>
                    <td>
                        <a href="<?php echo $current_url; ?>?training_id=1" class="btn btn-primary btn-wide">Register</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <hr>

    <div class="container">
        <h2 class="margin-top-10 margin-bottom-30">Questions &amp; Answers</h2>
        <div class="row">
            <div class="col-xs-6">
                <p><strong>Who are you?</strong></p>
                <p>We are a group of 10 to 15 people from all around the world that works on this project at our free time. Back in 2011, We built an open GRC solution and these services provide the funding we need to keep going. Legally speaking, we are a limited company in the UK.</p>
            </div>
            <div class="col-xs-6">
                <p><strong>Why do you charge?</strong></p>
                <p>Because the project needs fundings (in the range of tens of thousands) to pay developers, testers, security, audit, compliance, risk professionals that helps us putting all this together. You can use all our documentation and software (which you are free to modify as long as you dont redistribute it) for free.</p>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-xs-6">
                <p><strong>Do you provide consulting in PCI, ISO, Etc?</strong></p>
                <p>We have experience but we try to stay away from consulting as it's not our focus. Our idea is to deliver GRC software for free or in the worst scenario, at the best possible fee and to achieve this our focus needs to be the community, the product and its documentation.</p>
            </div>
            <div class="col-xs-6">
                <p><strong>I'm using the community version, can I upgrade?</strong></p>
                <p>Typically yes, it depends which version you are running. Contact us for to validate how we could make it work.</p>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-xs-6">
                <p><strong>How do we pay?</strong></p>
                <p>Credit cards or Bank Transfers, <a href="http://www.eramba.org/payments">details</a> here</p>
            </div>
            <div class="col-xs-6">
                <p><strong>I'm interested but i still have questions...</strong></p>
                <p>Use our form and contact us!</p>
            </div>
        </div>
        <div class="text-center margin-top-50 margin-bottom-20">
            <a href="#" class="btn btn-primary btn-lg btn-wide">Contact us</a>
        </div>
    </div>

<?php endif; ?>

<?php get_footer(); ?>
