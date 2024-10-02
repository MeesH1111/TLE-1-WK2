import { ImageSource, Sound, Resource, Loader } from 'excalibur'

// voeg hier jouw eigen resources toe
const Resources = {
    Test: new ImageSource('img/test.jpeg'),
    BackgroundStart: new ImageSource('img/bg.jpg'),
    BackgroundEnd: new ImageSource('img/bgGameOver.jpg'),
    BackgroundTree: new ImageSource('img/bomen.png'),
    Home: new ImageSource('img/HuizenDebris.png'),
    Wave: new ImageSource('img/Wave.png'),
    ButtonDonate: new ImageSource('img/donatieknopgame.png'),

}
const ResourceLoader = new Loader()
for (let res of Object.values(Resources)) {
    ResourceLoader.addResource(res)
}

export { Resources, ResourceLoader }