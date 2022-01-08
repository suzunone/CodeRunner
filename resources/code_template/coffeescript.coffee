process.stdin.resume()
process.stdin.setEncoding 'utf8'
util = require('util')
input = ''
process.stdin.on 'data', (text) ->
  input += text
  return
process.stdin.on 'end', ->
# Please enter your some code here!

  console.log input
  return
