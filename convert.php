<?php

/**
 * Convert a source file into sublime snippets
 */

// open our line-by-line file of functions
$handle = fopen("sources.txt", "r");

$master = "{\n  \"scope\": [\n  \"source.js\"\n  ],\n\n  \"completions\": [\n";

function getArgs($current)
{
  // turn (one, two, three) into (${1:one}, ${2:two}, ${3:three})
  return preg_replace_callback('/\(([^()]+)\)/i', function($matches) {
    $args = array();
    $parts = explode(',', $matches[1]);
    for ($i=0; $i < count($parts); $i++) {
      // push the new surrounded argument into an array
      $arg = trim($parts[$i]);
      if ($arg !== 'callback') {
        $args[] = '${'.($i + 1).':'.trim($parts[$i]).'}';
      } else {
        $args[] = 'function(${'.($i + 1).':args}){\n\t${'.($i + 2).':// body}\n}';
      }
    }
    // join that array with a comma space
    $inside = implode(", ", $args);
    return '('.$inside.')';
  }, $current);
}

function makeTemplate($item) {
  // grab everything before the first paren
  $name = trim(explode('(', $item)[0]);
    // get rid of the nasties
    $item = trim($item);
    // get those surrounded args
    $snips = getArgs($item);
    // return the nice template
    return "    { \"trigger\": \"{$name}\", \"contents\": \"{$snips}\${0}\" },\n";
  }

  if ($handle) {
    // read this file line-by-line
    while (($line = fgets($handle)) !== false) {
      // skip any hash lines
      if (substr_count($line, "#") !== 1) {
        // add them to our master string
        $master .= makeTemplate($line);
      }
    }
    // cap off the end of our array
    $master .= "  ]\n    }";
    // write them to our nice new file
    file_put_contents('node-completions.sublime-completions', $master);
  } else {
    // shits broke.
    echo "error";
  }
