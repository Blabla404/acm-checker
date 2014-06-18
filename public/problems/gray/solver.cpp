#include <iostream>
#include <vector>
#include <algorithm>
#include <map>
#include <string>
#include <random>
#include <set>
#include <sstream>
#include <cassert>

using namespace std;

const int N = 10000;

typedef long long ll;

int main(){
	ios::sync_with_stdio(false);
	cin.tie(nullptr);

	vector<string> gray(N);
	gray[0] = "0";
	for(int i=1;i<N;++i){
		if(i%2==0){
			gray[i] = gray[i-1];
			int curr=0;
			while(gray[i][curr]!='1') ++curr;
			++curr;
			if(curr==int(gray[i].size()))
				gray[i].push_back('1');
			else
				gray[i][curr] = (gray[i][curr]=='1'?'0':'1');
		}
		else{
			gray[i]=gray[i-1];
			gray[i][0] = (gray[i][0]=='1'?'0':'1');
		}
	}

	for(int i=0;i<N;++i)
		reverse(begin(gray[i]), end(gray[i]));

	int T;
	cin >> T;
	while(T--){
		int n;
		cin >> n;
		assert(n<N);
		cout << gray[n] << '\n';
	}
}