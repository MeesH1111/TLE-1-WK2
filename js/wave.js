//import '../css/style.css'
import { Actor, Engine, Vector, DisplayMode, Label, Font, FontUnit, SpriteSheet, range, Animation } from "excalibur"
import { Resources, ResourceLoader } from './resources.js'
import { home } from "./home.js"

export class Waves extends Actor {
    constructor(targetx, targety, speed, x, y, score) {
        super({ width: Resources.Test.width, height: Resources.Test.height })
        this.pos = new Vector(x, y)
        this.targetx = targetx
        this.targety = targety
        this.speed = speed

        const runSheet = SpriteSheet.fromImageSource({
            image: Resources.Wave,
            grid: { rows: 1, columns: 5, spriteWidth: 533, spriteHeight: 461 }
        });

        const idle = runSheet.sprites[0];

        const breakWave = Animation.fromSpriteSheet(runSheet, range(0, 4), 100);

        this.graphics.add("idle", idle)
        this.graphics.add('breakWave', breakWave)
    }
    onInitialize(engine) {
        this.game = engine
        // this.pos = new Vector(200, 200)
        this.scale = new Vector(0.4, 0.4)
        this.on("pointerup", () => {
            this.graphics.use('breakWave');
            console.log("wahoives")
            setTimeout(() => {
                this.waveKill()
            }, 500)
        })

        //  console.log('hoi')
        this.actions.moveTo(this.targetx, this.targety, this.speed)
        this.on('collisionstart', (event) => this.hitTarget(event, engine))
        this.graphics.use('idle');
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
                this.graphics.use('breakWave');
                console.log("wahoives")
                setTimeout(() => {
                    this.kill()
                }, 500)

                this.scene.hp -= 1
                this.scene.Wavespeed()
                if (this.scene.hp === 0) {

                    engine.goToScene('Gameover')
                }
            }
        }
    }

    onPreUpdate(engine, delta) {
        super.onPreUpdate(engine, delta);

        const velocity = this.vel;

        if (velocity.x !== 0 || velocity.y !== 0) {
            this.rotation = Math.atan2(velocity.y, velocity.x) + Math.PI / 2;
        }
    }
}
