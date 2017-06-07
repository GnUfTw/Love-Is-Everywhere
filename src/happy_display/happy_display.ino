#define DISPLAY_LENGTH 32
#define BAUD_RATE 9600
#define BOOT_DELAY 500
#define MESSAGE_COUNT 4

// The following self love & self esteem quotes were found at the following link: http://www.positivityblog.com/self-esteem-quotes/
const String splash = "Love Is Everywhere.";
const String msg1 = "Love yourself first and everything else falls into line. You really have to love yourself to get anything done in this world.\n"; // Lucille Ball
const String msg2 = "Act as if what you do makes a difference, it does.\n";       // William Jones
const String msg3 = "No one can make you feel inferior without your consent.\n";  // Eleanor Roosevelt
const String msg4 = "Trust yourself, you know more than you think you do.\n";     // Benjamin Spock
const String msg5 = "Remember always that you not only have the right to be an individual, you have an obligation to be one.\n";  // Eleanor roosevelt
const String msg6 = "If only you could sense how important you are to the lives of those you meet.\n"; // Fred Rogers
const String msg7 = "You yourself, as much as anybody in the entire universe, deserve your love and affection.\n"; // Buddha
const String msg8 = "Too many people overvalue what they are not and undervalue what they are.\n";  // Malcolm S. Forbes
const String msg9 = "Act as if what you do makes a difference. It does.\n"; // William Jones
const String msg10 = "Be faithful to that which exists within yourself.\n"; // Andre Gide
const String msg11 = "Who looks outside, dreams; who looks inside, awakes.\n";  // Carl Gustav Jung
const String msg12 = "You are very powerful, provided you know how powerful you are.\n";  // Yogi Bhajan
const String msg13 = "Most of the shadows of this life are caused by standing in one's own sunshine.\n";  // Ralph Waldo Emerson
const String msg14 = "It is never too late to be what you might have been.\n";  // George Eliot
const String msg15 = "It took me a long time not to judge myself through someone else's eyes.\n"; // Sally Field
const String msg16 = "It's surprising how many persons go through life without ever recognizing that their feelings toward other people are largely determined by their feelings toward themselves, and if you're not comfortable within yourself, you can't be comfortable with others.\n";  // Sidney J. Harris
const String msg17 = "The best day of your life is the one on which you decide your life is your own. No apologies or excuses. No one to lean on, rely on, or blame. This is the day your life really begins.\n"; // Bob Moawad
const String msg18 = "Your problem is you're too busy holding onto your unworthiness.\n"; // Ram Dass
const String msg19 = "There is nothing noble about being superior to some other man. The true nobility is in being superior to your previous self.\n";  // Hindu Proverb
const String msg20 = "Because one accepts oneself, the whole world accepts him or her.\n";  // Lao-Tzu
const String msg21 = "Never bend your head. Always hold it high. Look the world straight in the face.\n"; // Helen Keller
const String msg22 = "Don't ask yourself what the world needs, ask yourself what makes you come alive. And then go and do that. Because what the world needs is people who have come alive.\n"; // Howard Washington Thurman
const String msg23 = "To establish true self-esteem we must concentrate on our successes and forget about the failures and the negatives in our lives.\n";  // Denis Waitley
const String msg24 = "What lies behind us and what lies before us are tiny matters compared to what lies within us.\n"; // Ralph Waldo Emerson
const String msg25 = "Low self-esteem is like driving through life with your hand-break on.\n"; // Maxwell Maltz
const String msg26 = "Until you value yourself, you won't value your time. Until you value your time, you will not do anything with it.\n"; // M. Scott Peck
const String msg27 = "A man cannot be comfortable without his own approval.\n"; // Mark Twain
const String msg28 = "Never be bullied into silence. Never allow yourself to be made a victim. Accept no one's definition of your life, but define yourself.\n";  // Harvey Fierstein
const String msg29 = "When you recover or discover something that hourishes your soul and bring joy, care enough about yourself to make room for it in your life.\n"; // Jean Shinoda Bolen
const String msg30 = "Why should we worry about what others think of us, do we have more confidence in their opinions than we do our own?\n"; // Brigham Young

String messages[] = {
  msg1, msg2, msg3, msg4, msg5, msg6, msg7, msg8, msg9, msg10, 
  msg11, msg12, msg13, msg14, msg15, msg16, msg17, msg18, msg19, msg20, 
  msg21, msg22, msg23, msg24, msg25, msg26, msg27, msg28, msg29, msg30
};

void setup()
{
  Serial1.begin(BAUD_RATE);         // Set up serial port for 9600 baud.
  delay(BOOT_DELAY);                // Wait for LCD display to boot up.
}

void moveCursorToBeginning()
{
  Serial1.write(254); 
  Serial1.write(128);
}

void printEmptyStrings()
{
  Serial1.print("                "); 
  Serial1.print("                ");
}

void clearDisplay()
{
  moveCursorToBeginning();
  printEmptyString();
  moveCursorToBeginning();
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
    while (!(display_message.endsWith("\n")))
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

  while (1);

  // Should probably shut down the arduino if it reaches this point or atleast sleep it
}


