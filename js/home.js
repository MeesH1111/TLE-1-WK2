//import '../css/style.css
import { Actor, Engine, Vector, DisplayMode, Label, Font, FontUnit, SpriteSheet, Animation, range, } from "excalibur"
import { Resources, ResourceLoader } from './resources.js'
import { level } from './Level.js'
import { gameover } from './Gameover.js'
import { intro } from './Intro.js'
import { Waves } from "./wave.js"

export class home extends Actor {
    constructor(x, y) {
        super({ width: 150, height: 100 });
        this.pos = new Vector(x, y);
        const runSheet = SpriteSheet.fromImageSource({
            image: Resources.Home,
            grid: { rows: 5, columns: 5, spriteWidth: 221, spriteHeight: 127 }
        });

        const idle = runSheet.sprites[0];

        const break1 = Animation.fromSpriteSheet(runSheet, range(0, 4), 100);
        const break1end = runSheet.sprites[4];

        this.graphics.add("idle", idle)
        this.graphics.add('break1', break1)
        this.graphics.add('break1end', break1end)
    }

    onInitialize(engine) {
        this.game = engine;
        this.scale = new Vector(0.4, 0.4);
        this.addBuilding();

        this.on('collisionstart', (event) => this.hitTarget(event, engine))
    }

    addBuilding() {
        this.graphics.use('idle');
    }

    hitTarget(event, engine) {
        if (event.other instanceof Waves) {
            if (event.other.targetx === this.pos.x && event.other.targety === this.pos.y) {

            this.graphics.use('break1');
            console.log("wahoives")
            setTimeout(() => {
                this.graphics.use('break1end')
            }, 500)
        }
    }
}
}
