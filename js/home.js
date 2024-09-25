//import '../css/style.css'
import { Actor, Engine, Vector, DisplayMode, Label, Font, FontUnit } from "excalibur"
import { Resources, ResourceLoader } from './resources.js'
import { level } from './Level.js'
import { gameover } from './Gameover.js'
import { intro } from './Intro.js'
import { Waves } from "./wave.js"

export class home extends Actor {
    constructor(x, y) {
        super({ width: Resources.Test.width, height: Resources.Test.height })
        this.pos = new Vector(x, y)
    }
    onInitialize(engine) {
        this.game = engine
        const sprite = Resources.Test.toSprite()
        this.graphics.use(sprite)
        this.on('collisionstart', (event) => this.Gothit(event))
    }


    Gothit(event) {
        if (event.other instanceof Waves) {
            // home wordt gesloopt
            // pas animatie hier toe
            this.game.hp = this.game.hp - 1
        }

        if (this.game.hp <= 0) {
            this.scene.game.goToScene("Gameover")
        }
    }

}
