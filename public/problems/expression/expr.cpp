#include<iostream>
#include<string>
#include<sstream>
#include<map>
#include<vector>
#include<cstring>
#include <list> 


using namespace std;
map<char,long long> variables;
long long result;
long long fin;
const long long T = 1000000007;

long long fastExp(long long x,long long p,long long modulo)
{
  long long r = 1;
  while(p!=0)
    {
      if(p%2==1)
	r = (r%T*x%T) % modulo;
      x = (x%T*x%T) % modulo;
      p = p/2;
    }
  return r;
}

long long compute (string s, long long begin){
  long long n=s.size();
  long long i=begin;
  long long res=0;
  //if bracket opened, recurse
  if (s[i]=='('){
    //cout << res<<" toto\n";
    res = compute(s,i+1);
    //cout << res<<" toto\n";
    i = fin;
  }
  //if bracket closed go back
  if (s[i]==')'){
    fin = i+1;
    return res;
  }
         
  char prevOp='!';
  while (i<n && s[i]!=')'){    
    if (s[i]!='^' && s[i]!='+' && s[i]!='*'){
      long long nbr=0;
      //Parsing the number
      if (s[i]=='('){
	nbr = compute(s,i+1);
	i = fin;
      }
      else{
	if (97<=s[i] && s[i]<=122)
	  nbr = variables[s[i]];
	else{
	  while('0'<=s[i] && s[i]<='9'){
	    nbr *= 10;
	    nbr += s[i]-'0';
	    i++;
	  }	  
	  i--;
	}
      }
      //Performing the operation
      if (prevOp=='!')
	res = nbr;
      else{
	if (prevOp=='^')
	  res = fastExp(res,nbr,T);
	else if (prevOp=='+')
	  res = (res%T + nbr%T)%T;
	else
	  res = (res%T * nbr%T)%T;
      }
    }
    //Operation readed
    else{
      prevOp = s[i];
    }
    if (s[i]=='('){
      long long resultat = compute(s,i+1);
      if (prevOp=='^')
	res = fastExp(res,resultat,T);
      else if (prevOp=='+')
	res = (res%T + resultat%T)%T;
      else
	res = (res%T * resultat%T)%T;
      i = fin;
    }
    if (s[i]==')'){
      fin = i+1;
      return res;
    }
      
    i++;
      
    //cout << i<<" toto\n";
  }
  if (i==n || s[i]==')'){
    fin = i+1;
    return res;
  }
    
  return res;
}


int main(){
  string E,s;
  long long N;
  while(cin >> N){
    variables.clear();
    long long it = 0;
    cin >> E;
    while(it < N){
      cin >> s;
      long long varVal;
      char v = s[0];
      s.erase(0,2);
      varVal=atoi(s.c_str());
      variables[v]=varVal;
      it++;
    }
    fin = 0;
    result= compute(E,0);
    cout << result<<'\n';
  }
  //fastExp(s,n);
}
