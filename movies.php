<?PHP
	include_once "simple_html_dom.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Video 02</title>
	
	<?PHP include_once "links.php" ?>

</head>

<body class="responsive home-2">
<div id="wrapper-container">
	
	<?PHP include_once "header.php" ?>
	
	<?PHP include_once "mobile_menu.php" ?>
    
    <div id="main-content">
        
        <!-- <?PHP include_once "slider.php" ?> -->
		
		<?PHP
			if (!isset($_GET['page']) || empty($_GET['page'])) {
				$page = 1;
			} else {
				$page = $_GET['page'];
			}
			
			
			$dom = @file_get_html("https://movierulzhd.co/movies/page/$page/", false);
			$list = $dom->find("div[class=module]", 0);
			
			$item = $list->find("div[class=items featured]");
			$movies_section = $list->find("article");
		
		?>
        
        <div class="thim-latest-video_home-2">
            <div class="container">
                <div class="bp-element bp-element-st-list-videos vblog-layout-grid-2">
                    <div class="wrap-element">
                        <div class="heading-post">
                            <div class="wrap-title">
                                <h3 class="title">
                                </h3>
                            </div>
                        </div>
                        
                        <div class="grid-posts">
							<?PHP
								foreach ($movies_section as $movie) {
									$movie_thumb = $movie->find("img", 0)->getAttribute('src');
									
									$movie_rating = '';
									if (count($movie->find("div.rating")) > 0) {
										$movie_rating = $movie->find("div.rating", 0)->plaintext;
									}
									
									$movie_type = '';
									if (count($movie->find("div.featu")) > 0) {
										$movie_type = $movie->find("div.featu", 0)->plaintext;
									}
									if (count($movie->find("span.quality")) > 0) {
										$movie_type = $movie->find("span.quality", 0)->plaintext;
									}
									
									$movie_link = $movie->find("a", 0)->getAttribute('href');
									$movie_name = $movie->find("a", 1)->plaintext;
									$movie_release = $movie->find("div.data", 0)->find("span", 0)->plaintext;
									?>
                                    
                                    <div class="grid-item ">
                                        <div class="post-item">
                                            <div class="pic">
                                                <a href="<?PHP echo $movie_link; ?>">
                                                    <img src="<?PHP echo $movie_thumb; ?>" alt="<?PHP echo $movie_name; ?>">
                                                </a>
                                                <div class="overlay"></div>
                                                <div class="meta-info">
													<?PHP
														if ($movie_rating != '') { ?>
                                                            <div class="imdb">
                                                    <span class="value">
                                                        <?PHP echo $movie_rating; ?>
                                                    </span>IMDb
                                                            </div>
														<?PHP }
														if ($movie_type != '') { ?>
                                                            <div class="label" style="background: #ff6c00;">
																<?PHP echo $movie_type; ?>
                                                            </div>
														<?PHP }
													?>
                                                
                                                
                                                </div>
                                            </div>
                                            <div class="content">
                                                <h4 class="title">
                                                    <a href="<?PHP echo $movie_link; ?>" title="<?PHP echo $movie_name; ?>">
														<?PHP echo $movie_name; ?>
                                                    </a>
                                                </h4>
                                                <p class="text-center">
													<?PHP echo $movie_release; ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
								<?PHP }
							?>
                        
                        </div>
                    </div>
                </div>
            
            </div>
        </div>
        
        
        <ul class="loop-pagination">
			
			<?PHP
				$page = $dom->find("div.pagination", 0);
				
				
				$page2 = $dom->find("div.pagination", 0);
				//echo count($page2->children());
    
				
				$total_page = $page->find("span", 0);
				$current_page = $page->find("span", 1);
				
				$page_list = $page->find("a");
				for ($i = 0; $i < count($page_list); $i++) {
					$page_number = $page_list[$i]->innerText;
					?>
                    <li>
                        <a href="javascript:" class="page-numbers">
                            <?PHP echo $page_number; ?>
                        </a>
                    </li>
				<?PHP }
				
				echo $current_page;
			
			?>
            
<!--            <li>-->
<!--                <a href="javascript:" class="page-numbers">-->
<!--                    1-->
<!--                </a>-->
<!--            </li>-->
<!--            <li>-->
<!--                <a href="javascript:" class="page-numbers current">-->
<!--                    2-->
<!--                </a>-->
<!--            </li>-->
<!--            <li>-->
<!--                <a href="javascript:" class="page-numbers">-->
<!--                    3-->
<!--                </a>-->
<!--            </li>-->
<!--            <li>-->
<!--                <a href="javascript:" class="page-numbers">-->
<!--                    4-->
<!--                </a>-->
<!--            </li>-->
<!--            <li>-->
<!--                <a href="javascript:" class="page-numbers next">-->
<!--                    Next-->
<!--                    <i class="ion ion-ios-arrow-thin-right"></i>-->
<!--                </a>-->
<!--            </li>-->
        </ul>
        
        
        <div class="thim-ads_home-1">
            <div class="container">
                <div class="bp-element bp-element-call-to-action vblog-layout-1">
                    <div class="wrap-element" style="background-image: url(assets/images/ads-01.jpg);">
                        <div class="overlay"></div>
                        <a href="javascript:;" class="content">
                            <div class="text">
                                GAME SHOW Art line Collection Handmade
                            </div>
                            <div class="btn-readmore btn-small shape-round">
                                read more
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    
    
    </div>
	<?PHP //include 'footer.php';
	?>
</div>

<?PHP include 'script.php'; ?>
<script type="text/javascript">
    jQuery(document).ready(function ($) {
        $("#dt-episodes").owlCarousel({
            autoPlay: false,
            pagination: false,
            items: 3,
            stopOnHover: true,
            itemsDesktop: [900, 3],
            itemsDesktopSmall: [750, 3],
            itemsTablet: [500, 2],
            itemsMobile: [320, 1]
        });
        $(".next").click(function () {
            $("#dt-episodes").trigger("owl.next")
        });
        $(".prev").click(function () {
            $("#dt-episodes").trigger("owl.prev")
        });
        $("#dt-seasons").owlCarousel({
            autoPlay: false,
            items: 5,
            stopOnHover: true,
            pagination: false,
            itemsDesktop: [1199, 5],
            itemsDesktopSmall: [980, 5],
            itemsTablet: [768, 4],
            itemsTabletSmall: false,
            itemsMobile: [479, 3]
        });
        $(".next2").click(function () {
            $("#dt-seasons").trigger("owl.next")
        });
        $(".prev2").click(function () {
            $("#dt-seasons").trigger("owl.prev")
        });
        $("#slider-movies").owlCarousel({
            autoPlay: false,
            items: 2,
            stopOnHover: true,
            pagination: true,
            itemsDesktop: [1199, 2],
            itemsDesktopSmall: [980, 2],
            itemsTablet: [768, 2],
            itemsTabletSmall: [600, 1],
            itemsMobile: [479, 1]
        });
        $("#slider-tvshows").owlCarousel({
            autoPlay: false,
            items: 2,
            stopOnHover: true,
            pagination: true,
            itemsDesktop: [1199, 2],
            itemsDesktopSmall: [980, 2],
            itemsTablet: [768, 2],
            itemsTabletSmall: [600, 1],
            itemsMobile: [479, 1]
        });
        $("#slider-movies-tvshows").owlCarousel({
            autoPlay: 3000,
            items: 2,
            stopOnHover: true,
            pagination: true,
            itemsDesktop: [1199, 2],
            itemsDesktopSmall: [980, 2],
            itemsTablet: [768, 2],
            itemsTabletSmall: [600, 1],
            itemsMobile: [479, 1]
        });
        $(".reset").click(function (event) {
            if (!confirm(dtGonza.reset_all)) {
                event.preventDefault()
            }
        });
        $(".addcontent").click(function (event) {
            if (!confirm(dtGonza.manually_content)) {
                event.preventDefault()
            }
        });
    });
    (function (b, c, d, e, f, h, j) {
        b.GoogleAnalyticsObject = f, b[f] = b[f] || function () {
            (b[f].q = b[f].q || []).push(arguments)
        }, b[f].l = 1 * new Date, h = c.createElement(d), j = c.getElementsByTagName(d)[0], h.async = 1, h.src =
            e, j.parentNode.insertBefore(h, j)
    })(window, document, "script", "//www.google-analytics.com/analytics.js", "ga"), ga("create", "UA-151253304-7",
        "auto"), ga("send", "pageview");
</script>

</body>

</html>