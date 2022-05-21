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
		
		<?PHP //include_once "slider.php" ?>
		
		<?PHP
			$dom = @file_get_html("https://movierulzhd.co/", false);
			$list = $dom->find("div[class=module]", 1);
		?>
        
        <div class="thim-latest-video_home-2">
            <div class="container">
				
				<?PHP
					$header = $list->find('header');
					for ($i = 0; $i < count($header); $i++) {
						$head = $header[$i];
						?>
                        
                        <div class="bp-element bp-element-st-list-videos vblog-layout-grid-2">
                            <div class="wrap-element">
                                <div class="heading-post">
                                    <div class="wrap-title">
                                        <h3 class="title">
											<?PHP echo $head->find('h2', 0)->plaintext; ?>
                                        </h3>
                                    </div>
                                    <div class="wrap-title">
                                        <h3 class="">
			                                <?PHP
                                                if(count($head->find('span')) > 0){
                                                    $url = $head->find('span', 0)->find('a', 0)->href;
	                                                $total = ucwords($head->find('span', 0)->plaintext);
	                                                echo "<a href='$url'>$total</a>";
                                                }
                                            ?>
                                        </h3>
                                    </div>
                                </div>
                                
                                <div class="grid-posts">
									
									<?PHP
										$movies = $list->find('div.items', $i);
										$movies_section = $movies->find("article");
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
                                                                <?PHP echo $movie_rating; ?></span>IMDb
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
                                                        <p class="text-center"><?PHP echo $movie_release; ?></p>
                                                    </div>
                                                </div>
                                            </div>
										<?PHP }
									?>
                                
                                
                                </div>
                            </div>
                        </div>
					
					<?PHP }
				?>
            
            </div>
        </div>
        
        
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
	<?PHP //include 'footer.php'; ?>
</div>

<?PHP include 'script.php'; ?>

</body>

</html>