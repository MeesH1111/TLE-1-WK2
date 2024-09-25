//import '../css/style.css';
import { Actor, Vector, Label, Font, FontUnit, Color, Scene, Keys } from "excalibur";
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

        this.Label = new Label({
            text: 'Save Tuvalu',
            pos: new Vector(575,200),
            font: new Font({
                family: 'Impact',
                size: 170,
                unit: FontUnit.Px
            })
        })
        this.add(this.Label)

        this.Label = new Label({
            text: 'Red het eiland door de golven weg te houden',
            pos: new Vector(480,450),
            font: new Font({
                family: 'Arial',
                size: 50,
                unit: FontUnit.Px
            })
        })
        this.add(this.Label)

        this.Label = new Label({
            text: 'klik op de golven om ze weg te houden en behaal zo een hoog mogelijke score!',
            pos: new Vector(75,510),
            font: new Font({
                family: 'Arial',
                size: 50,
                unit: FontUnit.Px
            })
        })
        this.add(this.Label)

        this.label = new Label({
            text: 'Klik [Spatie] om te beginnen',
            pos: new Vector(650, 920),
            font: new Font({
                family: 'Impact',
                size: 55,
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