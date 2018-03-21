from nltk.parse.stanford import StanfordDependencyParser
import numpy as np
import cv2
import imageio
import re
imageio.plugins.ffmpeg.download()
from moviepy.editor import VideoFileClip, concatenate_videoclips
from moviepy.editor import VideoFileClip, concatenate_videoclips

import nltk
import os
import sys

try:
	os.remove("my_concatenation.mp4")
except:
	pass
print(sys.path)
name=""

stopWords=['over', 'ours', 'during', 'through', 'm', 'mustn', 'myself', 'can', 'which', 'a', 'because', 'no', 'yourselves', 'their', 'don', 'ourselves', 'had', 'before', "don't", "doesn't", 'once', 'itself', 'is', 'from', 'own', "you've", 'when', 'each', 'into', 'both', "weren't", 'its', "mightn't", 'nor', 'that', 'are', 'were', 'too', 've', 'has', 'theirs', 'himself', 'will', 'hasn', 'very', 'they', 'after', 'against', 'won', 'did',  'other', 'below', 'not', 'haven', 'until', "that'll", 'being', 'll', 'yourself', 'or', "hasn't", 'above', 'an', 'all', 'those', 'the', 'so', "didn't", 'was', 'any', 'shouldn', 'my', 'aren', 'how', 'some', "couldn't", 'by', 'ma', 'whom', 'been', 'having', 'we', 's', 'as', "needn't", 'weren', "wasn't", "you'd", 'for', 'doesn', 'should', 'couldn', 'between', 'our', 'while', 'didn', "shouldn't", 'wouldn', 'am', 'this', 'and', 'off', 'he', 'such', 'hadn', 'them', "you'll", 'mightn', 'wasn', "isn't", 'again', 'on', 'but', 'to', 'these', "she's", 'isn', 'hers', 'with', 'now', 'have', 'o', 'about', 'few', "hadn't", 'why', 'her', 'him', "won't", 'further', "shan't", 'doing', 'same', 'just', 'only', "mustn't", 'up', 'under', 'd', 'then', 'in', 'who', 'herself', "aren't", 'it', 'out', 'here', "should've", 'yours', 'more', 'be', 'does', 'shan', "it's", 'than', 'most', 'i', 'his', 'at', 'y', 'needn', 'do', "haven't", 're', 'she', 'of', 'if', "you're", "wouldn't", 'themselves', 't', 'ain', 'there', 'down','much']

for each in range(1,len(sys.argv)):
    name+=sys.argv[each]
    name+=" "
name.lower()
name = re.sub(r'[^\w\s]', '', name)
input_text=name

text = nltk.word_tokenize(input_text)
array=[]
for each in text:
    if each not in stopWords:
        array.append(each)
result=nltk.pos_tag(array)

for each in result:
    print(each)

dict={}
dict["NN"]="noun"
arg_array=[]

for text in result:
    arg_array.append(VideoFileClip(text[0]+".mp4"))
    print(text[0]+".mp4")
print(arg_array[0])
        
final_clip = concatenate_videoclips(arg_array)
final_clip.write_videofile("my_concatenation.mp4")





