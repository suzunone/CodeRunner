#include <stdio.h>
int main(void){
    // Please enter your some code here!
    char buffer[256];

    if (scanf("%255[^\n]%*[^\n]", buffer) != 1) {
        return 1;
    }
    scanf("%*c");

    printf("%s", buffer);

    return 0;
}
