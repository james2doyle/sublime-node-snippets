/**
 * Convert a source file into sublime snippets
 */

var fs = require('fs');

var fnAlternatives = ['callback', 'fn'];

function replaceArgs(match, contents) {
  var args = contents.split(',');
  var parts = [];
  for (var i = 0; i < args.length; i++) {
    var arg = args[i].trim();
    // push the new surrounded argument into an array
    if (fnAlternatives.indexOf(arg) < 0) {
      parts.push('${' + (i + 1) + ':' + arg + '}');
    } else {
      parts.push('function(${' + (i + 1) + ':args}) {\\n\\t${' + (i + 2) + ':// body}\\n}');
    }
  }
  // join that array with a comma space
  return '(' + parts.join(', ') + ')';
}

function getArgs(line) {
  // turn (one, two, three) into (${1:one}, ${2:two}, ${3:three})
  return line.replace(/\(([^()]+)\)/g, replaceArgs);
}

function makeTemplate(line) {
  // trim this b
  line = line.trim();
  // auto generate a name
  var name = line.split('(')[0];
  // get the arguments
  var snips = getArgs(line);
  // return the nice template
  return "    { \"trigger\": \"" + name + "\", \"contents\": \"" + snips + "${0}\" },\n";
}

fs.readFile('sources.txt', function(err, data) {
  // start our master string with the opening object and array
  var master = "{\n  \"scope\": \"source.js\",\n\n  \"completions\": [\n";
  if (err) throw err;
  // split the file into an array of lines
  var lines = data.toString().split("\n");
  for (var i in lines) {
    // leave out the commented lines
    if (lines[i][0] !== '#') {
      master += makeTemplate(lines[i]);
    }
  }
  // remove comma from final string
  master = master.substring(0, master.length - 2);
  // cap off the end
  master += "\n  ]\n}";
  // write to file
  fs.writeFile('node-completions.sublime-completions', master, function(err) {
    if (err) throw err;
    console.log('file saved');
  });
});