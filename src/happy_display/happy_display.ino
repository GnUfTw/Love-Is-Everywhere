#define DISPLAY_LENGTH 32
#define BAUD_RATE 9600
#define BOOT_DELAY 500
#define MESSAGE_COUNT 8

const String splash0 = "Love Is Everywhere."; 
const String splash1 = "You Are Not Alone.";  
const String end0 = "Pass On The Good Vibes.";    
const String end1 = "Dont Forget To Power Off!!.";
const String msg1 = "Love yourself first and everything else falls into line."; // Lucille Ball
const String msg2 = "Act as if what you do makes a difference, it does.";       // William Jones
const String msg3 = "No one can make you feel inferior without your consent.";  // Eleanor Roosevelt
const String msg4 = "Trust yourself, you know more than you think you do.";     // Benjamin Spock
const String msg5 = "Remember always that you not only have the right to be an individual, you have an obligation to be one.";  // Eleanor roosevelt
const String msg6 = "If only you could sense how important you are to the lives of those you meet."; // Fred Rogers
const String msg7 = "You yourself, as much as anybody in the entire universe, deserve your love and affection."; // Buddha
const String msg8 = "Because one accepts oneself, the whole world accepts him or her.";  // Lao-Tzu

String messages[] = { msg1, msg2, msg3, msg4, msg5, msg6, msg7, msg8 };

void setup()
{
  Serial1.begin(BAUD_RATE); // set up serial port for 9600 baud
  delay(BOOT_DELAY);  // wait for display to boot up
}

void clearDisplay()
{
  Serial1.write(254); // move cursor to beginning of first line
  Serial1.write(128);

  Serial1.print("                "); // clear display
  Serial1.print("                ");

  Serial1.write(254); // move cursor to beginning of first line
  Serial1.write(128);
}

void displaySplash()
{
  clearDisplay();
  delay(3000);
  
  Serial1.print(splash0);
  delay(3000);
  clearDisplay();
  Serial1.print(splash1);
  delay(3000);
  clearDisplay();
}

void displayEndnote()
{
  Serial1.print(end0);
  delay(3000);
  clearDisplay();
  Serial1.print(end1);
}

void loop()
{
  displaySplash();
  for (int index = 0; index < MESSAGE_COUNT; index++)
  {
    int starting_column = 0;
    int ending_column = DISPLAY_LENGTH - 1;
    String display_message = messages[index].substring(starting_column, ending_column);
    while(!(display_message.endsWith(".")))
    {
      Serial1.print(display_message);
      delay(350);
      starting_column++;
      ending_column++;
      display_message = messages[index].substring(starting_column, ending_column);
      clearDisplay();
      delay(100);
    }
    delay(2000);
  }
  displayEndnote();

  while(1);
}


