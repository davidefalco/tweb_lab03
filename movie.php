<!DOCTYPE html>

<!-- courses.cs.washington.edu/courses/cse190m/11sp/homework/2/ -->

	<head>

		<title>Rancid Tomatoes</title>
		<?php 
			$film_title = $_GET["film"];
			$abs_path = "http://courses.cs.washington.edu/courses/cse190m/11sp/homework/2";
			$icon = "$abs_path/rotten.gif";
		?>
		<link rel="icon" type="image/png" href="$icon" />

		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

		<link href="movie.css" type="text/css" rel="stylesheet">
 
	</head>

<?php 
	$filename = "$film_title/info.txt";
	$file = fopen("$filename", "r");
	if($file){
		$infos = fread($file, filesize($filename));
	}
	$splitted_info = explode("\n", $infos);
	$splitted_title = $splitted_info[0];
	$splitted_year = $splitted_info[1];
	$splitted_score = $splitted_info[2];
?>

	<body>

		<div id = "banner">
				<?php 
					$img_banner = "$abs_path/banner.png";
				?>
				<img src="<?= $img_banner ?>" alt="Rancid Tomatoes">
		</div>


		<h1><?= "$splitted_title ($splitted_year)"?></h1>

		<div id = "textarea">
			<div id = "rating">
				<?php 
					if($splitted_score >= 60){
						$image_score = "$abs_path/freshbig.png";
					}else{
						$image_score = "$abs_path/rottenbig.png";
					}
				?>

				<img id = "rating-rotten" src="<?= $image_score; ?>" alt="Rotten">

				<span id = "total_rate"><?= $splitted_score.'%'; ?></span>
				<div id = "void"> </div>

				<span id = "recensioni"> 
					<?php 
						$i = 1;
						while(true){
							if(file_exists("$film_title/review$i.txt")){
								$i++;
							}else{
								break;
							}
						}
						$i--;
						if($i % 2 == 0){
							$review_page1 = $i/2;
						}else{
							$review_page1 = $i/2 + 1;
						}
					?>

					
					

						<?php 
							$j = 1;
							while($j <= $review_page1){
								$file = fopen("$film_title/review$j.txt", "r");
								if($file){
									$review = fread($file, filesize("$film_title/review$j.txt"));
								}
								$text = explode("\n", $review);
								$text_review = $text[0];
								$icon_type = $text[1];
								$author = $text[2];
								$source = $text[3];
						?>
							<p>
								<div class = "box">
									<?php 
										$icon_type = strtolower($icon_type);
										$icon_type_path = "$abs_path/$icon_type.gif";
									?>
									<img class = "icon" src="<?= $icon_type_path; ?>" alt = "Rotten">
									<q><?= $text_review; ?></q>
								</div>
							</p>
							<p>
								<?php 
									$user_icon_path = "$abs_path/critic.gif";
								?>
								<img class = "user" src="<?= $user_icon_path; ?>" alt="Critic">
								<?= $author; ?> <br>
								<span class = "site"><?= $source;?></span>
							</p>
						<?php
							$j++;
							}
						?>
						
				</span> <!-- div class = recensioni -->

				<span id = "recensioni2">

					<?php 
						while($j <= $i){
							$file = fopen("$film_title/review$j.txt", "r");
							if($file){
								$review = fread($file, filesize("$film_title/review$j.txt"));
							}
							$text = explode("\n", $review);
							$text_review = $text[0];
							$icon_type = $text[1];
							$author = $text[2];
							$source = $text[3];
					?>
						<p>
							<div class = "box">
								<?php 
									$icon_type = strtolower($icon_type);
									$icon_type_path = "$abs_path/$icon_type.gif";
								?>
								<img class = "icon" src="<?= $icon_type_path?>" alt = "Rotten">
								<q><?= $text_review; ?></q>
							</div>
						</p>
						<p>
							<?php 
								$user_icon_path = "$abs_path/critic.gif";
							?>
							<img class = "user" src="<?= $user_icon_path?>" alt="Critic">
							<?= $author; ?> <br>
							<span class = "site"><?= $source;?></span>
						</p>
					<?php
						$j++;
						}
					?>


				</span> <!-- div class = recensioni -->
			</div>
				
			<div id = "rating-dx">
				<span id = "image_film">
					<div>

						<img width=250px, height=412px src="<?= $film_title;?>/overview.png" alt="general overview">

					</div>

					<div id = "text">					
						<dl id = "titles">
							<?php 
								$filename = "$film_title/overview.txt";
								$file = fopen("$filename", "r");
								if($file){
									$infos = fread($file, filesize($filename));
								}
								$splitted_info = explode("\n", $infos);
								
								foreach ($splitted_info as $property) {
									$property_contain = explode(":", $property);
							?>

									<dt><?= $property_contain[0]; ?></dt>
									<dd><?= $property_contain[1]; ?></dd>
							<?php
								}
							?>
						</dl>
					</div>
				</span>
			</div>			
				<div id = "end-void">
					<p id = end-page>(1-10) of 88</p>
				</div>	
		</div>	

		<div id = "validators">
			<p>
				<a href="http://validator.w3.org/check/referer"><img width="88" src="https://upload.wikimedia.org/wikipedia/commons/b/bb/W3C_HTML5_certified.png" alt="Valid HTML5!"></a>
			<p> <br>
			<a href="http://jigsaw.w3.org/css-validator/check/referer"><img src="http://jigsaw.w3.org/css-validator/images/vcss" alt="Valid CSS!"></a>

		</div>

	</body>

</html>
