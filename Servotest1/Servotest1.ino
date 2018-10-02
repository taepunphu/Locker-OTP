#include <ESP8266WiFi.h>
#include <PubSubClient.h>
#include <Servo.h>

// Update these with values suitable for your network.
const char* ssid = "Mixxxxxxxxxx";
const char* password = "kuyraiaisus";

// Config MQTT Server
#define mqtt_server "m15.cloudmqtt.com"
#define mqtt_port 19684
#define mqtt_user "TEST"
#define mqtt_password "12345"

//#define LED_PIN 2
Servo myservo;

int pos = 0;

WiFiClient espClient;
PubSubClient client(espClient);

void setup() {
//  pinMode(LED_PIN, OUTPUT);
  myservo.attach(2);
  
  Serial.begin(115200);
  delay(10);

  Serial.println();
  Serial.print("Connecting to ");
  Serial.println(ssid);

  WiFi.begin(ssid, password);

  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }

  Serial.println("");
  Serial.println("WiFi connected");
  Serial.println("IP address: ");
  Serial.println(WiFi.localIP());
  
  client.setServer(mqtt_server, mqtt_port);
  client.setCallback(callback);
}

void loop() {
  if (!client.connected()) {
    Serial.print("Attempting MQTT connection...");
    if (client.connect("ESP8266Client", mqtt_user, mqtt_password)) {
      Serial.println("connected");
      client.subscribe("/LED");
    } else {
      Serial.print("failed, rc=");
      Serial.print(client.state());
      Serial.println(" try again in 5 seconds");
      delay(5000);
      return;
    }
  }
  client.loop();
}

void callback(char* topic, byte* payload, unsigned int length) {
  Serial.print("Message arrived [");
  Serial.print(topic);
  Serial.print("] ");
  String msg = "";
  int i=0;
  while (i<length) msg += (char)payload[i++];
//  if (msg == "GET") {
//    client.publish("/LED", (digitalRead(LED_PIN) ? "LEDON" : "LEDOFF"));
//    Serial.println("Send !");
//    return;
//  }
//  digitalWrite(LED_PIN, (msg == "LEDON" ? LOW : HIGH));
  if(msg == "lock"){
  servolock();
    }
  else if(msg == "unlock"){
    servounlock();
    }
  Serial.println(msg);
}

void servolock() {
  for (pos = 0; pos <= 180; pos += 1) { // goes from 0 degrees to 180 degrees
    // in steps of 1 degree
    myservo.write(pos);              // tell servo to go to position in variable 'pos'
    delay(15);                       // waits 15ms for the servo to reach the position
    break;
  }
}

void servounlock(){
  for (pos = 180; pos >= 0; pos -= 1) { // goes from 180 degrees to 0 degrees
    myservo.write(pos);              // tell servo to go to position in variable 'pos'
    delay(15);                       // waits 15ms for the servo to reach the position
    break;
  }
}
