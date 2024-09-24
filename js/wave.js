//import '../css/style.css'
import { Actor, Engine, Vector, DisplayMode, Label, Font, FontUnit } from "excalibur"
import { Resources, ResourceLoader } from './resources.js'
import { level } from './Level.js'
import { gameover } from './Gameover.js'
import { intro } from './Intro.js'

export class Waves extends Actor {
    speed

    constructor() {
        super({ width: Resources.Test.width, height: Resources.Test.height })

    }
    onInitialize() {
        const sprite = Resources.Test.toSprite()
        this.graphics.use(sprite)
        this.pos = new Vector(200, 200)
    }
}