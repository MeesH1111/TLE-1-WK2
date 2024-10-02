
import { Actor, Engine, Vector, DisplayMode, Label, Font, FontUnit } from "excalibur"
import { Resources, ResourceLoader } from './resources.js'
import { level } from './Level.js'
import { gameover } from './Gameover.js'
import { intro } from './Intro.js'

export class Button extends Actor {
    constructor(x, y) {
        super({ width: Resources.Test.width, height: Resources.Test.height })
        this.pos = new Vector(x, y)
    }
    onInitialize(engine) {
        this.game = engine
        const sprite = Resources.ButtonDonate.toSprite()
        this.graphics.use(sprite)

        this.on('pointerup', () => {
            window.location.href = 'https://stud.hosted.hr.nl/1078387/Zuiverbuis/TLE-1-WK2/doneren.php';
        });
    }

}
