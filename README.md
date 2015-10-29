# 18213019-18213021
A repository for all Integrative Programming assignments of Alicia Lizbeth and Eveline Purnomo
Information System and Technology
School Electrical Engineering and Informatics
Bandung Institute of Techonology

(a) Exercise I
    Date released: Tuesday, Sept 8th 2015
    File names: ChatClient.java & ChatServer.java
    Detail processes:
    1. Server opens the connection with determined port number
    2. Client try to connect to the server, whether based on IP address or its localhost
    3. Client sends any message to the server
    4. Server receives the message
    5. Close the connection by typing ".okdone" on client side
   
(b) Exercise II
    Date released: Tuesday, Sept 15th 2015
    File names: Client.java & Server.java
    Detail processes:
    1. Server open the connection with determined port number
    2. Client try to connect to the server, whether based on IP address or its localhost
    3. Server sends list of files (A.txt, B.txt, and C.txt)
    4. Client chooses a file among the lists
    5. Server responds by sending the file to the client
    6. Close the connection by typing "END" on both server and client sides
    (The received files will be repositored at the same folder with the location of Client.java)
    
    NB: A.txt, B.txt, and C.txt on this repository are the test files for the 2nd assignment.

(c) Exercise III
    Date released: Tuesday, Sept 29th 2015
    File names: Downloader.java
    Detail processes:
    The code had been modified to be able to do these tasks below:
    1. Download a web page
    2. Parse / extract all hyperlinks on the web
    3. Download all parses on those hyperlinks
    
    NB: in order to run the file, user should install jsoup library and run the file with the path of the jar written on the command line (only if it's run on the terminal).

(d) Mid-Test Assignment
    Date released: Friday, Oct 23th 2015
    File names: imgdownloader.py & UTS.sh

    A script which is able to download all images with .jpg format on a web page. Every downloaded image will be backed up       automatically to another directory in the computer. The backup process will utilize rsync that is combined with python,      shell scripting as well.
    
    <b>Requirement Environment and Library</b>
    In order to run the program, user should install:
        1.	Python
            BeautifulSoup library.
        2.	Shell Scripting
            -	cwRsync
                 A packaging of Rsync for Windows with a client GUI that is used for fast remote file backup and                              synchronization.
            -	Gow
            -	Node.js
            -	Wget64


   
