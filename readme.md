# Taitaja2021 semifinaali Jaakko Sukuvaara

---

## Linkit
[Etusivu](http://omena.winnova.fi/~G2021272)

## Sivuston testaus
### Renkaiden tilaus
Voit luoda sivuston etusivulta tilauksen
- Valitse renkaiden koko
- Aseta renkaiden haluttu määrä renkaiden oikealla puolella olevaan laatikkoon
- Täytä asiakastiedot mainoksen alla oleviin kenttiin
- Valitse toimitus tapa
- Viimeistele tilauksesi "Tilaa" painikkeella

Sinut ohjataan tämän jälkee tilausvahvistus sivulle, jossa voit tarkastella tekemääsi tilausta. 

Tässä vaiheessa sähköpostisi on kryptattu argon2 protokollalla ja muiden asiakas tietojesi kanssa tallennettu palvelimelle. Sekä tilaamasi renkaat on laskettu pois tietokannasta

### Openstreetmap
Sivuston etusivulla on sivun alalaitaan upotettu yrityksen kartta käyttäen OpenStreetMap palvelua.

Karttaa voi selata vapaasti niin tietokoneell kuin myös mobiililla

## Huomioita
- Koska sivustolle ei pyydetty tarkistuksia, niin joku voi lähtettää tilaus pyyntöjä rajattomasti.
- Jos orders sivun päivittää tilaus kaksinkertaistuu, koska ei pyydetty tarkistamaan duplikaattien varalta.
- Jos kaksi ihmistä tekee samaan aikaan tilausta voi tietokanta laskea väärin tilaukset, koska ei pyydetty tilausten käsittelyltä tämän estämistä.
- Sivustolla ei ole myöskään erityistä virheiden käsittely protokollaa jolloin voi sivusto mennä rikki, koska virheiden käsittelyä ei pyydetty.
- Jos orders sivulle menee tekemättä tilausta asiakasrekisteriin tallentuu tyhjätietue, koska ei pyydetty tyhjien tarkastusta asiakasrekisterissä

## Kehittäjän kommentteja
Tehtävä oli nopea tehdä, eikä vaatinut erityisiä ratkaisuja, vaan työssä pystyi käyttämään yleisia menetelmiä. Sivuston haavoittuvaisuus jäi aika ilkeään tilaan, mutta asiakkaan pyynnöissä ei pyydetty sen korjaamista eikä tehtävälle oltu annettu tarpeeksi aikaa suojata sivustoa paremmin. Etusivu on ahdas, koska tehtävänanto halusi sijoittaa kaiken sinne, eikä se skaalaudu nätisti mobiilille vaikka onkin käytettävä niin tietokoneella että mobiililla.
