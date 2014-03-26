#include<iostream>
#include <stdio.h>
#include<string>

using namespace std;

void abcd()
{
  for (int i=0;i<250;i++)
    cout<<"abcd";
  cout<<'\n';
}

void dbc()
{
  for (int i=0;i<331;i++)
    cout<<"dbc";
  cout<<'\n';
}

void cab()
{
  for (int i=0;i<331;i++)
    cout<<"cab";
  cout<<'\n';
}

int main()
{
  cout<<"abc\n";
  cout<<"aab\n";
  cout<<"aoob\n";
  cout<<"abababaabababa\n";
  cout<<"pqrsabcdpqrs\n";
  cout<<"aaab\n";
  cout<<"acaaaba\n";
  cout<<"zzzaaazz\n";
  cout<<"pooq\n";
  cout<<"apbpcpdpep\n";
  abcd();
  dbc();
  cab();
  for (int i=0;i<500;i++){
    abcd();
  }
  return 0;
}
