//import '../css/style.css
import { Actor, Engine, Vector, DisplayMode, Label, Font, FontUnit, SpriteSheet, Animation, range, } from "excalibur"
import { Resources, ResourceLoader } from './resources.js'
import { level } from './Level.js'
import { gameover } from './Gameover.js'
import { intro } from './Intro.js'
import { Waves } from "./wave.js"

export class home extends Actor {
    constructor(x, y, number, rotation) {
        super({ width: 150, height: 100 });
        this.pos = new Vector(x, y);
        this.number = number
        this.rotation = rotation
        const runSheet = SpriteSheet.fromImageSource({
            image: Resources.Home,
            grid: { rows: 5, columns: 5, spriteWidth: 221, spriteHeight: 127 }
        });

        const idle0 = runSheet.sprites[0];
        const idle1 = runSheet.sprites[5];
        const idle2 = runSheet.sprites[10];
        const idle3 = runSheet.sprites[15];
        const idle4 = runSheet.sprites[20];

        const break0 = Animation.fromSpriteSheet(runSheet, range(0, 4), 100);
        const break1 = Animation.fromSpriteSheet(runSheet, range(5, 9), 100);
        const break2 = Animation.fromSpriteSheet(runSheet, range(10, 14), 100);
        const break3 = Animation.fromSpriteSheet(runSheet, range(15, 19), 100);
        const break4 = Animation.fromSpriteSheet(runSheet, range(20, 24), 100);

        const breakend0 = runSheet.sprites[4];
        const breakend1 = runSheet.sprites[9];
        const breakend2 = runSheet.sprites[14];
        const breakend3 = runSheet.sprites[19];
        const breakend4 = runSheet.sprites[24];

        this.graphics.add("idle0", idle0)
        this.graphics.add("idle1", idle1)
        this.graphics.add("idle2", idle2)
        this.graphics.add("idle3", idle3)
        this.graphics.add("idle4", idle4)

        this.graphics.add('break0', break0)
        this.graphics.add('break1', break1)
        this.graphics.add('break2', break2)
        this.graphics.add('break3', break3)
        this.graphics.add('break4', break4)

        this.graphics.add('breakend0', breakend0)
        this.graphics.add('breakend1', breakend1)
        this.graphics.add('breakend2', breakend2)
        this.graphics.add('breakend3', breakend3)
        this.graphics.add('breakend4', breakend4)
    }

    onInitialize(engine) {
        this.game = engine;
        this.scale = new Vector(0.8, 0.8);
        this.addBuilding();

        this.on('collisionstart', (event) => this.hitTarget(event, engine))
    }

    addBuilding() {
        this.graphics.use('idle' + this.number);
    }

    hitTarget(event, engine) {
        if (event.other instanceof Waves) {
            if (event.other.targetx === this.pos.x && event.other.targety === this.pos.y) {

                this.graphics.use('break' + this.number);
                console.log("wahoives")
                setTimeout(() => {
                    this.graphics.use('breakend' + this.number)
                }, 500)
            }
        }
    }
}
