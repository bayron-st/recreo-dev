let coches = [];
let frutas = [];
let pokemon = [];
let reverso = "img/reverso.png";

function cargarImagenes() {

	coches[0] = "img/coches/alfaromeogiulia.jpg";
	coches[1] = "img/coches/alfaromeogiulieta.jpg";
	coches[2] = "img/coches/audia4.jpg";
	coches[3] = "img/coches/audia6.jpg";
	coches[4] = "img/coches/bmwserie5.jpg";
	coches[5] = "img/coches/bmwx3.jpg";
	coches[6] = "img/coches/citroencactus.jpg";
	coches[7] = "img/coches/citroenpicasso.jpg";
	coches[8] = "img/coches/ds3.jpg";
	coches[9] = "img/coches/ds5.jpeg";
	coches[10] = "img/coches/fiat500.jpg";
	coches[11] = "img/coches/fiatpanda.jpg";
	coches[12] = "img/coches/fordfiesta.jpg";
	coches[13] = "img/coches/fordfocus.jpg";
	coches[14] = "img/coches/hyundaii30.jpg";
	coches[15] = "img/coches/hyundaitucson.jpg";
	coches[16] = "img/coches/kiario.jpg";
	coches[17] = "img/coches/kiasportage.jpg";
	coches[18] = "img/coches/mazda2.jpg";
	coches[19] = "img/coches/mazda3.jpg";
	coches[20] = "img/coches/mercedesclasee.jpg";
	coches[21] = "img/coches/mercedesclases.jpg";
	coches[22] = "img/coches/nissanleaf.png";
	coches[23] = "img/coches/nissanqashqai.jpg";
	coches[24] = "img/coches/opelcorsa.jpg";
	coches[25] = "img/coches/opelinsignia.jpg";
	coches[26] = "img/coches/peugeot5008.jpg";
	coches[27] = "img/coches/peugeot508.jpg";
	coches[28] = "img/coches/porsche911.jpg";
	coches[29] = "img/coches/porschecayenne.jpg";
	coches[30] = "img/coches/renault captur.jpg";
	coches[31] = "img/coches/renault kadjar.jpeg";
	coches[32] = "img/coches/seatleon.jpg";
	coches[33] = "img/coches/seattarraco.jpg";
	coches[34] = "img/coches/skodakaroq.jpg";
	coches[35] = "img/coches/skodaoctavia.jpg";
	coches[36] = "img/coches/toyotaauris.jpg";
	coches[37] = "img/coches/toyotaprius.jpg";
	coches[38] = "img/coches/volkswagenpolo.jpeg";
	coches[39] = "img/coches/volkswagentroc.jpg";
	coches[40] = "img/coches/volvov40.jpg";
	coches[41] = "img/coches/volvoxc40.jpg";

	frutas[1] = "img/frutas/envase_1.jpg";
	frutas[0] = "img/frutas/envase_2.jpg";
	frutas[2] = "img/frutas/envase_3.jpg";
	frutas[3] = "img/frutas/envase_4.jpg";
	frutas[4] = "img/frutas/envase_5.jpg";
	frutas[5] = "img/frutas/envase_6.jpg";
	frutas[6] = "img/frutas/envase_7.jpg";
	frutas[7] = "img/frutas/envase_8.jpg";
	

	pokemon[0] = "img/pokemon/aerodactyl.png";
	pokemon[1] = "img/pokemon/arcanine.png";
	pokemon[2] = "img/pokemon/banette.png";
	pokemon[3] = "img/pokemon/blastoise.jpg";
	pokemon[4] = "img/pokemon/buterfree.jpg";
	pokemon[5] = "img/pokemon/charizard.png";
	pokemon[6] = "img/pokemon/cyndaquil.jpg";
	pokemon[7] = "img/pokemon/ditto.png";
	pokemon[8] = "img/pokemon/doduo.png";
	pokemon[9] = "img/pokemon/eevee.png";
	pokemon[10] = "img/pokemon/electabuzz.png";
	pokemon[11] = "img/pokemon/exeggcute.png";
	pokemon[12] = "img/pokemon/gastly.png";
	pokemon[13] = "img/pokemon/graveler.jpg";
	pokemon[14] = "img/pokemon/gyarados.png";
	pokemon[15] = "img/pokemon/hitmonchan.png";
	pokemon[16] = "img/pokemon/horsea.png";
	pokemon[17] = "img/pokemon/jigglypuff.png";
	pokemon[18] = "img/pokemon/jynx.png";
	pokemon[19] = "img/pokemon/kangaskhan.png";
	pokemon[20] = "img/pokemon/machoke.png";
	pokemon[21] = "img/pokemon/magikarp.png";
	pokemon[22] = "img/pokemon/magmar.png";
	pokemon[23] = "img/pokemon/marowak.png";
	pokemon[24] = "img/pokemon/meowth.png";
	pokemon[25] = "img/pokemon/mew.jpg";
	pokemon[26] = "img/pokemon/mewtwo.png";
	pokemon[27] = "img/pokemon/mrmime.jpg";
	pokemon[28] = "img/pokemon/nidoran.png";
	pokemon[29] = "img/pokemon/ninetales.png";
	pokemon[30] = "img/pokemon/oddish.jpg";
	pokemon[31] = "img/pokemon/omanyte.gif";
	pokemon[32] = "img/pokemon/onix.png";
	pokemon[33] = "img/pokemon/persian.png";
	pokemon[34] = "img/pokemon/pichu.png";
	pokemon[35] = "img/pokemon/pikachu.png";
	pokemon[36] = "img/pokemon/pinsir.png";
	pokemon[37] = "img/pokemon/porygon.png";
	pokemon[38] = "img/pokemon/psyduck.png";
	pokemon[39] = "img/pokemon/rhydon.png";
	pokemon[40] = "img/pokemon/seadra.png";
	pokemon[41] = "img/pokemon/seel.png";
	pokemon[42] = "img/pokemon/shinx.jpg";
	pokemon[43] = "img/pokemon/slowbro.png";
	pokemon[44] = "img/pokemon/snorlax.png";
	pokemon[45] = "img/pokemon/squirtle.png";
	pokemon[46] = "img/pokemon/tauros.png";
	pokemon[47] = "img/pokemon/vaporeon.png";
	pokemon[48] = "img/pokemon/venomoth.jpg";
	pokemon[49] = "img/pokemon/voltorb.png";
	pokemon[50] = "img/pokemon/wailmer.png";
	pokemon[51] = "img/pokemon/weedle.png";
	pokemon[52] = "img/pokemon/weezing.jpg";
	pokemon[53] = "img/pokemon/zapdos.png";

}
