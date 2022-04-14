import mysql.connector
import serial
import time
from datetime import datetime
from matplotlib import pyplot as plt
import matplotlib

port = serial.Serial("/dev/ttyUSB0", baudrate=9600, timeout=3.0)
dataString = "0, 0, 0, 0, 0"
dataList = dataString.split(",") #splitten en list van maken

mydb = mysql.connector.connect(
    host="localhost",
    user="user",
    passwd="passwd",
    database="leefomgeving"
)

mycursor = mydb.cursor()

times = []
gasvalues = []
tempvalues = []
humidvalues = []
lightvalues = []

while True:
    if len(dataList) == 5:
        decoding = port.readline() #alles van serial inladen in iets
        dataString = decoding.decode("utf-8")
        print(dataString)
        dataList = dataString.split(",") #splitten en list van maken
        sqlgas = dataList[0] #specificeerd welke index uit de lijst gepakt moet worden.
        sqltemp = dataList[1]
        sqlhumid = dataList[2]
        sqlsound = dataList[3]
        print(sqlsound)
        if sqlsound == "1":
            geluidsoverlast = "Ja"
        else:
            geluidsoverlast = "Nee"
        ldrValue = dataList[4]

        # berekening algemene kwaliteitsscore
        gasscore = min(100 - ((int(sqlgas)-600)/100 * 5),100)
        tempscore = 100 - (abs((int(sqltemp) - 20) * 7))
        humidscore = 100 - (abs(int(sqlhumid) - 45) * 2)
        soundscore = abs(int(sqlsound) * 100 - 100)
        lightscore = 100 - (abs(int(ldrValue) - 700) / 10)
        scores = [gasscore, tempscore, humidscore, soundscore, lightscore]

        sqlscore = sum(scores) / len(scores)

        location = 1

        sql = """INSERT INTO gas (location_id) VALUES (location)"""
        sql = """INSERT INTO gas (value) VALUES (%s)""" #namen van 
        mycursor.execute(sql, (sqlgas,)) #execute de sql statement met data uit lijst. %s is waarde van sqlgas.

        sql = """INSERT INTO temperatuur (location_id) VALUES (location)"""
        sql = """INSERT INTO temperatuur (value) VALUES (%s)"""
        mycursor.execute(sql, (sqltemp,))

        sql = """INSERT INTO luchtvochtigheid (location_id) VALUES (location)"""
        sql = """INSERT INTO luchtvochtigheid (value) VALUES (%s)"""
        mycursor.execute(sql, (sqlhumid,))

        sql = """INSERT INTO geluid (location_id) VALUES (location)"""
        sql = """INSERT INTO geluid (value) VALUES (%s)"""
        mycursor.execute(sql, (geluidsoverlast,))

        sql = """INSERT INTO ldr (location_id) VALUES (location)"""
        sql = """INSERT INTO ldr (value) VALUES (%s)"""
        mycursor.execute(sql, (ldrValue,))

        sql = """INSERT INTO qualityscore (location_id) VALUES (location)"""
        sql = """INSERT INTO qualityscore (value) VALUES (%s)"""
        mycursor.execute(sql, (sqlscore,))
        mydb.commit()
        #tabelaanpassingen zijn altijd nog mogelijk

        # ---------------
        # grafieken maken

        datetime = datetime.now() # haalt datum en tijd op
        date = datetime.strftime('%d-%m-%Y')
        time_str = datetime.strftime('%H:%M')
        times.append(time_str)
        time_objects = [datetime.strptime(t, "%H:%M") for t in times]

        # gas
        gasvalues.append(sqlgas)
        plt.plot(time_objects, gasvalues)
        plt.xlabel('time (HH:MM)')
        plt.ylabel('CO2 (ppm)')
        plt.title('Gas')
        plt.savefig('public/img/gasgraph.png', bbox_inches='tight')

        # temperatuur
        tempvalues.append(sqltemp)
        plt.plot(time_objects, tempvalues)
        plt.xlabel('time (HH:MM)')
        plt.ylabel('Temperature (°C)')
        plt.title('Temperature')
        plt.savefig('public/img/tempgraph.png', bbox_inches='tight')

        # luchtvochtigheid
        humidvalues.append(sqlhumid)
        plt.plot(time_objects, humidvalues)
        plt.xlabel('time (HH:MM)')
        plt.ylabel('Humidity (%)')
        plt.title('Humidity')
        plt.savefig('public/img/humidgraph.png', bbox_inches='tight')

        # licht
        lightvalues.append(ldrValue)
        plt.plot(time_objects, lightvalues)
        plt.xlabel('time (HH:MM)')
        plt.ylabel('Brightness (Lux)')
        plt.title('Light')
        plt.savefig('public/img/lightgraph.png', bbox_inches='tight')
        time.sleep(60)
