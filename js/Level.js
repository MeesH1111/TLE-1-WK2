//import '../css/style.css';
import { Actor, Vector, Label, Font, FontUnit, Color, Scene } from "excalibur";
import { Resources, ResourceLoader } from './resources.js';
import { Waves } from "./wave.js";



export class level extends Scene {
    constructor() {
        super();
    }
    onInitialize() {
        this.Waves = new Waves()
        this.add(this.Waves)
    }
}