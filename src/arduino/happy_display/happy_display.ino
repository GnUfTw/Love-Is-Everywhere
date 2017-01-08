#define DISPLAY_LENGTH 32
#define BAUD_RATE 9600
#define BOOT_DELAY 500
#define MESSAGE_COUNT 4

const String splash = "Love Is Everywhere.";                                      
const String msg1 = "Love yourself first and everything else falls into line."; // Lucille Ball
const String msg2 = "Act as if what you do makes a difference, it does.";       // William Jones
const String msg3 = "No one can make you feel inferior without your consent.";  // Eleanor Roosevelt
const String msg4 = "Trust yourself, you know more than you think you do.";     // Benjamin Spock

String messages[] = {msg1, msg2, msg3, msg4};

void setup()
{
  Serial1.begin(BAUD_RATE); // set up serial port for 9600 baud
  delay(BOOT_DELAY); // wait for display to boot up
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
  Serial1.print(splash);
  delay(5000);
  clearDisplay();
}

void loop()
{
  //String display_message = msg1.substring(starting_column, ending_column);
  displaySplash();
  for (int index = 0; index < MESSAGE_COUNT; index++)
  {
    int starting_column = 0;
    int ending_column = DISPLAY_LENGTH - 1;
    String display_message = messages[index].substring(starting_column, ending_column);
    while(!(display_message.endsWith(".")))
    {
      Serial1.print(display_message);
      delay(750);
      starting_column++;
      ending_column++;
      display_message = messages[index].substring(starting_column, ending_column);
      clearDisplay();
      delay(100);
    }
    delay(2000);
  }

  while(1);
}


