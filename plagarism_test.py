import nltk
import numpy as np
import pandas as pd

file1=open("doc1.txt","r")
text1=file1.readlines()

file2=open("doc2.txt","r")
text2=file2.readlines()

str1=''.join(text1)
str2=''.join(text2)

sent_text1=str1.split('.')
wrd1=''.join(sent_text1)
word_text1=wrd1.split(' ')

sent_text2=str2.split('.')
wrd2=''.join(sent_text2)
word_text2=wrd2.split(' ')

final_list=[]
for z in sent_text1:
    for y in sent_text2:
        if z == y:
            final_list.append(z)

final_list_wrd=[]
for a in word_text1:
    for b in word_text2:
        if a == b:
            final_list_wrd.append(a)

#print(final_list_wrd)

final_list_wrd.count("in")

word_text1.count("in")

array=final_list_wrd

unique=np.unique(array)

print(unique)

x=len(unique)

y=len(word_text2)

