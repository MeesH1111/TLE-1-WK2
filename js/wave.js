//import '../css/style.css'
import { Actor, Engine, Vector, DisplayMode, Label, Font, FontUnit } from "excalibur"
import { Resources, ResourceLoader } from './resources.js'
import { level } from './Level.js'
import { gameover } from './Gameover.js'
import { intro } from './Intro.js'
import { home } from "./home.js"

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
        this.scale = new Vector(0.4, 0.4)
        this.on("pointerup", () => this.waveKill())
        //  console.log('hoi')
        this.actions.moveTo(this.targetx, this.targety, this.speed)
        this.on('collisionstart', (event) => this.hitTarget(event, engine))
    }

    waveKill() {
        this.kill()
        this.score++
        this.scene.currentwaves -= 1
        this.scene.Wavespeed()
        this.scene.kills++
        console.log(this.scene.currentwaves)
        this.scene.updateScore()
    }

    hitTarget(event, engine) {
        if (event.other instanceof home) {
            if (event.other.pos.x === this.targetx && event.other.pos.y === this.targety) {
                //console.log("Target hit")
                //   console.log(this.scene.hp)
                this.kill()
                this.scene.hp -= 1
                this.scene.Wavespeed()
                if (this.scene.hp === 0) {

                    engine.goToScene('Gameover')
                }
            }
        }
    }
}
