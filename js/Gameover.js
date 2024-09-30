//import '../css/style.css';
import { Actor, Vector, Label, Font, FontUnit, Color, Scene, Keys } from "excalibur";
import { Resources, ResourceLoader } from './resources.js';
import {Button} from './button.js'



export class gameover extends Scene {
    constructor() {
        super();
    }
    onInitialize() {

        const BackgroundEnd = new Actor();
        BackgroundEnd.graphics.use(Resources.BackgroundEnd.toSprite());
        BackgroundEnd.pos = new Vector(960, 540);
        this.add(BackgroundEnd);
          
        this.Label = new Label({
            text: 'Game over',
            pos: new Vector(575, 200),
            font: new Font({
                family: 'Impact',
                size: 170,
                unit: FontUnit.Px
            })
        })
        this.add(this.Label)

        this.Label = new Label({
            text: 'Helaas je hebt tuvalu niet kunnen redden van de golven',
            pos: new Vector(350, 450),
            font: new Font({
                family: 'Arial',
                size: 50,
                unit: FontUnit.Px
            })
        })
        this.add(this.Label)

        this.Label = new Label({
            text: 'Help ons dit de voorkomen, doneer nu!',
            pos: new Vector(510, 510),
            font: new Font({
                family: 'Arial',
                size: 50,
                unit: FontUnit.Px
            })
        })
        this.add(this.Label)

        this.label = new Label({
            text: 'Klik [Spatie] om opnieuw te spelen',
            pos: new Vector(560, 920),
            font: new Font({
                family: 'Impact',
                size: 55,
                unit: FontUnit.Px
            })
        })
        this.add(this.label)

        this.button = new Button(950,730)
        this.button.scale = new Vector (2,2)
        this.add(this.button)
    }

    onPreUpdate(engine) {
        if (engine.input.keyboard.wasPressed(Keys.Space)) {
            engine.goToScene('Intro')
        }
    }
}
