<html>
	<head>
		<title>ITGig: Find IT Professionals</title>
		<link rel="stylesheet" href="stylesheet.css">
	</head>
	<body style="overflow-x:hidden;">
		<section id="nav">
			<a href="index.php" id="logo"></a>
			<div id="nav-search-section">
				<form action="search.php">
					<input type="text" id="nav-search">
					<input type="submit" id="nav-search-button" value="Search">
				</form>
			</div>
			<div id="nav-top">
				<p><a href="profile.php" class="nav-top-link">Profile</a></p>
				<p><a href="blog.php" class="nav-top-link">Blog</a></p>
				<p><a href="listing.php" class="nav-top-link">Browse</a></p>
				<p><a href="login.php" class="nav-top-link">Sign In</a></p>
				<p><a href="join.php" class="nav-top-link" id="join">Join</a></p>
			</div>
		</section>
	
		<section id="header">
			<div id="headertext">GIG IT: Find an IT Professional</div>
		</section>
		
		<section id="titletext">
			<h1 id="title">Welcome to GIG IT</h1>
			<p class="descriptions">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sodales turpis eget risus lacinia commodo. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed id ligula sit amet diam tincidunt varius ut vel libero. Cras ultricies fermentum ipsum eget dignissim. Maecenas ante purus, vehicula ac dui ut, egestas condimentum diam. Nam mi augue, pulvinar sed dui dictum, tempus vulputate purus. In ultricies, lorem ac rhoncus facilisis, urna libero suscipit lectus, nec porttitor augue ipsum porttitor nulla. Donec ornare dolor nec justo sollicitudin fringilla. Nam at tincidunt quam. Morbi posuere tristique pharetra. Aenean malesuada, metus a blandit ornare, urna ex auctor sapien, eu faucibus dui turpis id dolor. Praesent tincidunt sed odio et commodo. Mauris at tortor sollicitudin, cursus eros eu, condimentum turpis. Quisque placerat efficitur iaculis.</p>
		</section>
		
		<section id="content">
			<h2 class="titletext">Popular Professional Services</h2>
			<div id="service-home">
				<div class="service-home-box">
					<p class="service-home-box-text">Pentester</p>
				</div>
				<div class="service-home-box" id="threathunter">
					<p class="service-home-box-text">Threat Hunter</p>
				</div>
				<div class="service-home-box">
					<p class="service-home-box-text">IT Auditor</p>
				</div>
				<div class="service-home-box">
					<p class="service-home-box-text">Web Developer
				</div>
				<div class="service-home-box">
					<p class="service-home-box-text">UXID Designer</p>
				</div>
			</div>
		</section>
		
		<section id="newsletter">
			<div id="newsletter-image"></div>
			<div id="newsletter-content">
				<h3 id="newsletter-title">Have a Curious Mind?</h3>
				<p class="descriptions">Sign up to our newsletter to learn more about the changes in the IT industry!</p>
				<form action="newsletter_process.php">
					<input type="email" id="newsletter-input">
					<input type="submit" id="newsletter-submit" value="Sign Up">
				</form>
			</div>
		</section>
		
		<section id="footer">
			<div id="footer-nav">
				<h3 id="footer-nav-title">Helpful Links</h3>
			</div>
			<div id="footer-newsletter">
				<form action="newsletter_process.php">
					<input type="email" id="footer-newsletter-input">
					<input type="submit" id="footer-newsletter-submit" value="Notify Me!">
				</form>
			</div>
		</section>
		
	</body>
</html>
