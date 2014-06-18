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

using namespace std;

typedef long long ll;

const double eps = 0.001;
const double PI = atan(1)*4;

int main(){
	ios::sync_with_stdio(false);
	cin.tie(nullptr);
	int T;
	cin >> T;
	for(int icase=0;icase<T;++icase){
		double a, p;
		cin >> a >> p;
		double lo=0, hi=a;
		while(hi-lo>eps){
			double x = (hi+lo)/2;
			double degat = (pow(x,1./3.)>=p)?PI*(pow(x,2./3.)-p*p)*log10(x):0;
			if(degat+x>a)
				hi = x;
			else
				lo = x;
		}
		cout << fixed << setprecision(1) << lo <<  '\n';
	}
}