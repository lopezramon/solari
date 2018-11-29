<script>
//galeria
import VueGallerySlideshow from 'vue-gallery-slideshow';
export default {
    components: {
        VueGallerySlideshow
    },
    data(){
        return {
            spiagge: [
                'https://www.solariavacanze.com/wp-content/uploads/spiaggia1-768x512.jpg',
                'https://www.solariavacanze.com/wp-content/uploads/spiaggia21-768x512.jpg',
                'https://www.solariavacanze.com/wp-content/uploads/spiaggia2-768x512.jpg',
                'https://www.solariavacanze.com/wp-content/uploads/spiaggia4-768x512.jpg',
            ],
            escursioni: [
                'https://www.solariavacanze.com/wp-content/uploads/solaria-vacanze-affitto-ville-appartamenti-sardegna-escursioni8-768x510.jpg',
                'https://www.solariavacanze.com/wp-content/uploads/solaria-vacanze-affitto-ville-appartamenti-sardegna-escursioni7-768x510.jpg',
                'https://www.solariavacanze.com/wp-content/uploads/solaria-vacanze-affitto-ville-appartamenti-sardegna-escursioni6-768x510.jpg',
                'https://www.solariavacanze.com/wp-content/uploads/solaria-vacanze-affitto-ville-appartamenti-sardegna-escursioni5-768x510.jpg',
            ],
            sport: [
                'https://www.solariavacanze.com/wp-content/uploads/sport1-768x512.jpg',
                'https://www.solariavacanze.com/wp-content/uploads/sport2-768x512.jpg',
                'https://www.solariavacanze.com/wp-content/uploads/sport3-768x512.jpg',
                'https://www.solariavacanze.com/wp-content/uploads/sport4-768x512.jpg',
            ],
            nightlife: [
                'https://www.solariavacanze.com/wp-content/uploads/nightlife2.jpg',
            ],
            enogastronomia: [
                'https://www.solariavacanze.com/wp-content/uploads/eno1-768x512.jpg',
                'https://www.solariavacanze.com/wp-content/uploads/eno2-768x512.jpg',
                'https://www.solariavacanze.com/wp-content/uploads/eno3-768x512.jpg',
                'https://www.solariavacanze.com/wp-content/uploads/eno4-768x512.jpg'
            ],
            index: 0
        }
    },
    mounted(){
        this.filterSelection('all')

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
    methods: {
        onClick(i) {
            this.index = i; //galleria imagen clickeada
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

<template>
    <div>
        <header>
            <h2 class="linear-wipe">ESPERIENZE</h2>
        </header>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8">
                    <div id="myBtnContainer text-center">
                        <button class="btn active" @click="filterSelection('all')">Mostra tutto</button>
                        <button class="btn" @click="filterSelection('spiagge')">Spiagge</button>
                        <button class="btn" @click="filterSelection('escursioni')">Escursioni</button>
                        <button class="btn" @click="filterSelection('sport')">Sport</button>
                        <button class="btn" @click="filterSelection('nightlife')">Nightlife</button>
                        <button class="btn" @click="filterSelection('enogastronomia')">Enogastronomia</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Control buttons -->

        <!-- The filterable elements. Note that some have multiple class names (this can be used if they belong to multiple categories) -->
        <div class="container">
            <div class="row filterDiv spiagge">
                <div class="col-12 col-md-3">
                    <div class="card shadow my-5">
                        <img class="card-img-top" src="https://www.solariavacanze.com/wp-content/uploads/spiaggia1-768x512.jpg" alt="Card image cap">
                        <div class="card-body">
                            <h3 class="card-title">Spiagge</h3>
                            <div class="card-text">
                                <p>
                                    Budoni e San Teodoro sono certamente un punto di arrivo per 
                                    il viaggiatore, ma rappresentano anche un ottimo punto di partenza per 
                                    la scoperta degli angoli nascosti e delle spiagge tra le più suggestive della Sardegna.
                                </p>
                                <p>
                                    Oltre alle più famose spiagge di Budoni e San Teodoro 
                                    potrete scoprire le calette più suggestive del golfo di Orosei, a sud, e 
                                    le note spiagge de l’Isuledda, La Cinta, Cala Brandinchi, Lu impostu e Capo 
                                    Coda Cavallo percorrendo la costa verso nord.
                                </p>
                                <p>
                                    Nelle vicinanze inoltre è presente anche l’attrezzato porto turistico di Budoni noto 
                                    come “Porto Ottiolu”, dotato di oltre 500 posti barca. Si tratta di un grande valore aggiunto che può diventare la 
                                    base ideale di partenza alla scoperta di isolate calette e di incantevoli fondali, per immersioni da sogno.
                                </p>
                            </div>
                            <div class="galleria-attivita">
                                <img class="images" v-for="(image, i) in spiagge" :key="i" :src="image" @click="index = i">
                                <vue-gallery-slideshow :images="spiagge" :index="index" @close="index = null"></vue-gallery-slideshow>
                            </div>
                            <p class="mt-4 text-right">
                                <a href="#" class="card-link">Vedere di più</a>
                            </p>
                        </div>
                    </div>

                </div>
            </div>



        </div>
    </div>
</template>
<style scoped>
header{
    width: 100%;
    height: 240px;
    display: flex;
    justify-content: center;
    align-items: center;
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
  padding: 12px 16px;
  background-color: #f1f1f1;
  cursor: pointer;
}

/* Add a light grey background on mouse-over */
.btn:hover {
  background-color: #ddd;
}

/* Add a dark background to the active button */
.btn.active {
  background-color: #666;
  color: white;
}


/*Galeria*/
.images{
  width:25%;
}

</style>
