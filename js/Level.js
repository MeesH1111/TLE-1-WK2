//import '../css/style.css';
import { Actor, Vector, Label, Font, FontUnit, Color, Scene } from "excalibur";
import { Resources, ResourceLoader } from './resources.js';
import { Waves } from "./wave.js";
import { home } from "./home.js";



export class level extends Scene {
    constructor() {
        super();

    }

    onInitialize() {
        this.home = new home(800, 400)
        this.add(this.home)
        // this.home = new home(700, 400)
        // this.add(this.home)
        // this.home = new home(700, 400)
        // this.add(this.home)
        // this.home = new home(700, 400)
        // this.add(this.home)
        // this.home = new home(700, 400)
        // this.add(this.home)

        this.startTime = Date.now(); // Initialize start time
        this.timerLabel = new Label(); // Create a new label
        this.timerLabel.font = new Font({
            family: 'Arial',
            size: 24,
            unit: FontUnit.PIXEL
        });
        this.timerLabel.color = Color.White;
        this.timerLabel.text = 'Time: 0 minutes 0 seconds'; // Initial text
        this.timerLabel.x = 1000;
        this.timerLabel.y = 1000;
        this.add(this.timerLabel); // Add the label to the scene

    }

    Wavespeed() {
        // You can get the elapsed time in milliseconds like this:
        // let elapsedTime = this.timer.elapsedTime;

        // // You can also check if a certain amount of time has passed
        // if (elapsedTime >= 30000) { // 30 seconds
        // }
    }
    update(engine, delta) {
        let startTime = this.startTime || Date.now();
        let elapsedTime = Date.now() - startTime;
        let seconds = Math.floor(elapsedTime / 1000);
        let minutes = Math.floor(seconds / 60);

        this.timerLabel.text = `Time: ${minutes} minutes ${seconds % 60} seconds`; // Update the label text

    }
}