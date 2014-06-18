def distance(a, precision):
	return abs(float(a)-float(round(a,precision)))

#make list of lines to remove
hroutput = open("hroutput", 'r')
i=0
count = 0
liste=[]
for line in hroutput:
	value = float(line)
	#print value, abs (value-round(value,1))
	if (abs (value-round(value,1) > 0.025)):
		liste.append(i)
		count+=1

	i+=1
print count

#remove from biginput
biginput = open("biginput", 'r')
filinput = open("filinput", 'w')

i=-1
filinput.write(str(100-count)+'\n')
for line in biginput:
	if (line == "\n"):
		i+=1
	if (i>=0 and not(i in liste)):
		filinput.write(line)

#	if (i>=0):
#		if not(i in liste):
#			filinput.write(line)

#	i+=1


#print "COUNT = ",count