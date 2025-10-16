<?php
/**
 * The template for displaying 404 page.
 *
 */

get_header(); ?>
<div class="scf-404">
	<div class="container">
		<h2>Ooops!</h2>
		<p>Looks like the page you're looking for doesn't exist.</p>
		<img src="https://socialcatfish.com/assets/template/2020/images/404.svg" alt="404" decoding="async" loading="lazy" />
		<a href="<?php echo BASE_URL; ?>blog" class="btn btn-dark-green">Back to Home Page</a>
		<p>or some helpful links instead?</p>
		<ul>
			<li><a href="<?php echo BASE_URL; ?>">Name Search</a></li>
			<li><a href="<?php echo BASE_URL; ?>reverse-image-search/">Image Search</a></li>
			<li><a href="<?php echo BASE_URL; ?>faw/">FAQs</a></li>
			<li><a href="<?php echo BASE_URL; ?>contact/">Contact Us</a></li>
		</ul>
	</div>
</div>
<?php
get_footer();