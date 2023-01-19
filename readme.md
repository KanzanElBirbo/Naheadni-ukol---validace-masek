# Náhradní úkol - validace masek
##### _Nidecký Petr_
##### _3. ITE_
#
Mým úkolem bylo udělat API v jazyku PHP, které bude umět zjišťovat, zda-li masky, které mu zadáme, jsou nebo nejsou valdní.
Také ta API musí mít vlastní digitální podpis - signature.
A také musí na vstupu umět vybírat z 2 nebo více formátů na výstupu.
#
### Popis API
#
- API se spouští pomocí souboru "client.php" a uživatel si může ve vyhledávacím panelu vybrat masku a formát, ve kterém to chce exportovat, v tomto případě je na výběr z dvou formátů - json a xml
- API vypíše masku, kterou uživatel zadal 
- v případě JSON se vypíše kompletní URL i s daným digitálním podpisem ve formátu SHA256, a také vypíše ve vlastním boxu odpověd, zda-li zadaná maska validní nebo ne
- v případě XML se vypíše pouze, zda-li je maska validní nebo ne
#
### Popis kódu
Celé API se skládá ze tří souborů PHP - client.php, masky.php, xml.php
##### _CLIENT.PHP_
- tento soubor PHP ovládá API
- pomocí něj se spoustí celé API
- má v sobě hlavní proměnné mask, n, secret, a signature
#
##### _MASKY.PHP_
- tento soubor PHP jsou "vnitřnosti" celého kódu
- díky němu funguje API tak, jak má, a ví, co má vypisovat a z čeho
- má v sobě hlavní proměnné secret, n, sigTMP, xmlparser, mask, mask_arr, valid, response, output
- také je k němu připojen soubor xml.php, díky kterému v API funguje formát XML
#
##### _XML.PHP_
- kód využitý z internernetového fóra [Stack Overflow](https://stackoverflow.com/questions/137021/php-object-as-xml-document)
- díky němu funguje v API formát XML
#
