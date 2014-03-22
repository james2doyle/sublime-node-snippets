<?php

/**
 * Convert a source file into sublime snippets
 */

$handle = fopen("sources.txt", "r");

function writeSnippet($name, $data)
{
  $filename = 'snippets/'.trim($name).'.sublime-snippet';
  file_put_contents($filename, $data);
}

function getArgs($current)
{
  return preg_replace_callback('/\(([^()]+)\)/i', function($matches) {
    $args = array();
    $parts = explode(',', $matches[1]);
    for ($i=0; $i < count($parts); $i++) {
      $args[] = '${'.($i + 1).':'.trim($parts[$i]).'}';
    }
    $inside = implode(", ", $args);
    return '('.$inside.')${0}';
  }, $current);
}

function makeTemplate($item) {
  $name = explode('(', $item)[0];
    $item = trim($item);
    $snips = getArgs($item);
  $template = "<snippet>
  <content><![CDATA[
{$snips}
]]></content>
  <!-- Optional: Set a tabTrigger to define how to trigger the snippet -->
  <tabTrigger>{$name}</tabTrigger>
  <!-- Optional: Set a scope to limit where the snippet will trigger -->
  <scope>source.js</scope>
</snippet>";
writeSnippet($name, $template);
  }

  if ($handle) {
    while (($line = fgets($handle)) !== false) {
      if (substr_count($line, "#") !== 1) {
        makeTemplate($line);
      }
    }
  } else {
    echo "error";
  }
