<?php // Template Name: Online Training ?>
<?php
get_header();
?>

<div class="jumbo-box full-size light-blue">
	<div class="container">
		<div class="row align-row vertical-align-row">
			<div class="col-sm-7 text-wrapper">
                <h3 class="margin-top-10">
                    <strong>
                        Get help from the core team
                    </strong>
                </h3>
				<p class="partnerships-text">
                    We offer a packaged yearly support service that includes installation,
                    training, immediate patch resolutions and features not necessarily published
                    on the community version at extremely affordable prices. With the help of
                    our global partners, we also provide customisation and consulting services.
				</p>
                <p class="partnerships-text small">
                    The income generated from these services is what keeps this project alive.
                    We re-invest %100 into the project and we have no intention to become yet another
                    GRC company.
                </p>
			</div>
			<div class="col-sm-5 text-center img-wrapper full-size">
				<img src="<?php echo do_shortcode('[img]'); ?>blackboard.png" alt="">
			</div>
		</div>
	</div>
</div>
<div class="container">
    <h2 class="margin-top-40">
        <strong>Online Training</strong>
    </h2>
    <p style="font-size: 14px; line-height: 26px">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam vel sagittis nibh, feugiat
        dictum mauris. Cras volutpat lorem eu nisi aliquam tristique. Praesent sagittis tristique
        magna posuere egestas. Morbi sit amet tincidunt lacus, at condimentum dui.
    </p>

    <h3 class="margin-top-30 margin-bottom-20">
        <strong>Schedule of trainings</strong>
    </h3>

    <?php
    $args = array(
        'post_type' => 'eramba_trainings',
        'orderby' => 'date',
        'order' => 'ASC',
        'post_status' => 'publish',
        'posts_per_page' => -1
    );

    $wp_query = new WP_Query($args);
    $index = 1;
    if ($wp_query->have_posts()) : ?>

        <table id="trainings-table" class="table margin-bottom-40">
            <thead>
                <th style="width: 30%"><?php echo __('Course', 'eramba') ?></th>
                <th style="width: 40%"><?php echo __('Description', 'eramba') ?></th>
                <th style="width: 10%"><?php echo __('Slots', 'eramba') ?></th>
                <th style="width: 10%"><?php echo __('Date', 'eramba') ?></th>
                <th style="width: 10%"><?php echo __('Price', 'eramba') ?></th>
            </thead>
            <tbody>

            <?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>

                <tr>
                    <td><a href="#<?php echo rwmb_meta('ERAMBA_url');?>"><?php the_title(); ?></a></td>
                    <td><?php the_content(); ?></td>
                    <td><?php echo rwmb_meta('ERAMBA_slots') ?></td>
                    <td><?php echo rwmb_meta('ERAMBA_date'); ?></td>
                    <td><b><?php echo rwmb_meta('ERAMBA_price') ?>&nbsp;&euro;</b></td>
                </tr>

                <?php $index++; ?>
            <?php endwhile; ?>

            </tbody>
        </table>

    <?php else : ?>

        <?php echo e_alert(__('We are currently working on the content.', 'eramba')); ?>

    <?php endif; ?>
</div>

<div class="text-center margin-bottom-40">
    <a id="contact-redirect" href="<?php echo get_page_link(BUGS_PAGE_ID); ?>" class="btn btn-danger btn-lg btn-wide">Contact us</a>
</div>
<hr>
<div class="container">
    <h3 id="controls-policies-risk" class="text-center margin-top-20">
        <strong>Controls, Policies & Risk</strong>
    </h3>
    <h4 class="doc-subtitle text-center margin-bottom-40">
		<span>Follow these guides to install and configure eramba</span>
	</h4>

    <div class="row align-row margin-bottom-40">
        <div class="col-sm-4">
			<div class="doc-box doc-box-alt doc-box-partnerships align-col">
				<div class="doc-box-img">
					<img src="<?php echo do_shortcode('[img]'); ?>/doc/controls.png" alt="">
				</div>
				<div class="doc-box-content">
					<h4>Controls & Audits</h4>
					<p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla
                        scelerisque eleifend sodales. Cum sociis natoque penatibus et magnis
                        dis parturient montes, nascetur ridiculus mus.
                    </p>
				</div>
			</div>
		</div>

        <div class="col-sm-4">
            <div class="doc-box doc-box-alt doc-box-partnerships align-col">
                <div class="doc-box-img">
                    <img src="<?php echo do_shortcode('[img]'); ?>/doc/document.png" alt="">
                </div>
                <div class="doc-box-content">
                    <h4>Policy Management</h4>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla
                        scelerisque eleifend sodales. Cum sociis natoque penatibus et magnis
                        dis parturient.
                    </p>
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="doc-box doc-box-alt doc-box-partnerships align-col">
                <div class="doc-box-img">
                    <img src="<?php echo do_shortcode('[img]'); ?>/doc/risk.png" alt="">
                </div>
                <div class="doc-box-content">
                    <h4>Risk Management</h4>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla
                        scelerisque eleifend sodales. Cum sociis natoque penatibus et magnis
                        dis parturient montes, nascetur ridiculus mus dis parturient montes.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <h3 id="controls-policies-compliance" class="text-center margin-top-20">
        <strong>Controls, Policies & Compliance</strong>
    </h3>

    <h4 class="doc-subtitle text-center margin-bottom-40">
        <span>Read this guide to understand how to get going with eramba</span>
    </h4>

    <div class="row align-row margin-bottom-40">
        <div class="col-sm-4">
			<div class="doc-box doc-box-alt doc-box-partnerships align-col">
				<div class="doc-box-img">
					<img src="<?php echo do_shortcode('[img]'); ?>/doc/controls.png" alt="">
				</div>
				<div class="doc-box-content">
					<h4>Controls & Audits</h4>
					<p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla
                        scelerisque eleifend sodales. Cum sociis natoque penatibus et magnis
                        dis parturient.
                    </p>
				</div>
			</div>
		</div>

        <div class="col-sm-4">
            <div class="doc-box doc-box-alt doc-box-partnerships align-col">
                <div class="doc-box-img">
                    <img src="<?php echo do_shortcode('[img]'); ?>/doc/document.png" alt="">
                </div>
                <div class="doc-box-content">
                    <h4>Policy Management</h4>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla
                        scelerisque eleifend sodales. Cum sociis natoque penatibus et magnis
                        dis parturient montes, nascetur ridiculus mus dis parturient montes.
                    </p>
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="doc-box doc-box-alt doc-box-partnerships align-col">
                <div class="doc-box-img">
                    <img src="<?php echo do_shortcode('[img]'); ?>/doc/calendar.png" alt="">
                </div>
                <div class="doc-box-content">
                    <h4>Compliance Management</h4>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla
                        scelerisque eleifend sodales. Cum sociis natoque penatibus et magnis
                        dis parturient montes, nascetur ridiculus mus.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <h3 id="controls-policies-data-flows" class="text-center margin-top-20">
        <strong>Controls, Policies & Data Flows</strong>
    </h3>

    <h4 class="doc-subtitle text-center">
        <span>Automate email notifications, reports, reminders and more</span>
    </h4>

    <div class="row align-row margin-bottom-40">
        <div class="col-sm-4">
			<div class="doc-box doc-box-alt doc-box-partnerships align-col">
				<div class="doc-box-img">
					<img src="<?php echo do_shortcode('[img]'); ?>/doc/controls.png" alt="">
				</div>
				<div class="doc-box-content">
					<h4>Controls & Audits</h4>
					<p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla
                        scelerisque eleifend sodales. Cum sociis natoque penatibus et magnis
                        dis parturient montes, nascetur ridiculus mus dis parturient montes.
                    </p>
				</div>
			</div>
		</div>

        <div class="col-sm-4">
            <div class="doc-box doc-box-alt doc-box-partnerships align-col">
                <div class="doc-box-img">
                    <img src="<?php echo do_shortcode('[img]'); ?>/doc/document.png" alt="">
                </div>
                <div class="doc-box-content">
                    <h4>Policy Management</h4>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla
                        scelerisque eleifend sodales. Cum sociis natoque penatibus et magnis
                        dis parturient montes, nascetur ridiculus mus.
                    </p>
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="doc-box doc-box-alt doc-box-partnerships align-col">
                <div class="doc-box-img">
                    <img src="<?php echo do_shortcode('[img]'); ?>/enterprise-icons/data-flow.png" alt="">
                </div>
                <div class="doc-box-content">
                    <h4>Compliance Management</h4>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla
                        scelerisque eleifend sodales. Cum sociis natoque penatibus et magnis
                        dis parturient.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <h3 id="awareness-trainings" class="text-center margin-top-20">
        <strong>Awareness Trainings</strong>
    </h3>

    <div class="row align-row margin-bottom-40">
        <div class="col-sm-6 col-sm-offset-3">
			<div class="doc-box doc-box-alt doc-box-partnerships align-col">
				<div class="doc-box-img">
					<img src="<?php echo do_shortcode('[img]'); ?>/doc/shield.png" alt="">
				</div>
				<div class="doc-box-content">
					<h4>Security Awareness</h4>
					<p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla
                        scelerisque eleifend sodales. Cum sociis natoque penatibus et magnis
                        dis parturient montes, nascetur ridiculus mus dis parturient montes.
                    </p>
				</div>
			</div>
		</div>
    </div>

    <h3 id="third-party-audits" class="text-center margin-top-20">
        <strong>Third Party Audits</strong>
    </h3>

    <div class="row align-row margin-bottom-40">
        <div class="col-sm-6 col-sm-offset-3">
			<div class="doc-box doc-box-alt doc-box-partnerships align-col">
				<div class="doc-box-img">
					<img src="<?php echo do_shortcode('[img]'); ?>/doc/suitcase.png" alt="">
				</div>
				<div class="doc-box-content">
					<h4>Vendor Assessments</h4>
					<p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla
                        scelerisque eleifend sodales. Cum sociis natoque penatibus et magnis
                        dis parturient montes, nascetur ridiculus mus.
                    </p>
				</div>
			</div>
		</div>
    </div>

    <h3 id="eramba-iso" class="text-center margin-top-20">
        <strong>Eramba & ISO</strong>
    </h3>

    <div class="row align-row margin-bottom-40">
        <div class="col-sm-6 col-sm-offset-3">
            <div class="doc-box doc-box-alt doc-box-partnerships align-col">
                <div class="doc-box-img">
                    <img src="<?php echo do_shortcode('[img]'); ?>iso.png" alt="">
                </div>
                <div class="doc-box-content">
                    <h4>ISO 27001 Guide</h4>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla
                        scelerisque eleifend sodales. Cum sociis natoque penatibus et magnis
                        dis parturient montes, nascetur ridiculus mus dis parturient montes
                        sociis natoque penatibus et magnis.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <h3 id="eramba-pci" class="text-center margin-top-20">
        <strong>Eramba & PCI</strong>
    </h3>

    <div class="row align-row margin-bottom-40">
        <div class="col-sm-6 col-sm-offset-3">
            <div class="doc-box doc-box-alt doc-box-partnerships align-col">
                <div class="doc-box-img">
                    <img src="<?php echo do_shortcode('[img]'); ?>pci.png" alt="">
                </div>
                <div class="doc-box-content">
                    <h4>PCI-DSS Guide</h4>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla
                        scelerisque eleifend sodales. Cum sociis natoque penatibus et magnis
                        dis parturient montes, nascetur ridiculus mus dis parturient montes.
                    </p>
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
