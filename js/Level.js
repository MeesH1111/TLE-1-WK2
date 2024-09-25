//import '../css/style.css';
import { Actor, Vector, Label, Font, FontUnit, Color, Scene, randomIntInRange } from "excalibur";
import { Resources, ResourceLoader } from './resources.js';
import { Waves } from "./wave.js";
import { home } from "./home.js";

export class level extends Scene {
    homes
    wavestate
    kills
    currentwaves
    previuskills
    constructor() {
        super();
    }

    onInitialize() {
        this.kills = 0
        this.previuskills = 0
        this.currentwaves = 0
        this.speed = 100
        this.homesx = [700, 400, 300, 600, 800]
        this.homesy = [500, 700, 400, 500, 800]

        const backgroundStart = new Actor();
        backgroundStart.graphics.use(Resources.BackgroundStart.toSprite());
        backgroundStart.pos = new Vector(960, 540);
        this.add(backgroundStart);

        for (let i = 0; i < this.homesx.length; i++) {
            console.log(this.homesx[i])
            this.home = new home(this.homesx[i], this.homesy[i])
            console.log(`we made a house at : ${this.home.pos}`)
            this.add(this.home)
            this.wave = new Waves(this.homesx[1], this.homesy[1], speed)
        }
    }

    Wavespeed(kills, previuskills) {

        if (this.currentwaves !== this.wavestate) {
            let toSpawn = 5 - this.currentwaves
            for (let i = 0; i < toSpawn; i++)
                this.Target = randomIntInRange(0, 4)
            console.log(this.Target)
            console.log(this.homesx[this.Target])
            this.wave = new Waves(this.homesx[this.Target], this.homesy[this.Target], speed)
            this.add(this.wave)
        }
    }
}