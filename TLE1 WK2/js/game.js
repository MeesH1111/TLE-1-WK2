import '../css/style.css'
import { Actor, Engine, Vector, DisplayMode, Label, Font, FontUnit } from "excalibur"
import { Resources, ResourceLoader } from './resources.js'
import { level } from './level.js'
import { gameover } from './gameover.js'
import { intro } from './intro.js'


class Game extends Engine {

    constructor() {
        super({
            width: 1280,
            height: 720,
            maxFps: 144,
            displayMode: DisplayMode.FitScreen
        })
        this.start(ResourceLoader).then(() => this.startGame())
    }
    startGame() {
        this.add('Level', new level())
        this.add('Gameover', new gameover())
        this.add('Intro', new intro())
        this.goToScene('Intro')
    }
}
new Game()
