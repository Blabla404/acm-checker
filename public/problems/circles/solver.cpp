#include <iostream>
#include <vector>
#include <algorithm>
#include <map>
#include <string>
#include <random>
#include <set>
#include <sstream>
#include <cassert>
#include <iomanip>
#include <limits>

using namespace std;

typedef long long ll;

int main(){
	ios::sync_with_stdio(false);
	cin.tie(nullptr);
	int T;
	cin >> T;
	for(int icase=0;icase<T;++icase){
		int n;
		cin >> n;
		vector<int> t(n);
		vector<double> r(n);
		for(int i=0;i<n;++i)
			cin >> r[i]; 
		for(int i=0;i<n;++i)
			t[i]=i;
		double res = numeric_limits<double>::max();
		do{
			vector<double> d(n);
			for(int i=0;i<n;++i)
				d[i] = r[t[i]];

			for(int i=1;i<n;++i){
				for(int j=0;j<i;++j)
					d[i] = max(d[j]+2*sqrt(r[t[i]]*r[t[j]]), d[i]);
			}

			double tmp=0;
			for(int i=0;i<n;++i)
				tmp = max(tmp, d[i]+r[t[i]]);
			res = min(res, tmp);
		}while(next_permutation(begin(t), end(t)));
		cout << fixed << setprecision(1) << res << '\n'; 
	}
}