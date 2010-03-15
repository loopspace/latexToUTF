<?php

$alphabets = array(
		   '"' => 'uml',
		   '`' => 'grave',
		   "'" => 'acute',
		   '^' => 'circ',
		   '~' => 'tilde',
		   'c' => 'cedil',
		   'v' => 'caron',
		   '.' => 'dot',
		   'mathbb' => 'opf'
		   );

$symbols = array(
		 "ae" => "aelig",
		 "AE" => "AElig",
		 "oe" => "oelig",
		 "OE" => "OElig",
		 "aa" => "aring",
		 "AA" => "Aring",
		 "o" => "oslash",
		 "O" => "Oslash",
		 "ss" => "szlig",
		 "dag" => "dagger",
		 "ddag" => "Dagger",
		 "S" => "sect",
		 "P" => "para",
		 "copyright" => "copy",
		 "pounds" => "pound",
		 "aleph" =>  "alefsym",
		 "wp" =>  "weierp",
		 "Re" =>  "real",
		 "Im" =>  "image",
		 "surd" =>  "radic",
		 "angle" =>  "ang",
		 "partial" =>  "part",
		 "infty" =>  "infin",
		 "clubsuit" =>  "clubs",
		 "diamondsuit" =>  "diams",
		 "heartsuit" =>  "hearts",
		 "spadesuit" =>  "spades",
		 "cdot" =>  "sdot",
		 "vartheta" =>  "thetasym",
		 "varpi" =>  "piv",
		 "dots" =>  "hellip",
		 "in" =>  "isin",
		 "to" => "rarr",
		 "approx" => "asymp",
		 "propto" => "prop",
		 "neq" => "ne",
		 "neg" => "not",
		 "wedge" => "and",
		 "vee" => "or",
		 "supset" => "sup",
		 "subset" => "sub",
		 "emptyset" => "empty",
		 "pm" => "plusm",
		 "implies" => "rArr"
		 );

$symbols_one = array(
		     "prime",
		     "nabla",
		     "forall",
		     "exists",
		     "times",
		     "notin",
		     "ni",
		     "prod",
		     "sum",
		     "ast",
		     "equiv",
		     "sim",
		     "oplus",
		     "cap",
		     "cup",
		     "rfloor",
		     "euro",
		     "int",
		     "cong",
		     "ne",
		     "le",
		     "ge",
		     "otimes",
		     "perp"
		     );

$greek = array(
	       "alpha",
	       "beta",
	       "gamma",
	       "delta",
	       "epsilon",
	       "zeta",
	       "eta",
	       "theta",
	       "iota",
	       "kappa",
	       "lambda",
	       "mu",
	       "nu",
	       "xi",
	       "omicron",
	       "pi",
	       "rho",
	       "sigma",
	       "tau",
	       "upsilon",
	       "phi",
	       "chi",
	       "psi",
	       "omega"
	       );

for ($i = 0; $i< count($greek); $i++)
  {
    $symbols[$greek[$i]] = $greek[$i];
    $symbols[ucfirst($greek[$i])] = ucfirst($greek[$i]);
  }

for ($i = 0; $i < count($symbols_one); $i++)
  {
    $symbols[$symbols_one[$i]] = $symbols_one;
  }

header ('content-type: application/xhtml+xml; charset=utf-8');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1 plus MathML 2.0 plus SVG 1.1//EN" "http://www.w3.org/2002/04/xhtml-math-svg/xhtml-math-svg-flat.dtd" >
<html xmlns="http://www.w3.org/1999/xhtml">

  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>LaTeX to Unicode Online Convertor</title>
  </head>
  <body>
  <p>
  <form action="utf.php" method="post">
  LaTeX Code:<input id="tex" name="tex" type="text" />
  <input id="submit" name="submit" value="Submit" type="submit" />
  </form>
  </p>
  <p>
  Result: <?php

  if (array_key_exists("tex",$_POST))
    {
      $tex = $_POST["tex"];
      $tex = trim($tex);
      if (preg_match('/^\\\\(.*){([A-Za-z])}$/',$tex, $matches))
	{
	  if (array_key_exists($matches[1],$alphabets))
	    {
	      print "&" . $matches[2] . $alphabets[$matches[1]] . ";";
	    }
	  else
	    {
	      print "(not currently recognised)";
	    }
	}
      elseif (preg_match('/^\\\\([[:punct:]]){?([A-Za-z])}?$/',$tex, $matches))
	{
	  if (array_key_exists($matches[1],$alphabets))
	    {
	      print "&" . $matches[2] . $alphabets[$matches[1]] . ";";
	    }
	  else
	    {
	      print "(not currently recognised)";
	    }
	}
      elseif (preg_match('/^\\\\([A-Za-z]+)$/',$tex, $matches))
	{
	  if (array_key_exists($matches[1],$symbols))
	    {
	      print "&" . $symbols[$matches[1]] . ";";
	    }
	  else
	    {
	      print "(not currently recognised)";
	    }
	}
      else
	{
	  print "(not currently recognised)";
	}
    }
?>
</p>
</body>
</html>