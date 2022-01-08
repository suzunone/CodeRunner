process.stdin.resume();
process.stdin.setEncoding('utf8');
// Please enter your some code here!

let util = require('util');
let input = "";

process.stdin.on('data', function (text) {
  input += text;
});

process.stdin.on('end', function () {
  // Please enter your some code here!
  console.log(input);
});
