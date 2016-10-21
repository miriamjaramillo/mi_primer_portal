<?php
function theme_guide(){
add_theme_page( 'Theme guide','Theme documentation','edit_themes', 'theme-documentation', 'fabthemes_theme_guide');
}
add_action('admin_menu', 'theme_guide');

function fabthemes_theme_guide(){ ?>


<div id="welcome-panel" class="about-wrap">
<div class="container">

<div class="row">

	<div class="col3 col">
		<img src="<?php echo get_template_directory_uri() ?>/screenshot.png" />
	</div>
	<div class="col34 col">
		<h2>Welcome to <?php echo wp_get_theme(); ?> WordPress theme!</h2>
		<p> <?php echo wp_get_theme(); ?> is a free premium responsive WordPress theme from fabthemes.com. This theme is built
			on <b>Foundation</b> framework. This is a medical/hospital related WordPress theme. Ideal fo clinics/ hospitals etc. This theme comes with
			features like custom menu, custom pages, custom post types, metaboxes, theme options etc.  </p>
	</div>

</div>

<div class="row">

	<div class="col col1">
		<h3>Required Plugins</h3>
		<p> The theme requires the following plugin to work as advertised.
			You will find a notification on the admin panel prompting you to install the required plugins.
			Please install and activate the plugins.
		</p>
		<ol>
			<li><b> <a href="https://wordpress.org/plugins/cmb2/"> CMB2 </a> </b>  - This plugin is required for the metabox feature. </li>
			<li> <b> <a href="https://github.com/theKhorshed/cmb2-fontawesome-icon-picker"> Fontawesome Icon picker</a></b> - This plugin is required for the
			fontawesome icon picker field for the CMB2 metabox. </li>
		</ol>
	</div>

</div>

<div class="row">

	<div class="col col1">
		<h3>Theme setup</h3>

		<h4>1. Installing theme</h4>
		<p> Download the theme zip file from Fabthemes.com. Open your WordPress admin panel and go to <b> Appearance > Themes</b> . Click <b> Add new </b> and then <b> Upload the theme </b> to your themes directory and activate it.  </p>

		<h4>2. Install plugins</h4>
		<p> After theme activation, you will find a notification that prompts you to install and activate the required plugin listed earlier. Please install and activate them.</p>

		<h4>3. Saving theme options</h4>
		<p> The theme comes with an options page. You can save the options page with its default values to see how the content is laid out. Then you can customize the options as required for your site.</p>

		<h4>4. Create Slider </h4>
		<p> Click on the "Slider" menu on the admin panel. Click on "Add new" and it will take you to a page where you can create a new slider. Give the slider a title. Below the
		title you will find a metabox for slider configuration. You can add multiple slide items via this metabox. Each slide item consists of Slide title, slide image,
		description, and slide link. Once you have added required number slide items to the slider, click publish to save the slider.   </p>

		<h4>5. Create Service </h4>
		<p> Click on the "Services" menu on the admin panel. Click on "Add new" and it will take you to a page where you can create a new service. Give the service a title.
		Add a featured image to the service and select an icon that is suitable from the service icon metabox. Hit publish to save the service item. </p>

		<h4>6. Staff item </h4>
		<p> Click on the "Staff" menu on the admin panel. Click on "Add new" and it will take you to a page where you can create a new staff item. Enter the staff name as
		as title. Add the staff image as featured image. Fill the "Staff Details" metabox with staff description, job title, social media information.  </p>

		<h4>7. Testimonials Item</h4>
		<p> Click on the "Testimonial" menu on the admin panel. Click on "Add new" and it will take you to a page where you can add a testimonial item. Enter
		the person name as the title. Enter the testimony in the content area. Use the featured image for the person image.  </p>

		<h4>8. Creating the Services Page</h4>
		<p> Services page is the page that lists all your service items. Go to the "Pages" and click "Add new page". Give the page a title , preferably "Our Services". Then
		select the "Service page" template from the page template dropdown. </p>

		<h4>9. Creating the Staff page</h4>
		<p> Staff page is the page that lists all your staff items. Go to the "Pages" and click "Add new page". Give the page a title , preferably "Our Staff". Then
		select the "Staffpage" template from the page template dropdown. </p>

		<h4> Appointments page </h4>
		<p> This is the contact page. Create a new page and add a contact form using a contact form plugin. </p>

	</div>

</div>


<div class="row">

	<div class="col col1">
		<h3>Theme Options </h3>
		<p> Theme comes with an options panel to customize its settings. </p>
	 </div>
	 <div class="col col1">
	 	<h4> 1. Homepage </h4>
	 	<p class="span"> 1. Slider - Select the slider you want to display on the homepage. You will have a dropdwon list of the sliders you created from where
			 you can select one.  </p>
	 	<p class="span"> Blog page - Select the page set as your blog page. </p>
		<p class="span"> Appointments page - Select page set as Appointment/contact page.</p>
		<p class="span"> CTA text - There is a Call to action section on the homepage with the appointment button. You can customize
		the CTA text via this option. </p>
		<p class="span"> Services on homepage - Set the number of Service items to show on the homepage. </p>
		<p class="span"> Staff on homepage - Set the number of staff items to show on the homepage.</p>
		<p class="span"> Testimonials on homepage - Set the number of testimonial items on thehomepage. </p>
	 </div>

	 <div class="col col1">
	 	<h4> 2. Contact settings </h4>
	 	<p class="span"> Use this options to enter the Phone numbers, email, address details etc of the company. </p>
		<p class="span"> You also have option to enter the google map embed code to display the map pointing to your company location.</p>
		<p class="span"> Use the "Working hours details" options to display the working times. </p>
	 </div>

	 <div class="col col1">
	 	<h4> 3. Social settings </h4>
	 	<p class="span"> You have the option set various social media links and other contact informations like, email, phone, skype etc via theme options. </p>
	 </div>

	 <div class="col col1">
	 	<h4> 4. Custom styling</h4>
	 	<p class="span"> Use this options to color customize your theme.</p>
	 </div>

	 <div class="col col1">
	 	<h4> 5. Banner settings </h4>
	 	<p class="span"> Use this options to customize the banner ads on the sidebar.</p>
	 </div>

</div>

<div class="row">
	<div class="col col1">
			<?php echo file_get_contents(dirname(__FILE__) . '/FT/license-html.php'); ?>
	</div>
</div>


</div>
</div>



<style media="screen" type="text/css">

	.container{	width: 960px;}
	.row { background: #fff;  margin-bottom: 20px; padding: 20px 0px;}
	.row:before, .row:after {  display: table;  content: " ";}
	.row:after {  clear: both;	}
	.row:before, .row:after {  display: table;  content: " ";}
	.row:after { clear: both; }
	.col{ padding:0px 20px 0px 20px;  position:relative; 	 }
	.col1{ width: 920px;}
	.col2{ width: 440px; float: left;}
	.col3{ width: 280px; float: left;}
	.col34{ width: 600px; float: left;}
	.col h2{ font-weight: 700; font-size: 30px;}
	.col h3{ font-weight: 300; font-size: 24px; margin:0px 0px 20px 0px; background: #333; color:#fff; padding: 10px; }
	.col h4{ font-weight: bold; font-size: 16px; margin:10px 0px;}
	.clear{clear: both;}
	.red{color: red;}
	p.span{ padding:20px 20px; background: #fafafa; border:1px solid #ddd;	}
</style>

<?php }
