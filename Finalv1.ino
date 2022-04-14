#include <dht.h>



#include <Arduino.h>
#include <TM1637Display.h>

// Module connection pins (Digital Pins)
#define CLK 4
#define DIO 5

// The amount of time (in milliseconds) between tests
#define TEST_DELAY   2000

const uint8_t SEG_DONE[] = {
            // d
  SEG_A | SEG_B | SEG_C | SEG_D | SEG_E | SEG_F,
  SEG_C | SEG_E | SEG_G,                          
  };

TM1637Display display(CLK, DIO);

dht DHT;
#define MQ2pin (1)
#define DHT11_PIN 3

int sensorValue;
boolean val =0;
const int ldrPin = A0;
const int OUT_PIN = 2;
const int SAMPLE_TIME = 20000;
unsigned long millisCurrent;
unsigned long millisLast = 0;
unsigned long millisElapsed = 0;
int sampleBufferValue = 0;


void setup()
{
  Serial.begin(9600); // sets the serial port to 9600
  
  pinMode(ldrPin, INPUT);
  Serial.print("150");
  Serial.print(",");
  Serial.print("21");
  Serial.print(",");
  Serial.print("50");
  Serial.print(",");
  Serial.print("0");
  Serial.print(",");
  Serial.println("50");
}

void loop()
{
  TempAndHumid();
  stepping();

}

void TempAndHumid(){
  
   sensorValue = analogRead(MQ2pin);
   int chk = DHT.read11(DHT11_PIN);

   int temp = DHT.temperature;
   int humidity = DHT.humidity;
   
   int ldrStatus = analogRead(ldrPin);
   
   millisCurrent = millis();
   millisElapsed = millisCurrent - millisLast;
 
   if (digitalRead(OUT_PIN) == HIGH) {
     sampleBufferValue=1;
   }
 
   if (millisElapsed > SAMPLE_TIME) {
     Serial.print(sensorValue);
     Serial.print(",");
     Serial.print(temp);
     Serial.print(",");
     Serial.print(humidity);
     Serial.print(",");
     Serial.print(sampleBufferValue);
     Serial.print(",");
     Serial.println(ldrStatus);
     sampleBufferValue = 0;
     millisLast = millisCurrent;
   }

   delay(200);
}

void stepping(){
  int k;
  uint8_t data[] = { 0xff, 0xff, 0xff, 0xff };
  uint8_t blank[] = { 0x00, 0x00, 0x00, 0x00 };
  display.setBrightness(0x0f);
  
  display.setSegments(SEG_DONE);
}
