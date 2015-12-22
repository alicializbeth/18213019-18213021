<?php
	// Include the library
	include('simple_html_dom.php');
	
	function get_info_by_no($no) {
		$xml=simplexml_load_file('crawlink.xml') or die("Error: Cannot create object");
		$no = ($_GET["no"]);
		foreach($xml->children() as $category) {
			$nom = $category->no;
			if ($nom == $no) {
				$link = $category->href;
				$name = $category->content;
			}
		}
		$datapost = array(); //tupple for saving content and links of a element
		$listpost = array();
		$countpost = 0;
		$html1 = file_get_html($link);
		$xml1 = new DOMDocument();
		$xml_postlist = $xml1->createElement("postlist");
		foreach ($html1->find('div[id^=post-]') as $div1)
		{
			foreach ($div1->find('h2[class=entry-title]') as $h2)
			{
				foreach ($h2->find('a') as $a1)
				{
					$xml_post = $xml1->createElement("post");
					$xml_no = $xml1->createElement("no");
					$xml_no->nodeValue = $countpost;
					$xml_href = $xml1->createElement("href");
					$xml_href->nodeValue = $a1->href;
					$xml_content = $xml1->createElement("content");
					$xml_content->nodeValue = $a1->plaintext;
					$xml_post->appendChild( $xml_no );
					$xml_post->appendChild( $xml_href );
					$xml_post->appendChild( $xml_content );
					$xml_postlist->appendChild( $xml_post );
					$countpost = $countpost + 1;
				}
			}
		}
		$xml1->appendChild( $xml_postlist);
		$filename = $name."";
		$xml1->save($name.".xml");
		//resulting on filename of xml
		return $filename;
	}
	if (isset($_GET["action"])) {
		switch ($_GET["action"]) {
			case "get_info" ;
				if (isset($_GET["no"]))
					$value = get_info_by_no ($_GET["no"]);
				else
					$value = "ERROR";
				break;
		}
	}
	exit (json_encode($value));
?>
