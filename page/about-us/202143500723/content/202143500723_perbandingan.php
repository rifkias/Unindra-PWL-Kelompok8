<?php 

$bil1 = 100;
$bil2 = 20;
$teks1 = "PHP";
$teks2 = "php";

printf("%d == %d hasilnya %d <br>",$bil1,$bil2,$bil1 == $bil2);
printf("%d != %d hasilnya %d <br>",$bil1,$bil2,$bil1 != $bil2);
printf("%d >= %d hasilnya %d <br>",$bil1,$bil2,$bil1 >= $bil2);
printf("%s == %s hasilnya %d <br>",$teks1,$teks2,$teks1 == $teks2);
printf("%s != %s hasilnya %d <br>",$teks1,$teks2,$teks1 != $teks2);

/**
 * %% - Returns a percent sign
 * %b - Binary number
 * %c - The character according to the ASCII value
 * %d - Signed decimal number (negative, zero or positive)
 * %e - Scientific notation using a lowercase (e.g. 1.2e+2)
 * %E - Scientific notation using a uppercase (e.g. 1.2E+2)
 * %u - Unsigned decimal number (equal to or greather than zero)
 * %f - Floating-point number (local settings aware)
 * %F - Floating-point number (not local settings aware)
 * %g - shorter of %e and %f
 * %G - shorter of %E and %f
 * %o - Octal number
 * %s - String
 * %x - Hexadecimal number (lowercase letters)
 * %X - Hexadecimal number (uppercase letters)
 */