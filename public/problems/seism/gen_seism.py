from random import random

def distance(a, precision):
	return abs(float(a)-float(round(a,precision)))

#print "{:0.4f}".format(distance(3.428565654, 2))
#print 5.42225565-5.425678754

print(500)
for i in range(450):
	print("{:0.3f}".format(random()*100000)+" "+"{:0.3f}".format(random()*50))
for i in range(50):
	print("{:0.3f}".format(random()*1000)+" "+"{:0.3f}".format(random()*500))
