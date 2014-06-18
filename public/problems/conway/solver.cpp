#include <iostream>
#include <string>
#include <cassert>
#include <sstream>

using namespace std;

int main() {
    int T;
    cin >> T;
    assert(T>=0);
    assert(T<=100);
    for(int icase=1;icase<=T;++icase) {
        cout << "Case #" << icase << ": ";
        int u0, n;
        cin >> u0 >> n;
        assert(u0<=10000);
        assert(n<=20);
        ostringstream ss;
        ss << u0;
        string s = ss.str();
        while(n--){
            ostringstream tmp;
            int pos = 1;
            char curr = s[0];
            int nb = 1;
            while(pos<int(s.size())){
                if(curr == s[pos])
                    ++nb;
                else{
                    tmp << nb << curr;
                    curr = s[pos];
                    nb = 1;
                }
                ++pos;
            }
            tmp << nb << curr;
            s = tmp.str();
        }
        cout << s << '\n';
    }
}
