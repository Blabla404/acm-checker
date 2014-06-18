#include <iostream>
#include <string>
#include <vector>
#include <stdio.h>

using namespace std;

vector<int> toGray(int num)
{
    if (num==0)
        return vector<int>(1,0);
    else
    {
        vector<int> tmp = toGray(num-1);
        if (num%2 == 0) //inverser bit à gauche du 1 le plus à droite
        {
            int rightmost = -1;
            for (int i=tmp.size()-1; i>=0; i--)
                if (tmp[i] == 1)
                {
                    rightmost = i;
                    break;
                }
            if (rightmost==0)
                tmp.insert(tmp.begin(),1);
            else
                tmp[rightmost-1] = (tmp[rightmost-1]+1)%2;
        }
        else //inverser dernier bit
            tmp[tmp.size()-1] = (tmp[tmp.size()-1]+1)%2; //invert bit
        return tmp;
    }
}

void print_bin(vector<int> bin)
{
    for (unsigned int i=0; i<bin.size(); i++)
        cout<<bin[i];
    cout<< endl;
}

int main()
{
    int nbcases;
    cin >> nbcases;
    for (int i=0; i<nbcases; i++)
    {
        int number;
        cin >> number;
        print_bin(toGray(number));
    }
}