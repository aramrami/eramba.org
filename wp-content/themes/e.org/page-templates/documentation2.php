<?php // Template Name: Documentation2 ?>
<?php
get_header();

// remove_filter('the_content', 'wpautop');
// remove_filter('the_content', 'wpautop', 12);
?>

<div class="container">
	<h3 class="text-center margin-top-20">
		<strong>Start Here</strong>
	</h3>
	<h4 class="doc-subtitle text-center margin-bottom-40">
		<span>Not sure how to start? Watch this introductory video and the follow the documentation without missing a step!</span>
	</h4>

	<div class="text-center">
		<iframe width="560" height="315" src="https://www.youtube.com/embed/rblNnWnp_YM?rel=0&amp;showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
	</div>
	<br>

	<!-- <div class="row align-row">
		<div class="col-sm-4 col-sm-offset-4">
			<div class="doc-box doc-box-alt align-col">
				<div class="doc-box-img">
					<img src="<?php echo do_shortcode('[img]'); ?>nist-professionals.png" alt="">
				</div>
				<div class="doc-box-content">
					<h4>Introduction</h4>
					<p>Read this guide to understand how to get going with eramba</p>
					<ul>
						<li><a href="https://docs.google.com/document/d/1QFjevBxcgIlZ0W3qTUdbinM0KqamXsO-x0aO4NSlTek/edit?usp=sharing">Doc</a></li>
					</ul>
					
				</div>
			</div>
		</div>
	</div> -->
</div>

<hr>

<div class="container">
	<h3 class="text-center margin-top-20">
		<strong>Step One - Install &amp; Configuration</strong>
	</h3>
	<h4 class="doc-subtitle text-center margin-bottom-40">
		<span>Follow these guides to install and configure eramba</span>
	</h4>

	<div class="row align-row">
		<div class="col-sm-4 col-sm-offset-2">
			<div class="doc-box align-col">
				<div class="doc-box-img">
					<img src="<?php echo do_shortcode('[img]'); ?>icons/download-circle.png" alt="">
				</div>
				<div class="doc-box-content">
					<h4>Install from Source Code</h4>
					<p>Download our code and install the application on your Linux system using the source code.</p>
					<ul>
						<li><a href="https://docs.google.com/document/d/1vxh1knFcB6_ZVPUF4hy9i5XafIR3BijoZffCL_vjRVU/edit">Doc</a></li>
						<li><a class="fancybox fancybox.iframe" href="http://www.youtube.com/embed/0QALe2RX-yI?enablejsapi=1&wmode=opaque">Video</a></li>
					</ul>
				</div>
			</div>
		</div>

		<div class="col-sm-4">
			<div class="doc-box align-col">
				<div class="doc-box-img">
					<img src="<?php echo do_shortcode('[img]'); ?>icons/download-computer.png" alt="">
				</div>
				<div class="doc-box-content">
					<h4>Pre-Installed Virtual Machine</h4>
					<p>If you are not interested in installing eramba you can use our VMs</p>
					<ul>
						<li><a href="https://docs.google.com/document/d/140b6lGd3QpFvZjT927KFDz_Yd62Jjb84-PXMaioHlSw/edit#">Doc</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<div class="row arrow-row arrow-row-install">
		<div class="col-sm-12">
			<div class="arrow-down">
				<div class="arrow-head"></div>
			</div>
			<div class="arrow-down">
				<div class="arrow-head"></div>
			</div>
		</div>
	</div>

	<div class="row align-row">
		<div class="col-sm-4 col-sm-offset-4">
			<div class="doc-box align-col">
				<div class="doc-box-img">
					<img src="<?php echo do_shortcode('[img]'); ?>enterprise-icons/engine.png" alt="">
				</div>
				<div class="doc-box-content">
					<h4>Configuration & Access Management</h4>
					<p>Setup email, ldap, groups and access lists for each portal.</p>
					<ul>
						<li><a href="https://docs.google.com/document/d/1D39uXCRfbTMvyVMFsGRyIcob8cSccAn1NWIdREodpms/edit#">Doc</a></li>
						<li><a class="fancybox fancybox.iframe" href="http://www.youtube.com/embed/a1KFzgFZ9Hs?enablejsapi=1&wmode=opaque">Video</a></li>
					</ul>
				</div>
			</div>
		</div>

		<!-- <div class="col-sm-3">
			<div class="doc-box align-col">
				<div class="doc-box-img">
					<img src="<?php echo do_shortcode('[img]'); ?>icons/reports-dashboards.png" alt="" width="50">
				</div>
				<div class="doc-box-content">
					<h4>Our License</h4>
					<p>Download, use it, modify it but dont distribute it! read the details!.</p>
					<ul>
						<li><a href="https://docs.google.com/document/d/1-3vbjQx9h2yupox3FVMbWuS7W07GE5CC1wa70hI-sJM/edit">Download now</a></li>
					</ul>
				</div>
			</div>
		</div> -->
	</div>
	<!-- <div class="row">
		<div class="col-sm-4 doc-download-box">
			<div class="doc-download-box-img">
				<img src="<?php echo do_shortcode('[img]'); ?>icons/download-circle.png" alt="">
			</div>
			<h4>Install</h4>
			<p>
				Lorem ipsum dolor sit amet, consectetur adipiscing elit ut ultrices.
			</p>
			<a href="#" class="btn red">Download now</a>
		</div>
		<div class="col-sm-4 doc-download-box">
			<div class="doc-download-box-img">
				<img src="<?php echo do_shortcode('[img]'); ?>icons/download-computer.png" alt="">
			</div>
			<h4>Configure</h4>
			<p>
				Lorem ipsum dolor sit amet, consectetur adipiscing elit ut ultrices.
			</p>
			<a href="#" class="btn red">Download now</a>
		</div>
		<div class="col-sm-4 doc-download-box">
			<div class="doc-download-box-img">
				<img src="<?php echo do_shortcode('[img]'); ?>icons/reports-dashboards.png" alt="" width="50">
			</div>
			<h4>Our License</h4>
			<p>
				Lorem ipsum dolor sit amet, consectetur adipiscing elit ut ultrices.
			</p>
			<a href="#" class="btn red">Download now</a>
		</div>
	</div> -->
</div>

<hr>

<div id="features" class="container">
	<h3 class="text-center margin-top-20">
		<strong>Step Two - Learn the Basics</strong>
	</h3>
	<h4 class="doc-subtitle text-center margin-bottom-40">
		<span>These guides cover basic features and concepts used across the system, is really important you get familiarised with them before you start using eramba!</span>
	</h4>

	<div>
		<div class="row align-row">

			<div class="col-sm-3">
				<div class="doc-box align-col">
					<div class="doc-box-img">
						<img src="<?php echo do_shortcode('[img_doc]'); ?>filters.png" alt="">
					</div>
					<div class="doc-box-content">
						<h4>Filters</h4>
						<p>Search, export and report over email data from eramba.</p>
						<ul>
							<li><a href="https://docs.google.com/document/d/1wxeXwEz8sSm-nW9iXXx3uOR_D17tT9LgFeRBmNB4GCU/edit">Doc</a></li>
							<li><a class="fancybox fancybox.iframe" href="http://www.youtube.com/embed/o52eg9b_RoU?enablejsapi=1&wmode=opaque">Video</a></li>
						</ul>
					</div>
				</div>
			</div>

			<div class="col-1-5 text-center">
				<div class="arrow-right">
					<div class="arrow-head"></div>
				</div>
			</div>

			<div class="col-sm-3">
				<div class="doc-box align-col">
					<img src="<?php echo do_shortcode('[img]'); ?>enterprise-ribbon.png" class="enterprise-ribbon" />
					<div class="doc-box-img">
						<img src="<?php echo do_shortcode('[img_doc]'); ?>notifications.png" alt="">
					</div>
					<div class="doc-box-content">
						<h4>Notifications</h4>
						<p>Automate email notifications, reports, reminders and more.</p>
						<ul>
							<li><a href="https://docs.google.com/document/d/1WraftiquqtQ7csmppaZgTuptg3rHYONO5DkwbpOLFyo/edit">Doc</a></li>
							<li><a class="fancybox fancybox.iframe" href="http://www.youtube.com/embed/fVBQscefrYQ?enablejsapi=1&wmode=opaque">Video</a></li>
						</ul>
					</div>
				</div>
			</div>

			<div class="col-1-5 text-center">
				<div class="arrow-right">
					<div class="arrow-head"></div>
				</div>
			</div>

			<div class="col-sm-3">
				<div class="doc-box align-col">
					<div class="doc-box-img">
						<img src="<?php echo do_shortcode('[img_doc]'); ?>versioning.png" alt="">
					</div>
					<div class="doc-box-content">
						<h4>Versioning</h4>
						<p>Keep track of changes (and restore anytime) on every control, risk or object.</p>
						<ul>
							<li><a href="https://docs.google.com/document/d/1N8ilqf1DwFR6cLNVogO1lsyQH1OBq_EufvSbAkeRlu4/edit#">Doc</a></li>
							<li><a class="fancybox fancybox.iframe" href="https://www.youtube.com/embed/-2t2IouUQQE?enablejsapi=1&wmode=opaque">Video</a></li>
						</ul>
					</div>
				</div>
			</div>

			<!-- <div class="col-sm-3">
				<div class="doc-box align-col">
					<div class="doc-box-img">
						<img src="<?php echo do_shortcode('[img_doc]'); ?>shield-blue.png" alt="">
					</div>
					<div class="doc-box-content">
						<h4>Visualisations</h4>
						<p>eramba users will only see stuff that relates to them!.</p>
						<ul>
							<li><a href="https://docs.google.com/document/d/1HZrWd-OnRAE4Q7XhFwHnDF_UrycYrql3pDIdHKophik/edit#">Doc</a></li>
							<li><a class="fancybox fancybox.iframe" href="http://www.youtube.com/embed/ND6qkQG8bSA?enablejsapi=1&wmode=opaque">Video</a></li>

						</ul>
					</div>
				</div>
			</div> -->
		</div>

		<div class="row arrow-row">
			<div class="col-sm-12">
				<div class="arrow-down">
					<div class="arrow-head"></div>
				</div>
			</div>
		</div>

		<div class="row align-row">
			<!-- <div class="col-sm-3">
				<div class="doc-box align-col">
					<img src="<?php echo do_shortcode('[img]'); ?>enterprise-ribbon.png" class="enterprise-ribbon" />
					<div class="doc-box-img">
						<img src="<?php echo do_shortcode('[img_doc]'); ?>workflows.png" alt="">
					</div>
					<div class="doc-box-content">
						<h4>Workflows</h4>
						<p>Soon to be implemented!</p>
						<ul>
						</ul>
					</div>
				</div>
			</div> -->

			<div class="col-sm-3">
				<div class="doc-box align-col">
					<img src="<?php echo do_shortcode('[img]'); ?>enterprise-ribbon.png" class="enterprise-ribbon" />
					<div class="doc-box-img">
						<img src="<?php echo do_shortcode('[img]'); ?>enterprise-icons/cost-saas.png" alt="" style="margin-top:5px;">
					</div>
					<div class="doc-box-content">
						<h4>REST APIs</h4>
						<p>APIs can be used to push, pull or list elements from eramba.</p>
						<ul>
							<li><a href="https://docs.google.com/document/d/1AzTUqrs8RJ84VhYjLbVIbw6f2vzSQfzTNiD01JF8qbM/edit">Doc</a></li>
						</ul>
					</div>
				</div>
			</div>

			<div class="col-1-5 text-center">
				<div class="arrow-left">
					<div class="arrow-head"></div>
				</div>
			</div>

			<div class="col-sm-3">
				<div class="doc-box align-col">
					<div class="doc-box-img">
						<img src="<?php echo do_shortcode('[img]'); ?>enterprise-icons/downgrades.png" alt="" style="margin-top:5px;">
					</div>
					<div class="doc-box-content">
						<h4>CSV Imports</h4>
						<p>Import controls, policies and more using preformated CSV files.</p>
						<ul>
							<li><a href="https://docs.google.com/document/d/1A7xG-jf_4lDcS8OCe8OX_0INip3yIbucYkPUbkOQgOg/edit">Doc</a></li>
							<li><a class="fancybox fancybox.iframe" href="http://www.youtube.com/embed/PB7D_OCZUnQ?enablejsapi=1&wmode=opaque">Video</a></li>
						</ul>
					</div>
				</div>
			</div>

			<div class="col-1-5 text-center">
				<div class="arrow-left">
					<div class="arrow-head"></div>
				</div>
			</div>

			<div class="col-sm-3">
				<div class="doc-box align-col">
					<img src="<?php echo do_shortcode('[img]'); ?>enterprise-ribbon.png" class="enterprise-ribbon" />
					<div class="doc-box-img">
						<img src="<?php echo do_shortcode('[img_doc]'); ?>interface.png" alt="">
					</div>
					<div class="doc-box-content">
						<h4>Custom<br />Fields</h4>
						<p>Include custom fields on any of our forms (while creating a risk, control, etc).</p>
						<ul>
							<li><a href="https://docs.google.com/document/d/1QxaBV1WnqkBi-VVujrWVMAaLkdpU7oO0emtjUasIV0Y/edit">Doc</a></li>
							<li><a class="fancybox fancybox.iframe" href="http://www.youtube.com/embed/BiRufl5OJLg?enablejsapi=1&wmode=opaque">Video</a></li>
						</ul>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>

<hr>

<div id="core-functions" class="container">
	<h3 class="text-center margin-top-20">
		<strong>Step Three - Core Functionalities</strong>
	</h3>
	<h4 class="doc-subtitle text-center margin-bottom-40">
		<span>Follow every step of the guide to ensure you learn how eramba works!</span>
	</h4>
	
	<div>
		<div class="row align-row">

			<div class="col-sm-3">
				<div class="doc-box align-col">
					<div class="doc-box-img">
						<img src="<?php echo do_shortcode('[img_doc]'); ?>document.png" alt="">
					</div>
					<div class="doc-box-content">
						<h4>Policy Management</h4>
						<p>Document your policies, ensure they get review, publish them on a single portal, Etc.</p>
						<ul>
							<li><a href="https://docs.google.com/document/d/1A4drPS0cMBPyj-eL1KuhzsA3slVnaUa3fZ7KvNMRMc4/edit?usp=sharing">Doc</a></li>
							<li><a class="fancybox fancybox.iframe" href="http://www.youtube.com/embed/A3NptyqM3hY?enablejsapi=1&wmode=opaque">Video</a></li>
						</ul>
					</div>
				</div>
			</div>

			<div class="col-1-5 text-center">
				<div class="arrow-right">
					<div class="arrow-head"></div>
				</div>
			</div>

			<div class="col-sm-3">
				<div class="doc-box align-col">
					<div class="doc-box-img">
						<img src="<?php echo do_shortcode('[img_doc]'); ?>controls.png" alt="">
					</div>
					<div class="doc-box-content">
						<h4>Controls & Audits</h4>
						<p>Register your internal controls, their internal audits, where they are used.</p>
						<ul>
							<li><a href="https://docs.google.com/document/d/10Hq0HTCT_4NYXw3I1EJBfWI4OaWTBqlXZqDrQCg99E0/edit">Doc</a> </li>
							<li><a class="fancybox fancybox.iframe" href="http://www.youtube.com/embed/zihFlcsFmPw?enablejsapi=1&wmode=opaque">Video</a></li>
						</ul>
					</div>
				</div>
			</div>

			<div class="col-1-5 text-center">
				<div class="arrow-right">
					<div class="arrow-head"></div>
				</div>
			</div>

			<div class="col-sm-3">
				<div class="doc-box align-col">
					<div class="doc-box-img">
						<img src="<?php echo do_shortcode('[img_doc]'); ?>list.png" alt="">
					</div>
					<div class="doc-box-content">
						<h4>Exception Management</h4>
						<p>Keep record of every approval you give away and trigger notifications when they expire.</p>
						<ul>
							<li><a href="https://docs.google.com/document/d/1GzNfjcYmxYKzJVEIw8MSduvqVCMIX2--nIt4W7HT5Bk/edit">Doc</a> </li>
						</ul>
					</div>
				</div>
			</div>
		</div>

		<div class="row arrow-row">
			<div class="col-sm-12">
				<div class="arrow-down">
					<div class="arrow-head"></div>
				</div>
			</div>
		</div>

		<div class="row align-row">
			<div class="col-sm-3 col-sm-offset-0">
				<div class="doc-box align-col">
					<img src="<?php echo do_shortcode('[img]'); ?>enterprise-ribbon.png" class="enterprise-ribbon" />
					<div class="doc-box-img">
						<img src="<?php echo do_shortcode('[img_doc]'); ?>flow1.png" alt="">
					</div>
					<div class="doc-box-content">
						<h4>Data Flow Analysis<br>EU GDPR</h4>
						<p>Document each data flow, their controls, policies and people involved.</p>
						<ul>
							<li><a href="https://docs.google.com/document/d/1Srt4a2vfjuEVfGONvxjd5_yO-ojoeLkLcLTsqc7v2NM/edit">Doc</a> </li>
							<li><a class="fancybox fancybox.iframe" href="http://www.youtube.com/embed/k0hAZ6Y8TTM?enablejsapi=1&wmode=opaque">Video</a></li>
						</ul>
					</div>
				</div>
			</div>

			<div class="col-1-5 text-center">
				<div class="arrow-left">
					<div class="arrow-head"></div>
				</div>
			</div>

			<div class="col-sm-3">
				<div class="doc-box align-col">
					<div class="doc-box-img">
						<img src="<?php echo do_shortcode('[img_doc]'); ?>risk.png" alt="">
					</div>
					<div class="doc-box-content">
						<h4>Risk Management</h4>
						<p>Simplify Risk Management and its reviews to ensure it brings real value to your organisation.</.p>
						<ul>
							<li><a href="https://docs.google.com/document/d/1sGaUiS6fR_oYun6mt7FktSQOdOJ0huXshMBBMOr_4N0/edit?usp=sharing">Doc</a></li>
							<li><a class="fancybox fancybox.iframe" href="http://www.youtube.com/embed/aIaY8_h_n5g?enablejsapi=1&wmode=opaque">Video</a></li>
						</ul>
					</div>
				</div>
			</div>

			<div class="col-1-5 text-center">
				<div class="arrow-left">
					<div class="arrow-head"></div>
				</div>
			</div>

			<div class="col-sm-3 col-sm-offset-0">
				<div class="doc-box align-col">
					<div class="doc-box-img">
						<img src="<?php echo do_shortcode('[img_doc]'); ?>calendar.png" alt="">
					</div>
					<div class="doc-box-content">
						<h4>Compliance Management</h4>
						<p>NIST, ISO, PCI - link controls and policies to your compliance requirements.</p>
						<ul>
							<li><a href="https://docs.google.com/document/d/1Rk85gMkTbkpud2LKk7jg2agBlwaSH2yOq6y9Z3KNzXo/edit">Doc</a> </li>
							<li><a class="fancybox fancybox.iframe" href="http://www.youtube.com/embed/rnu9-wZQels?enablejsapi=1&wmode=opaque">Video</a></li>
						</ul>
					</div>
				</div>
			</div>

		</div>

		<div class="row arrow-row">
			<div class="col-sm-12">
				<div class="arrow-down">
					<div class="arrow-head"></div>
				</div>
			</div>
		</div>

		<div class="row align-row">
			<div class="col-sm-3">
				<div class="doc-box align-col">
					<div class="doc-box-img">
						<img src="<?php echo do_shortcode('[img_doc]'); ?>incident.png" alt="">
					</div>
					<div class="doc-box-content">
						<h4>Incident Management</h4>
						<p>Record and manage your incidents and asociate them with Risks when possible.</p>
						<ul>
							<li><a href="https://docs.google.com/document/d/1I9oQ2mrw65pS6OVoKMCEeC6rx5ftz8ji-RO2Ws4luMY/edit?usp=sharing">Doc</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<hr>

<div class="container ">
	<h3 class="text-center margin-top-20">
		<strong>Standalone Features</strong>
	</h3>
	<h4 class="doc-subtitle text-center margin-bottom-40">
		<span>These features do not hold dependencies with other modules so you can use them straight away</span>
	</h4>

	<div class="row align-row">
		<div class="col-sm-4">
			<div class="doc-box align-col">
				<img src="<?php echo do_shortcode('[img]'); ?>enterprise-ribbon.png" class="enterprise-ribbon" />
				<div class="doc-box-img">
					<img src="<?php echo do_shortcode('[img_doc]'); ?>shield.png" alt="">
				</div>
				<div class="doc-box-content">
					<h4>Security Awareness</h4>
					<p>Create multiple, Active Directory related awareness trainings with videos, multiple choices and more.</p>
					<ul>
						<li><a href="https://docs.google.com/document/d/1ktGs1MasrS7FL9GUOV6TpxiLfLlQgOxe4hSKkbFMqWE/edit">Doc</a> </li>
						<li><a class="fancybox fancybox.iframe" href="http://www.youtube.com/embed/POuSzuFxa_w?enablejsapi=1&wmode=opaque">Video</a></li>
					</ul>
				</div>
			</div>
		</div>

		<div class="col-sm-4">
			<div class="doc-box align-col">
				<img src="<?php echo do_shortcode('[img]'); ?>enterprise-ribbon.png" class="enterprise-ribbon" />
				<div class="doc-box-img">
					<img src="<?php echo do_shortcode('[img_doc]'); ?>suitcase.png" alt="">
				</div>
				<div class="doc-box-content">
					<h4>Vendor Assessments</h4>
					<p>Upload your questions and send them out so your suppliers can log in remotely and provide feedback.</p>
					<ul>
						<li><a href="https://docs.google.com/document/d/1pT25V1lQdc7LPjDfmal0fctT1NY72-f2pMbi7UvaSok/edit?usp=sharing">Doc</a></li>
						<li><a class="fancybox fancybox.iframe" href="http://www.youtube.com/embed/eB5_Eue03uw?enablejsapi=1&wmode=opaque">Video</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="doc-box align-col">
				<img src="<?php echo do_shortcode('[img]'); ?>enterprise-ribbon.png" class="enterprise-ribbon" />
				<div class="doc-box-img">
					<img src="<?php echo do_shortcode('[img_doc]'); ?>news.png" alt="">
				</div>
				<div class="doc-box-content">
					<h4>Automated Account Reviews</h4>
					<p>Automate the process of reviewing user and roles accounts.</p>
					<ul>
						<li><a href="https://docs.google.com/document/d/1yqpdu631gkBuea1KDiUm4HDpYC6P8p3WiYfV1NpmTlA/edit?usp=sharing">Doc</a></li>
						<li><a class="fancybox fancybox.iframe" href="http://www.youtube.com/embed/Z3eNMmNbGcg?enablejsapi=1&wmode=opaque">Video</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>

<hr>

<div class="container ">
	<h3 class="text-center margin-top-20">
		<strong>Resources</strong>
	</h3>
	<h4 class="doc-subtitle text-center margin-bottom-40">
		<span>These documents will help you understand how eramba works in certain use cases</span>
	</h4>

	<div class="row align-row">
		<div class="col-sm-4">
			<div class="doc-box align-col">
				<div class="doc-box-img">
					<img src="<?php echo do_shortcode('[img]'); ?>iso.png" alt="">
				</div>
				<div class="doc-box-content">
					<h4>ISO 27001 Guide</h4>
					<!-- <p></p>
					<ul>
						<li><a href="#"></a> </li>
						<li><a class="fancybox fancybox.iframe" href="#"></a></li>
					</ul> -->
					<p>Quick introduction on how eramba can help you with the popular ISO standard</p>
					<ul>
						<li><a href="https://docs.google.com/document/d/1hAzr3KR3jqp45fzDd7f_SPWI1D2lVmUPA0cH6Sqze5E/edit?usp=sharing">Doc</a></li>
					</ul>
				</div>
			</div>
		</div>

		<div class="col-sm-4">
			<div class="doc-box align-col">
				<div class="doc-box-img">
					<img src="<?php echo do_shortcode('[img]'); ?>pci.png" alt="">
				</div>
				<div class="doc-box-content">
					<h4>PCI-DSS Guide</h4>
					<p>Discover how eramba helps with PCI-DSS</p>
					<ul>
						<li><a href="https://docs.google.com/document/d/15XISbYUQvx98bWNuY5CTb2guywYLjRER8sTtElwaT94/edit?usp=sharing">Doc</a></li>
					</ul>
					<!-- <p></p>
					<ul>
						<li><a href="#"></a> </li>
						<li><a class="fancybox fancybox.iframe" href="#"></a></li>
					</ul> -->
				</div>
			</div>
		</div>

		<div class="col-sm-4">
			<div class="doc-box align-col">
				<div class="doc-box-img">
					<img src="<?php echo do_shortcode('[img]'); ?>training.png" alt="">
				</div>
				<div class="doc-box-content">
					<h4>Controls & Policies Templates</h4>
					<p>Ready to import controls and polices for Compliance Management.</p>
					<ul>
						<li><a href="https://docs.google.com/document/d/1UCA-e7_NSYEmsxdyODUOU7k5b_YGeByx0edZPpNQYJ0/edit#/edit?usp=sharing">Doc</a></li>
						<li><a class="fancybox fancybox.iframe" href="http://www.youtube.com/embed/v70JqOdQNg0?enablejsapi=1&wmode=opaque">Video</a></li>
					</ul>
					<!-- <p></p>
					<ul>
						<li><a href="#"></a> </li>
						<li><a class="fancybox fancybox.iframe" href="#"></a></li>
					</ul> -->
				</div>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="doc-box align-col">
				<div class="doc-box-img">
					<img src="<?php echo do_shortcode('[img]'); ?>sox.png" alt="">
				</div>
				<div class="doc-box-content">
					<h4>Sarbanes Oxley Guide</h4>
					<p>Large companies subject to SOX have successfully used eramba to mantain their compliance requirements, learn how.</p>
					<ul>
						<li><a href="https://docs.google.com/document/d/1V8jkoYBjMAAqbexLuDB7ueK_RMLcW7rOY_bUd2Qn6Tg/edit?usp=sharing">Doc</a></li>
					</ul>
					<!-- <p></p>
					<ul>
						<li><a href="#"></a> </li>
						<li><a class="fancybox fancybox.iframe" href="#"></a></li>
					</ul> -->
				</div>
			</div>
		</div>
	</div>
</div>

<script src="http://www.youtube.com/player_api"></script>
<style>
.fancybox-wrap {
	height: 480px !important;
	width: 853px !important;
}
</style>
<script type="text/javascript">
function mainVideo() {
	var docVideoId = 'doc-top-video-wrapper';
	                    
	// Create video player object and add event listeners
	var player = new YT.Player(docVideoId, {
		width: '100%',
		height: 393,
		videoId: 'GUPdMW99Gow',
	    events: {
	        'onReady': onMainVideoReady,
	        // 'onStateChange': onPlayerStateChange
	    }
	});
}

function onMainVideoReady(event) {
    event.target.setVolume(50);
	event.target.setPlaybackQuality('hd720');
}

// Fires whenever a player has finished loading
function onPlayerReady(event) {
    event.target.playVideo();
    event.target.setVolume(50);
	event.target.setPlaybackQuality('hd720');
}

// Fires when the player's state changes.
function onPlayerStateChange(event) {
    // Go to the next video after the current one is finished playing
    if (event.data === 0) {
        $.fancybox.next();
    }
}

// The API will call this function when the page has finished downloading the JavaScript for the player API
function onYouTubePlayerAPIReady() {
    mainVideo();

    // Initialise the fancyBox after the DOM is loaded
    $(document).ready(function() {
        $(".fancybox")
            .attr('rel', 'gallery')
            .fancybox({
            	tpl: {
					closeBtn: '<a href="#" class="fancybox-custom-close"><i class="fa fa-times" aria-hidden="true"></i></a>'
				},
                padding     : 0,
                openEffect  : 'none',
                closeEffect : 'none',
                margin      : 50,
                beforeShow  : function() {
                    // Find the iframe ID
                    var id = $.fancybox.inner.find('iframe').attr('id');
                    
                    // Create video player object and add event listeners
                    var player = new YT.Player(id, {
                    	// width: 853,
						height: 480,
						videoId: 'GUPdMW99Gow',
                        events: {
                            'onReady': onPlayerReady,
                            'onStateChange': onPlayerStateChange
                        }
                    });
                }
            });
    });
}
</script>

<script type="text/javascript">
	$(function(){
		function alignCols() {
			$('.align-row').each(function() {
				var height = 0;
				console.log(height);
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
