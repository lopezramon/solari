<template>
    <div>
        <!-- Tenemos nuestro filtro de categorias con sus llamadas a los metodos
            pero aun falta que creemos un v-for con data de las categorias y crear sus dichos metods
            por otro lado tenemos un objecto que es la estructura de ejemplo con "las esperiencias" para conseguir hacer una llamada axios desde la base
            de datos
         -->
        <header>
            <h2 class="linear-wipe">ESPERIENZE</h2>
        </header>

        <!-- Categorias se recomienda crear un v-for que traiga las categorias desde la base de datos. -->
        <div class="container py-4">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8">
                    <div id="myBtnContainer" class="text-md-center">
                        <button class="btn active" @click="filterSelection('all'), filterBtnActive()">Mostra tutto</button>
                        <button class="btn" @click="filterSelection('spiagge'), filterBtnActive()">Spiagge</button>
                        <button class="btn" @click="filterSelection('escursioni'), filterBtnActive()">Escursioni</button>
                        <button class="btn" @click="filterSelection('sport'), filterBtnActive()">Sport</button>
                        <button class="btn" @click="filterSelection('nightlife'), filterBtnActive()">Nightlife</button>
                        <button class="btn" @click="filterSelection('enogastronomia'), filterBtnActive()">Enogastronomia</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Control buttons -->

        <!-- Contenido a filtrar aca toda la estructura la generamos con el componente item_filter -->
        <div class="container pb-5">
            <div class="row">
                <template v-for="item in esperiences">
                    <item_filter
                    :category="item.category"
                    :title="item.title" 
                    :shortDescription="item.shortDescription" 
                    :descriptionHTML="item.descriptionHTML" 
                    :gallery="item.gallery" />
                </template>
                
                
                
                </div>
            </div>


            <form_attivita/>

        </div>
</template>

<script>
//galeria
import VueGallerySlideshow from 'vue-gallery-slideshow';
export default {
    components: {
        VueGallerySlideshow
    },
    data(){
        return {
            esperiences: [
                {
                    category: 'spiagge',
                    title: 'Spiagge',
                    shortDescription: `Budoni e San Teodoro sono certamente un punto di arrivo per il viaggiatore, ma rappresentano anche un ottimo punto di partenza per`,
                    descriptionHTML: `
                        <p>Budoni e San Teodoro sono certamente un punto di arrivo per il viaggiatore, ma rappresentano anche un ottimo punto di partenza per la scoperta degli angoli nascosti e delle spiagge tra le più suggestive della Sardegna.</p>
                        <p>Oltre alle più famose spiagge di Budoni e San Teodoro potrete scoprire le calette più suggestive del golfo di Orosei, a sud, e le note spiagge de l’Isuledda, La Cinta, Cala Brandinchi, Lu impostu e Capo Coda Cavallo percorrendo la costa verso nord.</p>
                        <p>Nelle vicinanze inoltre è presente anche l’attrezzato porto turistico di Budoni noto come “Porto Ottiolu”, dotato di oltre 500 posti barca. Si tratta di un grande valore aggiunto che può diventare la base ideale di partenza alla scoperta di isolate calette e di incantevoli fondali, per immersioni da sogno.</p>
                    `,
                    gallery: [
                        'https://www.solariavacanze.com/wp-content/uploads/spiaggia1-768x512.jpg',
                        'https://www.solariavacanze.com/wp-content/uploads/spiaggia21-768x512.jpg',
                        'https://www.solariavacanze.com/wp-content/uploads/spiaggia2-768x512.jpg',
                        'https://www.solariavacanze.com/wp-content/uploads/spiaggia4-768x512.jpg',
                    ],
                },
                {
                    category: 'sport',
                    title: 'Sport',
                    shortDescription: `I due paesi di Budoni e San Teodoro offrono molte possibilità di praticare sport come immersioni, windsurf, Trekking.equitazione, golf e tennis`,
                    descriptionHTML: `
                        <p>Budoni e San Teodoro sono certamente un punto di arrivo per il viaggiatore, ma rappresentano anche un ottimo punto di partenza per la scoperta degli angoli nascosti e delle spiagge tra le più suggestive della Sardegna.</p>
                        <p>Oltre alle più famose spiagge di Budoni e San Teodoro potrete scoprire le calette più suggestive del golfo di Orosei, a sud, e le note spiagge de l’Isuledda, La Cinta, Cala Brandinchi, Lu impostu e Capo Coda Cavallo percorrendo la costa verso nord.</p>
                        <p>Nelle vicinanze inoltre è presente anche l’attrezzato porto turistico di Budoni noto come “Porto Ottiolu”, dotato di oltre 500 posti barca. Si tratta di un grande valore aggiunto che può diventare la base ideale di partenza alla scoperta di isolate calette e di incantevoli fondali, per immersioni da sogno.</p>
                    `,
                    gallery: [
                        'https://www.solariavacanze.com/wp-content/uploads/solaria-vacanze-affitto-ville-appartamenti-sardegna-escursioni8-768x510.jpg',
                        'https://www.solariavacanze.com/wp-content/uploads/solaria-vacanze-affitto-ville-appartamenti-sardegna-escursioni7-768x510.jpg',
                        'https://www.solariavacanze.com/wp-content/uploads/solaria-vacanze-affitto-ville-appartamenti-sardegna-escursioni6-768x510.jpg',
                        'https://www.solariavacanze.com/wp-content/uploads/solaria-vacanze-affitto-ville-appartamenti-sardegna-escursioni5-768x510.jpg',
                    ],
                },
                {
                    category: 'escursioni',
                    title: 'Escursioni',
                    shortDescription: `Avrai a disposizione tantissime escursioni con i migliori professionisti del settore: dalle gite in barca ai tour archeologici, dai percorsi in quad, bici e fuoristrada ai trekking`,
                    descriptionHTML: `
                        <p>Budoni e San Teodoro sono certamente un punto di arrivo per il viaggiatore, ma rappresentano anche un ottimo punto di partenza per la scoperta degli angoli nascosti e delle spiagge tra le più suggestive della Sardegna.</p>
                        <p>Oltre alle più famose spiagge di Budoni e San Teodoro potrete scoprire le calette più suggestive del golfo di Orosei, a sud, e le note spiagge de l’Isuledda, La Cinta, Cala Brandinchi, Lu impostu e Capo Coda Cavallo percorrendo la costa verso nord.</p>
                        <p>Nelle vicinanze inoltre è presente anche l’attrezzato porto turistico di Budoni noto come “Porto Ottiolu”, dotato di oltre 500 posti barca. Si tratta di un grande valore aggiunto che può diventare la base ideale di partenza alla scoperta di isolate calette e di incantevoli fondali, per immersioni da sogno.</p>
                    `,
                    gallery: [
                        'https://www.solariavacanze.com/wp-content/uploads/sport1-768x512.jpg',
                        'https://www.solariavacanze.com/wp-content/uploads/sport2-768x512.jpg',
                        'https://www.solariavacanze.com/wp-content/uploads/sport3-768x512.jpg',
                        'https://www.solariavacanze.com/wp-content/uploads/sport4-768x512.jpg',
                    ],
                },
                {
                    category: 'nightlife',
                    title: 'Nightlife',
                    shortDescription: `Le serate dell’estate Sarda offrono la risposta a tutte le esigenze. Se dopo una lunga giornata di mare vuoi mangiar fuori`,
                    descriptionHTML: `
                        <p>Budoni e San Teodoro sono certamente un punto di arrivo per il viaggiatore, ma rappresentano anche un ottimo punto di partenza per la scoperta degli angoli nascosti e delle spiagge tra le più suggestive della Sardegna.</p>
                        <p>Oltre alle più famose spiagge di Budoni e San Teodoro potrete scoprire le calette più suggestive del golfo di Orosei, a sud, e le note spiagge de l’Isuledda, La Cinta, Cala Brandinchi, Lu impostu e Capo Coda Cavallo percorrendo la costa verso nord.</p>
                        <p>Nelle vicinanze inoltre è presente anche l’attrezzato porto turistico di Budoni noto come “Porto Ottiolu”, dotato di oltre 500 posti barca. Si tratta di un grande valore aggiunto che può diventare la base ideale di partenza alla scoperta di isolate calette e di incantevoli fondali, per immersioni da sogno.</p>
                    `,
                    gallery: [
                        'https://www.solariavacanze.com/wp-content/uploads/nightlife2.jpg',
                    ],
                },
                {
                    category: 'enogastronomia',
                    title: 'Enogastronomia',
                    shortDescription: `Come in molte parti della Sardegna, Budoni e San Teodoro offrono la possibilità di un viaggio tra i sapori antichi e moderni della regione`,
                    descriptionHTML: `
                        <p>Budoni e San Teodoro sono certamente un punto di arrivo per il viaggiatore, ma rappresentano anche un ottimo punto di partenza per la scoperta degli angoli nascosti e delle spiagge tra le più suggestive della Sardegna.</p>
                        <p>Oltre alle più famose spiagge di Budoni e San Teodoro potrete scoprire le calette più suggestive del golfo di Orosei, a sud, e le note spiagge de l’Isuledda, La Cinta, Cala Brandinchi, Lu impostu e Capo Coda Cavallo percorrendo la costa verso nord.</p>
                        <p>Nelle vicinanze inoltre è presente anche l’attrezzato porto turistico di Budoni noto come “Porto Ottiolu”, dotato di oltre 500 posti barca. Si tratta di un grande valore aggiunto che può diventare la base ideale di partenza alla scoperta di isolate calette e di incantevoli fondali, per immersioni da sogno.</p>
                    `,
                    gallery: [
                        'https://www.solariavacanze.com/wp-content/uploads/eno1-768x512.jpg',
                        'https://www.solariavacanze.com/wp-content/uploads/eno2-768x512.jpg',
                        'https://www.solariavacanze.com/wp-content/uploads/eno3-768x512.jpg',
                        'https://www.solariavacanze.com/wp-content/uploads/eno4-768x512.jpg'
                    ],
                },
                {
                    category: 'archeologia',
                    title: 'archeologia',
                    shortDescription: `Come in molte parti della Sardegna, Budoni e San Teodoro offrono la possibilità di un viaggio tra i sapori antichi e moderni della regione`,
                    descriptionHTML: `
                        <p>Budoni e San Teodoro sono certamente un punto di arrivo per il viaggiatore, ma rappresentano anche un ottimo punto di partenza per la scoperta degli angoli nascosti e delle spiagge tra le più suggestive della Sardegna.</p>
                        <p>Oltre alle più famose spiagge di Budoni e San Teodoro potrete scoprire le calette più suggestive del golfo di Orosei, a sud, e le note spiagge de l’Isuledda, La Cinta, Cala Brandinchi, Lu impostu e Capo Coda Cavallo percorrendo la costa verso nord.</p>
                        <p>Nelle vicinanze inoltre è presente anche l’attrezzato porto turistico di Budoni noto come “Porto Ottiolu”, dotato di oltre 500 posti barca. Si tratta di un grande valore aggiunto che può diventare la base ideale di partenza alla scoperta di isolate calette e di incantevoli fondali, per immersioni da sogno.</p>
                    `,
                    gallery: [
                        'https://www.solariavacanze.com/wp-content/uploads/archeo4-768x512.jpg',
                        'https://www.solariavacanze.com/wp-content/uploads/archeo3-768x512.jpg',
                        'https://www.solariavacanze.com/wp-content/uploads/archeo2-768x512.jpg',
                        'https://www.solariavacanze.com/wp-content/uploads/archeo-768x512.jpg'
                    ],
                },
            ],
            index: null,
        }
    },
    mounted(){
        this.filterSelection('all')
        this.filterBtnActive()
        

    },
    methods: {
        onClick(i) {
            this.index = i; //galleria imagen clickeada
        },

        filterBtnActive(){
            // Add active class to the current control button (highlight it)
            var btnContainer = document.getElementById("myBtnContainer");
            var btns = btnContainer.getElementsByClassName("btn");
            for (var i = 0; i < btns.length; i++) {
                btns[i].addEventListener("click", function() {
                    var current = document.getElementsByClassName("active");
                    current[0].className = current[0].className.replace(" active", "");
                    this.className += " active";
                });
            }
        },

        filterSelection(c) {
            var x, i;
            x = document.getElementsByClassName("filterDiv");
            if (c == "all") c = "";
            // Add the "show" class (display:block) to the filtered elements, and remove the "show" class from the elements that are not selected
            for (i = 0; i < x.length; i++) {
                this.w3RemoveClass(x[i], "show");
                if (x[i].className.indexOf(c) > -1) this.w3AddClass(x[i], "show");
            }
        },
        w3AddClass(element, name) { // Show filtered elements
            var i, arr1, arr2;
            arr1 = element.className.split(" ");
            arr2 = name.split(" ");
            for (i = 0; i < arr2.length; i++) {
                if (arr1.indexOf(arr2[i]) == -1) {
                element.className += " " + arr2[i];
                }
            }
        },
        w3RemoveClass(element, name) { // Oculta elementos que no estan seleccionados
            var i, arr1, arr2;
            arr1 = element.className.split(" ");
            arr2 = name.split(" ");
            for (i = 0; i < arr2.length; i++) {
                while (arr1.indexOf(arr2[i]) > -1) {
                arr1.splice(arr1.indexOf(arr2[i]), 1); 
                }
            }
            element.className = arr1.join(" ");
        }
    }
}
</script>

<style scoped>
header{
    width: 100%;
    height: 200px;
    display: flex;
    justify-content: center;
    align-items:flex-end;
    background-image: url("https://www.solariavacanze.com/wp-content/uploads/solaria-agenzia-vacanze-affitto-appartamenti-in-sardegna-1800x500.jpg");
    padding-bottom: 45px;
}
header h2{
    font-size: 1.8rem;
    font-weight: bold;
    text-align: center;
}

.linear-wipe {
  text-align: center;

  
  background: linear-gradient(to right, #d7392c 20%, #ffd900 40%, #ffd900 60%, #d7392c 80%);
  background-size: 200% auto;
  
  color: #000;
  background-clip: text;
  text-fill-color: transparent;
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  
  animation: shine 2s linear infinite;
}

@keyframes shine {
    to {
      background-position: -200% center;
    }
}

/*---------------------*/
.container {
    overflow: hidden;
}

.filterDiv {
    display: none; /* Hidden by default */
}

/* The "show" class is added to the filtered elements */
.show {
    display: block;
}

/* Style the buttons */
.btn {
  border: none;
  outline: none;
  padding: .3rem 1rem;
  background-color: #fedc5196;
  cursor: pointer;
  margin: 3px 0px;
}

/* Add a light grey background on mouse-over */
.btn:hover {
  background-color: #ddd;
}
.btn:focus{
    box-shadow: none;
}

/* Add a dark background to the active button */
.btn.active {
  background-color: #d7392c;
  color: white;
}


</style>
