<?php
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$no = ($_POST['beasiswa']);
			printf("<script>location.href='client.php?action=get_info&no=".$no."'</script>");
		}
?>

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
