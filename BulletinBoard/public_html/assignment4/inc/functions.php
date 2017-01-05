<?php

function parse($string)
      {
     
      //Arrays for the bbCode replacements
        $bbcode_regex = array(0 => '/\[b\](.+?)\[\/b\]/s',
                                                1 => '/\[i\](.+?)\[\/i\]/s',
                                                2 => '/\[u\](.+?)\[\/u\]/s',
                                                3 => '/\[quote\](.+?)\[\/quote\]/s',
                                                4 => '/\[quote\=(.+?)](.+?)\[\/quote\]/s',
                                                5 => '/\[url\](.+?)\[\/url\]/s',
                                                6 => '/\[url\=(.+?)\](.+?)\[\/url\]/s',
                                                7 => '/\[img\](.+?)\[\/img\]/s',
                                                8 => '/\[color\=(.+?)\](.+?)\[\/color\]/s',
                                                9 => '/\[size\=(.+?)\](.+?)\[\/size\]/s',
                                                10=> '/\[code\](.+?)\[\/code\]/s',
												11=> '/\[s\](.+?)\[\/s\]/s');

        $bbcode_replace = array(0 => '<b>$1</b>',
                                                1 => '<i>$1</i>',
                                                2 => '<u>$1</u>',
                                                3 => '<blockquote>$1</blockquote>',
                                                4 => '<table class="quote"><tr><td>$1 said:</td></tr><tr><td class="quote_box">$2</td></tr></table>',
                                                5 => '<a href="$1">$1</a>',
                                                6 => '<a href="$1">$2</a>',
                                                7 => '<img src="$1" alt="User submitted image" title="User submitted image"/>',
                                                8 => '<span style="color:$1">$2</span>',
                                                9 => '<span style="font-size:$1px">$2</span>',
                                                10 => '<code>$1</code>',
												11 => '<s>$1</s>',);

        ksort($bbcode_regex);
        ksort($bbcode_replace);

        //preg_replace to convert all remaining bbCode tags
        $post_bbcode_treated = preg_replace($bbcode_regex, $bbcode_replace, $string);

        return $post_bbcode_treated;
     
      }



/*
function parse($text)
{
// Replace any html brackets with HTML Entities to prevent executing HTML or script
		// Don't use strip_tags here because it breaks [url] search by replacing & with amp
		$Text = str_replace("<", "&lt;", $Text);
		$Text = str_replace(">", "&gt;", $Text);
		
		// Convert new line chars to html <br /> tags
		$Text = nl2br($Text);
		
		// Set up the parameters for a URL search string
		$URLSearchString = " a-zA-Z0-9\:\/\-\?\&\.\=\_\~\#\'";
		// Set up the parameters for a MAIL search string
		$MAILSearchString = $URLSearchString . " a-zA-Z0-9\.@";
		
		// Perform URL Search
		$Text = preg_replace("/\[url\]([$URLSearchString]*)\[\/url\]/", '<a href="$1" target="_blank">$1</a>', $Text);
		$Text = preg_replace("(\[url\=([$URLSearchString]*)\](.+?)\[/url\])", '<a href="$1" target="_blank">$2</a>', $Text);
		
		// Perform MAIL Search
		$Text = preg_replace("(\[mail\]([$MAILSearchString]*)\[/mail\])", '<a href="mailto:$1">$1</a>', $Text);
		$Text = preg_replace("/\[mail\=([$MAILSearchString]*)\](.+?)\[\/mail\]/", '<a href="mailto:$1">$2</a>', $Text);
		
		// Check for bold text
		$Text = preg_replace("(\[b\](.+?)\[\/b])is",'<b>$1</b>',$Text);
		
		// Check for Italics text
		$Text = preg_replace("(\[i\](.+?)\[\/i\])is",'<i>$1</i>',$Text);
		
		// Check for Underline text
		$Text = preg_replace("(\[u\](.+?)\[\/u\])is",'<u>$1</u>',$Text);
		
		// Check for strike-through text
		$Text = preg_replace("(\[s\](.+?)\[\/s\])is",'<s>$1</s>',$Text);
		
		// Check for over-line text
		$Text = preg_replace("(\[o\](.+?)\[\/o\])is",'<span style="text-decoration: overline">$1</span>',$Text);
		
		// Check for colored text
		$Text = preg_replace("(\[color=(.+?)\](.+?)\[\/color\])is","<span style=\"color: $1\">$2</span>",$Text);
		
		// Check for sized text
		$Text = preg_replace("(\[size=(.+?)\](.+?)\[\/size\])is","<span style=\"font-size: $1px\">$2</span>",$Text);
		
		// Check for list text
		$Text = preg_replace("/\[list\](.+?)\[\/list\]/is", '<ul class="listbullet">$1</ul>' ,$Text);
		$Text = preg_replace("/\[list=1\](.+?)\[\/list\]/is", '<ul class="listdecimal">$1</ul>' ,$Text);
		$Text = preg_replace("/\[list=i\](.+?)\[\/list\]/s", '<ul class="listlowerroman">$1</ul>' ,$Text);
		$Text = preg_replace("/\[list=I\](.+?)\[\/list\]/s", '<ul class="listupperroman">$1</ul>' ,$Text);
		$Text = preg_replace("/\[list=a\](.+?)\[\/list\]/s", '<ul class="listloweralpha">$1</ul>' ,$Text);
		$Text = preg_replace("/\[list=A\](.+?)\[\/list\]/s", '<ul class="listupperalpha">$1</ul>' ,$Text);
		$Text = str_replace("[*]", "<li>", $Text);
		
		// Check for font change text
		$Text = preg_replace("(\[font=(.+?)\](.+?)\[\/font\])","<span style=\"font-family: $1;\">$2</span>",$Text);
		
		// Declare the format for [code] layout
		$CodeLayout = '<table width="90%" border="1" align="center" cellpadding="0" cellspacing="0">
							<tr>
								<td class="quotecodeheader"> Code:</td>
								<td class="codebody">$1</td>
							</tr>
					   </table>';
		// Check for [code] text
		$Text = preg_replace("/\[code\](.+?)\[\/code\]/is","$CodeLayout", $Text);
		
		// Declare the format for [quote] layout
		$QuoteLayout = '<table width="30%" border="1" align="center" cellpadding="0" cellspacing="0">
							<tr>
								<td class="quotecodeheader"> Quote:$1</td>
							</tr>
					   </table>';
				 
		// Check for [code] text
		$Text = preg_replace("/\[quote\](.+?)\[\/quote\]/is","$QuoteLayout", $Text);
		
		// Images
		// [img]pathtoimage[/img]
		$Text = preg_replace("/\[img\](.+?)\[\/img\]/", '<img src="$1">', $Text);
		
		// [img=widthxheight]image source[/img]
		$Text = preg_replace("/\[img\=([0-9]*)x([0-9]*)\](.+?)\[\/img\]/", '<img src="$3" height="$2" width="$1">', $Text);
		
		return $Text;

}




function parse($string){
$string = strip_tags($string);
$string = str_replace("\n", "<BR>", $string);


//----------------------------------- Replacing urls and images

$patterns1 = "|\[url\](.*?)\[/url\]|s";
$patterns2 = "|\[url=(.*?)\](.*?)\[/url\]|s";
$patterns3 = "|\[img\](http://.*?)\[/img\]|s";

$replacements1 = "<a href=\"\$1\" target=\"_blank\">\$1</a>";
$replacements2 = "<a href=\"\$1\" target=\"_blank\">\$2</a>";
$replacements3 = "<br /><img src=\"\$1\"><br />";

$string = preg_replace($patterns1, $replacements1, $string);
$string = preg_replace($patterns2, $replacements2, $string);
$string = preg_replace($patterns3, $replacements3, $string);


$string = preg_replace("/\[img\=([0-9]*)x([0-9]*)\](.+?)\[\/img\]/", '<img src="$3" height="$2" width="$1">', $image);


//---------------------------------- Bold, Italics, Strike through, Underline, center
$string = preg_replace("|\[b\](.*?)\[/b\]|s"   ,   "<b>\$1</b>", $string );
$string = preg_replace("|\[s\](.*?)\[/s\]|s"   ,   "<s>\$1</s>", $string );
$string = preg_replace("|\[i\](.*?)\[/i\]|s"   ,   "<i>\$1</i>", $string );
$string = preg_replace("|\[u\](.*?)\[/u\]|s"   ,   "<u>\$1</u>", $string );
$string = preg_replace("|\[center\](.*?)\[/center\]|s"   ,   "<div align=\"center\">\$1</div>", $string );

//$string = preg_replace("|\[quote\](.*?)\[/quote\]|s"   ,   "<blockquote><p>$1</p></blockquote>", $string );

$string = preg_replace("/\[quote\](.+?)\[\/quote\]/is"  ,  "Quote : $1",  $string);

//$string = preg_replace("|\[quote\](.*?)\[/quote\]|s"   ,   "<blockquote><p>$1</p></blockquote>", $string );


$sring = preg_replace("|\[code\](.*?)\[/code\]|s",   "<pre>$1<pre>",   $string);


return $string;
}

function parse($text){
 $text = str_replace('<', '&lt;', $text);
 $text = str_replace('>', '&gt;', $text);
 $text = nl2br($text);
 $urlsearchstring = " a-zA-Z0-9\:\/\-\?\&\.\=\_\~\#\'";
 $mailsearchstring = $urlsearchstring . " a-zA-Z0-9\.@";
 
 $text = preg_replace("/\[url\]([$urlsearchstring]*)\[\/url\]/",
         "<a href=\"$1\">$1</a>", $text);
 $text = preg_replace("/\[url\=([$urlsearchstring]*)\](.+?)\[\/url\]/",
         "<a href=\"$1\">$2</a>", $text);
 $text = preg_replace("/\[b\](.+?)\[\/b\]/is",
         "<span class=\"bold\">$1</span>", $text);
 $text = preg_replace("/\[i\](.+?)\[\/i\]/is",
         "<span class=\"italic\">$1</span>", $text);
 $text = preg_replace("/\[u\](.+?)\[\/u\]/is",
         "<span class=\"underline\">$1</span>", $text);
 $text = preg_replace("/\[s\](.+?)\[\/s\]/is",
         "<span class=\"strikethrough\">$1</span>", $text);
 $text = preg_replace("/\[color\=(.+?)\](.+?)\[\/color\]/is",
         "<span style=\"color: $1\">$2</span>", $text);
 $text = preg_replace("/\[size\=(.+?)\](.+?)\[\/size\]/is",
         "<span style=\"font-size: $1px\">$2</span>", $text);
 $text = preg_replace("/\[code\](.+?)\[\/code\]/is",
         "<span style=\"monospace\">$1</span>", $text);
 $text = preg_replace("/\[quote\](.+?)\[\/quote\]/is",
         "<blockquote><p>$1</p></blockquote>", $text);
 $text = preg_replace("/\[img\](.+?)\[\/img\]/",
         "<img src=\"$1\">", $text);
 return $text;
}

function stripBBCode($text){
 $text = str_replace('<', '&lt;', $text);
 $text = str_replace('>', '&gt;', $text);
 $urlsearchstring = " a-zA-Z0-9\:\/\-\?\&\.\=\_\~\#\'";
 $mailsearchstring = $urlsearchstring . " a-zA-Z0-9\.@";
 
 $text = preg_replace("/\[url\]([$urlsearchstring]*)\[\/url\]/",
         "$1", $text);
 $text = preg_replace("/\[url\=([$urlsearchstring]*)\](.+?)\[\/url\]/",
         "$2", $text);
 $text = preg_replace("/\[b\](.+?)\[\/b\]/is",
         "$1", $text);
 $text = preg_replace("/\[i\](.+?)\[\/i\]/is",
         "$1", $text);
 $text = preg_replace("/\[u\](.+?)\[\/u\]/is",
         "$1", $text);
 $text = preg_replace("/\[s\](.+?)\[\/s\]/is",
         "$1", $text);
 $text = preg_replace("/\[color\=(.+?)\](.+?)\[\/color\]/is",
         "$2", $text);
 $text = preg_replace("/\[size\=(.+?)\](.+?)\[\/size\]/is",
         "$2", $text);
 $text = preg_replace("/\[code\](.+?)\[\/code\]/is",
         "$1", $text);
 $text = preg_replace("/\[quote\](.+?)\[\/quote\]/is",
         "$1", $text);
 $text = preg_replace("/\[img\](.+?)\[\/img\]/",
         "$1", $text);
 return $text;
}
*/

?>