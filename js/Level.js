import { Actor, Vector, Label, Font, FontUnit, Scene, randomIntInRange } from "excalibur";
import { Resources } from './resources.js';
import { Waves } from "./wave.js";
import { home } from "./home.js";

export class level extends Scene {
    homes = [];
    homesx = [400, 300, 500, 700, 900];
    homesy = [400, 200, 300, 400, 500];
    wavestate;
    kills;
    currentwaves;
    previuskills;
    toSpawn;
    hp;

    constructor() {
        super();
    }

    onActivate() {
        this.toSpawn = 0;
        this.score = 0;
        this.waveposdecider = 0;
        this.wavepos = 0;
        this.kills = 0;
        this.previuskills = 0;
        this.currentwaves = 5;
        this.speed = 50;
        this.hp = 5;
        this.wavestate = 5;
        console.log(this.hp);

        const backgroundStart = new Actor();
        backgroundStart.graphics.use(Resources.BackgroundStart.toSprite());
        backgroundStart.pos = new Vector(960, 540);
        this.add(backgroundStart);

        const backgroundTreeStart = new Actor();
        backgroundTreeStart.graphics.use(Resources.BackgroundTree.toSprite());
        backgroundTreeStart.pos = new Vector(960, 540);
        this.add(backgroundTreeStart);
        backgroundTreeStart.z = 2;

        this.Label = new Label({
            text: `Score: ${this.score}`,
            pos: new Vector(20, 40),
            font: new Font({
                family: 'Impact',
                size: 170,
                unit: FontUnit.Px
            })
        });
        this.add(this.Label);

        this.addHomes();

        this.waveposdecider = Math.round(Math.random());

        if (this.waveposdecider === 0) {
            this.wavepos = Math.floor(Math.random() * (1000 - 800 + 1) + 800);
        } else if (this.waveposdecider === 1) {
            this.wavepos = Math.floor(Math.random() * (200 - 0 + 1) + 0);
        }

        for (let i = 0; i < this.homesx.length; i++) {
            console.log(this.homesx[i]);
            const newHome = new home(this.homesx[i], this.homesy[i]);
            console.log(`we made a house at : ${newHome.pos}`);
            this.add(newHome);
            const newWave = new Waves(this.homesx[i], this.homesy[i], this.speed, Math.floor(Math.random() * (1900 - 100 + 1)) + 100, this.wavepos);
            this.add(newWave);
            console.log(`we made a wave at : ${newWave.pos}`);
        }
    }

    addHomes() {
        for (let i = 0; i < this.homesx.length; i++) {
            const newHome = new home(this.homesx[i], this.homesy[i]);
            this.homes.push(newHome);
            this.add(newHome);
            console.log(`We made a house at : ${newHome.pos}`);
        }
    }

    Wavespeed() {
        this.waveposdecider = Math.round(Math.random());
        if (this.waveposdecider === 0) {
            this.wavepos = Math.floor(Math.random() * (1000 - 800 + 1) + 800);
        } else if (this.waveposdecider === 1) {
            this.wavepos = Math.floor(Math.random() * (200 - 0 + 1) + 0);
        }
        if (this.kills - this.previuskills === 5) {
            this.previuskills = this.kills;
            this.speed += 10;
            this.wavestate += 1;
        }
        if (this.currentwaves !== this.wavestate) {
            this.toSpawn = this.wavestate - this.currentwaves;
            console.log(this.toSpawn);
            for (let i = 0; i <= this.toSpawn; i++) {
                this.toSpawn--;
                this.Target = randomIntInRange(0, 4);
                const newWave = new Waves(this.homesx[this.Target], this.homesy[this.Target], this.speed, Math.floor(Math.random() * (1900 - 100 + 1)) + 100, this.wavepos);
                this.add(newWave);
                this.currentwaves += 1;
                console.log(this.toSpawn);
            }
        }
    }

    updateScore() {
        this.score++;
        this.Label.text = `Score: ${this.score}`;
    }
}