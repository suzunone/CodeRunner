use std::io;
// Please enter your some code here!

fn main(){
    let mut stdin = String::new();

    io::stdin().read_line(&mut stdin);
    println!("{}", stdin);
}
