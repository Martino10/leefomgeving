#include <dht.h>

dht DHT;

#define MQ2pin (0)
#define DHT11_PIN 3

float sensorValue;
boolean val =0;
int ledPin=4;

const int OUT_PIN = 2;
const int SAMPLE_TIME = 10000;
unsigned long millisCurrent;
unsigned long millisLast = 0;
unsigned long millisElapsed = 0;
int sampleBufferValue = 0;

void setup()
{
  Serial.begin(9600); // sets the serial port to 9600
   // allow the MQ-6 to warm up
  
}

void loop()
{
  TempAndHumid();

}

void TempAndHumid(){

    sensorValue = analogRead(MQ2pin);
    int chk = DHT.read11(DHT11_PIN);

   millisCurrent = millis();
   millisElapsed = millisCurrent - millisLast;
 
   if (digitalRead(OUT_PIN) == HIGH) {
     sampleBufferValue=1;
   }
 
   if (millisElapsed > SAMPLE_TIME) {
     Serial.print(sensorValue);
     Serial.print(",");
     Serial.print(DHT.temperature);
     Serial.print(",");
     Serial.print(DHT.humidity);
     Serial.print(",");
     Serial.print(sampleBufferValue);
     Serial.println("");
     sampleBufferValue = 0;
     millisLast = millisCurrent;
   }

   delay(200);
}
