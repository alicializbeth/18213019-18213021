<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">

		<title>Informasi Beasiswa | KM-ITB </title>

		<link href="css/association.css" rel="stylesheet">
		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/half-slider.css" rel="stylesheet">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
<body>

	<!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <div class="title">
					<a class="navbar-brand" href="#">KM-ITB</a>
				</div>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
               </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

	
    <div class="container">

        <div class="row">
            <div class="col-lg-12">
				<div class="menu-bar">
					<div class= "logo">
						<img id="logo-img" src="assets/logo.gif"></img>
					</div>
					<div class= "menu">
							<ul class="nav nav-pills">
								<li><a href="index.html">Home</a></li>
								<li><a href="#">Event</a></li>
								<li><a href="#">Open Data</a></li>
								<li><a href="#">Kader</a></li>
							</ul>
					</div>
				</div>
            </div>
        </div>
	</div>
	
	<?php
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$no = ($_POST['beasiswa']);
			printf("<script>location.href='client.php?action=get_info&no=".$no."'</script>");
		}
	?>
	
	<br><br><br><br><br>
	<div class="container">
	<div class="satu">
		<div class="satu-txt">
			<h1>Pilih Kategori Beasiswa:</h1>
			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
				<?php
					// Include the library
					include('simple_html_dom.php');
					
					// Retrieve the DOM from a given URL
					$html = file_get_html('http://www.infobeasiswa.net/sitemap/');
					
					//collecting initial links
					$links = array();
					$datalink = array();
					foreach($html->find('div[class=left]') as $div)
					{
						foreach ($div->find('h3') as $h3)
						{
							$str = $h3->plaintext;
							if ($str == "Categories:") {
								$counter = 0;
								foreach ($div->find('a') as $a)
								{
									$datalink[0] = $a->href;
									$datalink[1] = $a->plaintext;
									$links[$counter] = $datalink;
									$counter = $counter + 1;
								}
							}
						}
					}
					$data = array();
					//showing lists of categories available in form of radio button
					$xml = new DOMDocument();
					$xml_categories = $xml->createElement("Categories");
					for ($i=0; $i < $counter; $i++) {
						$data = $links[$i];
						echo '<input type="radio" name="beasiswa" value="'.$i.'" />'.$data[1].'<br/>';
						$xml_category = $xml->createElement("Category");
						$xml_no = $xml->createElement("no");
						$xml_no->nodeValue = $i;
						$xml_href = $xml->createElement("href");
						$xml_href->nodeValue = $data[0];
						$xml_content = $xml->createElement("content");
						$xml_content->nodeValue = $data[1];
						$xml_category->appendChild( $xml_no );
						$xml_category->appendChild( $xml_href );
						$xml_category->appendChild( $xml_content );
						$xml_categories->appendChild( $xml_category );
					}
					$xml->appendChild( $xml_categories);
					$xml->save("crawlink.xml");
				?>
				<br/>
				<button name="submit" type="submit">SUBMIT</button>
			</form>
		</div>
	</div>
	</div>
	
	<!-- Page Content -->
    <div class="container">
	<div class="center">
		<div class="social-media">
			<a href='https://www.facebook.com/ITB.KM'><img id="icon-fb" src="assets/home/icon-fb.png"></img></a>
			<a href='http://mail.google.com'><img id="icon-mail" src="assets/home/icon-mail.png"></img></a>
			<a href='https://www.instagram.com/km_itb/'><img id="icon-ig" src="assets/home/icon-ig.png"></img></a>	
		</div>
	</div>
	</div>
	
        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="copyright">
						<p>Sistem dan Teknologi Informasi 2013</p>
					</div>
            </div>
            <!-- /.row -->
        </footer>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>
</body>
</html>
