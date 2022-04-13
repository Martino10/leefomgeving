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
            geluidsoverlast = Ja
        else:
            geluidsoverlast = Nee
        ldrValue = dataArray[4]

        # berekening algemene kwaliteitsscore
        gasscore = min(100 - ((sqlgas-600)/100 * 5),100)
        tempscore = 100 - (abs((sqltemp - 20) * 7))
        humidscore = 100 - (abs(sqlhumid - 45) * 2)
        soundscore = abs(sqlsound * 100 - 100)
        lightscore = 100 - (abs(ldrValue - 700) / 10)
        scores = [gasscore, tempscore, humidscore, soundscore, lightscore]

        sqlscore = sum(scores) / len(scores)

        sql = """INSERT INTO gas (value) VALUES (%s)""" #namen van 
        mycursor.execute(sql, (sqlgas,)) #execute de sql statement met data uit lijst. %s is waarde van sqlgas.
        sql = """INSERT INTO temperatuur (value) VALUES (%s)"""
        mycursor.execute(sql, (sqltemp,))
        sql = """INSERT INTO luchtvochtigheid (value) VALUES (%s)"""
        mycursor.execute(sql, (sqlhumid,))
        sql = """INSERT INTO geluid (value) VALUES (%s)"""
        mycursor.execute(sql, (geluidsoverlast,))
        sql = """INSERT INTO ldr (value) VALUES (%s)"""
        mycursor.execute(sql, (ldrValue,))
        sql = """INSERT INTO qualityscore (value) VALUES (%s)"""
        mycursor.execute(sql, (sqlscore,))
        
        #tabelaanpassingen zijn altijd nog mogelijk