# python script CONCEPT to write Arduino sensordata to database 

import mysql.connector
import time
import matplotlib
matplotlib.use("Pdf")
from matplotlib import pyplot as plt
import serial

port = serial.Serial("/dev/ttyUSB0", baudrate=9600, timeout=3.0)

mydb = mysql.connector.connect(
    host="localhost",
    user="user",
    passwd="passwd",
    database="leefomgeving"
)

mycursor = mydb.cursor()

deleteTABLE = """ truncate table TABLE """
mycursor.execute(deleteLDR)
mydb.commit()
while True:
    # data to graph
    mycursor.execute("SELECT * FROM table;")
    ids = []
    values = []
    for x in mycursor:  # for every line (x) in table, store values in first and second column to ids and values
        ids.append(x[0])    
        values.append(x[1])
    plt.plot(ids, values)
    plt.xlabel('time (s)')
    plt.ylabel('value')
    plt.title('data')
    plt.savefig('public/img/graph.png', bbox_inches='tight')
    time.sleep(1)

    mydb.commit()
mydb.close()