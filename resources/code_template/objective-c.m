#import <Foundation/Foundation.h>
int main(void){
    NSAutoreleasePool* pool = [[NSAutoreleasePool alloc] init];
    // Please enter your some code here!

     NSData *stdinData = [[NSFileHandle fileHandleWithStandardInput] availableData];
     NSString *stdinString = [[NSString alloc] initWithData:stdinData encoding:NSUTF8StringEncoding];

    [[NSFileHandle fileHandleWithStandardOutput] writeData: [stdinString dataUsingEncoding: NSUTF8StringEncoding]];
    [pool release];
    return 0;
}
