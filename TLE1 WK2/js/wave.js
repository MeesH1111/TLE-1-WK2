import '../css/style.css'
import { Actor, Engine, Vector, DisplayMode, Label, Font, FontUnit } from "excalibur"
import { Resources, ResourceLoader } from './resources.js'
import { level } from './level.js'
import { gameover } from './gameover.js'
import { intro } from './intro.js'

export class Waves extends Actor {
    speed

    constructor() {
        super({ width: Resources.Watcher.width, height: Resources.Watcher.height })

    }
    onInitialize() {
        const sprite = Resources.Watcher.toSprite()
        this.graphics.use(sprite)
    }
}