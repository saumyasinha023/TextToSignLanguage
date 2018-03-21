import sys
import argparse
from nltk.parse.stanford import StanfordParser
from nltk.tag.stanford import StanfordPOSTagger, StanfordNERTagger
from nltk.tokenize.stanford import StanfordTokenizer
from nltk.tree import *
from nltk import word_tokenize
from nltk.corpus import stopwords
from nltk.stem import WordNetLemmatizer
from nltk.stem import PorterStemmer
import nltk

inputString = " "
import os
java_path = "C:\\Program Files\\Java\\jdk-9.0.4\\bin\\java.exe"
os.environ['JAVAHOME'] = java_path

for each in range(1,len(sys.argv)):
  inputString += sys.argv[each]
  inputString += " " 

# inputString = raw_input("Enter the String to convert to ISL: ")

parser=StanfordParser(model_path='D:/stanford-parser-full-2018-02-27/edu/stanford/nlp/models/lexparser/englishPCFG.ser.gz')

# o=parser.parse(s.split())

englishtree=[tree for tree in parser.parse(inputString.split())]
parsetree=englishtree[0]

dict={}

# "***********subtrees**********"
 
parenttree= ParentedTree.convert(parsetree)
for sub in parenttree.subtrees():
    dict[sub.treeposition()]=0

#"----------------------------------------------"

isltree=Tree('ROOT',[])
i=0
for sub in parenttree.subtrees():
    if(sub.label()=="NP" and dict[sub.treeposition()]==0 and dict[sub.parent().treeposition()]==0):
        dict[sub.treeposition()]=1
        isltree.insert(i,sub)
        i=i+1

    if(sub.label()=="VP" or sub.label()=="PRP"):
        for sub2 in sub.subtrees():
            if((sub2.label()=="NP" or sub2.label()=='PRP')and dict[sub2.treeposition()]==0 and dict[sub2.parent().treeposition()]==0):
                dict[sub2.treeposition()]=1
                isltree.insert(i,sub2)
                i=i+1

for sub in parenttree.subtrees():
    for sub2 in sub.subtrees():
          # print sub2
          # print len(sub2.leaves())
          # print dict[sub2.treeposition()]
          if(len(sub2.leaves())==1 and dict[sub2.treeposition()]==0 and dict[sub2.parent().treeposition()]==0):
              dict[sub2.treeposition()]=1
              isltree.insert(i,sub2)
              i=i+1

parsed_sent=isltree.leaves()

words=parsed_sent

stop_words=['over', 'ours', 'during', 'through', 'm', 'mustn', 'myself', 'can', 'which', 'a', 'because', 'no', 'yourselves', 'their', 'don', 'ourselves', 'had', 'before', "don't", "doesn't", 'once', 'itself', 'is', 'from', 'own', "you've", 'when', 'each', 'into', 'both', "weren't", 'its', "mightn't", 'nor', 'that', 'are', 'were', 'too', 've', 'has', 'theirs', 'himself', 'will', 'hasn', 'very', 'they', 'after', 'against', 'won', 'did',  'other', 'below', 'not', 'haven', 'until', "that'll", 'being', 'll', 'yourself', 'or', "hasn't", 'above', 'an', 'all', 'those', 'the', 'so', "didn't", 'was', 'any', 'shouldn', 'my', 'aren', 'how', 'some', "couldn't", 'by', 'ma', 'whom', 'been', 'having', 'we', 's', 'as', "needn't", 'weren', "wasn't", "you'd", 'for', 'doesn', 'should', 'couldn', 'between', 'our', 'while', 'didn', "shouldn't", 'wouldn', 'am', 'this', 'and', 'off', 'he', 'such', 'hadn', 'them', "you'll", 'mightn', 'wasn', "isn't", 'again', 'on', 'but', 'to', 'these', "she's", 'isn', 'hers', 'with', 'now', 'have', 'o', 'about', 'few', "hadn't", 'why', 'her', 'him', "won't", 'further', "shan't", 'doing', 'same', 'just', 'only', "mustn't", 'up', 'under', 'd', 'then', 'in', 'who', 'herself', "aren't", 'it', 'out', 'here', "should've", 'yours', 'more', 'be', 'does', 'shan', "it's", 'than', 'most', 'his', 'at', 'y', 'needn', 'do', "haven't", 're', 'she', 'of', 'if', "you're", "wouldn't", 'themselves', 't', 'ain', 'there', 'down','much']
# print stop_words

lemmatizer = WordNetLemmatizer()
ps = PorterStemmer()
lemmatized_words=[]

for w in parsed_sent:
  # w = ps.stem(w)
  lemmatized_words.append(lemmatizer.lemmatize(w))

islsentence = ""
print(lemmatized_words)
for w in lemmatized_words:
	if w not in stop_words:
		islsentence+=w
		islsentence+=" "

print(islsentence)

#print naya 

# f = open('out.txt','w')
# f.write(islsentence)
# f.close()