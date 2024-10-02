//import '../css/style.css';
import { Actor, Vector, Label, Font, FontUnit, Color, Scene, Keys, } from "excalibur";
import { Resources, ResourceLoader } from './resources.js';
import { level } from "./Level.js";



export class intro extends Scene {
    constructor() {
        super();
    }
    onInitialize() {
        this.score = 0


        const backgroundStart = new Actor();
        backgroundStart.graphics.use(Resources.BackgroundStart.toSprite());
        backgroundStart.pos = new Vector(960, 540);
        this.add(backgroundStart);

        const backgroundTreeStart = new Actor();
        backgroundTreeStart.graphics.use(Resources.BackgroundTree.toSprite());
        backgroundTreeStart.pos = new Vector(960, 540);
        this.add(backgroundTreeStart);

        this.Label = new Label({
            text: 'Save Tuvalu',
            pos: new Vector(575, 200),
            font: new Font({
                family: 'Impact',
                size: 170,
                unit: FontUnit.Px
            })
        })
        this.add(this.Label)

        this.Label = new Label({
            text: 'klik op de golven om ze te breken en bescherm de huizen!',
            pos: new Vector(380, 450),
            font: new Font({
                family: 'Impact',
                size: 50,
                unit: FontUnit.Px
            })
        })
        this.add(this.Label)

        this.Label = new Label({
            text: 'Als er drie huizen breken verlies je, red Tuvalu!',
            pos: new Vector(490, 510),
            font: new Font({
                family: 'Impact',
                size: 50,
                unit: FontUnit.Px
            })
        })
        this.add(this.Label)

        this.label = new Label({
            text: 'Klik [Spatie] om te beginnen',
            pos: new Vector(680, 920),
            font: new Font({
                family: 'Impact',
                size: 50,
                unit: FontUnit.Px
            })
        })
        this.add(this.label)

    }


    onPreUpdate(engine) {
        if (engine.input.keyboard.wasPressed(Keys.Space)) {
            engine.goToScene('Level')
        }
    }
}