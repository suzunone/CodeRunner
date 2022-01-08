package main

import "os"
import "io/ioutil"
import "fmt"

func main() {
  // Please enter your some code here!

  bytes, err := ioutil.ReadAll(os.Stdin)
  if err == nil{
    fmt.Println(string(bytes));
  }
}
