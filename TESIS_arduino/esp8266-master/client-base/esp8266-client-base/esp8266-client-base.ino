#include <ESP8266WiFi.h>
#include <WiFiClient.h>
#include "esp8266_modes.hpp"
#include "esp8266_send.hpp"

// Nombre y clave de la red Wifi a la que va a conectarse
const char *ssid = "sofmleo";//ZTE-8chjqc Telecentro-737f TPLink - Sala 2
const char *pass = "Sofia2118";//1642879* VJNHLDZHVZMH Sala2RA.23

// Guardará el id de esp8266
String chipid = "";

// dominio al cual nos conectamos
String host = "mattprofe.com.ar";
// Puerto por el cual accederemos
int port = 81;
// url del archivo al cual enviaremos los datos
String url = "/alumno/11991/API/send.php";

// Almacena el milisegundo cuando se realizo el envio de datos
unsigned long pastMillis = 0;

//Variable del sensor/boton
int sensor=5;


// Sección de configuración e inicialización del esp8266
// ============================
void setup(){
 
  // Demora para estabilización
  delay(1000);
  pinMode(sensor,INPUT);
  // Inicializa la comunicación serial
  Serial.begin(115200);
  Serial.println("\r\n[OK] Comunicación Serial.");

  // optiene el id del ESP8266 y lo conecta a la red wifi
  chipid = wifiSTA(ssid, pass);
  
}

// Bucle infinito
// ============================   pulldown buttom
void loop(){
  //Serial.println(digitalRead(5));
  if(digitalRead(sensor)){
    delay(10);
    if(digitalRead(sensor)){
        // Variables con valores a enviar por POST
          String data = "chipid=" + chipid;
          
          // Envio los datos al host/url por el puerto especificado
          Serial.println(sendDataAPI(data, host, url, port, true));
   
        }
  }

  // //------ESTO NO SE TOCA-------

  // // Variables con valores a enviar por POST
  //   String data = "chipid=" + chipid;
    
  //   // Envio los datos al host/url por el puerto especificado
  //   Serial.println(sendDataAPI(data, host, url, port, true));

}
