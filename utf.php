<?php

$alphabets = array(
		   '"' => 'uml',
		   '`' => 'grave',
		   "'" => 'acute',
		   '^' => 'circ',
		   '~' => 'tilde',
		   'c' => 'cedil',
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
    $symbols[$symbols_one] = $symbols_one;
  }

if (array_key_exists($_POST["tex"]))
  {
    $tex = $_POST["tex"];
    if (preg_match('/^\\(.*)\{([A-Za-z])\}$/',$tex, $matches))
      {
	if (array_key_exists($matches[1],$alphabets))
	  {
	    print "&" . $matches[2] . $alphabets[$matches[1]] . ";";
	  }
      }
  }

?>