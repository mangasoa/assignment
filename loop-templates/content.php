<?php
/**
 * Post rendering content according to caller of get_template_part
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>
<?php
	$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID( ) ) );
	$rent_per_day = get_post_meta( get_the_ID(), 'rent_per_day', true ) ?: '0';
	$petrol	= get_post_meta( get_the_ID(), 'cars_custom_fields_petrol-tank-capacityl', true );
	$manual	= get_post_meta( get_the_ID(), 'cars_custom_fields_manual-or-automatic', true );
	$people = get_post_meta( get_the_ID(), 'cars_custom_fields_people-capacity', true );
	global $post;
	//Fetching Psot categories: get_the_category function returns the post categories, it return in the 
	//form of array with different attributes but we need name of the categories for that i passed that 
	//array into loop and iterate for all index of arrays and every time i concatenate category name with comma seperated
	$category = get_the_category($post->id);
	$cate="";
	$symbol=", ";
$x = 1;
$length = count($category);
	foreach($category as $cat){
		
		$cate .=$cat->name;
		
		if($x != $length)
			$cate .=$symbol;
		$x++;
	}
?>
<div class="flex-item">
	<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
		<div class="card">
			<div class="row Main-title">
				<div class="">
					<h5 class="card-title"><?php the_title( ); ?></h5>
					<p class="card-head"><?php echo $cate; ?></p>
				</div>
				<div class="heart-icon">
					<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill=" #90a3bf" class="bi bi-heart" viewBox="0 0 16 16">
  					<path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
					</svg>
				</div>
			</div>
			<div class="row ">
				<div class="img-size-one">
					<img src="<?php echo $image[0]; ?>">
				</div>
				<div class="unorder">
					<ul>
						<li>
							<svg xmlns="http://www.w3.org/2000/svg" width="22" height="20" fill="currentColor" class="bi bi-fuel-pump-fill" viewBox="0 0 22 16">
  							<path d="M1 2a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v8a2 2 0 0 1 2 2v.5a.5.5 0 0 0 1 0V8h-.5a.5.5 0 0 1-.5-.5V4.375a.5.5 0 0 1 .5-.5h1.495c-.011-.476-.053-.894-.201-1.222a.97.97 0 0 0-.394-.458c-.184-.11-.464-.195-.9-.195a.5.5 0 0 1 0-1c.564 0 1.034.11 1.412.336.383.228.634.551.794.907.295.655.294 1.465.294 2.081V7.5a.5.5 0 0 1-.5.5H15v4.5a1.5 1.5 0 0 1-3 0V12a1 1 0 0 0-1-1v4h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V2Zm2.5 0a.5.5 0 0 0-.5.5v5a.5.5 0 0 0 .5.5h5a.5.5 0 0 0 .5-.5v-5a.5.5 0 0 0-.5-.5h-5Z"/>
							</svg>
							<p><?php echo  $petrol; ?>L</p>
						</li>
						<li>
							<svg xmlns="http://www.w3.org/2000/svg" width="22" height="20" fill="currentColor" class="bi bi-life-preserver" viewBox="0 0 22 16">
  							<path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm6.43-5.228a7.025 7.025 0 0 1-3.658 3.658l-1.115-2.788a4.015 4.015 0 0 0 1.985-1.985l2.788 1.115zM5.228 14.43a7.025 7.025 0 0 1-3.658-3.658l2.788-1.115a4.015 4.015 0 0 0 1.985 1.985L5.228 14.43zm9.202-9.202-2.788 1.115a4.015 4.015 0 0 0-1.985-1.985l1.115-2.788a7.025 7.025 0 0 1 3.658 3.658zm-8.087-.87a4.015 4.015 0 0 0-1.985 1.985L1.57 5.228A7.025 7.025 0 0 1 5.228 1.57l1.115 2.788zM8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
							</svg>
							<p><?php echo  $manual; ?></p>
						</li>
						<li>
							<svg xmlns="http://www.w3.org/2000/svg" width="22" height="20" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 22 16">
  							<path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
 			 				<path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z"/>
  							<path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
							</svg>
							<p><?php echo  $people; ?>People</p>
						</li>
					</ul>
				</div>
			</div>
				<div class="pt-4 img-size">
					<img src="<?php echo $image[0]; ?>" class="card-img-top"  alt="...">
				</div>
				<div class="card-body pt-4">
					<div class="row  Text-icon">
						<div class="Icon-1">
							<svg xmlns="http://www.w3.org/2000/svg" width="22" height="20" fill="currentColor" class="bi bi-fuel-pump-fill" viewBox="0 0 22 16">
  							<path d="M1 2a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v8a2 2 0 0 1 2 2v.5a.5.5 0 0 0 1 0V8h-.5a.5.5 0 0 1-.5-.5V4.375a.5.5 0 0 1 .5-.5h1.495c-.011-.476-.053-.894-.201-1.222a.97.97 0 0 0-.394-.458c-.184-.11-.464-.195-.9-.195a.5.5 0 0 1 0-1c.564 0 1.034.11 1.412.336.383.228.634.551.794.907.295.655.294 1.465.294 2.081V7.5a.5.5 0 0 1-.5.5H15v4.5a1.5 1.5 0 0 1-3 0V12a1 1 0 0 0-1-1v4h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V2Zm2.5 0a.5.5 0 0 0-.5.5v5a.5.5 0 0 0 .5.5h5a.5.5 0 0 0 .5-.5v-5a.5.5 0 0 0-.5-.5h-5Z"/>
							</svg>
							<p><?php echo  $petrol; ?>L</p>
						</div>
						<div class="Icon-1">
							<svg xmlns="http://www.w3.org/2000/svg" width="22" height="20" fill="currentColor" class="bi bi-life-preserver" viewBox="0 0 22 16">
  							<path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm6.43-5.228a7.025 7.025 0 0 1-3.658 3.658l-1.115-2.788a4.015 4.015 0 0 0 1.985-1.985l2.788 1.115zM5.228 14.43a7.025 7.025 0 0 1-3.658-3.658l2.788-1.115a4.015 4.015 0 0 0 1.985 1.985L5.228 14.43zm9.202-9.202-2.788 1.115a4.015 4.015 0 0 0-1.985-1.985l1.115-2.788a7.025 7.025 0 0 1 3.658 3.658zm-8.087-.87a4.015 4.015 0 0 0-1.985 1.985L1.57 5.228A7.025 7.025 0 0 1 5.228 1.57l1.115 2.788zM8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
							</svg>
							<p><?php echo  $manual; ?></p>
						</div>
						<div class="Icon-1">
							<svg xmlns="http://www.w3.org/2000/svg" width="22" height="20" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 22 16">
  							<path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
 			 				<path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z"/>
  							<path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
							</svg>
							<p><?php echo  $people; ?>People</p>
						</div>
					</div>
					<div class="row justify-content-between footer-site">
						<div class="Number-range">
							<h4>$<?php echo $rent_per_day; ?>/</h4>
							<span class="Date">day</span>
						</div>
						<div class="btn-menu">
							<a href="#" class="btn-menu2">Rent Now</a>
						</div>
					</div>
				</div>
			</div>
			
	</article><!-- #post-## -->
	
</div>
	