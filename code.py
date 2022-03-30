import mysql.connector
import serial

port = serial.Serial("/dev/ttyUSB0", baudrate=9600, timeout=3.0)

mydb = mysql.connector.connect(
    host="localhost",
    user="user",
    passwd="passwd",
    database="leefomgeving"
)

while True:
    if port.readline() != "":
        dataString = port.readline() #alles van serial inladen in iets
        dataList = dataString.split(",") #splitten en list van maken
        sqlgas = dataArray[0] #specificeerd welke index uit de lijst gepakt moet worden.
        sqltemp = dataArray[1]
        sqlhumid = dataArray[2]
        sqlsound = dataArray[3]
        if sqlsound >= 1:
            geluidsoverlast = "ja"
        else:
            geluidsoverlast = "nee"
        ldrValue = dataArray[4]
        sql = """INSERT INTO gas (value) VALUES (%s)""" #namen van 
        mycursor.execute(sql, (sqlgas)) #execute de sql statement met data uit lijst. %s is waarde van sqlgas.
        sql = """INSERT INTO temperatuur (value) VALUES (%s)"""
        mycursor.execute(sql, (sqltemp))
        sql = """INSERT INTO luchtvochtigheid (value) VALUES (%s)"""
        mycursor.execute(sql, (sqlhumid))
        sql = """INSERT INTO geluid (value) VALUES (%s)"""
        mycursor.execute(sql, (geluidsoverlast))
        sql = """INSERT INTO ldr (value) VALUES (%s)"""
        mycursor.execute(sql, (ldrValue))
        
        #tabelaanpassingen zijn altijd nog mogelijk