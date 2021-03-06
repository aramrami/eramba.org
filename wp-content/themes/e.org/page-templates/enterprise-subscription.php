<?php // Template Name: Enterprise Subscriptions ?>
<?php
get_header();
?>

<div class="jumbo-box full-size light-blue">
	<div class="container">
		<div class="row align-row vertical-align-row">
			<div class="col-sm-7 text-wrapper">

				<p class="partnerships-text">
		Eramba comes in two versions, <b>community</b> which you can download for free but includes no support other than our public documentation 
		and our <b>enterprise version</b>, which
		includes additional features, regular updates and support from the core team.
				</p>
                <p class="partnerships-text small">
		The income generated by these services is what keeps the project alive and GRC affordable for everyone - <a href="http://www.eramba.org/about/">learn more about us</a>.
                </p>
			</div>
			<div class="col-sm-5 text-center img-wrapper full-size">
				<img src="<?php echo do_shortcode('[img]'); ?>enterprise-services.png" alt="">
			</div>
		</div>
	</div>
</div>
<div class="container">
    <h2 class="text-center margin-top-40 margin-bottom-40">
        <strong>Enterprise Subscription Package</strong>
    </h2>
    <div class="row align-row">
        <div class="col-sm-4">
            <div class="doc-box doc-box-alt doc-box-partnerships doc-box-plus align-col">
                <div class="doc-box-img">
                    <img src="<?php echo do_shortcode('[img]'); ?>enterprise-icons/shield-colored.png" alt="">
                </div>
                <div class="doc-box-content">
                    <h4>Enterprise Release</h4>
                    <p>
			Includes our latest features and patches. In open-code format which you can deploy on-premises or cloud.
                    </p>
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="doc-box doc-box-alt doc-box-partnerships doc-box-plus align-col">
                <div class="doc-box-img">
                    <img src="<?php echo do_shortcode('[img]'); ?>enterprise-icons/installation.png" alt="">
                </div>
                <div class="doc-box-content">
                    <h4>Install Assistance</h4>
                    <p>
			If Linux is not your thing - as an enterprise customer you will get remote assistance to install and update eramba.
                    </p>
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="doc-box doc-box-alt doc-box-partnerships align-col">
                <div class="doc-box-img">
                    <img src="<?php echo do_shortcode('[img]'); ?>enterprise-icons/training.png" alt="">
                </div>
                <div class="doc-box-content">
                    <h4>Online Q&A</h4>
                    <p>
			We expect customers to learn eramba using our detailed documentation and on top of it every month or so we run online, instructor led Q&A sessions aimed at helping clarify any outstanding issue, question or problem.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="row align-row">
        <div class="col-sm-4">
            <div class="doc-box doc-box-alt doc-box-partnerships doc-box-plus align-col">
                <div class="doc-box-img">
                    <img src="<?php echo do_shortcode('[img]'); ?>enterprise-icons/support.png" alt="">
                </div>
                <div class="doc-box-content">
                    <h4>Support</h4>
                    <p>
			Questions? Bug Reports? Feature Requests? We offer unlimited email support to help you get going with eramba.
                    </p>
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="doc-box doc-box-alt doc-box-partnerships align-col">
                <div class="doc-box-img">
                    <img src="<?php echo do_shortcode('[img]'); ?>enterprise-icons/upgrades.png" alt="">
                </div>
                <div class="doc-box-content">
                    <h4>Software Updates</h4>
                    <p>
			While community users get one update a year, as an enterprise customer you will get monthly updates with features and bug resolutions.
                    </p>
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="doc-box doc-box-alt align-col">
                <div class="doc-box-content">
                    <div class="box-jumbo margin-top-10 margin-bottom-20">
                        <strong>2500 EUR</strong> or
                        <strong>3000 USD / Year</strong>
                    </div>
                    <a href="http://www.eramba.org/resources/bugs-features/" class="btn btn-blue width-90">Buy</a>
                </div>
            </div>
        </div>
    </div>
</div>

<hr>

<div class="container">
    <h2 class="text-center margin-top-20 margin-bottom-40">
        <strong>Optional Services</strong>
    </h2>
    <div class="row align-row">
        <div class="col-sm-offset-2 col-sm-4">
            <div class="doc-box doc-box-alt doc-box-partnerships align-col">
                <div class="doc-box-img">
                    <img src="<?php echo do_shortcode('[img]'); ?>enterprise-icons/upgrades.png" alt="">
                </div>
                <div class="doc-box-content">
                    <h4>Starters Assistance</h4>
                    <p>
                        We help you get started with eramba - we create risk, controls, policies together until you feel confortable to go alone. We bill this service per hour at our standard consulting rate. See our <a href="https://docs.google.com/document/d/1FTAG1vMDhNXJXySLBgvore60zhcObKhAievBk3rCOdA/edit#heading=h.qfjnzpxbfenq">FAQ</a>
                    </p>
                    <br>
                    <h2><b>80 EUR / Hour</b></h2>
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="doc-box doc-box-alt doc-box-partnerships align-col">
                <div class="doc-box-img">
                    <img src="<?php echo do_shortcode('[img]'); ?>blackboard.png" alt="">
                </div>
                <div class="doc-box-content">
                    <h4>Onsite Workshops</h4>
                    <p>
                        We travel to your offices for four days tailor made workshop to training and configure your eramba instance. Travel expenses are billed separately. See our <a href="https://docs.google.com/document/d/1FTAG1vMDhNXJXySLBgvore60zhcObKhAievBk3rCOdA/edit#heading=h.ovs2krb4amke">FAQ</a>
                    </p>
                    <br>
                    <h2><b>Starts at 3000 EUR</b></h2>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(function(){
        function alignCols() {
            $('.align-row').each(function() {
                var height = 0;
                $(this).find('.align-col').each(function() {
                    if ($(this).height() > height) {
                        height = $(this).height();
                    }
                });
                $(this).find('.align-col').height(height);
            });
        }

        $(window).on("load", function($) {
            alignCols();
        });

    });
</script>
<?php get_footer(); ?>
