<?php // Template Name: Enterprise Services 2 ?>
<?php get_header(); ?>

<div class="light-blue-color-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-xs-7">
				<h2>Get help from the core team</h2>
				<p>
					<span class="larger-text">
						These services deliver monthly software updates and support at the best possible fee. As usual, our code is fully open.
					</span>
				</p>
				<p>
					<strong>The income generated from these services is what keeps our community alive. We re-invest %100 into the project and retain no profits in order to provide the best pricing possible. </strong>
				</p>
			</div>
			<div class="col-xs-5 static">
				<p><img class="enterprise-services-img alignnone wp-image-1547 size-full" src="<?php echo THEME_IMG . 'enterprise-services.png'; ?>" alt="" width="346" height="283"></p>
			</div>
		</div>
	</div>
</div>


<div class="enterprise-border">
	<div class="container">
		<?php
		$icons = THEME_IMG . 'enterprise-icons/';
		?>
		<div class="table-responsive enterprise-table-wrapper">
			<table>
				<thead>
					<tr>
						<th>&nbsp;</th>
						<th>&nbsp;</th>
						<th>Community</th>
						<th>Enterprise</th>
					</tr>
				</thead>

				<tbody>
					<tr>
						<td>
							<img src="<?php echo $icons; ?>engine.png" alt="" />
						</td>
						<td>
							<h3>Engine</h3>
							<p>
								We manage two releases, community and enterprise. See the differences <a href="https://docs.google.com/spreadsheets/d/1v1t8Ilu-6hORS1eYDcC_1Ov78ylND7J2tK0iU1Ignos/edit">here.</a> While enterprise gets updated all the time, community gets a single update per year.
							</p>
						</td>
						<td>Community</td>
						<td>Enterprise Edition</td>
					</tr>

					<tr>
						<td>
							<img src="<?php echo $icons; ?>support.png" alt="" />
						</td>
						<td>
							<h3>Support</h3>
							<p>
								You have a question, an issue, a bug, an idea, we respond you and help you. Our support is primarily over email, but we are not shy of using Webex or phone if needed.
							</p>
						</td>
						<td>None</td>
						<td>Unlimited</td>
					</tr>

					<tr>
						<td>
							<img src="<?php echo $icons; ?>patches.png" alt="" />
						</td>
						<td>
							<h3>Patches</h3>
							<p>
								As we identify the need for patches, we distribute them to our customers
							</p>
						</td>
						<td>Once a year</td>
						<td>As needed</td>
					</tr>

					<tr>
						<td>
							<img src="<?php echo $icons; ?>features.png" alt="" />
						</td>
						<td>
							<h3>Features</h3>
							<p>
								As we develop new features, we distribute them to our customers
							</p>
						</td>
						<td>Once a year</td>
						<td>All the time</td>
					</tr>

					

					<tr>
						<td>
							<img src="<?php echo $icons; ?>consulting.png" alt="" />
						</td>
						<td>
							<h3>Online Q&A</h3>
							<p>
							 	On top of our documentation (which includes videos, etc) we deliver one to one and one to many webcasts.	
							</p>
						</td>
						<td>Nope</td>
						<td>4hs dedicated + regular online trainings</td>
					</tr>

					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td style="background:#ffffff;">&nbsp;</td>
						<td style="background:#ffffff;">&nbsp;</td>
					</tr>

					<tr>
						<td>
							<img src="<?php echo $icons; ?>cost-on-premise.png" alt="" />
						</td>
						<td>
							<h3>Yearly Fee</h3>
							<p>
								We will provide you with the source code for you to install eramba on your premises. 
							</p>
						</td>
						<td style="background:#e9f2f5;"><span class="price-highlight">Free</span></td>
						<td style="background:#e9f2f5;"><span class="price-highlight">$2200</span> / Year <br></td>
					</tr>

					<!--<tr>
						<td>
							<img src="<?php echo $icons; ?>cost-saas.png" alt="" />
						</td>
						<td>
							<h3>Yearly Fee (SaaS)</h3>
							<p>
								We will provide you with access to a dedicated instance of eramba on our Cloud infrastructure
							</p>
						</td>
						<td style="background:#e9f2f5;"><span class="price-highlight">£20</span> / Month <br> (∼ $29) <br> Service NOT AVAILABLE </td>
						<td style="background:#e9f2f5;"><span class="price-highlight">£125</span> / Month <br> (∼ $179)</td>
						<td style="background:#e9f2f5;"><span class="price-highlight">£210</span> / Month <br> (∼ $295)</td>
					</tr>-->

					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td style="background:#ffffff;">&nbsp;</td>
						<td style="background:#ffffff;">&nbsp;</td>
					</tr>

					<tr>
						<td>
							<img src="<?php echo $icons; ?>licence.png" alt="" />
						</td>
						<td>
							<h3>License</h3>
							<p>
								We pride for having a very open-minded custom <a href="http://www.eramba.org/documentation/license/">licensing </a>terms for our customers
							</p>
						</td>
						<td><a href="http://www.eramba.org/license" target="_blank">Standard</a></td>
						<td><a href="http://www.eramba.org/tc" target="_blank">See T&C Below</a></td>
					</tr>

					<tr>
						<td>
							<img src="<?php echo $icons; ?>agreement.png" alt="" />
						</td>
						<td>
							<h3>Agreements</h3>
							<p>
								We pride for being as clear and simple as possible when it comes to our promises.
							</p>
						</td>
						<td></td>
						<td>
							<!--<a href="http://www.eramba.org/documentation/2626/">SaaS T&C</a>
							 or 
							--><a href="http://www.eramba.org/tc" target="_blank">On Premise T&C</a>
						</td>
					</tr>

				</tbody>
			</table>
		</div>
		
		<div class="more-info">
			<p class="text-center">We will be happy to chat about your needs and make sure eramba is the right fit for you.</p>
			<br />
			<div class="row">
				<div class="col-xs-12 text-center">
					<!--<a href="https://support.eramba.org/invite" class="btn btn-success btn-lg btn-wide">
						<?php _e('Order service', 'eramba'); ?>
					</a>-->
					&nbsp;&nbsp;&nbsp;&nbsp;
					<a href="<?php echo get_page_link(BUGS_PAGE_ID); ?>" class="btn btn-default btn-lg btn-wide">
						<?php _e('Contact us', 'eramba'); ?>
					</a>
				</div>
			</div>
		</div>

	</div>
</div>

<br><br>
<div class="container">

	<h2>Questions &amp; Answers</h2>
	<br />
	<div class="row">
		<!-- <div class="col-xs-6">
			<p><strong>With the Community Cloud service, do I get support?</strong></p>
			<p>No, you dont. The service is meant to serve customers who are happy with the community release (we get thousands of downloads a year!) but dont have the time or skill to install it at their premises.</p>
		</div> -->
		<div class="col-xs-6">
			<p><strong>Who are you?</strong></p>
			<p>We are a group of 10 to 15 people from all around the world that works on this project at our free time. Back in 2011, We built an open GRC solution and these services provide the funding we need to keep going. Legally speaking, we are a limited company in the UK.</p>
		</div>
		<div class="col-xs-6">
			<p><strong>Why do you charge?</strong></p>
			<p>Because the project needs fundings (in the range of tens of thousands) to pay developers, testers, security, audit, compliance, risk professionals that helps us putting all this together. You can use all our documentation and software (which you are free to modify as long as you dont redistribute it) for free.</p>
		</div>
	</div>
	<br />
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
	<br />
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
	<br />
	<div class="row">
		
	</div>
	<br /><br /><br />
	<div class="text-center">
		<a href="<?php echo get_page_link(BUGS_PAGE_ID); ?>" class="btn btn-default btn-lg btn-wide"><?php _e('Contact us', 'eramba'); ?></a>
	</div>
	
</div>

<?php get_footer(); ?>
