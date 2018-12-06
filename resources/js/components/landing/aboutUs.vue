<template>
<div>

    <div id="chisiamo"></div>

    <div class="w-100 m-0 d-md-none">
        <img src="/images/home/about-us/solaria-vacanze-affitto-ville-appartamenti-sardegna-budoni.jpg" class="image-aboutus img-fluid m-0">
    </div>

    <div class="container gray-us" >
            
    <div class="container">
        <div class="row">
        <div class="col-md-6 d-none d-md-block">
            <img src="/images/home/about-us/solaria-vacanze-affitto-ville-appartamenti-sardegna-budoni.jpg" class="image-aboutus img-fluid">
            <!-- <youtube video-id="32Cl3CUty0M" ref="youtube"></youtube> -->
        </div>
        <div class="col-md-6">
            <h1 class="linear-wipe mt-md-5 text-left">Solaria Vacanze</h1>
            <div class="content-chisiamo"> 
                    <p>Solaria Vacanze è un’agenzia immobiliare specializzata nella locazione di ville, case e appartamenti per vacanza nel nord-est della Sardegna. Esperienza, professionalità e profonda conoscenza del territorio sono le basi su cui, da oltre 20 anni, si fonda la nostra attività.</p>
                    
                    <!-- <p>Con passione e competenza selezioniamo le case più belle per proporle alla nostra clientela italiana e internazionale. Case uniche scelte ad una ad una, secondo rigorosi standard di qualità. Comfort, tranquillità, buona posizione e un imbattibile rapporto qualità-prezzo sono i principali criteri in base ai quali scegliamo le nostre case.</p>
                    <p>Eccellenza, atmosfera e unicità sono le nostre fonti d’ispirazione. La casa diventa la base per la vostra vacanza, per rilassarsi in terrazzo con un buon bicchiere di vino o deliziarsi in cucina nella preparazione di un gustoso pasto. Vogliamo offrirvi un’atmosfera familiare e la sensazione di sentirsi dei veri abitanti del luogo.</p>
                    <p>Sono questi i valori espressi da Solaria Vacanze, sempre presente per consigliarvi la migliore soluzione abitativa per le vostre vacanze, per farvi sentire benvenuti e scoprire la vera anima della nostra straordinaria isola: la Sardegna.</p> -->
            </div>
        </div>
        <div class="py-4"></div>
        </div>
    </div>
</div>
</div>


</template>

<style scoped>

.image-aboutus{
	margin-top:40px; padding-bottom: 10px 
}
.top {
	margin-top: 50px
}

.gray-us {
background-color: #f8f7fa;
}

.degradado {
    color: #ffd900;
}

.navbar-nav .nav-link:hover {
    color: #d7392c;
    font-weight: bold;
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

</style>
