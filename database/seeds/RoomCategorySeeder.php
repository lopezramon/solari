<?php

use App\Models\Admin\RoomCategory;
use App\Models\Admin\RoomCategoryTranslation;
use App\Models\Admin\RoomLocation;
use Illuminate\Database\Seeder;

class RoomCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $room_categories = [];
        // foreach (RoomLocation::all() as $room_location) {
        //     //dd($room_location);
        //     $room_categories[] = factory(RoomCategory::class, 5)->create([
        //         'room_location_id' => $room_location->id,
        //     ]);
        // }

        // foreach (RoomCategory::all() as $room_category) {
        //     factory(RoomCategoryTranslation::class, 5)->create([
        //         'room_category_id' => $room_category->id,
        //         'language_id' => 1,
        //         'name' => 'Italian-category' . $room_category->id,
        //     ]);
        //     factory(RoomCategoryTranslation::class, 5)->create([
        //         'room_category_id' => $room_category->id,
        //         'language_id' => 2,
        //         'name' => 'English-category' . $room_category->id,
        //     ]);
        // }

        // Budoni(id) => 1
        // Loddui(id) => 2

        DB::table('RoomCategory')->insert(
        //RoomCategory.id => 1
        [
                'status_id'             => 1,
                'room_location_id'      => 1
        ]);
        DB::table('RoomCategoryTranslation')->insert(
            [
                'room_category_id'      => 1, //incremental
                'language_id'           => 1, //Italiano
                'name'                  => 'Villetta Stella Maris',
                'description'           => 'Immersa in un ridente giardino adornato da ulivi e melograni, la Villetta Stella Maris è pensata per chi cerca relax, tranquillità e privacy.Dotata di tutti i comfort e arredata con cura e passione nei minimi dettagli per far sentire gli ospiti amati e coccolati.A un passo dal centro di Budoni e poco distante dalla meravigliosa spiaggia Salamaghe, è la soluzione ideale per scoprire che ''casa'' è ovunque portiamo il cuore e la famiglia.'
            ],
            [
                'room_category_id'      => 1, //incremental
                'language_id'           => 2, //English
                'name'                  => 'Stella Maris small villa',
                'description'           => 'Immersed in a lovely garden decorated with olive and pomegranate trees, Villetta Stella Maris is designed for those seeking relaxation, tranquility and privacy. Equipped with all the comforts and furnished with care and passion down to the smallest details, all to make guests feel loved and pampered. Just a short step from the centre of Budoni and not far from the wonderful Salamaghe beach, it\'s the ideal solution to discover that ''home'' is wherever we bring our hearts and family.'
            ],
            [
                'room_category_id'      => 1, //incremental
                'language_id'           => 3, //Aleman
                'name'                  => 'Kleines villa Stella Maris',
                'description'           => 'Umgeben von einem bezaubernden Garten mit Olivenhainen und Granatapfelbäumen ist die kleine Villa Villetta Stella Maris für Entspannung, Ruhe und Privatsphäre bestens geeignet, Mit allem Komfort ausgestattet und mit Liebe und Leidenschaft bis ins kleinste Detail geplant und eingerichtet ist es ein Ort wo sich die Gäste gut aufgehoben und wohl fühlen. Nur wenige Meter vom Zentrum von Budoni entfernt und unweit des wunderschönen Strandes gelegen ist die Villa die perfekte Lösung für das Wohlbefinden der Seele. Zuhause ist schließlich dort, wo sich Seele und Familie wohl fühlen.'
            ]
        );
        //RoomCategory.id => 2
        DB::table('RoomCategory')->insert(
        [
            'status_id'             => 1,
            'room_location_id'      => 1
        ]);
        DB::table('RoomCategoryTranslation')->insert(
            [
                'room_category_id'      => 2, //incremental
                'language_id'           => 1, //Italiano
                'name'                  => 'Residence Solaria',
                'description'           => 'Immersa in un ridente giardino adornato da ulivi e melograni, la Villetta Stella Maris è pensata per chi cerca relax, tranquillità e privacy. Dotata di tutti i comfort e arredata con cura e passione nei minimi dettagli per far sentire gli ospiti amati e coccolati. A un passo dal centro di Budoni e poco distante dalla meravigliosa spiaggia Salamaghe, è la soluzione ideale per scoprire che ''casa'' è ovunque portiamo il cuore e la famiglia.'
            ],
            [
                'room_category_id'      => 2, //incremental
                'language_id'           => 2, //English
                'name'                  => 'Residence Solaria',
                'description'           => 'Surrounded by gardens and shaded by olive and pomegranate trees, Residence Solaria offers serenity and relaxation. Close to the sea and a few steps from the picturesque centre of Budoni, it\'s also a convenient starting point for exploring the many wonders of Sardinia. Recently built, the Villas of the Residence are equipped with all home comforts, and cared for in the details, furnished with love and passion by searching for the traditions of old Sardinia in our colours and shapes. The complex consists of 2 beautiful first-floor apartments with sea-view veranda and 6 ground floor apartments with veranda and garden. All the verandas are furnished and equipped for outdoor dining, grilling at the barbecue and enjoying the breathtaking sunsets that unspoiled nature offers in this wonderful part of Sardinia.'
            ],
            [
                'room_category_id'      => 2, //incremental
                'language_id'           => 3, //Aleman
                'name'                  => 'Residence Solaria',
                'description'           => 'Umgeben von Gärten, Olivenhainen und Granatapfelbäumen bietet das Apartmenhaus Residence Solaria Entspannung und Ruhe. In unmittelbarer Nähe zum Strand und nur wenige Meter vom bezauberndem Zentrum der Ortschaft Budoni entfernt ist das Apartmenthaus ein bequemer Startpunkt für die Entdeckungsreise der unzähligen Schönheiten Sardiniens.  Die modernen kleinen Villen der Apartmentanlage sind mit allem Komfort ausgestattet und bis ins kleinste Detail mit Liebe und Leidenschaft geplant und eingerichtet. Dabei wurde großes Augenmerk auf unsere Traditionen und auf die Farben und Formen des altertümlichen Sardiniens gelegt. Die Anlage besteht aus 2 wunderschönen Stöcken mit einer Veranda mit Meerblick und weitere 6 Erdgeschösse bieten eine Veranda und einen Garten. Alle Veranden sind so ausgestattet, dass sie Ihre Mahlzeiten im Freien genießen können: Grillen Sie köstliches Fleisch und Gemüse und lassen Sie dabei die atemberaubende Sonnenaufgänge und Sonnenuntergänge auf sich wirken. Die unberührte Natur Sardiniens macht es möglich!'
            ]
        );
        //RoomCategory.id => 3
        DB::table('RoomCategory')->insert(
        [
            'status_id'             => 1,
            'room_location_id'      => 1
        ]);
        DB::table('RoomCategoryTranslation')->insert(
            [
                'room_category_id'      => 3, //incremental
                'language_id'           => 1, //Italiano
                'name'                  => 'Villetta Bouganville',
                'description'           => 'Immersa in un ridente giardino adornato da ulivi e melograni, la Villetta Stella Maris è pensata per chi cerca relax, tranquillità e privacy. Dotata di tutti i comfort e arredata con cura e passione nei minimi dettagli per far sentire gli ospiti amati e coccolati. A un passo dal centro di Budoni e poco distante dalla meravigliosa spiaggia Salamaghe, è la soluzione ideale per scoprire che ''casa'' è ovunque portiamo il cuore e la famiglia.'
            ],
            [
                'room_category_id'      => 3, //incremental
                'language_id'           => 2, //English
                'name'                  => 'Bouganville small villa',
                'description'           => 'Composed of two independent apartments, Villetta Bouganville is surrounded by a flourishing garden, evergreen hedges and multicolored flowers. Adorned with a bouganville of a velvety violet color that frames the spacious entrances and the cozy verandas. Strategically located close to the sea and the centre of Budoni, for those who want to park the car and \'forget it\' for the rest of their stay. Equipped with all the comforts and cared for in both the interior and exterior furnishings. From the first floor, between the blue curtains of the veranda, you can admire the sea and enjoy the sunset while sipping a good Vermentino di Gallura.'
            ],
            [
                'room_category_id'      => 3, //incremental
                'language_id'           => 3, //Aleman
                'name'                  => 'Kleines villa Bouganville',
                'description'           => 'Das Einfamilienhaus Villino Bouganville besteht aus zwei getrennt begehbaren Apartments und ist umgeben von einem blühenden Garten, immergrünen Hecken und farbenfrohen Blumen. Mit der violetten Pflanze Bougainvillea, auch als Drillingsblume bekannt, geschmückt entsteht ein romantischer Rahmen für die großzügigen Eingänge und Veranden. Die strategische Lage in unmittelbarer Nähe zum Meer und zum Zentrum von Budoni ermöglicht das eigene Auto in Sicherheit zu parken und es für den gesamten Aufenthalt zu "vergessen". Mit allem Komfort ausgestattet und mit viel Liebe und Leidenschaft eingerichtet bietet das Haus die Möglichkeit, durch die schneeweißen Vorhängen hindurch, aufs Meer zu blicken und den Sonnenuntergang mit einem köstlichen Gläschen Vermentino di Gallura zu genießen.'
            ]
        );
        //RoomCategory.id => 4
        DB::table('RoomCategory')->insert(
        [
            'status_id'             => 1,
            'room_location_id'      => 1
        ]);
        DB::table('RoomCategoryTranslation')->insert(
            [
                'room_category_id'      => 4, //incremental
                'language_id'           => 1, //Italiano
                'name'                  => 'Residence Budoni Centro',
                'description'           => 'Nel centro del grazioso paese di Budoni, vicino a tutti i servizi e a poca distanza dalla finissima spiaggia di Salamaghe, il Residence è il perfetto punto di partenza per chi preferisce rigenerarsi scoprendo ogni giorno un luogo diverso della nostra splendida Isola.'
            ],
            [
                'room_category_id'      => 4, //incremental
                'language_id'           => 2, //English
                'name'                  => 'Residence Budoni Centre',
                'description'           => 'In the middle of the pretty village of Budoni, close to all amenities and within easy reach of the wonderful Salamaghe beach, the Residence is the perfect starting point for those who prefer to discover a new place every day on our beautiful island. There are several types of apartments from 2-room to 3-room located on the ground floor or on the first floor.'
            ],
            [
                'room_category_id'      => 4, //incremental
                'language_id'           => 3, //Aleman
                'name'                  => 'Residence Budoni Zentrum',
                'description'           => 'Im Zentrum der hübschen Stadt Budoni, nah an allen Einrichtungen und nicht weit vom feinen Strand von Salamaghe entfernt, bildet die Wohnanlage der ideale Ausgangspunkt für diejenigen, die jeden Tag an einem anderen Ort auf unserer schönen Insel relaxen wollen. Es gibt verschiedene Arten von Wohnungen, Zweizimmer- oder Dreizimmer-Wohnungen, die im Erdgeschoss oder im ersten Stock positioniert sind.'
            ]
        );
        //RoomCategory.id => 5
        DB::table('RoomCategory')->insert(
        [
            'status_id'             => 1,
            'room_location_id'      => 2
        ]);
        DB::table('RoomCategoryTranslation')->insert(
            [
                'room_category_id'      => 5, //incremental
                'language_id'           => 1, //Italiano
                'name'                  => 'Residence Budoni Centro',
                'description'           => 'Nel centro del grazioso paese di Budoni, vicino a tutti i servizi e a poca distanza dalla finissima spiaggia di Salamaghe, il Residence è il perfetto punto di partenza per chi preferisce rigenerarsi scoprendo ogni giorno un luogo diverso della nostra splendida Isola.'
            ],
            [
                'room_category_id'      => 5, //incremental
                'language_id'           => 2, //English
                'name'                  => 'Residence Budoni Centre',
                'description'           => 'In the middle of the pretty village of Budoni, close to all amenities and within easy reach of the wonderful Salamaghe beach, the Residence is the perfect starting point for those who prefer to discover a new place every day on our beautiful island. There are several types of apartments from 2-room to 3-room located on the ground floor or on the first floor.'
            ],
            [
                'room_category_id'      => 5, //incremental
                'language_id'           => 3, //Aleman
                'name'                  => 'Residence Budoni Zentrum',
                'description'           => 'Im Zentrum der hübschen Stadt Budoni, nah an allen Einrichtungen und nicht weit vom feinen Strand von Salamaghe entfernt, bildet die Wohnanlage der ideale Ausgangspunkt für diejenigen, die jeden Tag an einem anderen Ort auf unserer schönen Insel relaxen wollen. Es gibt verschiedene Arten von Wohnungen, Zweizimmer- oder Dreizimmer-Wohnungen, die im Erdgeschoss oder im ersten Stock positioniert sind.'
            ]
        );
    }
}
