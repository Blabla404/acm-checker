#include <iostream>
#include <cstdlib>

using namespace std;

const int T = 100;
const int u0 = 10001;
const int n = 21;

int main(){
	srand(time(nullptr));

	cout << T << endl;
	for(int i=0;i<T;++i)
		cout << rand()%u0 << ' ' << rand()%n << endl;
}