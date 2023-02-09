# questions-php
Simple questions solved in PHP.

<h2>1. feladat: Kéktúra szakaszok (1-tracks)</h2>
<p>A nagy infláció mellett kétszer is meggondoljuk, hogy mire költjük a pénzünket. Drága nyaralások helyett jó alternatíva lehet a kirándulás, és országunk természeti kicseinek a felfedezése. Erre kiválóan alkalmas az Országos Kéktúra, amely Magyarország nyugati végétől a keleti végekig megy végig a hegységeken. Egy-egy szakasz kiválasztásához jó lenne tudni, hogy milyen paraméterekkel rendelkeznek, és mennyire nehezek. Az <code>index.php</code> állományban lévő <code>$tracks</code> tömb tartalmazza a Kéktúra mind a 27 szakaszának néhány fontosabb adatát (a számát, a szakasz egyik és másik végének nevét, az út hosszát km-ben, a szintkülönbséget m-ben és az időt percben). Jelenítsd ezt meg a következők szerint:</p>
<ul>
<li>a. Jelenítsd meg az adatokat az <code>index.php</code>-ben található táblázatos formátumban! Az időt (<code>time</code>) órában kell kiírni; a meredekség (<code>steepness</code>) az egy kilométerre eső szintkülönbség (szint/táv); a sebesség (<code>velocity</code>) pedig az időegység alatt megtett út (táv/idő, km/h)!</li>
<li>b. Jelöljük zöld-piros színskálán az utak hosszúságát a távolságok háttérszíneként! Ehhez keresd meg a legnagyobb távértéket, majd mindegyik szakasznál számold ki, hogy az adott szakasz hány százaléka a leghosszabbnak! (pl. ha a leghosszabb szakasz hossza 72km, az aktuálisé pedig 36km, akkor a keresett érték 50%.) Ezt a %-os értéket kell rávetíteni a HSL színskála Hue értéknek 0-120-as intervallumára, mégpedig úgy, hogy 0% a 120 értéknek, 100% pedig a 0 értéknek feleljen meg. CSS-ben átlátszóságot is tartalmazó HSL értéket így lehet megadni: <code>hsla(0, 100%, 60%, 0.5)</code>. Ennek az első paramétereként kell megadni az aktuális Hue értéket!</li>
<li>c. Ugyanezt a színezést alkalmazd a szintkülönbség és meredekség oszlopokra is!</li>
<li>d. Színezzük a sebesség oszlop celláinak háttérszínét is, de itt oly módon, hogy először keressük meg a legnagyobb és legkisebb értéket, majd minden szakasz értékét ehhez az intervallumhoz képest adjuk meg százalékosan, és ezt úgy színezzük, hogy a piros (hue=0) a legkisebb értéknél legyen, a zöld (hue=120) pedig a legnagyobbnál!</li>
<li>e. A táblázat utolsó sorában összegezd a távolság, szintkülönbség és idő oszlopokat!</li>
</ul>

<h2>2. feladat: Túra regisztrálása (2-trip)</h2>
<p>Szeretnénk egy általunk megtett túra adatait elmenteni. A feladat egy már szerkezetileg előre létrehozott űrlap <strong>szerveroldali</strong> (tehát HTML szintű ellenőrzés nem elégséges) validálása az alábbi feltételek szerint.</p>
<ul>
<li>a.  A <code>trackname</code> (túra megnevezése) mező kitöltése kötelező. A <code>distance</code> (távolság) mező kitöltése kötelező, és csak szám lehet.</li>
<li>b.  A <code>from</code> (kezdőpont) mező és a <code>to</code> (cél) mező kitöltése kötelező, és mindkét esetben olyan helységnek kell szerepeljen, amely a kiindulási állományba beégetett <code>$places</code> tömbben megtalálható. A két mező értéke nem egyezhet meg!</li>
<li>c.  A <code>time</code> (idő) mező kitöltése kötelező, és <code>X:XX</code> formátumú, ahol <code>X</code> tetszőleges számjegy. A kettőspont előtti érték nem lehet nagyobb 7-nél, míg a kettőspont utáni értéknek kisebbnek kell lennie, mint 60!</li>
<li>d.  Hibás bemenet esetén az adott mező mellett jelenjen meg egy hibaüzenet, ami tájékoztat a hiba okáról!</li>
<li>e.  Az oldalon elhelyezett űrlap legyen állapottartó, tehát az elküldött értékek íródjanak vissza a mezőkbe!</li>
<li>f.  A <code>success</code> azonosítójú <code>div</code> csak akkor jelenjen meg a generált HTML kódban, ha az űrlapot a felhasználó elküldte és a mezők egyikében sem találtunk hibát a validáció során!</li>
</ul>

<h2>3. feladat: Túraleírások (3-logbook)</h2>
<p>Érdemes túráinkról kisebb-nagyobb naplószerű feljegyzéseket tennünk. Ebben a feladatban egy olyan PHP-s alkalmazást készítünk, melyben a Kéktúra szakaszairól készíthetünk feljegyzéseket, mikor, kivel, milyen élményeket gyűjtöttünk, és milyenre értékeljük a túrát!</p>
<p>Az adatokat fájlban kell tárolni, a tárolás formátuma szabad. Lehet használni az előadáson mutatott <code>Storage</code> osztályt, de nem kötelező. A túraszakaszokat a <code>tracks.json</code> fájl tartalmazza. A feljegyzéseinket egy másik JSON fájlban tárolhatjuk. <em>Figyelem! Ebben a feladatban űrlapot szerveroldalon validálni már nem kell, feltételezzük a helyes kitöltést!</em></p>
<ul>
<li>a.  Első lépésként készítsük elő új leírások mentését. Az <code>index.php</code> oldalon van egy link, ami a <code>new.php</code>-ra vezet. A <code>new.php</code> oldalon töltsük fel a legördülő mezőt a <code>tracks.json</code> fájlban található túraszakaszadatokkal ("Sorszám. Tól - Ig" formában)!</li>
<li>b.  A leírás mentéséhez a <code>new.php</code> oldalon válasszunk egy túraszakaszt, adjuk meg a tól-ig dátumintervallumot, írjuk meg az élményeinket, adjuk meg a többsoros szöveges beviteli mezőben vesszővel elválasztva, hogy kikkel mentünk (a jelölőmezőkkel most egyelőre ne foglalkozzunk!), és értékeljük a túránkat! A küldés gombra kattintva mentsük el az adatokat fájlba! Egy dologra figyeljünk, hogy érdemes a vesszővel elválasztott túratársakat tömbként tárolni! Ehhez használható az <code>explode</code> függvény PHP-ban! (Vigyázat! Üres szövegre egy elemű tömböt hoz létre!) Sikeres mentés után irányítsuk az oldalt az <code>index.php</code>-ra!</li>
<li>c.  A <code>new.php</code> oldalon mentéskor vegyük figyelembe, hogy a túratársak jöhetnek a jelölőmezőkből vagy a szöveges beviteli mezőből is!</li>
<li>d.  Az <code>index.php</code> oldalon listázzuk ki túraleírásainkat, méghozzá úgy, hogy az egyes leírásokat szakaszonként soroljuk fel (ld. az <code>index.php</code>-ban megadott mintát)!</li>
<li>e.  Az <code>index.php</code> oldalon ne írjuk ki azokat a szakaszokat, amelyekhez nem tartozik túra!</li>
<li>gf.  Az <code>index.php</code> oldalon a túraleírások legyenek hivatkozások, amelyekre kattintva a túra részleteit megjelenítő oldalra jutunk. Itt a <code>log.php</code> oldalon megadott minta szerint jelenítsük meg az adatokat. A leírás megjelenítéséhez érdemes használni a <code>htmlspecialchars</code> és az <code>nl2br</code> függvényt, hogy az érzékeny HTML karakterektől megszabaduljunk és a többsoros szöveg helyesen jelenjen meg!</li>

