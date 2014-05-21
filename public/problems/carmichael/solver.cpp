#include<iostream>
#include<vector>

using namespace std;

typedef long long ent;

const int N=10000000;

int exp(ent a, ent b, ent mod){
  if(b==0) return 1;
  ent tmp=exp(a,b/2,mod);
  tmp=(tmp*tmp)%mod;
  if(b%2==0)
    return tmp;
  else return (a*tmp)%mod;
}

ent gcd(ent a, ent b){
  if(b==0) return a;
  return gcd(b,a%b);
}


int main(){
  vector<bool> prime(N,true);
  prime[0]=false;
  prime[1]=false;
  for(int i=2;i<N;++i)
    if(prime[i])
      for(int j=i+i;j<N;j+=i)
	prime[j]=false;

  int a,n1,n2;
  while(cin >> a >> n1 >> n2){
    int res=0;
    for(int i=n1;i<=n2;++i)
      if(!prime[i] && gcd(a,i)==1 && exp(a,i-1,i)==1){
	res++;
      }
    cout << res << '\n';
  }
}
