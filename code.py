import mysql.connector
import serial
import mariadb
import time

port = serial.Serial("/dev/ttyUSB0", baudrate=9600, timeout=3.0)
dataString = "0, 0, 0, 0, 0"
dataList = dataString.split(",") #splitten en list van maken


mydb = mariadb.connect(
    host="localhost",
    user="user",
    passwd="passwd",
    database="leefomgeving"
)
mycursor = mydb.cursor()

while True:
    if len(dataList) == 5:
        decoding = port.readline() #alles van serial inladen in iets
        dataString = decoding.decode("utf-8")
        dataList = dataString.split(",") #splitten en list van maken
        #dataFloat = dataList#[float(i) for i in dataList]
        #print(dataList)
        sqlgas = dataList[0] #specificeerd welke index uit de lijst gepakt moet worden.
        sqltemp = dataList[1]
        sqlhumid = dataList[2]
        sqlsound = dataList[3]
        if sqlsound == 1:
            geluidsoverlast = "ja"
        else:
             geluidsoverlast = "nee"
        ldrValue = dataList[4]
        #print("gas:", sqlgas)
        #print("temperatuur:", sqltemp)
        #print("vochtigheid:", sqlhumid)
        #print("geluid:", geluidsoverlast)
        #print("ldr:", ldrValue)
        sql = "INSERT INTO gas (value) VALUES (%s)" #namen van 
        mycursor.execute(sql, (sqlgas,)) #execute de sql statement met data uit lijst. %s is waarde van sqlgas.
        sql = "INSERT INTO temperatuur (value) VALUES (%s)"
        mycursor.execute(sql, (sqltemp,))
        sql = "INSERT INTO luchtvochtigheid (value) VALUES (%s)"
        mycursor.execute(sql, (sqlhumid,))
        sql = "INSERT INTO geluid (value) VALUES (%s)"
        mycursor.execute(sql, (geluidsoverlast,))
        sql = "INSERT INTO ldr (value) VALUES (%s)"
        mycursor.execute(sql, (ldrValue,))
        #print(dataList)
        mydb.commit()
        time.sleep(60)
    else:
        print("NeeDieWerktNiet")
        
        #tabelaanpassingen zijn altijd nog mogelijk
