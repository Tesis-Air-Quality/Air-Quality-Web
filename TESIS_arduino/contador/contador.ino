int tiempo1=0;
int tiempo2=0;
int dif=0;
int contador500ml=0;
int contador1litro=0;

void setup() {
  Serial.begin(9600);
  pinMode(13,OUTPUT);
  pinMode(50,INPUT);

}

void loop() {
   if(!digitalRead(50)){
    delay(10);
    if(!digitalRead(50)){
      tiempo1=millis();
    while(!digitalRead(50)){}
        tiempo2=millis();

        dif=tiempo2-tiempo1;

        if(dif < 400){
          contador500ml=contador500ml+1;
          Serial.println("Botella de 500ml");
          Serial.println(contador500ml);
        }
        else{
          contador1litro=contador1litro+1;
          Serial.println("Botella de 1 litro");
          Serial.println(contador1litro);
        }

     }
   }

}
