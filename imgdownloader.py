# -*- coding: utf-8 -*-
# download images from a website
# by: Alicia Lizbeth (18213019) - Eveline Purnomo (18213021)
# sources: http://www.crummy.com/software/BeautifulSoup/bs3/documentation.html , http://www.java2s.com/Tutorial/Python/0420__Network/RetrievingImagesfromHTMLDocuments.htm
import urllib
import re
from BeautifulSoup import BeautifulSoup
import socket
import os
import subprocess

#define jpg downloader
def download_image(url,imgName):
	image = urllib.URLopener()
	image.retrieve (url,imgName)

#set URL
url1 = 'http://ditbang.itb.ac.id/'

#open page and parse all .jpg links
try:
	page = urllib.urlopen(url1)
except urllib2.HTTPError, e:
	print e.fp.read()
soup = BeautifulSoup (page)
tags = soup.findAll(src=re.compile(".jpg$"))

#check if directory /image exists
if not os.path.exists('image'):
	os.mkdir('image')

#setting path and counter
counter = len(os.listdir('image'))+1
path = os.getcwd() + '/image'

#calling downloader method to download
#print the link of all image resources
for tag in tags:
	os.chdir(path)
	urlName1 = tag['src']
	imgName1 = str(counter)+".jpg"
	print urlName1
	download_image(urlName1, imgName1)	
	counter = counter + 1

#backup files to local directory using rsync
backuppath = "/home/alicia/Documents/backup" #change the backup path accordingly
subprocess.call(["ls", "-l"])
subprocess.call(["rsync", "-ravz", "--progress","./", backuppath])
