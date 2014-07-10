#include <WiFi.h>
#include <avr/io.h>
#include <avr/interrupt.h>

boolean trigger;

char ssid[] = "SolarCapstone";

int del;
int status = WL_IDLE_STATUS;
int led = 13;
int out = A15;
int in = A14;

uint8_t serverip[4] = {192,241,246,131};
uint8_t servport = 80;

WiFiClient client;

void setup(){
  Serial.begin(9600);
  pinMode(led, OUTPUT);
  pinMode(A14, INPUT);
  pinMode(A15, OUTPUT);
  del = 0;
  trigger = true;
  TCCR1A = 0; // set TCCR1A register to 00000000
  TCCR1B = 0; // set TCCR1B register to 00000000
  OCR1A = 15624; // set compare match register; should be 1 sec delay
  TCCR1B |= (1 << WGM12); // Set WGM12 bit to 1, turns on CTC mode:
  TCCR1B |= (1 << CS12)|(1 << CS10); // Set CS10 and CS12 bits to 1
  TIMSK1 |= (1 << OCIE1A); // enable timer compare interrupt:
  sei();
  
  status = WiFi.begin(ssid);
  if (status != WL_CONNECTED) {
    Serial.println("Attempting to connect to wifi...");
    while(true);
  }
  
  else {
    Serial.print("Connected to wifi.");
  }
  
}

ISR (TIMER1_COMPA_vect){
  del = del + 1;
}

void loop(){
  int i;
  if (del >= 10) {
    digitalWrite(led, !digitalRead(led));
    delay(2);
    del = 0;
    Serial.println("Current:");
    int val = analogRead(in);
    double voltage = val*5.0/1023.0;
    double current = (voltage - 2.5)/0.066;
    Serial.println(current);
    Serial.println("CS voltage:");
    Serial.println(voltage);
    Serial.println("");
    for (i=0;i<10;i++) {
     if (sendHer(voltage, current)) {
      break;
     }
    } 
  }
  
  
}

boolean sendHer(double v, double c){
  boolean con = false;
  int i = 0;

  client.connect(serverip, servport);

  
  if (!client.connected()) {
    Serial.println("Failed to connect to server");
    return false;
  }
  
//  if (!client.available()){
//    Serial.println("Server not available");
//    return false;
//  }
  Serial.println("Sending http req");
  client.print("GET /pull.php?");

  client.print("volt=");
  client.print(v);
  client.print("&&curr=");
  client.print(c);
  client.println(" HTTP/1.0\r\n");
  client.println("Host:192.241.246.131\r\n");
  client.println("User-Agent: Arduino\r\n");
  client.println("Accept: text/html\r\n");
  client.println("Connection: close\r\n");
  client.println();

  Serial.println("Data pushed!");
  
  while (client.connected() && client.available()) {
    char c = client.read();
    Serial.print(c);
  }
  
  client.flush();
  client.stop();
  return true;
  
}


  
