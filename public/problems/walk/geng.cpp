#include <iostream>
#include <cstdlib>

using namespace std;

const int T = 100;
const int N = 98;
const int Mii = 2001;

int main(){
	srand(time(nullptr));

	cout << T << endl;
	for(int i=0;i<T;++i){
		int n = rand()%N + 2;
		cout << n << endl;
		for(int j=0;j<n;++j){
			for(int k=0;k<n;++k)
				cout << rand()%Mii - Mii/2 << ' ';
			cout << endl;
		}
	}
}