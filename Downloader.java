/* 3rd Integrative Programming Assignment of Alicia Lizbeth (18213019) and Eveline Purnomo (18213021) */
/* source: http://www.tutorialspoint.com/javaexamples/net_webpage.htm */
/* source2: jsoup.org/cookbook/extracting-data/example-list-links */
/* note for 3rd functionality (to download all pages linked to the first url): each page is saved as data1.html, data2.html, and so on */

import java.io.BufferedReader;
import java.io.BufferedWriter;
import java.io.FileWriter;
import java.io.InputStreamReader;
import java.net.URL;

import org.jsoup.Jsoup;
import org.jsoup.helper.Validate;
import org.jsoup.nodes.Document;
import org.jsoup.nodes.Element;
import org.jsoup.select.Elements;

import java.io.IOException;

public class Downloader {
   public static void main(String[] args) throws Exception {
	Validate.isTrue(args.length == 1, "usage: supply url to fetch");
	String url = args[0];
	URL url1 = new URL( args[0] );
	System.out.println("Fetching %s..."+ url);
        Document doc = Jsoup.connect(url).get();
        Elements links = doc.select("a[href]");
        Elements media = doc.select("[src]");
        Elements imports = doc.select("link[href]");
	int i = 0;
	String namafile = "data"+i+".html";
	BufferedReader reader = new BufferedReader(new InputStreamReader(url1.openStream()));
	BufferedWriter writer = new BufferedWriter(new FileWriter(namafile));
	String line;
	while ((line = reader.readLine()) != null) {
		//System.out.println(line);
		writer.write(line);
		writer.newLine();
	}
	reader.close();
	writer.close();
	i++;
	for (Element link : links) {
		url1 = new URL (link.attr("abs:href"));
		namafile = "data"+i+".html";
		System.out.println(" * a: <" + link.attr("abs:href") + ">");
		reader = new BufferedReader(new InputStreamReader(url1.openStream()));
		writer = new BufferedWriter(new FileWriter(namafile));
		while ((line = reader.readLine()) != null) {
			writer.write(line);
			writer.newLine();
		}
		reader.close();
		writer.close();
		i++;
        }
   }
}
