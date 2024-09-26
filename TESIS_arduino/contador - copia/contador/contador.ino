int contadorBOTELLA=0;
int sensor= 1;
void setup() {
  Serial.begin(115200);
  pinMode(sensor,INPUT);
  // pinMode(2,OUTPUT);
  
  Serial.print("encendido");
}

void loop() {
  // digitalWrite(2,LOW);
  // if(digitalRead(sensor)){
  // //   digitalWrite(2,HIGH);
  //     Serial.println(digitalRead(sensor));
      
  //  }
  
  //  Serial.println(digitalRead(sensor));
  //     delay(200);
    
  //  if(!digitalRead(sensor)){
  //   delay(10);
  //   if(!digitalRead(sensor)){
  //     while(!digitalRead(sensor)){}
  //         contadorBOTELLA=contadorBOTELLA+1;
  //         Serial.println("Botella");
  //         Serial.println(contadorBOTELLA);
        
  //     }
  //  }

}
