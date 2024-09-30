//import '../css/style.css'
import { Actor, Engine, Vector, DisplayMode, Label, Font, FontUnit } from "excalibur"
import { Resources, ResourceLoader } from './resources.js'
import { level } from './Level.js'
import { gameover } from './Gameover.js'
import { intro } from './Intro.js'

export class Waves extends Actor {
    constructor(targetx, targety, speed, x, y, score) {
        super({ width: Resources.Test.width, height: Resources.Test.height })
        this.pos = new Vector(x, y)
        this.targetx = targetx
        this.targety = targety
        this.speed = speed
    }
    onInitialize(engine) {
        this.game = engine
        const sprite = Resources.Test.toSprite()
        this.graphics.use(sprite)
        // this.pos = new Vector(200, 200)
        this.on("pointerup", () => this.waveKill())
        console.log('hoi')
        this.actions.moveTo(this.targetx, this.targety, this.speed)
    }

    waveKill() {
        this.kill()
        this.score++
        this.scene.Wavespeed()
        this.scene.kills++
        console.log(this.scene.kills)
    }

}
