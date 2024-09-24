//import '../css/style.css'
import { Actor, Engine, Vector, DisplayMode, Label, Font, FontUnit } from "excalibur"
import { Resources, ResourceLoader } from './resources.js'
// import { level } from './Level.js'
// import { gameover } from './Gameover.js'
// import { intro } from './Intro.js'


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
    }
}

new Game()
