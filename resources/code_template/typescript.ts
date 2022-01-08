process.stdin.resume();
process.stdin.setEncoding('utf8');
// Please enter your some code here!

const rl = require('readline').createInterface({
    input: process.stdin,
    output: process.stdout,
    prompt: ''
});

rl.prompt();

rl.on('line', (line: any) => {
    //do your processing here.
    console.log(line);
});

rl.on('close', () => {
    process.exit(0);
});
