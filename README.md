# phpNumberToWords
Transform a given float / int number to its equivalent in Spanish words, using PHP language.
//
// Based at JAVA class shown here http://www.lawebdelprogramador.com/codigo/Java/338-Convertir-numeros-a-letras.html
// Migrated to be used with PHP, also added the use of cents
// Author: www.github.com/luchothoma  ||  luchothoma@gmail.com || www.LucianoThoma.xyz
// 
//FORM OF USE:
$num = 12345.67;
echo (new NumberToWords($num))->convert();
// "doce mil trescientos cuarenta y cinco pesos con sesenta y siete centavos"

// MAX VALUE ACEPPTED IS: 99.999.9999,99 --AsFloatOfCourse--> 99999999.99
