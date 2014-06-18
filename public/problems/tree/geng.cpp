#include <iostream>
#include <cassert>

using namespace std;

const int V = 2001;

int main(){
	int n, m;
	while(cin >> n >> m){
		cout << m << '\n';
		assert(n==m+1);
		for(int i=0;i<m;++i){
			int a, b;
			cin >> a >> b;
			cout << a << ' ' << b << ' ' << rand()%V - V/2 << '\n';
		}
	}
}