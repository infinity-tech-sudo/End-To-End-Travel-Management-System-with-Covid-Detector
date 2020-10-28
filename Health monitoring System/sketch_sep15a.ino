#include <Wire.h>
#include <math.h>
#include <SoftwareSerial.h>
#include <LiquidCrystal.h>
#include <DallasTemperature.h>
#include<ESP8266WiFi.h>
#include <dht.h>
#define RX 0
#define TX 1
#define DHT11_PIN 8
#define buzzerPin = 10;
LiquidCrystal lcd(2,3,4,5,6,7);
dht DHT;
String AP = "Virus Detected";       // AP NAME
String PASS = "DROWSSAP"; // AP PASSWORD
String API = "5AROUQH7RX284AD8";   // Write API KEY
String HOST = "api.thingspeak.com";
String PORT = "80";
int countTrueCommand;
int countTimeCommand; 
boolean found = false; 
int valSensor = 1;
  
SoftwareSerial ESP8266(RX,TX); 
  
void setup() {
   analogWrite(6,100);
   Serial.begin(9600);
   lcd.begin (16,2);
   pinMode(buzzerPin, OUTPUT); 
  esp8266.begin(115200);
  sendCommand("AT",5,"OK");
  sendCommand("AT+CWMODE=1",5,"OK");
  sendCommand("AT+CWJAP=\""+ AP +"\",\""+ PASS +"\"",20,"OK");
}

void loop() {
  
 String getData = "GET /update?api_key="+ API +"&field1="+getHeartRateValue()+"&field2="+getBodyTemperatureValue()+"&field3="+
 getHumidityValue()+"&field1="+getRoomTemperatureValue()+"&field3="+getAirQualityValue();
 sendCommand("AT+CIPMUX=1",5,"OK");
 sendCommand("AT+CIPSTART=0,\"TCP\",\""+ HOST +"\","+ PORT,15,"OK");
 sendCommand("AT+CIPSEND=0," +String(getData.length()+4),4,">");
 esp8266.println(getData);delay(1500);countTrueCommand++;
 sendCommand("AT+CIPCLOSE=0",5,"OK");
}
void loop() {
 int myBPM = pulseSensor.getBeatsPerMinute(); // Calls function on our pulseSensor object that returns BPM as an "int".
// "myBPM" hold this BPM value now.
if (pulseSensor.sawStartOfBeat()) { // Constantly test to see if "a beat happened".
Serial.println(" A HeartBeat Happened ! "); // If test is "true", print a message "a heartbeat happened".
Serial.print("BPM: "); // Print phrase "BPM: "
Serial.println(myBPM); // Print the value inside of myBPM.
lcd.setCursor(0,2);
lcd.print("HeartBeat Happened !"); // If test is "true", print a message "a heartbeat happened".
lcd.setCursor(5,3);
lcd.print("Heart Rate: "); 
lcd.print(myBPM);
}
delay(2000); // considered best practice in a simple sketch.
lcd.clear();
 // call sensors.requestTemperatures() to issue a global temperature 
  // request to all devices on the bus
  Serial.print("Requesting temperatures...");
  sensors.requestTemperatures(); // Send the command to get temperatures
  Serial.println("DONE");
  // After we got the temperatures, we can print them here.
  // We use the function ByIndex, and as an example get the temperature from the first sensor only.
  Serial.print("Temperature for the device 1 (index 0) is: ");
  Serial.println(sensors.getTempCByIndex(0));  
  Fahrenheit=sensors.toFahrenheit(Celcius);
  lcd.setCursor(0,0);
    lcd.print("Body Temp:");
    lcd.setCursor(10,0);
    lcd.print(sensors.getTempCByIndex(0));
    lcd.setCursor(15,0);
    lcd.print("C ");
    lcd.setCursor(0,1);
    lcd.print("Body Temp:");
      lcd.setCursor(10,1);
   lcd.print((sensors.getTempCByIndex(0) * 9.0) / 5.0 + 32.0);
  lcd.print((char)176);//shows degrees character
  lcd.setCursor(15,1);
  lcd.println("F");
  delay(2000); 
   lcd.clear();
   
  float temperature = 0;
  float humidity = 0;
  int chk = DHT.read11(DHT11_PIN);
  lcd.setCursor(0,0); 
  lcd.print("Temp: ");
  lcd.print(DHT.temperature);
  lcd.print((char)223);
  lcd.print("C");
  lcd.setCursor(0,1);
  lcd.print("Humidity: ");
  lcd.print(DHT.humidity);
  lcd.print("%");
  delay(2000);
  lcd.clear();
  
   int analogSensor = analogRead(smokeA1);
  Serial.print("Pin A1: ");
  Serial.println(analogSensor);
  lcd.print("Smoke Level:");
  lcd.print(analogSensor-50);
  // Checks if it has reached the threshold value
  if (analogSensor-50 > sensorThres)
  {
    
    lcd.setCursor(0, 2);
    lcd.print("Alert....!!!");
    digitalWrite(12, LOW);
    tone(buzzer, 1000, 200);
  }
  else
  {

    digitalWrite(12, HIGH);
    lcd.setCursor(0, 2);
    lcd.print(".....Normal.....");
  
  }
  delay(2000);
  lcd.clear();
  }   
  } 
}
if (HeartRate > 100 ||Body Temp > 37 || Humidity > 100 ||Smoke Level > 500) 
{
  tone(buzzerPin, 50);
  delay(500);
}
