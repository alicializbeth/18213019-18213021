#Using rsync in shell scripting
#Reference: http://stackoverflow.com/questions/4602153/how-do-i-use-wget-to-download-all-images-into-a-single-folder

wget -nd -r -l 1 -P /input -A jpg -e robots=off http://www.itb.ac.id
rsync -a /input /backup
